<?php
namespace App\Controller\Back;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/back/reductions')]
class ReductionController extends AbstractController
{
    #[Route('', name: 'back_reduction_index', methods: ['GET'])]
    public function index(EntityManagerInterface $em): Response
    {
        $conn = $em->getConnection();
        $reductions = $conn->fetchAllAssociative('SELECT * FROM reductions ORDER BY id_reduction DESC');
        return $this->render('back/reductions/index.html.twig', ['reductions' => $reductions]);
    }

    #[Route('/list', name: 'back_reduction_list', methods: ['GET'])]
    public function list(EntityManagerInterface $em): JsonResponse
    {
        $reductions = $em->getConnection()->fetchAllAssociative('SELECT * FROM reductions ORDER BY points_requis ASC');
        return new JsonResponse($reductions);
    }

    #[Route('/new', name: 'back_reduction_new', methods: ['POST'])]
    public function new(Request $request, EntityManagerInterface $em): JsonResponse
    {
        $conn = $em->getConnection();
        try {
            $conn->executeStatement(
                'INSERT INTO reductions (nom_marque, description, points_requis, pourcentage_reduction, date_expiration, image_url) VALUES (?, ?, ?, ?, ?, ?)',
                [
                    $request->get('nom_marque'),
                    $request->get('description'),
                    (int)$request->get('points_requis'),
                    (int)$request->get('pourcentage_reduction'),
                    $request->get('date_expiration'),
                    $request->get('image_url') ?: null,
                ]
            );
            return new JsonResponse(['success' => true, 'id' => $conn->lastInsertId()]);
        } catch (\Exception $e) {
            return new JsonResponse(['success' => false, 'error' => $e->getMessage()], 500);
        }
    }

    #[Route('/{id}/edit', name: 'back_reduction_edit', methods: ['POST'])]
    public function edit(int $id, Request $request, EntityManagerInterface $em): JsonResponse
    {
        $conn = $em->getConnection();
        try {
            $conn->executeStatement(
                'UPDATE reductions SET nom_marque=?, description=?, points_requis=?, pourcentage_reduction=?, date_expiration=?, image_url=? WHERE id_reduction=?',
                [
                    $request->get('nom_marque'),
                    $request->get('description'),
                    (int)$request->get('points_requis'),
                    (int)$request->get('pourcentage_reduction'),
                    $request->get('date_expiration'),
                    $request->get('image_url') ?: null,
                    $id,
                ]
            );
            return new JsonResponse(['success' => true]);
        } catch (\Exception $e) {
            return new JsonResponse(['success' => false, 'error' => $e->getMessage()], 500);
        }
    }

    #[Route('/{id}/delete', name: 'back_reduction_delete', methods: ['POST'])]
    public function delete(int $id, EntityManagerInterface $em): JsonResponse
    {
        try {
            $em->getConnection()->executeStatement('DELETE FROM reductions WHERE id_reduction = ?', [$id]);
            return new JsonResponse(['success' => true]);
        } catch (\Exception $e) {
            return new JsonResponse(['success' => false, 'error' => $e->getMessage()], 500);
        }
    }

    #[Route('/{id}/json', name: 'back_reduction_json', methods: ['GET'])]
    public function getJson(int $id, EntityManagerInterface $em): JsonResponse
    {
        $r = $em->getConnection()->fetchAssociative('SELECT * FROM reductions WHERE id_reduction = ?', [$id]);
        if (!$r) return new JsonResponse(['error' => 'Non trouvé'], 404);
        return new JsonResponse($r);
    }
}
