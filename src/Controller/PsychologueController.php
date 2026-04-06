<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PsychologueController extends AbstractController
{
    private int $currentPsychologueId = 2;

    #[Route('/psycho', name: 'psycho_dashboard')]
    public function index(EntityManagerInterface $em): Response
    {
        $conn = $em->getConnection();

        $eventsData = $conn->executeQuery(
            "SELECT e.*,
                    (SELECT COUNT(*) FROM participations WHERE event_id = e.id) AS current_participants
             FROM events e
             ORDER BY e.event_date ASC
             LIMIT 6"
        )->fetchAllAssociative();

        $participatedIds = $conn->executeQuery(
            "SELECT event_id FROM participations WHERE user_id = :uid",
            ['uid' => $this->currentPsychologueId]
        )->fetchFirstColumn();

        $events = [];
        foreach ($eventsData as $e) {
            $events[] = [
                'id'                  => $e['id'],
                'title'               => $e['title'],
                'location'            => $e['location'],
                'eventDate'           => $e['event_date'] ? new \DateTime($e['event_date']) : null,
                'link'                => $e['link'] ?? '',
                'maxParticipants'     => (int)$e['max_participants'],
                'currentParticipants' => (int)$e['current_participants'],
                'hasParticipated'     => in_array($e['id'], $participatedIds),
            ];
        }

        return $this->render('Psychologue/index.html.twig', [
            'events' => $events,
        ]);
    }
}
