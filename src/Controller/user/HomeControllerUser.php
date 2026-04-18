<?php
namespace App\Controller\user;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeControllerUser extends AbstractController
{
    #[Route('/', name: 'app_home')]
public function index(EntityManagerInterface $em): Response
{
    /** @var User $user */
    $user = $this->getUser();

    if ($user && in_array('ROLE_ADMIN', $user->getRoles())) {
        return $this->redirectToRoute('admin_dashboard');
    }

    $alertes = [];
    if ($user && method_exists($user, 'getRole') && $user->getRole() === 'psychologue') {
        $conn = $em->getConnection();
        $alertes = $conn->fetchAllAssociative(
            'SELECT n.id_notification as id, n.message, n.type, n.id_patient as patient_id,
                    n.date_creation, u.firstname, u.lastname
             FROM notification n
             LEFT JOIN users u ON u.id = n.id_patient
             WHERE n.id_psychologue = ? AND (n.lu = 0 OR n.lu IS NULL)
             AND n.type IN (\'critique\', \'urgent\')
             ORDER BY n.date_creation DESC LIMIT 10',
            [$user->getId()]
        );
    }

    return $this->render('home/index.html.twig', [
        'alertes' => $alertes,
    ]);
}
    #[Route('/profile', name: 'app_profile')]
    public function profile(): Response
    {
        /** @var User $user */
        $user = $this->getUser();

        // Admin sees admin layout
        if (in_array('ROLE_ADMIN', $user->getRoles())) {
            return $this->render('back/profile.html.twig', ['user' => $user]);
        }

        return $this->render('home/profile.html.twig', ['user' => $user]);
    }

    #[Route('/profile/edit', name: 'app_profile_edit')]
    public function editProfile(Request $request, EntityManagerInterface $em): Response
    {
        /** @var User $user */
        $user = $this->getUser();

        if ($request->isMethod('POST')) {

            // Update basic info
            $user->setFirstname($request->request->get('firstname'));
            $user->setLastname($request->request->get('lastname'));
            $user->setPhone_number($request->request->get('phone_number'));
            $user->setAddress($request->request->get('address'));
            $user->setLocation($request->request->get('location'));

            // Handle password change
            $currentPassword = $request->request->get('current_password');
            $newPassword = $request->request->get('new_password');

            if ($currentPassword && $newPassword) {
                if ($currentPassword !== $user->getPassword()) {
                    $this->addFlash('error', 'Mot de passe actuel incorrect.');
                    return $this->redirectToRoute('app_profile_edit');
                }
                $user->setPassword($newPassword);
            }

            // Handle profile picture upload
            $photo = $request->files->get('profile_photo');
            if ($photo) {
                $filename = 'profile_' . $user->getId() . '_' . time() . '.' . $photo->guessExtension();
                $photo->move($this->getParameter('kernel.project_dir') . '/public/uploads/profile_pictures/', $filename);
                $user->setProfile_photo('uploads/profile_pictures/' . $filename);
            }

            $em->flush();
            $this->addFlash('success', 'Profil mis à jour avec succès !');

            // Redirect based on role
            if (in_array('ROLE_ADMIN', $user->getRoles())) {
                return $this->redirectToRoute('admin_profile');
            }

            return $this->redirectToRoute('app_profile');
        }

        // Render based on role
        if (in_array('ROLE_ADMIN', $user->getRoles())) {
            return $this->render('back/edit_profile.html.twig', ['user' => $user]);
        }

        return $this->render('home/edit_profile.html.twig', ['user' => $user]);
    }

    #[Route('/admin/profile', name: 'admin_profile')]
    public function adminProfile(): Response
    {
        /** @var User $user */
        $user = $this->getUser();
        return $this->render('back/profile.html.twig', ['user' => $user]);
    }

    #[Route('/profile/delete', name: 'app_profile_delete')]
    public function deleteAccount(EntityManagerInterface $em): Response
    {
        /** @var User $user */
        $user = $this->getUser();
        $user->setStatus('inactif');
        $em->flush();

        return $this->redirectToRoute('app_logout');
    }
}