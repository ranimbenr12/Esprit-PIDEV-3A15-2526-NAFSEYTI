<?php
namespace App\Controller\Front;

use App\Entity\MediasObjectif;
use App\Entity\User;
use App\Repository\SuiviRepository;
use App\Repository\ObjectifRepository;
use App\Repository\MediasObjectifRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/client')]
class ClientController extends AbstractController
{
    // ── NOTIFICATIONS de l'étudiant ────────────────────────────────────────
    #[Route('/notifications', name: 'client_notifications', methods: ['GET'])]
    public function notifications(EntityManagerInterface $em): JsonResponse
    {
        /** @var \App\Entity\User $currentUser */
        $currentUser = $this->getUser();
        if (!$currentUser) return new JsonResponse([], 401);

        $conn = $em->getConnection();
        $notifs = $conn->fetchAllAssociative(
            'SELECT DISTINCT n.id_notification as id, n.message, n.type, n.date_creation,
                    u.firstname, u.lastname
             FROM notification n
             LEFT JOIN users u ON u.id = n.id_psychologue
             WHERE n.id_patient = ? AND (n.lu = 0 OR n.lu IS NULL)
             AND n.type IN (\'suivi\', \'objectif\')
             ORDER BY n.date_creation DESC LIMIT 20',
            [$currentUser->getId()]
        );

        return new JsonResponse($notifs);
    }

    #[Route('/notifications/{id}/read', name: 'client_notification_read', methods: ['POST'])]
    public function markNotificationRead(int $id, EntityManagerInterface $em): JsonResponse
    {
        $conn = $em->getConnection();
        $conn->executeStatement('UPDATE notification SET lu = 1 WHERE id_notification = ?', [$id]);
        return new JsonResponse(['success' => true]);
    }

    // ── SUIVIS (lecture seule) ─────────────────────────────────────────────
    #[Route('/suivis', name: 'client_suivi_index', methods: ['GET'])]
    public function index(SuiviRepository $repo, ObjectifRepository $or): Response
    {
        /** @var \App\Entity\User $currentUser */
        $currentUser = $this->getUser();
        $suivis = $currentUser ? $repo->findByUtilisateurId($currentUser->getId()) : [];

        // Pour chaque suivi, compter les objectifs sans média uploadé
        $alertes = [];
        foreach ($suivis as $suivi) {
            $count = 0;
            foreach ($or->findBySuivi($suivi->getIdsuivi()) as $objectif) {
                if (!$objectif->isValide() && $objectif->getMedias()->isEmpty()) {
                    $count++;
                }
            }
            $alertes[$suivi->getIdsuivi()] = $count;
        }

        // Total des points de l'étudiant
        $totalPoints = 0;
        if ($currentUser) {
            $conn = $repo->getEntityManager()->getConnection();
            $totalPoints = (int)$conn->fetchOne(
                'SELECT COALESCE(SUM(nombre_points), 0) FROM points WHERE id_utilisateur = ?',
                [$currentUser->getId()]
            );
        }

        return $this->render('client/suivi/index.html.twig', [
            'suivis'      => $suivis,
            'alertes'     => $alertes,
            'totalPoints' => $totalPoints,
        ]);
    }

    // ── MÉDITATION GUIDÉE ──────────────────────────────────────────────────
    #[Route('/meditation', name: 'client_meditation_index', methods: ['GET'])]
    public function meditation(): Response
    {
        return $this->render('client/meditation/index.html.twig');
    }

    // ── JEU DÉFIS ÉMOTIONNELS ──────────────────────────────────────────────
    #[Route('/jeu', name: 'client_jeu_index', methods: ['GET'])]
    public function jeu(SuiviRepository $repo): Response
    {
        /** @var \App\Entity\User $currentUser */
        $currentUser = $this->getUser();
        $totalPoints = 0;
        $defisReussis = 0;
        $niveau = 1;
        $progression = [];

        if ($currentUser) {
            $conn = $repo->getEntityManager()->getConnection();
            $totalPoints = (int)$conn->fetchOne(
                'SELECT COALESCE(SUM(nombre_points), 0) FROM points WHERE id_utilisateur = ?',
                [$currentUser->getId()]
            );
            $niveau = max(1, (int)floor($totalPoints / 100) + 1);
            $defisReussis = (int)$conn->fetchOne(
                'SELECT COALESCE(SUM(defis_reussis), 0) FROM jeu_progression WHERE id_utilisateur = ?',
                [$currentUser->getId()]
            );
            // Progression par catégorie
            $rows = $conn->fetchAllAssociative(
                'SELECT categorie, defis_reussis, points_gagnes FROM jeu_progression WHERE id_utilisateur = ?',
                [$currentUser->getId()]
            );
            foreach ($rows as $row) {
                $progression[$row['categorie']] = [
                    'defis' => (int)$row['defis_reussis'],
                    'points' => (int)$row['points_gagnes'],
                ];
            }
        }

        return $this->render('client/jeu/index.html.twig', [
            'totalPoints'  => $totalPoints,
            'niveau'       => $niveau,
            'defisReussis' => $defisReussis,
            'progression'  => $progression,
        ]);
    }

    #[Route('/jeu/save-score', name: 'client_jeu_save_score', methods: ['POST'])]
    public function saveScore(Request $request, SuiviRepository $repo, EntityManagerInterface $em): JsonResponse
    {
        /** @var \App\Entity\User $currentUser */
        $currentUser = $this->getUser();
        if (!$currentUser) {
            return new JsonResponse(['success' => false], 401);
        }

        $data = json_decode($request->getContent(), true);
        $points = (int)($data['points'] ?? 0);
        $category = $data['category'] ?? 'inconnu';
        $score = (int)($data['score'] ?? 0);
        $total = (int)($data['total'] ?? 3);

        $conn = $repo->getEntityManager()->getConnection();

        // Sauvegarder les points si score > 0
        if ($points > 0) {
            $conn->executeStatement(
                'INSERT INTO points (id_utilisateur, id_objectif, nombre_points, date_attribution) VALUES (?, NULL, ?, NOW())',
                [$currentUser->getId(), $points]
            );
        }

        // Mettre à jour la progression par catégorie (max 12 défis)
        $existing = $conn->fetchAssociative(
            'SELECT * FROM jeu_progression WHERE id_utilisateur = ? AND categorie = ?',
            [$currentUser->getId(), $category]
        );

        if ($existing) {
            $newDefis = min(12, $existing['defis_reussis'] + ($score > 0 ? 1 : 0));
            $newPoints = $existing['points_gagnes'] + $points;
            $conn->executeStatement(
                'UPDATE jeu_progression SET defis_reussis = ?, points_gagnes = ?, derniere_activite = NOW() WHERE id = ?',
                [$newDefis, $newPoints, $existing['id']]
            );
        } else {
            $conn->executeStatement(
                'INSERT INTO jeu_progression (id_utilisateur, categorie, defis_reussis, points_gagnes, derniere_activite) VALUES (?, ?, ?, ?, NOW())',
                [$currentUser->getId(), $category, ($score > 0 ? 1 : 0), $points]
            );
        }

        // Retourner la progression mise à jour
        $progression = $conn->fetchAllAssociative(
            'SELECT categorie, defis_reussis, points_gagnes FROM jeu_progression WHERE id_utilisateur = ?',
            [$currentUser->getId()]
        );

        return new JsonResponse(['success' => true, 'points' => $points, 'progression' => $progression]);
    }

    // ── OBJECTIFS (lecture + upload) ───────────────────────────────────────
    #[Route('/suivis/{idSuivi}/objectifs', name: 'client_objectif_index', methods: ['GET'])]
    public function objectifs(int $idSuivi, SuiviRepository $sr, ObjectifRepository $or): Response
    {
        $suivi = $sr->find($idSuivi);
        if (!$suivi) throw $this->createNotFoundException('Suivi introuvable');

        // Vérifier que ce suivi appartient bien à l'utilisateur connecté
        /** @var \App\Entity\User $currentUser */
        $currentUser = $this->getUser();
        if ($currentUser && $suivi->getIdutilisateur() !== $currentUser->getId()) {
            throw $this->createAccessDeniedException();
        }

        return $this->render('client/objectif/index.html.twig', [
            'suivi'     => $suivi,
            'objectifs' => $or->findBySuivi($idSuivi),
        ]);
    }

    // ── UPLOAD FICHIER ─────────────────────────────────────────────────────
    #[Route('/objectifs/{id}/upload', name: 'client_media_upload', methods: ['POST'])]
    public function upload(int $id, Request $request, ObjectifRepository $or, EntityManagerInterface $em): JsonResponse
    {
        $objectif = $or->find($id);
        if (!$objectif) {
            return new JsonResponse(['success' => false, 'error' => 'Objectif non trouvé'], 404);
        }

        $file = $request->files->get('fichier');
        if (!$file) {
            return new JsonResponse(['success' => false, 'error' => 'Aucun fichier reçu.'], 400);
        }

        // Validation taille (max 10 Mo)
        if ($file->getSize() > 10 * 1024 * 1024) {
            return new JsonResponse(['success' => false, 'error' => 'Fichier trop volumineux (max 10 Mo).'], 400);
        }

        // Validation type MIME
        $mimeType = $file->getMimeType();
        $allowedMimes = [
            'image/jpeg', 'image/png', 'image/gif', 'image/webp',
            'video/mp4', 'video/avi', 'video/quicktime', 'video/webm',
            'application/pdf',
            'application/msword',
            'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
        ];
        if (!in_array($mimeType, $allowedMimes, true)) {
            return new JsonResponse(['success' => false, 'error' => 'Type de fichier non autorisé.'], 400);
        }

        // Déterminer le type média
        $typeMedia = match(true) {
            str_starts_with($mimeType, 'image/') => 'image',
            str_starts_with($mimeType, 'video/') => 'video',
            default => 'document',
        };

        try {
            $ext        = $file->guessExtension() ?? 'bin';
            // Nom unique via UUID (symfony/uid)
            $nomFichier = \Symfony\Component\Uid\Uuid::v4()->toRfc4122() . '.' . $ext;
            $uploadDir  = $this->getParameter('kernel.project_dir') . '/public/uploads/objectifs';
            $file->move($uploadDir, $nomFichier);

            $media = new MediasObjectif();
            $media->setObjectif($objectif)
                  ->setTypeMedia($typeMedia)
                  ->setCheminFichier('uploads/objectifs/' . $nomFichier);
            $em->persist($media);
            $em->flush();

            // Notifier le psychologue
            /** @var \App\Entity\User $currentUser */
            $currentUser = $this->getUser();
            $conn = $em->getConnection();
            $suivi = $objectif->getSuivi();
            if ($suivi && $currentUser) {
                $psyId = $conn->fetchOne('SELECT id_psychologue FROM suivis WHERE id_suivi = ?', [$suivi->getIdsuivi()]);
                if ($psyId) {
                    $conn->executeStatement(
                        'INSERT INTO notification (id_psychologue, id_patient, message, type, lu, date_creation) VALUES (?, ?, ?, ?, 0, NOW())',
                        [
                            (int)$psyId,
                            $currentUser->getId(),
                            '📎 ' . $currentUser->getFirstname() . ' ' . $currentUser->getLastname() . ' a uploadé un document pour l\'objectif "' . $objectif->getTitre() . '".',
                            'upload',
                        ]
                    );
                }
            }

            return new JsonResponse([
                'success' => true,
                'id'      => $media->getIdMedia(),
                'type'    => $typeMedia,
                'nom'     => $nomFichier,
                'chemin'  => 'uploads/objectifs/' . $nomFichier,
            ]);
        } catch (\Exception $e) {
            return new JsonResponse(['success' => false, 'error' => $e->getMessage()], 500);
        }
    }

    // ── LISTE MÉDIAS d'un objectif ─────────────────────────────────────────
    #[Route('/objectifs/{id}/medias', name: 'client_media_list', methods: ['GET'])]
    public function medias(int $id, ObjectifRepository $or): JsonResponse
    {
        $o = $or->find($id);
        if (!$o) return new JsonResponse([], 404);
        $data = [];
        foreach ($o->getMedias() as $m) {
            $data[] = [
                'id'     => $m->getIdMedia(),
                'type'   => $m->getTypeMedia(),
                'nom'    => $m->getNomFichier(),
                'chemin' => $m->getCheminFichier(),
                'date'   => $m->getDateAjout()->format('d/m/Y H:i'),
            ];
        }
        return new JsonResponse($data);
    }

    // ── SUPPRIMER un média (client peut supprimer avant validation) ────────
    #[Route('/medias/{id}/delete', name: 'client_media_delete', methods: ['POST'])]
    public function deleteMedia(int $id, MediasObjectifRepository $mr, EntityManagerInterface $em): JsonResponse
    {
        try {
            $m = $mr->find($id);
            if (!$m) return new JsonResponse(['success' => false, 'error' => 'Fichier non trouvé'], 404);

            // Bloquer si l'objectif est déjà validé
            if ($m->getObjectif() && $m->getObjectif()->isValide()) {
                return new JsonResponse(['success' => false, 'error' => 'Objectif validé — suppression impossible.'], 403);
            }

            $chemin = $this->getParameter('kernel.project_dir') . '/public/' . $m->getCheminFichier();
            if (file_exists($chemin)) unlink($chemin);
            $em->remove($m);
            $em->flush();
            return new JsonResponse(['success' => true]);
        } catch (\Exception $e) {
            return new JsonResponse(['success' => false, 'error' => $e->getMessage()], 500);
        }
    }
}
