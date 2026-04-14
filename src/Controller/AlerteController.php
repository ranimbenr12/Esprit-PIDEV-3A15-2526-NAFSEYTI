<?php

namespace App\Controller;

use App\Entity\AlerteCritique;
use App\Repository\AlerteCritiqueRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
#[Route('/admin/alertes')]
class AlerteController extends AbstractController
{
    public function __construct(private EntityManagerInterface $em) {}

    #[Route('', name: 'admin_alertes_index')]
    public function index(AlerteCritiqueRepository $repo): Response
    {
        return $this->render('back/alertes/index.html.twig', [
            'nouvelles' => $repo->findByStatut('nouveau'),
            'en_cours'  => $repo->findByStatut('en_cours'),
            'traitees'  => $repo->findByStatut('traite'),
            'nb_nouvelles' => $repo->countByStatut('nouveau'),
        ]);
    }

    #[Route('/{id}', name: 'admin_alertes_detail')]
    public function detail(AlerteCritique $alerte): Response
    {
        return $this->render('back/alertes/detail.html.twig', [
            'alerte' => $alerte,
        ]);
    }

    #[Route('/{id}/statut', name: 'admin_alertes_statut', methods: ['POST'])]
    public function changerStatut(AlerteCritique $alerte, Request $request): Response
    {
        $statut = $request->request->get('statut');
        $notes  = $request->request->get('notes');

        $alerte->setStatut($statut);
        $alerte->setNotesAdmin($notes);

        if ($statut === 'traite') {
            $alerte->setTraiteLe(new \DateTime());
            // Correction : utiliser getUser() sans ?-> si pas sûr
            $user = $this->getUser();
            $alerte->setTraitePar($user ? $user->getUserIdentifier() : 'Admin');
        }

        $this->em->flush();

        $this->addFlash('success', 'Statut mis à jour avec succès.');
        return $this->redirectToRoute('admin_alertes_index');
    }
    #[Route('/count', name: 'admin_alertes_count', methods: ['GET'])]
public function count(AlerteCritiqueRepository $repo): JsonResponse
{
    $count = $repo->countByStatut('nouveau');
    return $this->json(['count' => $count]);
}
}