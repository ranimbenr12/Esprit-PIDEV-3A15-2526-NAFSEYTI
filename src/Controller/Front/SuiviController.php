<?php
namespace App\Controller\Front;

use App\Entity\Suivi;
use App\Entity\Objectif;
use App\Repository\SuiviRepository;
use App\Repository\ObjectifRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/suivi')]
class SuiviController extends AbstractController
{
    #[Route('/', name: 'front_suivi_index', methods: ['GET'])]
    public function index(SuiviRepository $repo): Response
    {
        return $this->redirectToRoute('client_suivi_index');
    }

    #[Route('/new', name: 'front_suivi_new', methods: ['POST'])]
    public function new(Request $request, EntityManagerInterface $em): JsonResponse
    {
        try {
            $suivi = new Suivi();
            $suivi->setTitre($request->get('titre'));
            $suivi->setDescription($request->get('description'));
            $suivi->setTypeSuivi($request->get('type_suivi') ?: 'Psychologique');
            $suivi->setIdutilisateur((int)$request->get('idutilisateur', 1));
            $suivi->setIdpsychologue((int)$request->get('idpsychologue', 1));
            $em->persist($suivi);
            $em->flush();
            return $this->json(['success' => true, 'id' => $suivi->getIdsuivi()]);
        } catch (\Exception $e) {
            return $this->json(['success' => false, 'error' => $e->getMessage()], 500);
        }
    }

    #[Route('/{id}/edit', name: 'front_suivi_edit', methods: ['POST'])]
    public function edit(Request $request, int $id, SuiviRepository $repo, EntityManagerInterface $em): JsonResponse
    {
        try {
            $suivi = $repo->find($id);
            if (!$suivi) {
                return new JsonResponse(['success' => false, 'error' => 'Suivi non trouvé'], 404);
            }
            $suivi->setTitre($request->get('titre'));
            $suivi->setDescription($request->get('description'));
            $suivi->setTypeSuivi($request->get('type_suivi') ?: $suivi->getTypeSuivi());
            $suivi->setDateModification(new \DateTime());
            $em->flush();
            return new JsonResponse(['success' => true]);
        } catch (\Exception $e) {
            return new JsonResponse(['success' => false, 'error' => $e->getMessage()], 500);
        }
    }

    #[Route('/{id}/json', name: 'front_suivi_json', methods: ['GET'])]
    public function getSuiviJson(int $id, SuiviRepository $repo): JsonResponse
    {
        $suivi = $repo->find($id);
        if (!$suivi) {
            return new JsonResponse(['success' => false, 'error' => 'Suivi non trouvé'], 404);
        }
        return new JsonResponse([
            'id'          => $suivi->getIdsuivi(),
            'titre'       => $suivi->getTitre(),
            'description' => $suivi->getDescription(),
            'type_suivi'  => $suivi->getTypeSuivi(),
        ]);
    }

    // ── OBJECTIFS ──────────────────────────────────────────────────────────

    #[Route('/{idSuivi}/objectifs', name: 'front_objectif_index', methods: ['GET'])]
    public function objectifs(int $idSuivi, SuiviRepository $suiviRepo, ObjectifRepository $objectifRepo): Response
    {
        $suivi = $suiviRepo->find($idSuivi);
        if (!$suivi) {
            throw $this->createNotFoundException('Suivi non trouvé');
        }
        return $this->render('front/suivi/objectifs.html.twig', [
            'suivi'    => $suivi,
            'objectifs' => $objectifRepo->findBySuivi($idSuivi),
        ]);
    }

    #[Route('/{idSuivi}/objectifs/new', name: 'front_objectif_new', methods: ['POST'])]
    public function newObjectif(int $idSuivi, Request $request, SuiviRepository $suiviRepo, EntityManagerInterface $em): JsonResponse
    {
        try {
            $suivi = $suiviRepo->find($idSuivi);
            if (!$suivi) {
                return new JsonResponse(['success' => false, 'error' => 'Suivi non trouvé'], 404);
            }
            $objectif = new Objectif();
            $objectif->setSuivi($suivi);
            $objectif->setTitre($request->get('titre') ?: 'Sans titre');
            $objectif->setDescription($request->get('description') ?: '');

            $dateEcheance = $request->get('date_echeance');
            $objectif->setDateEcheance($dateEcheance ? new \DateTime($dateEcheance) : new \DateTime('+30 days'));

            $em->persist($objectif);
            $em->flush();
            return new JsonResponse(['success' => true, 'id' => $objectif->getIdobjectif()]);
        } catch (\Exception $e) {
            return new JsonResponse(['success' => false, 'error' => $e->getMessage()], 500);
        }
    }

    #[Route('/objectif/{id}/edit', name: 'front_objectif_edit', methods: ['POST'])]
    public function editObjectif(int $id, Request $request, ObjectifRepository $repo, EntityManagerInterface $em): JsonResponse
    {
        try {
            $objectif = $repo->find($id);
            if (!$objectif) {
                return new JsonResponse(['success' => false, 'error' => 'Objectif non trouvé'], 404);
            }
            $objectif->setTitre($request->get('titre') ?: $objectif->getTitre());
            $objectif->setDescription($request->get('description') ?? $objectif->getDescription());

            $dateEcheance = $request->get('date_echeance');
            if ($dateEcheance) {
                $objectif->setDateEcheance(new \DateTime($dateEcheance));
            }
            $em->flush();
            return new JsonResponse(['success' => true]);
        } catch (\Exception $e) {
            return new JsonResponse(['success' => false, 'error' => $e->getMessage()], 500);
        }
    }

    #[Route('/objectif/{id}/delete', name: 'front_objectif_delete', methods: ['POST'])]
    public function deleteObjectif(int $id, ObjectifRepository $repo, EntityManagerInterface $em): JsonResponse
    {
        try {
            $objectif = $repo->find($id);
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

    #[Route('/objectif/{id}/json', name: 'front_objectif_json', methods: ['GET'])]
    public function jsonObjectif(int $id, ObjectifRepository $repo): JsonResponse
    {
        $objectif = $repo->find($id);
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
