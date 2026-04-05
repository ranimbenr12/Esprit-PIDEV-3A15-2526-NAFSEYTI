<?php
namespace App\Controller\Front;

use App\Entity\Suivi;
use App\Entity\Objectif;
use App\Entity\MediasObjectif;
use App\Repository\SuiviRepository;
use App\Repository\ObjectifRepository;
use App\Repository\MediasObjectifRepository;
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

    // ── SUIVIS ─────────────────────────────────────────────────────────────
    #[Route('/suivis', name: 'psy_suivi_index', methods: ['GET'])]
    public function index(SuiviRepository $repo, ObjectifRepository $or): Response
    {
        $suivis = $repo->findAll();
        $nbObjectifs = [];
        foreach ($suivis as $s) {
            $nbObjectifs[$s->getIdsuivi()] = $or->countBySuivi($s->getIdsuivi());
        }
        return $this->render('front/psychologue/suivis.html.twig', [
            'suivis'      => $suivis,
            'nbObjectifs' => $nbObjectifs,
        ]);
    }

    #[Route('/suivis/new', name: 'psy_suivi_new', methods: ['POST'])]
    public function newSuivi(Request $request, EntityManagerInterface $em): JsonResponse
    {
        $titre = (string)$request->get('titre', '');
        $desc  = (string)$request->get('description', '');
        $type  = (string)$request->get('type_suivi', '');
        $errors = $this->validateSuivi($titre, $desc, $type);
        if ($errors) return new JsonResponse(['success' => false, 'errors' => $errors], 422);
        try {
            $s = new Suivi();
            $s->setTitre(trim($titre))->setDescription(trim($desc))->setTypeSuivi($type)
              ->setIdutilisateur((int)$request->get('idutilisateur', 1))
              ->setIdpsychologue((int)$request->get('idpsychologue', 1));
            $em->persist($s); $em->flush();
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
        return $this->render('front/psychologue/objectifs.html.twig', [
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
            $o->setValide(true); $em->flush();
            return new JsonResponse(['success' => true]);
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
