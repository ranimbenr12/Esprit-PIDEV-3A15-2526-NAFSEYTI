<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(EntityManagerInterface $em): Response
    {
        $alertes = [];
        $user = $this->getUser();

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

    #[Route('/admin/rendezvous', name: 'admin_rendezvous')]
    public function rendezVous(): Response
    {
        return $this->render('back/rendez-vous.html.twig');
    }
}
