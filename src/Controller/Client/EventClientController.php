<?php

namespace App\Controller\Client;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EventClientController extends AbstractController
{
    private int $currentUserId = 3; // simulated logged-in user

    #[Route('/events', name: 'client_events_index')]
    public function index(EntityManagerInterface $em): Response
    {
        $conn = $em->getConnection();

        $eventsData = $conn->executeQuery(
            "SELECT e.*,
                    (SELECT COUNT(*) FROM participations WHERE event_id = e.id) AS current_participants
             FROM events e
             ORDER BY e.event_date ASC"
        )->fetchAllAssociative();

        $planifications = $conn->executeQuery(
            "SELECT * FROM planification ORDER BY id_event"
        )->fetchAllAssociative();

        // Group planifications by event id
        $planMap = [];
        foreach ($planifications as $p) {
            $planMap[$p['id_event']][] = $p;
        }

        // Get events the current user already joined
        $participatedIds = $conn->executeQuery(
            "SELECT event_id FROM participations WHERE user_id = :uid",
            ['uid' => $this->currentUserId]
        )->fetchFirstColumn();

        $events = [];
        foreach ($eventsData as $e) {
            $events[] = [
                'id'                  => $e['id'],
                'title'               => $e['title'],
                'location'            => $e['location'],
                'eventDate'           => $e['event_date'] ? new \DateTime($e['event_date']) : null,
                'link'                => $e['link'] ?? '',
                'createdAt'           => $e['created_at'] ? new \DateTime($e['created_at']) : null,
                'maxParticipants'     => (int)$e['max_participants'],
                'currentParticipants' => (int)$e['current_participants'],
                'planifications'      => $planMap[$e['id']] ?? [],
                'hasParticipated'     => in_array($e['id'], $participatedIds),
            ];
        }

        return $this->render('home/events/index.html.twig', [
            'events' => $events,
        ]);
    }

    #[Route('/events/{id}/participate', name: 'client_events_participate', methods: ['POST'])]
    public function participate(int $id, EntityManagerInterface $em): JsonResponse
    {
        $conn = $em->getConnection();

        // Check already participated
        $existing = $conn->executeQuery(
            "SELECT id FROM participations WHERE user_id = :uid AND event_id = :eid",
            ['uid' => $this->currentUserId, 'eid' => $id]
        )->fetchOne();

        if ($existing) {
            return $this->json(['success' => false, 'message' => 'Vous êtes déjà inscrit à cet événement.']);
        }

        // Check if full
        $event = $conn->executeQuery("SELECT max_participants FROM events WHERE id = :id", ['id' => $id])->fetchAssociative();
        $current = (int)$conn->executeQuery("SELECT COUNT(*) FROM participations WHERE event_id = :id", ['id' => $id])->fetchOne();

        if ($current >= (int)$event['max_participants']) {
            return $this->json(['success' => false, 'message' => 'Cet événement est complet.']);
        }

        $conn->executeStatement(
            "INSERT INTO participations (user_id, event_id, participation_date, status) VALUES (:uid, :eid, NOW(), 'confirmed')",
            ['uid' => $this->currentUserId, 'eid' => $id]
        );

        $participationId = (int)$conn->lastInsertId();

        // Get event title for notification message
        $eventTitle = $event['title'] ?? 'événement';

        // Get user name for notification message
        $user = $conn->executeQuery(
            "SELECT firstname, lastname FROM users WHERE id = :uid",
            ['uid' => $this->currentUserId]
        )->fetchAssociative();

        $userName = $user ? trim(($user['firstname'] ?? '') . ' ' . ($user['lastname'] ?? '')) : 'Un utilisateur';

        // Insert notification for admin (user_id = 1) AND psychologist (user_id = 2)
        $notifMessage = "Nouvelle participation de $userName à l'événement: $eventTitle";
        foreach ([1, 2] as $notifUserId) {
            $conn->executeStatement(
                "INSERT INTO notifications (user_id, message, type, related_id, is_read, created_at)
                 VALUES (:uid, :message, 'participation', :relatedId, 0, NOW())",
                [
                    'uid'       => $notifUserId,
                    'message'   => $notifMessage,
                    'relatedId' => $participationId,
                ]
            );
        }

        return $this->json(['success' => true, 'message' => 'Inscription réussie !']);
    }
}
