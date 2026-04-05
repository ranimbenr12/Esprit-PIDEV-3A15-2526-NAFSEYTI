<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractController
{
    #[Route('/admin', name: 'admin_dashboard')]
    public function index(UserRepository $userRepository): Response
    {
        $totalUsers = count($userRepository->findAll());
        $activeUsers = count($userRepository->findBy(['status' => 'actif']));
        $inactiveUsers = count($userRepository->findBy(['status' => 'inactif']));

        return $this->render('back/dashboard.html.twig', [
            'totalUsers' => $totalUsers,
            'activeUsers' => $activeUsers,
            'inactiveUsers' => $inactiveUsers,
        ]);
    }

    #[Route('/admin/users', name: 'admin_users')]
    public function listUsers(UserRepository $userRepository, Request $request): Response
    {
        $search = $request->query->get('search', '');
        $role = $request->query->get('role', '');
        $status = $request->query->get('status', '');

        $qb = $userRepository->createQueryBuilder('u');

        if ($search) {
            $qb->andWhere('u.firstname LIKE :search OR u.lastname LIKE :search OR u.email LIKE :search')
               ->setParameter('search', '%' . $search . '%');
        }
        if ($role) {
            $qb->andWhere('u.role = :role')->setParameter('role', $role);
        }
        if ($status) {
            $qb->andWhere('u.status = :status')->setParameter('status', $status);
        }

        $users = $qb->orderBy('u.id', 'DESC')->getQuery()->getResult();

        return $this->render('back/users/list.html.twig', [
            'users' => $users,
            'search' => $search,
            'selectedRole' => $role,
            'selectedStatus' => $status,
        ]);
    }

    #[Route('/admin/users/edit/{id}', name: 'admin_user_edit')]
    public function editUser(int $id, Request $request, UserRepository $userRepository, EntityManagerInterface $em): Response
    {
        $user = $userRepository->find($id);

        if (!$user) {
            throw $this->createNotFoundException('Utilisateur non trouvé.');
        }

        if ($request->isMethod('POST')) {
            $user->setRole($request->request->get('role'));
            $user->setStatus($request->request->get('status'));
            $em->flush();

            $this->addFlash('success', 'Utilisateur mis à jour avec succès !');
            return $this->redirectToRoute('admin_users');
        }

        return $this->render('back/users/edit.html.twig', [
            'user' => $user,
        ]);
    }

    #[Route('/admin/users/toggle/{id}', name: 'admin_user_toggle')]
    public function toggleStatus(int $id, UserRepository $userRepository, EntityManagerInterface $em): Response
    {
        $user = $userRepository->find($id);

        if (!$user) {
            throw $this->createNotFoundException('Utilisateur non trouvé.');
        }

        $user->setStatus($user->getStatus() === 'actif' ? 'inactif' : 'actif');
        $em->flush();

        return $this->redirectToRoute('admin_users');
    }
}