<?php
namespace App\Controller\Front;

use App\Entity\ReductionsUtilisateur;
use App\Repository\ReductionsUtilisateurRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/client/reductions')]
class ReductionController extends AbstractController
{
    #[Route('', name: 'client_reductions', methods: ['GET'])]
    public function index(EntityManagerInterface $em): Response
    {
        /** @var \App\Entity\User $user */
        $user = $this->getUser();
        $userId = $user->getId();
        $conn = $em->getConnection();

        $totalPoints = (int)$conn->fetchOne(
            'SELECT COALESCE(SUM(nombre_points), 0) FROM points WHERE id_utilisateur = ?',
            [$userId]
        );

        $reductions = $conn->fetchAllAssociative(
            'SELECT * FROM reductions ORDER BY points_requis ASC'
        );

        $dejaObtenues = $conn->fetchAllKeyValue(
            'SELECT id_reduction, code_promo FROM reductions_utilisateur WHERE id_utilisateur = ?',
            [$userId]
        );

        return $this->render('client/reductions/index.html.twig', [
            'reductions'   => $reductions,
            'totalPoints'  => $totalPoints,
            'dejaObtenues' => $dejaObtenues,
        ]);
    }

    #[Route('/{id}/obtenir', name: 'client_reduction_obtenir', methods: ['POST'])]
    public function obtenir(int $id, EntityManagerInterface $em): JsonResponse
    {
        /** @var \App\Entity\User $user */
        $user = $this->getUser();
        $userId = $user->getId();
        $conn = $em->getConnection();

        $reduction = $conn->fetchAssociative('SELECT * FROM reductions WHERE id_reduction = ?', [$id]);
        if (!$reduction) {
            return new JsonResponse(['success' => false, 'error' => 'Réduction introuvable.'], 404);
        }

        if (new \DateTime($reduction['date_expiration']) < new \DateTime('today')) {
            return new JsonResponse(['success' => false, 'error' => 'Cette réduction est expirée.'], 422);
        }

        $existe = $conn->fetchOne(
            'SELECT id FROM reductions_utilisateur WHERE id_utilisateur = ? AND id_reduction = ?',
            [$userId, $id]
        );
        if ($existe) {
            return new JsonResponse(['success' => false, 'error' => 'Vous avez déjà obtenu cette réduction.'], 422);
        }

        $totalPoints = (int)$conn->fetchOne(
            'SELECT COALESCE(SUM(nombre_points), 0) FROM points WHERE id_utilisateur = ?',
            [$userId]
        );
        if ($totalPoints < (int)$reduction['points_requis']) {
            return new JsonResponse([
                'success' => false,
                'error'   => 'Points insuffisants. Il vous faut ' . $reduction['points_requis'] . ' points (vous en avez ' . $totalPoints . ').',
            ], 422);
        }

        $code = strtoupper(substr($reduction['nom_marque'], 0, 4)) . '-' . \Symfony\Component\Uid\Uuid::v4()->toRfc4122();

        $ru = new ReductionsUtilisateur();
        $ru->setId_utilisateur($userId);
        $ru->setId_reduction($id);
        $ru->setDate_obtention(new \DateTime());
        $ru->setUtilise(false);
        $ru->setCode_promo($code);
        $em->persist($ru);

        // Déduire les points utilisés (enregistrer un point négatif)
        $conn->executeStatement(
            'INSERT INTO points (id_utilisateur, id_objectif, nombre_points, date_attribution) VALUES (?, NULL, ?, NOW())',
            [$userId, -(int)$reduction['points_requis']]
        );

        $em->flush();

        return new JsonResponse(['success' => true, 'code' => $code]);
    }
}
