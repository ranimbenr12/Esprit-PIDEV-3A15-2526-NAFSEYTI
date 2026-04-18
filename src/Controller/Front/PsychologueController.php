<?php
namespace App\Controller\Front;

use App\Entity\Suivi;
use App\Entity\Objectif;
use App\Entity\MediasObjectif;
use App\Entity\User;
use App\Repository\SuiviRepository;
use App\Repository\ObjectifRepository;
use App\Repository\MediasObjectifRepository;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/psychologue')]
class PsychologueController extends AbstractController
{
    // ── Validation ─────────────────────────────────────────────────────────
    private function validateSuivi(string $titre, ?string $description, ?string $type): array
    {
        $errors = [];
        $titre = trim($titre);
        if ($titre === '') { $errors['titre'] = 'Le titre est obligatoire.'; }
        elseif (mb_strlen($titre) < 3) { $errors['titre'] = 'Minimum 3 caractères.'; }
        elseif (mb_strlen($titre) > 255) { $errors['titre'] = 'Maximum 255 caractères.'; }
        if ($description && mb_strlen(trim($description)) > 1000) { $errors['description'] = 'Maximum 1000 caractères.'; }
        $typesValides = ['Psychologique', 'Académique', 'Social', 'Comportemental'];
        if ($type && !in_array($type, $typesValides, true)) { $errors['type_suivi'] = 'Type invalide.'; }
        return $errors;
    }

    private function checkObjectif(string $titre, ?string $description, ?string $date): array
    {
        $errors = [];
        $titre = trim($titre);
        if ($titre === '') { $errors['titre'] = 'Le titre est obligatoire.'; }
        elseif (mb_strlen($titre) < 3) { $errors['titre'] = 'Minimum 3 caractères.'; }
        elseif (mb_strlen($titre) > 255) { $errors['titre'] = 'Maximum 255 caractères.'; }
        if ($description && mb_strlen(trim($description)) > 1000) { $errors['description'] = 'Maximum 1000 caractères.'; }
        if ($date && $date !== '') {
            $d = \DateTime::createFromFormat('Y-m-d', $date);
            if (!$d || $d->format('Y-m-d') !== $date) { $errors['date_echeance'] = 'Date invalide.'; }
            elseif ($d < new \DateTime('today')) { $errors['date_echeance'] = 'La date ne peut pas être dans le passé.'; }
        }
        return $errors;
    }

    // ── Notifications non lues du psychologue ─────────────────────────────
    #[Route('/notifications', name: 'psy_notifications', methods: ['GET'])]
    public function notifications(EntityManagerInterface $em): JsonResponse
    {
        /** @var User $psy */
        $psy = $this->getUser();
        $conn = $em->getConnection();

        $notifs = $conn->fetchAllAssociative(
            'SELECT DISTINCT n.id_notification as id, n.message, n.type, n.id_patient as related_id, n.date_creation as created_at,
                    u.firstname, u.lastname
             FROM notification n
             LEFT JOIN users u ON u.id = n.id_patient
             WHERE n.id_psychologue = ? AND (n.lu = 0 OR n.lu IS NULL)
             AND n.type = \'upload\'
             ORDER BY n.date_creation DESC LIMIT 20',
            [$psy->getId()]
        );

        return new JsonResponse($notifs);
    }

