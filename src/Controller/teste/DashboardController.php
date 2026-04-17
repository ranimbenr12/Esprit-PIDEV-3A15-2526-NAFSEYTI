<?php

namespace App\Controller\teste;

use App\Repository\TestRepository;
use App\Repository\QuestionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractController
{
    #[Route('/dashboard', name: 'app_dashboard')]
    public function index(TestRepository $testRepository, QuestionRepository $questionRepository): Response
    {
        return $this->render('back/dashboard.html.twig', [
            'total_tests' => count($testRepository->findAll()),
            'total_questions' => count($questionRepository->findAll()),
            'active_tests' => count($testRepository->findBy(['status' => 'actif'])),
        ]);
    }
}