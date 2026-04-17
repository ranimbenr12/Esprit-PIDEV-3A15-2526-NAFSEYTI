<?php

namespace App\Controller\teste;

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
    public function index(QuestionRepository $questionRepository, Request $request): Response
    {
        // Version avec recherche (optionnelle - ajoute les paramètres si tu veux la recherche)
        $search = $request->query->get('search', '');
        $type = $request->query->get('type', '');
        $status = $request->query->get('status', '');
        
        if (!empty($search) || !empty($type) || !empty($status)) {
            $qb = $questionRepository->createQueryBuilder('q')
                ->leftJoin('q.test', 't')
                ->addSelect('t');
            
            if (!empty($search)) {
                $qb->andWhere('q.texte LIKE :search')
                   ->setParameter('search', '%' . $search . '%');
            }
            
            if (!empty($type)) {
                $qb->andWhere('q.typeQuestion = :type')
                   ->setParameter('type', $type);
            }
            
            if (!empty($status)) {
                $qb->andWhere('q.status = :status')
                   ->setParameter('status', $status);
            }
            
            $questions = $qb->orderBy('q.createdAt', 'DESC')
                            ->getQuery()
                            ->getResult();
        } else {
            // Version sans recherche (originale)
            $questions = $questionRepository->findBy([], ['createdAt' => 'DESC']);
        }
        
        return $this->render('back/question/index.html.twig', [
            'questions' => $questions,
            'search' => $search,
            'type' => $type,
            'status' => $status,
        ]);
    }

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
   #[Route('/search', name: 'app_question_search_ajax', methods: ['GET'])]
public function searchAjax(Request $request, QuestionRepository $questionRepository): Response
{
    $search = $request->query->get('search', '');
    $type   = $request->query->get('type', '');
    $status = $request->query->get('status', '');

    $qb = $questionRepository->createQueryBuilder('q')
        ->leftJoin('q.test', 't')
        ->addSelect('t');

    if (!empty($search)) {
        $qb->andWhere('q.texte LIKE :search')
           ->setParameter('search', '%' . $search . '%');
    }
    if (!empty($type)) {
        $qb->andWhere('q.typeQuestion = :type')
           ->setParameter('type', $type);
    }
    if (!empty($status)) {
        $qb->andWhere('q.status = :status')
           ->setParameter('status', $status);
    }

    $questions = $qb->orderBy('q.createdAt', 'DESC')->getQuery()->getResult();

    $html = $this->renderView('back/question/_table_rows.html.twig', [
        'questions' => $questions,
    ]);

    return $this->json([
        'html'  => $html,
        'count' => count($questions),
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
            $testId = $question->getTest() ? $question->getTest()->getId() : null;
            $entityManager->remove($question);
            $entityManager->flush();
            $this->addFlash('success', 'La question a été supprimée avec succès !');
            
            if ($testId) {
                return $this->redirectToRoute('app_test_show', ['id' => $testId]);
            }
        }

        return $this->redirectToRoute('app_question_index');
    }

}