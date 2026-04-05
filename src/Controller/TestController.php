<?php

namespace App\Controller;

use App\Entity\Test;
use App\Form\TestType;
use App\Repository\TestRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;

#[Route('/test')]
class TestController extends AbstractController
{
    #[Route('/', name: 'app_test_index', methods: ['GET'])]
    public function index(TestRepository $testRepository): Response
    {
        $tests = $testRepository->findAll();
        
        return $this->render('back/test/index.html.twig', [
            'tests' => $tests,
        ]);
    }

    #[Route('/new', name: 'app_test_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $test = new Test();
        $user = $this->getUser();
        $test->setCreatedAt(new \DateTime());
        $test->setUpdatedAt(new \DateTime());
        $test->setUser($user);
        $test->setStatus('actif');
        
        $form = $this->createForm(TestType::class, $test);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($test);
            $entityManager->flush();

            $this->addFlash('success', 'Le test a été créé avec succès !');
            return $this->redirectToRoute('app_test_index');
        }

        return $this->render('back/test/new.html.twig', [
            'form' => $form->createView(),
            'test' => $test,
        ]);
    }

    #[Route('/{id}', name: 'app_test_show', methods: ['GET'])]
    public function show(Test $test): Response
    {
        return $this->render('back/test/show.html.twig', [
            'test' => $test,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_test_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Test $test, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(TestType::class, $test);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $test->setUpdatedAt(new \DateTime());
            $entityManager->flush();

            $this->addFlash('success', 'Le test a été modifié avec succès !');
            return $this->redirectToRoute('app_test_index');
        }

        return $this->render('back/test/edit.html.twig', [
            'form' => $form->createView(),
            'test' => $test,
        ]);
    }

    #[Route('/{id}', name: 'app_test_delete', methods: ['POST'])]
    public function delete(Request $request, Test $test, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$test->getId(), $request->request->get('_token'))) {
            // Suppression directe - les questions seront supprimées automatiquement grâce à cascade={"remove"}
            $entityManager->remove($test);
            $entityManager->flush();
            $this->addFlash('success', 'Le test a été supprimé avec succès !');
        }

        return $this->redirectToRoute('app_test_index');
    }
}