    // ── Marquer une notification comme lue ────────────────────────────────
    #[Route('/notifications/{id}/read', name: 'psy_notification_read', methods: ['POST'])]
    public function markRead(int $id, EntityManagerInterface $em): JsonResponse
    {
        $conn = $em->getConnection();
        $conn->executeStatement('UPDATE notification SET lu = 1 WHERE id_notification = ?', [$id]);
        return new JsonResponse(['success' => true]);
    }
    #[Route('/suivis', name: 'psy_suivi_index', methods: ['GET'])]
    public function index(UserRepository $userRepo, SuiviRepository $suiviRepo, ObjectifRepository $or, Request $request): Response
    {
        /** @var User $psy */
        $psy = $this->getUser();
        $psyId = $psy->getId();

        $conn = $suiviRepo->getEntityManager()->getConnection();

        $prisParAutre = $conn->fetchFirstColumn(
            'SELECT DISTINCT id_utilisateur FROM suivis WHERE id_psychologue != ? AND id_psychologue IS NOT NULL',
            [$psyId]
        );

        $mesEtudiants = $conn->fetchFirstColumn(
            'SELECT DISTINCT id_utilisateur FROM suivis WHERE id_psychologue = ?',
            [$psyId]
        );

        $aExclure = array_diff($prisParAutre, $mesEtudiants);

        $tousEtudiants = $userRepo->findBy(['role' => 'etudiant']);

        $etudiants = array_filter($tousEtudiants, function(User $e) use ($aExclure) {
            return !in_array($e->getId(), $aExclure, true);
        });

        $nbSuivisParEtudiant = [];
        foreach ($etudiants as $e) {
            $nb = $conn->fetchOne(
                'SELECT COUNT(*) FROM suivis WHERE id_utilisateur = ? AND id_psychologue = ?',
                [$e->getId(), $psyId]
            );
            $nbSuivisParEtudiant[$e->getId()] = (int)$nb;
        }

        // Patient à ouvrir automatiquement (depuis une alerte)
        $openPatientId = (int)$request->query->get('patient', 0);

        return $this->render('psychologue/suivi/index.html.twig', [
            'etudiants'           => array_values($etudiants),
            'nbSuivisParEtudiant' => $nbSuivisParEtudiant,
            'psy'                 => $psy,
            'openPatientId'       => $openPatientId,
        ]);
    }

    // ── AJAX : suivis d'un étudiant ────────────────────────────────────────
    #[Route('/etudiants/{id}/suivis', name: 'psy_etudiant_suivis', methods: ['GET'])]
    public function etudiantSuivis(int $id, SuiviRepository $repo, ObjectifRepository $or, UserRepository $userRepo): JsonResponse
    {
        $etudiant = $userRepo->find($id);
        if (!$etudiant) return new JsonResponse(['error' => 'Étudiant non trouvé'], 404);

        // SQL natif pour éviter tout problème de relation Doctrine
        $conn = $repo->getEntityManager()->getConnection();
        $rows = $conn->fetchAllAssociative(
            'SELECT id_suivi, titre, description, type_suivi, date_creation FROM suivis WHERE id_utilisateur = ? ORDER BY id_suivi DESC',
            [$id]
        );

        $data = [];
        foreach ($rows as $row) {
            $objectifs = $or->findBySuivi((int)$row['id_suivi']);
            $objData = [];
            foreach ($objectifs as $o) {
                $mediasData = [];
                foreach ($o->getMedias() as $m) {
                    $mediasData[] = [
                        'id'     => $m->getIdMedia(),
                        'type'   => $m->getTypeMedia(),
                        'nom'    => $m->getNomFichier() ?? basename($m->getCheminFichier()),
                        'chemin' => $m->getCheminFichier(),
                    ];
                }
                $objData[] = [
                    'id'            => $o->getIdobjectif(),
                    'titre'         => $o->getTitre(),
                    'description'   => $o->getDescription() ?? '',
                    'date_echeance' => $o->getDateEcheance()?->format('Y-m-d'),
                    'date_display'  => $o->getDateEcheance()?->format('d/m/Y'),
                    'valide'        => $o->isValide(),
                    'nb_medias'     => count($mediasData),
                    'medias'        => $mediasData,
                ];
            }
            $data[] = [
                'id'          => (int)$row['id_suivi'],
                'titre'       => $row['titre'],
                'description' => $row['description'] ?? '',
                'type_suivi'  => $row['type_suivi'],
                'date'        => $row['date_creation'] ? (new \DateTime($row['date_creation']))->format('d/m/Y') : null,
                'objectifs'   => $objData,
            ];
        }

        return new JsonResponse([
            'etudiant' => [
                'id'     => $etudiant->getId(),
                'nom'    => $etudiant->getFirstname() . ' ' . $etudiant->getLastname(),
                'email'  => $etudiant->getEmail(),
                'photo'  => $etudiant->getProfile_photo(),
                'points' => (int)$conn->fetchOne(
                    'SELECT COALESCE(SUM(nombre_points), 0) FROM points WHERE id_utilisateur = ?',
                    [$id]
                ),
            ],
            'suivis' => $data,
        ]);
    }

