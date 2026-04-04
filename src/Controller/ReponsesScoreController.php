<?php

namespace App\Controller;

use App\Entity\ReponsesScore;
use App\Form\ReponsesScoreType;
use App\Repository\ReponsesScoreRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/reponses/score')]
final class ReponsesScoreController extends AbstractController
{
    #[Route(name: 'app_reponses_score_index', methods: ['GET'])]
    public function index(ReponsesScoreRepository $reponsesScoreRepository): Response
    {
        return $this->render('reponses_score/index.html.twig', [
            'reponses_scores' => $reponsesScoreRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_reponses_score_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $reponsesScore = new ReponsesScore();
        $form = $this->createForm(ReponsesScoreType::class, $reponsesScore);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($reponsesScore);
            $entityManager->flush();

            return $this->redirectToRoute('app_reponses_score_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('reponses_score/new.html.twig', [
            'reponses_score' => $reponsesScore,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_reponses_score_show', methods: ['GET'])]
    public function show(ReponsesScore $reponsesScore): Response
    {
        return $this->render('reponses_score/show.html.twig', [
            'reponses_score' => $reponsesScore,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_reponses_score_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, ReponsesScore $reponsesScore, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ReponsesScoreType::class, $reponsesScore);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_reponses_score_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('reponses_score/edit.html.twig', [
            'reponses_score' => $reponsesScore,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_reponses_score_delete', methods: ['POST'])]
    public function delete(Request $request, ReponsesScore $reponsesScore, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$reponsesScore->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($reponsesScore);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_reponses_score_index', [], Response::HTTP_SEE_OTHER);
    }
}
