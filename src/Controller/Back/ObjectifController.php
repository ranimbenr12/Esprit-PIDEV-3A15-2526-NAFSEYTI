<?php
namespace App\Controller\Back;

use App\Entity\Suivi;
use App\Entity\Objectif;
use App\Repository\SuiviRepository;
use App\Repository\ObjectifRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/back/objectif')]
class ObjectifController extends AbstractController
{
    // ── Validation centralisée ─────────────────────────────────────────────
    private function validateObjectif(string $titre, ?string $description, ?string $dateEcheance): array
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

        if ($dateEcheance !== null && $dateEcheance !== '') {
            $d = \DateTime::createFromFormat('Y-m-d', $dateEcheance);
            if (!$d || $d->format('Y-m-d') !== $dateEcheance) {
                $errors['date_echeance'] = 'La date d\'échéance est invalide (format attendu : AAAA-MM-JJ).';
            } elseif ($d < new \DateTime('today')) {
                $errors['date_echeance'] = 'La date d\'échéance ne peut pas être dans le passé.';
            }
        }

        return $errors;
    }

    #[Route('/suivi/{idSuivi}', name: 'back_objectif_index', methods: ['GET'])]
    public function index(int $idSuivi, SuiviRepository $suiviRepo, ObjectifRepository $objectifRepo): Response
    {
        $suivi = $suiviRepo->find($idSuivi);
        if (!$suivi) {
            throw $this->createNotFoundException('Suivi non trouvé');
        }
        return $this->render('back/objectif/index.html.twig', [
            'suivi'    => $suivi,
            'objectifs' => $objectifRepo->findBySuivi($idSuivi),
        ]);
    }

    #[Route('/new/{idSuivi}', name: 'back_objectif_new', methods: ['POST'])]
    public function new(int $idSuivi, Request $request, SuiviRepository $suiviRepo, EntityManagerInterface $em): JsonResponse
    {
        $suivi = $suiviRepo->find($idSuivi);
        if (!$suivi) {
            return new JsonResponse(['success' => false, 'errors' => ['global' => 'Suivi non trouvé.']], 404);
        }

        $titre        = (string) $request->get('titre', '');
        $description  = (string) $request->get('description', '');
        $dateEcheance = (string) $request->get('date_echeance', '');

        $errors = $this->validateObjectif($titre, $description, $dateEcheance);
        if ($errors) {
            return new JsonResponse(['success' => false, 'errors' => $errors], 422);
        }

        try {
            $objectif = new Objectif();
            $objectif->setSuivi($suivi);
            $objectif->setTitre(trim($titre));
            $objectif->setDescription(trim($description));
            $objectif->setDateEcheance(
                $dateEcheance !== '' ? new \DateTime($dateEcheance) : new \DateTime('+30 days')
            );
            $em->persist($objectif);
            $em->flush();
            return new JsonResponse(['success' => true, 'id' => $objectif->getIdobjectif()]);
        } catch (\Exception $e) {
            return new JsonResponse(['success' => false, 'errors' => ['global' => $e->getMessage()]], 500);
        }
    }

    #[Route('/{id}/edit', name: 'back_objectif_edit', methods: ['POST'])]
    public function edit(int $id, Request $request, ObjectifRepository $objectifRepo, EntityManagerInterface $em): JsonResponse
    {
        $objectif = $objectifRepo->find($id);
        if (!$objectif) {
            return new JsonResponse(['success' => false, 'errors' => ['global' => 'Objectif non trouvé.']], 404);
        }

        $titre        = (string) $request->get('titre', '');
        $description  = (string) $request->get('description', '');
        $dateEcheance = (string) $request->get('date_echeance', '');

        $errors = $this->validateObjectif($titre, $description, $dateEcheance);
        if ($errors) {
            return new JsonResponse(['success' => false, 'errors' => $errors], 422);
        }

        try {
            $objectif->setTitre(trim($titre));
            $objectif->setDescription(trim($description));
            if ($dateEcheance !== '') {
                $objectif->setDateEcheance(new \DateTime($dateEcheance));
            }
            $em->flush();
            return new JsonResponse(['success' => true]);
        } catch (\Exception $e) {
            return new JsonResponse(['success' => false, 'errors' => ['global' => $e->getMessage()]], 500);
        }
    }

    #[Route('/{id}/delete', name: 'back_objectif_delete', methods: ['POST'])]
    public function delete(int $id, ObjectifRepository $objectifRepo, EntityManagerInterface $em): JsonResponse
    {
        try {
            $objectif = $objectifRepo->find($id);
            if (!$objectif) {
                return new JsonResponse(['success' => false, 'error' => 'Objectif non trouvé'], 404);
            }
            $em->remove($objectif);
            $em->flush();
            return new JsonResponse(['success' => true]);
        } catch (\Exception $e) {
            return new JsonResponse(['success' => false, 'error' => $e->getMessage()], 500);
        }
    }

    #[Route('/{id}/validate', name: 'back_objectif_validate', methods: ['POST'])]
    public function validate(int $id, ObjectifRepository $objectifRepo, EntityManagerInterface $em): JsonResponse
    {
        try {
            $objectif = $objectifRepo->find($id);
            if (!$objectif) {
                return new JsonResponse(['success' => false, 'error' => 'Objectif non trouvé'], 404);
            }
            $objectif->setValide(true);
            $em->flush();
            return new JsonResponse(['success' => true]);
        } catch (\Exception $e) {
            return new JsonResponse(['success' => false, 'error' => $e->getMessage()], 500);
        }
    }

    #[Route('/{id}/json', name: 'back_objectif_json', methods: ['GET'])]
    public function getJson(int $id, ObjectifRepository $objectifRepo): JsonResponse
    {
        $objectif = $objectifRepo->find($id);
        if (!$objectif) {
            return new JsonResponse(['success' => false, 'error' => 'Objectif non trouvé'], 404);
        }
        return new JsonResponse([
            'id'            => $objectif->getIdobjectif(),
            'titre'         => $objectif->getTitre(),
            'description'   => $objectif->getDescription(),
            'date_echeance' => $objectif->getDateEcheance()?->format('Y-m-d'),
            'valide'        => $objectif->isValide(),
        ]);
    }
}