    #[Route('/suivis/new', name: 'psy_suivi_new', methods: ['POST'])]
    public function newSuivi(Request $request, EntityManagerInterface $em, UserRepository $userRepo): JsonResponse
    {
        /** @var User $psy */
        $psy = $this->getUser();

        $titre = (string)$request->get('titre', '');
        $desc  = (string)$request->get('description', '');
        $type  = (string)$request->get('type_suivi', '');
        $errors = $this->validateSuivi($titre, $desc, $type);
        if ($errors) return new JsonResponse(['success' => false, 'errors' => $errors], 422);

        $etudiantId = (int)$request->get('idutilisateur', 0);
        $etudiant = $etudiantId ? $userRepo->find($etudiantId) : null;
        if (!$etudiant) return new JsonResponse(['success' => false, 'errors' => ['global' => 'Étudiant non trouvé.']], 404);

        try {
            $s = new Suivi();
            $s->setTitre(trim($titre))
              ->setDescription(trim($desc))
              ->setTypeSuivi($type)
              ->setUtilisateur($etudiant)
              ->setPsychologue($psy);
            $em->persist($s);
            $em->flush();

            // Notifier l'étudiant
            $conn = $em->getConnection();
            $conn->executeStatement(
                'INSERT INTO notification (id_psychologue, id_patient, message, type, lu, date_creation) VALUES (?, ?, ?, ?, 0, NOW())',
                [
                    $psy->getId(),
                    $etudiant->getId(),
                    '📋 Votre psychologue ' . $psy->getFirstname() . ' ' . $psy->getLastname() . ' vous a assigné un nouveau suivi : "' . trim($titre) . '".',
                    'suivi',
                ]
            );

            return new JsonResponse(['success' => true, 'id' => $s->getIdsuivi()]);
        } catch (\Exception $e) {
            return new JsonResponse(['success' => false, 'errors' => ['global' => $e->getMessage()]], 500);
        }
    }

    #[Route('/suivis/{id}/edit', name: 'psy_suivi_edit', methods: ['POST'])]
    public function editSuivi(int $id, Request $request, SuiviRepository $repo, EntityManagerInterface $em): JsonResponse
    {
        $suivi = $repo->find($id);
        if (!$suivi) return new JsonResponse(['success' => false, 'errors' => ['global' => 'Suivi non trouvé.']], 404);
        $titre = (string)$request->get('titre', '');
        $desc  = (string)$request->get('description', '');
        $type  = (string)$request->get('type_suivi', '');
        $errors = $this->validateSuivi($titre, $desc, $type);
        if ($errors) return new JsonResponse(['success' => false, 'errors' => $errors], 422);
        try {
            $suivi->setTitre(trim($titre))->setDescription(trim($desc))->setTypeSuivi($type)->setDateModification(new \DateTime());
            $em->flush();
            return new JsonResponse(['success' => true]);
        } catch (\Exception $e) {
            return new JsonResponse(['success' => false, 'errors' => ['global' => $e->getMessage()]], 500);
        }
    }

    #[Route('/suivis/{id}/delete', name: 'psy_suivi_delete', methods: ['POST'])]
    public function deleteSuivi(int $id, SuiviRepository $repo, EntityManagerInterface $em): JsonResponse
    {
        try {
            $suivi = $repo->find($id);
            if (!$suivi) return new JsonResponse(['success' => false, 'error' => 'Non trouvé'], 404);
            foreach ($suivi->getObjectifs() as $o) $em->remove($o);
            $em->remove($suivi); $em->flush();
            return new JsonResponse(['success' => true]);
        } catch (\Exception $e) {
            return new JsonResponse(['success' => false, 'error' => $e->getMessage()], 500);
        }
    }

    #[Route('/suivis/{id}/json', name: 'psy_suivi_json', methods: ['GET'])]
    public function jsonSuivi(int $id, SuiviRepository $repo): JsonResponse
    {
        $s = $repo->find($id);
        if (!$s) return new JsonResponse(['success' => false], 404);
        return new JsonResponse(['id' => $s->getIdsuivi(), 'titre' => $s->getTitre(),
            'description' => $s->getDescription(), 'type_suivi' => $s->getTypeSuivi(),
            'idutilisateur' => $s->getIdutilisateur(), 'idpsychologue' => $s->getIdpsychologue()]);
    }

