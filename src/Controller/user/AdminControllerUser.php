<?php

namespace App\Controller\user;

use App\Entity\User;
use App\Entity\RendezVou;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminControllerUser extends AbstractController
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
public function editUser(
    int $id,
    Request $request,
    UserRepository $userRepository,
    EntityManagerInterface $em
): Response {
    $user = $userRepository->find($id);

    if (!$user) {
        throw $this->createNotFoundException('Utilisateur non trouvé.');
    }

    if ($request->isMethod('POST')) {
        $newRole = $request->request->get('role');

        $user->setRole($newRole);
        $user->setStatus($request->request->get('status'));

        $em->flush();

        // ajouter automatiquement les horaires
        if ($newRole === 'psychologue' || $newRole === 'coach_vie') {
            $this->createHorairesForMedecin($user, $em);
        }

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
    
  private function createHorairesForMedecin(User $user, EntityManagerInterface $em): void
{
    $existing = $em->getRepository(RendezVou::class)
        ->findOneBy(['medecin' => $user]);

    if ($existing) {
        return;
    }

    $jours = ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi'];

    $horairesSemaine = [
        ['09:00:00', '10:00:00'],
        ['10:00:00', '11:00:00'],
        ['11:00:00', '12:00:00'],
        ['14:00:00', '15:00:00'],
        ['15:00:00', '16:00:00'],
        ['16:00:00', '17:00:00'],
        ['17:00:00', '18:00:00'],
        ['18:00:00', '19:00:00'],
    ];

    $horairesSamedi = [
        ['08:00:00', '09:00:00'],
        ['09:00:00', '10:00:00'],
        ['10:00:00', '11:00:00'],
        ['11:00:00', '12:00:00'],
    ];

    // Lundi -> Vendredi
    foreach ($jours as $jour) {
        foreach ($horairesSemaine as $horaire) {
            $rdv = new RendezVou();
            $rdv->setUser(null);
            $rdv->setMedecin($user);
            $rdv->setDateRendezVous($jour);
            $rdv->setHeureDebut(new \DateTime($horaire[0]));
            $rdv->setHeureFin(new \DateTime($horaire[1]));
            $rdv->setTypeSeance('Présentiel');
            $rdv->setStatut('Pas encore pris');

            $em->persist($rdv);
        }
    }

    // Samedi
    foreach ($horairesSamedi as $horaire) {
        $rdv = new RendezVou();
        $rdv->setUser(null);
        $rdv->setMedecin($user);
        $rdv->setDateRendezVous('Samedi');
        $rdv->setHeureDebut(new \DateTime($horaire[0]));
        $rdv->setHeureFin(new \DateTime($horaire[1]));
        $rdv->setTypeSeance('Présentiel');
        $rdv->setStatut('Pas encore pris');

        $em->persist($rdv);
    }

    $em->flush();
}
}