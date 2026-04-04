<?php

namespace App\Controller;

use App\Entity\Question;
use App\Entity\Test;
use App\Form\QuestionType;
use App\Repository\QuestionRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/question')]
class QuestionController extends AbstractController
{
    #[Route('/', name: 'app_question_index', methods: ['GET'])]
    public function index(QuestionRepository $questionRepository): Response
    {
        $questions = $questionRepository->findBy([], ['createdAt' => 'DESC']);
        
        return $this->render('back/question/index.html.twig', [
            'questions' => $questions,
        ]);
    }

    // AJOUTEZ CETTE ROUTE MANQUANTE
    #[Route('/test/{testId}/new', name: 'app_question_new_with_test', methods: ['GET', 'POST'])]
    public function newWithTest(Request $request, EntityManagerInterface $entityManager, int $testId): Response
    {
        $test = $entityManager->getRepository(Test::class)->find($testId);
        
        if (!$test) {
            $this->addFlash('error', 'Test non trouvé.');
            return $this->redirectToRoute('app_test_index');
        }
        
        $question = new Question();
        $question->setTest($test);
        $question->setCreatedAt(new \DateTime());
        $question->setStatus('actif');
        $question->setObligatoire(true);
        $question->setPoints(1);
        
        $form = $this->createForm(QuestionType::class, $question);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Validation supplémentaire pour les QCM
            if (strpos($question->getTypeQuestion(), 'qcm') !== false && empty($question->getReponsesPossibles())) {
                $this->addFlash('error', 'Pour les questions QCM, vous devez spécifier les réponses possibles.');
                return $this->render('back/question/new.html.twig', [
                    'form' => $form->createView(),
                    'question' => $question,
                ]);
            }
            
            $entityManager->persist($question);
            $entityManager->flush();

            $this->addFlash('success', 'La question a été créée avec succès !');
            return $this->redirectToRoute('app_test_show', ['id' => $test->getId()]);
        }

        return $this->render('back/question/new.html.twig', [
            'form' => $form->createView(),
            'question' => $question,
        ]);
    }

    #[Route('/new', name: 'app_question_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $question = new Question();
        $question->setCreatedAt(new \DateTime());
        $question->setStatus('actif');
        $question->setObligatoire(true);
        $question->setPoints(1);
        
        $form = $this->createForm(QuestionType::class, $question);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Validation supplémentaire pour les QCM
            if (strpos($question->getTypeQuestion(), 'qcm') !== false && empty($question->getReponsesPossibles())) {
                $this->addFlash('error', 'Pour les questions QCM, vous devez spécifier les réponses possibles.');
                return $this->render('back/question/new.html.twig', [
                    'form' => $form->createView(),
                ]);
            }
            
            $entityManager->persist($question);
            $entityManager->flush();

            $this->addFlash('success', 'La question a été créée avec succès !');
            return $this->redirectToRoute('app_question_index');
        }

        return $this->render('back/question/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{id}', name: 'app_question_show', methods: ['GET'])]
    public function show(Question $question): Response
    {
        return $this->render('back/question/show.html.twig', [
            'question' => $question,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_question_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Question $question, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(QuestionType::class, $question);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();
            $this->addFlash('success', 'La question a été modifiée avec succès !');
            return $this->redirectToRoute('app_question_index');
        }

        return $this->render('back/question/edit.html.twig', [
            'form' => $form->createView(),
            'question' => $question,
        ]);
    }

    #[Route('/{id}/delete', name: 'app_question_delete', methods: ['POST'])]
    public function delete(Request $request, Question $question, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$question->getId(), $request->request->get('_token'))) {
            if ($question->getReponses()->count() > 0) {
                $this->addFlash('warning', 'Cette question a déjà des réponses. Impossible de la supprimer.');
            } else {
                $testId = $question->getTest() ? $question->getTest()->getId() : null;
                $entityManager->remove($question);
                $entityManager->flush();
                $this->addFlash('success', 'La question a été supprimée avec succès !');
                
                if ($testId) {
                    return $this->redirectToRoute('app_test_show', ['id' => $testId]);
                }
            }
        }

        return $this->redirectToRoute('app_question_index');
    }
}