    // ── OBJECTIFS ──────────────────────────────────────────────────────────
    #[Route('/suivis/{idSuivi}/objectifs', name: 'psy_objectif_index', methods: ['GET'])]
    public function objectifs(int $idSuivi, SuiviRepository $sr, ObjectifRepository $or): Response
    {
        $suivi = $sr->find($idSuivi);
        if (!$suivi) throw $this->createNotFoundException();
        return $this->render('psychologue/objectif/index.html.twig', [
            'suivi'    => $suivi,
            'objectifs' => $or->findBySuivi($idSuivi),
        ]);
    }

    #[Route('/suivis/{idSuivi}/objectifs/new', name: 'psy_objectif_new', methods: ['POST'])]
    public function newObjectif(int $idSuivi, Request $request, SuiviRepository $sr, ObjectifRepository $or, EntityManagerInterface $em): JsonResponse
    {
        $suivi = $sr->find($idSuivi);
        if (!$suivi) return new JsonResponse(['success' => false, 'errors' => ['global' => 'Suivi non trouvé.']], 404);

        // Limite 3 objectifs par suivi
        if ($or->countBySuivi($idSuivi) >= 3) {
            return new JsonResponse(['success' => false, 'errors' => ['global' => 'Limite atteinte : 3 objectifs maximum par suivi.']], 422);
        }

        $titre = (string)$request->get('titre', '');
        $desc  = (string)$request->get('description', '');
        $date  = (string)$request->get('date_echeance', '');
        $errors = $this->checkObjectif($titre, $desc, $date);
        if ($errors) return new JsonResponse(['success' => false, 'errors' => $errors], 422);
        try {
            $o = new Objectif();
            $o->setSuivi($suivi)->setTitre(trim($titre))->setDescription(trim($desc))
              ->setDateEcheance($date !== '' ? new \DateTime($date) : new \DateTime('+30 days'));
            $em->persist($o); $em->flush();

            // Notifier l'étudiant
            /** @var User $psy */
            $psy = $this->getUser();
            $conn = $em->getConnection();
            $idEtudiant = $conn->fetchOne('SELECT id_utilisateur FROM suivis WHERE id_suivi = ?', [$idSuivi]);
            if ($idEtudiant) {
                $conn->executeStatement(
                    'INSERT INTO notification (id_psychologue, id_patient, message, type, lu, date_creation) VALUES (?, ?, ?, ?, 0, NOW())',
                    [
                        $psy->getId(),
                        (int)$idEtudiant,
                        '🎯 Un nouvel objectif vous a été assigné : "' . trim($titre) . '". Pensez à uploader votre document.',
                        'objectif',
                    ]
                );
            }

            return new JsonResponse(['success' => true, 'id' => $o->getIdobjectif(), 'total' => $or->countBySuivi($idSuivi)]);
        } catch (\Exception $e) {
            return new JsonResponse(['success' => false, 'errors' => ['global' => $e->getMessage()]], 500);
        }
    }

    #[Route('/objectifs/{id}/edit', name: 'psy_objectif_edit', methods: ['POST'])]
    public function editObjectif(int $id, Request $request, ObjectifRepository $or, EntityManagerInterface $em): JsonResponse
    {
        $o = $or->find($id);
        if (!$o) return new JsonResponse(['success' => false, 'errors' => ['global' => 'Non trouvé.']], 404);
        $titre = (string)$request->get('titre', '');
        $desc  = (string)$request->get('description', '');
        $date  = (string)$request->get('date_echeance', '');
        $errors = $this->checkObjectif($titre, $desc, $date);
        if ($errors) return new JsonResponse(['success' => false, 'errors' => $errors], 422);
        try {
            $o->setTitre(trim($titre))->setDescription(trim($desc));
            if ($date !== '') $o->setDateEcheance(new \DateTime($date));
            $em->flush();
            return new JsonResponse(['success' => true]);
        } catch (\Exception $e) {
            return new JsonResponse(['success' => false, 'errors' => ['global' => $e->getMessage()]], 500);
        }
    }

