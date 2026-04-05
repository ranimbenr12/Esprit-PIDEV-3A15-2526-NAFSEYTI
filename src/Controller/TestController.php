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

#[Route('/test')]
class TestController extends AbstractController
{
    #[Route('/', name: 'app_test_index', methods: ['GET'])]
    public function index(Request $request, TestRepository $testRepository): Response
    {
        // Récupération des paramètres de recherche / filtre / tri
        $search    = $request->query->get('search', '');
        $status    = $request->query->get('status', '');
        $categorie = $request->query->get('categorie', '');
        $sort      = $request->query->get('sort', 'id');
        $order     = $request->query->get('order', 'ASC');

        // Colonnes autorisées pour le tri (sécurité)
        $allowedSorts = ['id', 'titre', 'categorie', 'niveau', 'duree', 'status'];
        if (!in_array($sort, $allowedSorts, true)) {
            $sort = 'id';
        }
        $order = strtoupper($order) === 'DESC' ? 'DESC' : 'ASC';

        // Construction de la requête dynamique
        $qb = $testRepository->createQueryBuilder('t');

        if ($search !== '') {
            $qb->andWhere('t.titre LIKE :search OR t.description LIKE :search')
               ->setParameter('search', '%' . $search . '%');
        }

        if ($status !== '') {
            $qb->andWhere('t.status = :status')
               ->setParameter('status', $status);
        }

        if ($categorie !== '') {
            $qb->andWhere('t.categorie = :categorie')
               ->setParameter('categorie', $categorie);
        }

        $qb->orderBy('t.' . $sort, $order);

        $tests = $qb->getQuery()->getResult();

        // Statistiques globales (pas filtrées)
        $totalTests    = $testRepository->count([]);
        $testsActifs   = $testRepository->count(['status' => 'actif']);
        $testsInactifs = $testRepository->count(['status' => 'inactif']);

        return $this->render('back/test/index.html.twig', [
            'tests'         => $tests,
            'totalTests'    => $totalTests,
            'testsActifs'   => $testsActifs,
            'testsInactifs' => $testsInactifs,
            'search'        => $search,
            'status'        => $status,
            'categorie'     => $categorie,
            'sort'          => $sort,
            'order'         => $order,
        ]);
    }

    #[Route('/new', name: 'app_test_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $test = new Test();
        $test->setCreatedAt(new \DateTime());
        $test->setUpdatedAt(new \DateTime());
        $test->setUser($this->getUser());
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

    #[Route('/{id}', name: 'app_test_show', methods: ['GET'], requirements: ['id' => '\d+'])]
    public function show(Test $test): Response
    {
        return $this->render('back/test/show.html.twig', [
            'test' => $test,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_test_edit', methods: ['GET', 'POST'], requirements: ['id' => '\d+'])]
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

    #[Route('/{id}', name: 'app_test_delete', methods: ['POST'], requirements: ['id' => '\d+'])]
    public function delete(Request $request, Test $test, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete' . $test->getId(), $request->request->get('_token'))) {
            $entityManager->remove($test);
            $entityManager->flush();
            $this->addFlash('success', 'Le test a été supprimé avec succès !');
        }

        return $this->redirectToRoute('app_test_index');
    }
}