<?php
namespace App\Controller\Back;

use App\Entity\Suivi;
use App\Form\SuiviType;
use App\Repository\SuiviRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/back/suivi')]
class SuiviController extends AbstractController
{
    // ── Validation centralisée ─────────────────────────────────────────────
    private function validateSuivi(string $titre, ?string $description, ?string $typeSuivi): array
    {
        $errors = [];

        $titre = trim($titre);
        if ($titre === '') {
            $errors['titre'] = 'Le titre est obligatoire.';
        } elseif (mb_strlen($titre) < 3) {
            $errors['titre'] = 'Le titre doit contenir au moins 3 caractères.';
        } elseif (mb_strlen($titre) > 255) {
            $errors['titre'] = 'Le titre ne peut pas dépasser 255 caractères.';
        } elseif (!preg_match('/^[\p{L}0-9\s\'\-\,\.]+$/u', $titre)) {
            $errors['titre'] = 'Le titre contient des caractères non autorisés.';
        }

        if ($description !== null && mb_strlen(trim($description)) > 1000) {
            $errors['description'] = 'La description ne peut pas dépasser 1000 caractères.';
        }

        $typesValides = ['Psychologique', 'Académique', 'Social', 'Comportemental'];
        if ($typeSuivi && !in_array($typeSuivi, $typesValides, true)) {
            $errors['type_suivi'] = 'Le type de suivi sélectionné est invalide.';
        }

        return $errors;
    }

    #[Route('/', name: 'back_suivi_index', methods: ['GET'])]
    public function index(SuiviRepository $repo): Response
    {
        return $this->render('back/suivi/index.html.twig', [
            'suivis' => $repo->findAll(),
        ]);
    }

    #[Route('/new', name: 'back_suivi_new', methods: ['POST'])]
    public function new(Request $request, EntityManagerInterface $em): JsonResponse
    {
        $titre       = (string) $request->get('titre', '');
        $description = (string) $request->get('description', '');
        $typeSuivi   = (string) $request->get('type_suivi', '');

        $errors = $this->validateSuivi($titre, $description, $typeSuivi);
        if ($errors) {
            return new JsonResponse(['success' => false, 'errors' => $errors], 422);
        }

        try {
            $suivi = new Suivi();
            $suivi->setTitre(trim($titre));
            $suivi->setDescription(trim($description));
            $suivi->setTypeSuivi($typeSuivi);
            $suivi->setIdutilisateur((int) $request->get('idutilisateur', 1));
            $suivi->setIdpsychologue((int) $request->get('idpsychologue', 1));
            $em->persist($suivi);
            $em->flush();
            return new JsonResponse(['success' => true, 'id' => $suivi->getIdsuivi()]);
        } catch (\Exception $e) {
            return new JsonResponse(['success' => false, 'errors' => ['global' => $e->getMessage()]], 500);
        }
    }

    #[Route('/{id}/edit', name: 'back_suivi_edit', methods: ['POST'])]
    public function edit(Request $request, int $id, SuiviRepository $repo, EntityManagerInterface $em): JsonResponse
    {
        $suivi = $repo->find($id);
        if (!$suivi) {
            return new JsonResponse(['success' => false, 'errors' => ['global' => 'Suivi non trouvé.']], 404);
        }

        $titre       = (string) $request->get('titre', '');
        $description = (string) $request->get('description', '');
        $typeSuivi   = (string) $request->get('type_suivi', '');

        $errors = $this->validateSuivi($titre, $description, $typeSuivi);
        if ($errors) {
            return new JsonResponse(['success' => false, 'errors' => $errors], 422);
        }

        try {
            $suivi->setTitre(trim($titre));
            $suivi->setDescription(trim($description));
            $suivi->setTypeSuivi($typeSuivi);
            $suivi->setDateModification(new \DateTime());
            $em->flush();
            return new JsonResponse(['success' => true]);
        } catch (\Exception $e) {
            return new JsonResponse(['success' => false, 'errors' => ['global' => $e->getMessage()]], 500);
        }
    }

    #[Route('/{id}/delete', name: 'back_suivi_delete', methods: ['POST'])]
    public function delete(int $id, SuiviRepository $repo, EntityManagerInterface $em): JsonResponse
    {
        try {
            $suivi = $repo->find($id);
            if (!$suivi) {
                return new JsonResponse(['success' => false, 'error' => 'Suivi non trouvé'], 404);
            }
            foreach ($suivi->getObjectifs() as $objectif) {
                $em->remove($objectif);
            }
            $em->remove($suivi);
            $em->flush();
            return new JsonResponse(['success' => true]);
        } catch (\Exception $e) {
            return new JsonResponse(['success' => false, 'error' => $e->getMessage()], 500);
        }
    }

    #[Route('/{id}/show', name: 'back_suivi_show', methods: ['GET'])]
    public function show(int $id, SuiviRepository $repo): Response
    {
        $suivi = $repo->find($id);
        if (!$suivi) {
            throw $this->createNotFoundException('Suivi non trouvé');
        }
        return $this->render('back/suivi/_details.html.twig', ['suivi' => $suivi]);
    }

    #[Route('/{id}/json', name: 'back_suivi_json', methods: ['GET'])]
    public function getSuiviJson(int $id, SuiviRepository $repo): JsonResponse
    {
        $suivi = $repo->find($id);
        if (!$suivi) {
            return new JsonResponse(['success' => false, 'error' => 'Suivi non trouvé'], 404);
        }
        return new JsonResponse([
            'id'            => $suivi->getIdsuivi(),
            'titre'         => $suivi->getTitre(),
            'description'   => $suivi->getDescription(),
            'type_suivi'    => $suivi->getTypeSuivi(),
            'idutilisateur' => $suivi->getIdutilisateur(),
            'idpsychologue' => $suivi->getIdpsychologue(),
        ]);
    }
}