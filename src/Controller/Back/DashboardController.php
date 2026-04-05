<?php
namespace App\Controller\Back;

use App\Repository\SuiviRepository;
use App\Repository\ObjectifRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/back')]
class DashboardController extends AbstractController
{
    #[Route('/dashboard', name: 'back_dashboard')]
    public function index(SuiviRepository $suiviRepo, ObjectifRepository $objectifRepo): Response
    {
        $suivis = $suiviRepo->findAll();
        $objectifs = $objectifRepo->findAll();
        $objectifsValides = $objectifRepo->findBy(['valide' => true]);
        
        return $this->render('back/dashboard.html.twig', [
            'stats' => [
                'total_suivis' => count($suivis),
                'total_objectifs' => count($objectifs),
                'objectifs_valides' => count($objectifsValides),
            ]
        ]);
    }
}