    #[Route('/objectifs/{id}/delete', name: 'psy_objectif_delete', methods: ['POST'])]
    public function deleteObjectif(int $id, ObjectifRepository $or, EntityManagerInterface $em): JsonResponse
    {
        try {
            $o = $or->find($id);
            if (!$o) return new JsonResponse(['success' => false, 'error' => 'Non trouvé'], 404);
            $em->remove($o); $em->flush();
            return new JsonResponse(['success' => true]);
        } catch (\Exception $e) {
            return new JsonResponse(['success' => false, 'error' => $e->getMessage()], 500);
        }
    }

    #[Route('/objectifs/{id}/validate', name: 'psy_objectif_validate', methods: ['POST'])]
    public function validateObjectif(int $id, ObjectifRepository $or, EntityManagerInterface $em): JsonResponse
    {
        try {
            $o = $or->find($id);
            if (!$o) return new JsonResponse(['success' => false, 'error' => 'Non trouvé'], 404);

            // Vérifier qu'un document a été uploadé
            if ($o->getMedias()->isEmpty()) {
                return new JsonResponse(['success' => false, 'error' => 'Impossible de valider : aucun document uploadé par l\'étudiant.'], 422);
            }

            // Valider l'objectif
            $o->setValide(true);

            // Attribuer 15 points à l'étudiant
            $suivi = $o->getSuivi();
            if ($suivi) {
                $conn = $em->getConnection();
                $idUtilisateur = $conn->fetchOne(
                    'SELECT id_utilisateur FROM suivis WHERE id_suivi = ?',
                    [$suivi->getIdsuivi()]
                );

                if ($idUtilisateur) {
                    $point = new \App\Entity\Point();
                    $point->setId_utilisateur((int)$idUtilisateur);
                    $point->setId_objectif($o->getIdobjectif());
                    $point->setNombre_points(15);
                    $point->setDate_attribution(new \DateTime());
                    $em->persist($point);
                }
            }

            $em->flush();
            return new JsonResponse(['success' => true, 'points' => 15]);
        } catch (\Exception $e) {
            return new JsonResponse(['success' => false, 'error' => $e->getMessage()], 500);
        }
    }

    #[Route('/objectifs/{id}/json', name: 'psy_objectif_json', methods: ['GET'])]
    public function jsonObjectif(int $id, ObjectifRepository $or): JsonResponse
    {
        $o = $or->find($id);
        if (!$o) return new JsonResponse(['success' => false], 404);
        return new JsonResponse(['id' => $o->getIdobjectif(), 'titre' => $o->getTitre(),
            'description' => $o->getDescription(), 'date_echeance' => $o->getDateEcheance()?->format('Y-m-d'),
            'valide' => $o->isValide()]);
    }

    // ── MÉDIAS (lecture + suppression) ─────────────────────────────────────
    #[Route('/objectifs/{id}/medias', name: 'psy_objectif_medias', methods: ['GET'])]
    public function medias(int $id, ObjectifRepository $or): JsonResponse
    {
        $o = $or->find($id);
        if (!$o) return new JsonResponse([], 404);
        $data = [];
        foreach ($o->getMedias() as $m) {
            $data[] = ['id' => $m->getIdMedia(), 'type' => $m->getTypeMedia(),
                       'nom' => $m->getNomFichier(), 'chemin' => $m->getCheminFichier(),
                       'date' => $m->getDateAjout()->format('d/m/Y H:i')];
        }
        return new JsonResponse($data);
    }

    #[Route('/medias/{id}/delete', name: 'psy_media_delete', methods: ['POST'])]
    public function deleteMedia(int $id, MediasObjectifRepository $mr, EntityManagerInterface $em): JsonResponse
    {
        try {
            $m = $mr->find($id);
            if (!$m) return new JsonResponse(['success' => false, 'error' => 'Non trouvé'], 404);
            $chemin = $this->getParameter('kernel.project_dir') . '/public/' . $m->getCheminFichier();
            if (file_exists($chemin)) unlink($chemin);
            $em->remove($m); $em->flush();
            return new JsonResponse(['success' => true]);
        } catch (\Exception $e) {
            return new JsonResponse(['success' => false, 'error' => $e->getMessage()], 500);
        }
    }
}
