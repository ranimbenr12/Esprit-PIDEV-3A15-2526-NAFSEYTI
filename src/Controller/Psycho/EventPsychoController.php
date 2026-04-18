<?php

namespace App\Controller\Psycho;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/psycho/evente')]
class EventPsychoController extends AbstractController
{
    #[Route('', name: 'psycho_events_index')]
    public function index(EntityManagerInterface $em, Request $request): Response
    {
        $conn = $em->getConnection();
        $currentPsychologueId = $this->getUser() ? $this->getUser()->getId() : 0;

        $eventsData = $conn->executeQuery(
            "SELECT e.*,
                    (SELECT COUNT(*) FROM participations WHERE event_id = e.id) AS current_participants
             FROM events e
             ORDER BY e.event_date ASC"
        )->fetchAllAssociative();

        $planifications = $conn->executeQuery(
            "SELECT * FROM planification ORDER BY id_event"
        )->fetchAllAssociative();

        $planMap = [];
        foreach ($planifications as $p) {
            $planMap[$p['id_event']][] = $p;
        }

        $participatedIds = $conn->executeQuery(
            "SELECT event_id FROM participations WHERE user_id = :uid",
            ['uid' => $currentPsychologueId]
        )->fetchFirstColumn();

        $allEvents = [];
        foreach ($eventsData as $e) {
            $createdAt = $e['created_at'] ? new \DateTime($e['created_at']) : null;
            $isNew     = $createdAt && $createdAt > new \DateTime('-7 days');

            // Get rating stats for this event
            $ratingStats = $conn->executeQuery(
                "SELECT AVG(rating) as avg_rating, COUNT(*) as rating_count FROM event_ratings WHERE event_id = :eventId",
                ['eventId' => $e['id']]
            )->fetchAssociative();

            // Vérifier si le psychologue est le créateur de l'événement
            $isCreator = ($e['creator_id'] == $currentPsychologueId);

            $allEvents[] = [
                'id'                  => $e['id'],
                'title'               => $e['title'],
                'location'            => $e['location'],
                'eventDate'           => $e['event_date'] ? new \DateTime($e['event_date']) : null,
                'link'                => $e['link'] ?? '',
                'createdAt'           => $createdAt,
                'maxParticipants'     => (int)$e['max_participants'],
                'currentParticipants' => (int)$e['current_participants'],
                'planifications'      => $planMap[$e['id']] ?? [],
                'hasParticipated'     => in_array($e['id'], $participatedIds),
                'isNew'               => $isNew,
                'avgRating'           => round($ratingStats['avg_rating'] ?? 0, 1),
                'ratingCount'         => (int)($ratingStats['rating_count'] ?? 0),
                'status'              => $e['status'] ?? 'upcoming',
                'isCreator'           => $isCreator,  // AJOUTER CETTE LIGNE
                'creatorId'           => $e['creator_id'] ?? 1,  // AJOUTER CETTE LIGNE
            ];
        }

        // ========== MANUAL PAGINATION ==========
        $page = $request->query->getInt('page', 1);
        $limit = $request->query->getInt('limit', 6);
        
        $allowedLimits = [6, 12, 18, 24, 30];
        if (!in_array($limit, $allowedLimits)) {
            $limit = 6;
        }
        
        $totalItems = count($allEvents);
        $totalPages = ceil($totalItems / $limit);
        $offset = ($page - 1) * $limit;
        
        // Ensure page is valid
        if ($page < 1) $page = 1;
        if ($page > $totalPages && $totalPages > 0) $page = $totalPages;
        
        $events = array_slice($allEvents, $offset, $limit);

        return $this->render('Psychologue/evente/index.html.twig', [
            'events'       => $events,
            'totalCount'   => count($allEvents),
            'currentPage'  => $page,
            'totalPages'   => $totalPages,
            'totalItems'   => $totalItems,
            'currentLimit' => $limit,
        ]);
    }

    #[Route('/create', name: 'psycho_events_create')]
    public function create(): Response
    {
        return $this->render('Psychologue/evente/create.html.twig');
    }

    #[Route('/edit/{id}', name: 'psycho_events_edit')]
    public function edit(int $id, EntityManagerInterface $em): Response
    {
        $conn  = $em->getConnection();
        $event = $conn->executeQuery("SELECT * FROM events WHERE id = :id", ['id' => $id])->fetchAssociative();

        if (!$event) {
            throw $this->createNotFoundException('Événement introuvable.');
        }

        $plans = $conn->executeQuery(
            "SELECT * FROM planification WHERE id_event = :id LIMIT 1", ['id' => $id]
        )->fetchAllAssociative();

        $event['planifications'] = $plans;

        return $this->render('Psychologue/evente/edit.html.twig', ['event' => $event]);
    }

    #[Route('/delete/{id}', name: 'psycho_events_delete', methods: ['POST'])]
    public function delete(int $id, EntityManagerInterface $em): JsonResponse
    {
        $conn = $em->getConnection();
        $currentPsychologueId = $this->getUser() ? $this->getUser()->getId() : 0;
        
        // Vérifier si le psychologue est le créateur
        $event = $conn->executeQuery("SELECT creator_id FROM events WHERE id = :id", ['id' => $id])->fetchAssociative();
        if ($event && $event['creator_id'] != $currentPsychologueId) {
            return $this->json(['success' => false, 'error' => 'Vous ne pouvez pas supprimer cet événement car vous n\'en êtes pas le créateur.']);
        }
        
        // Delete planifications first
        $conn->executeStatement("DELETE FROM planification WHERE id_event = :id", ['id' => $id]);
        // Delete participations
        $conn->executeStatement("DELETE FROM participations WHERE event_id = :id", ['id' => $id]);
        // Delete event
        $conn->executeStatement("DELETE FROM events WHERE id = :id", ['id' => $id]);

        return $this->json(['success' => true]);
    }

    #[Route('/{id}/rate', name: 'psycho_events_rate', methods: ['POST'])]
    public function rate(int $id, Request $request, EntityManagerInterface $em): JsonResponse
    {
        $conn = $em->getConnection();
        $userId = $this->getUser() ? $this->getUser()->getId() : 0;
        $data = json_decode($request->getContent(), true);
        $rating = (int)($data['rating'] ?? 0);

        if ($rating < 1 || $rating > 5) {
            return $this->json(['success' => false, 'message' => 'Note invalide']);
        }

        $existing = $conn->executeQuery(
            "SELECT id FROM event_ratings WHERE event_id = :eid AND user_id = :uid",
            ['eid' => $id, 'uid' => $userId]
        )->fetchOne();

        if ($existing) {
            $conn->executeStatement(
                "UPDATE event_ratings SET rating = :rating WHERE event_id = :eid AND user_id = :uid",
                ['rating' => $rating, 'eid' => $id, 'uid' => $userId]
            );
        } else {
            $conn->executeStatement(
                "INSERT INTO event_ratings (event_id, user_id, rating) VALUES (:eid, :uid, :rating)",
                ['eid' => $id, 'uid' => $userId, 'rating' => $rating]
            );
        }

        $stats = $conn->executeQuery(
            "SELECT AVG(rating) as avg_rating, COUNT(*) as rating_count FROM event_ratings WHERE event_id = :eid",
            ['eid' => $id]
        )->fetchAssociative();

        return $this->json([
            'success'     => true,
            'avgRating'   => round($stats['avg_rating'] ?? 0, 1),
            'ratingCount' => (int)($stats['rating_count'] ?? 0),
        ]);
    }

    #[Route('/{id}/participate', name: 'psycho_events_participate', methods: ['POST'])]
    public function participate(int $id, EntityManagerInterface $em): JsonResponse
    {
        $conn = $em->getConnection();
        $currentPsychologueId = $this->getUser() ? $this->getUser()->getId() : 0;

        $existing = $conn->executeQuery(
            "SELECT id FROM participations WHERE user_id = :uid AND event_id = :eid",
            ['uid' => $currentPsychologueId, 'eid' => $id]
        )->fetchOne();

        if ($existing) {
            return $this->json(['success' => false, 'message' => 'Vous êtes déjà inscrit à cet événement.']);
        }

        $event   = $conn->executeQuery("SELECT * FROM events WHERE id = :id", ['id' => $id])->fetchAssociative();
        
        // Check if event is cancelled or completed
        if ($event['status'] === 'cancelled') {
            return $this->json(['success' => false, 'message' => 'Cet événement a été annulé.']);
        }
        if ($event['status'] === 'completed') {
            return $this->json(['success' => false, 'message' => 'Cet événement est déjà terminé.']);
        }
        
        $current = (int)$conn->executeQuery("SELECT COUNT(*) FROM participations WHERE event_id = :id", ['id' => $id])->fetchOne();

        if ($current >= (int)$event['max_participants']) {
            return $this->json(['success' => false, 'message' => 'Cet événement est complet.']);
        }

        $conn->executeStatement(
            "INSERT INTO participations (user_id, event_id, participation_date, status) VALUES (:uid, :eid, NOW(), 'confirmed')",
            ['uid' => $currentPsychologueId, 'eid' => $id]
        );

        $participationId = (int)$conn->lastInsertId();

        $user = $conn->executeQuery(
            "SELECT firstname, lastname FROM users WHERE id = :uid",
            ['uid' => $currentPsychologueId]
        )->fetchAssociative();

        $userName = $user ? trim(($user['firstname'] ?? '') . ' ' . ($user['lastname'] ?? '')) : 'Un psychologue';

        // Notify admin (user_id = 1) AND psychologist (user_id = 2)
        $eventFull = $conn->executeQuery("SELECT * FROM events WHERE id = :id", ['id' => $id])->fetchAssociative();
        $notifMessage = "Nouvelle participation de $userName à l'événement: {$eventFull['title']}";

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

    // ========== STATUS MANAGEMENT ==========

    #[Route('/{id}/status', name: 'psycho_events_update_status', methods: ['POST'])]
    public function updateStatus(int $id, Request $request, EntityManagerInterface $em): JsonResponse
    {
        $conn = $em->getConnection();
        $currentPsychologueId = $this->getUser() ? $this->getUser()->getId() : 0;
        
        // Vérifier si le psychologue est le créateur de l'événement
        $event = $conn->executeQuery("SELECT creator_id, title FROM events WHERE id = :id", ['id' => $id])->fetchAssociative();
        
        if (!$event) {
            return $this->json(['success' => false, 'error' => 'Événement non trouvé'], 404);
        }
        
        if ($event['creator_id'] != $currentPsychologueId) {
            return $this->json(['success' => false, 'error' => 'Vous ne pouvez pas modifier le statut de cet événement car vous n\'en êtes pas le créateur.'], 403);
        }
        
        $data = json_decode($request->getContent(), true);
        $status = $data['status'] ?? null;
        
        $allowedStatuses = ['upcoming', 'ongoing', 'completed', 'cancelled'];
        if (!in_array($status, $allowedStatuses)) {
            return $this->json(['success' => false, 'error' => 'Statut invalide'], 400);
        }
        
        // Get current event status
        $currentStatus = $conn->executeQuery(
            "SELECT status FROM events WHERE id = :id",
            ['id' => $id]
        )->fetchOne();
        
        if ($currentStatus === $status) {
            return $this->json(['success' => true, 'status' => $status, 'noChange' => true]);
        }
        
        $conn->executeStatement(
            "UPDATE events SET status = :status WHERE id = :id",
            ['status' => $status, 'id' => $id]
        );
        
        // Notify participants about status change
        $participants = $conn->executeQuery(
            "SELECT p.user_id, u.firstname, u.lastname, u.email 
             FROM participations p 
             JOIN users u ON p.user_id = u.id 
             WHERE p.event_id = :eventId",
            ['eventId' => $id]
        )->fetchAllAssociative();
        
        $statusMessages = [
            'upcoming' => '📅 L\'événement est maintenant planifié',
            'ongoing' => '🟢 L\'événement a commencé !',
            'completed' => '✅ L\'événement est terminé',
            'cancelled' => '❌ L\'événement a été annulé'
        ];
        
        foreach ($participants as $participant) {
            $conn->executeStatement(
                "INSERT INTO notifications (user_id, message, type, related_id, is_read, created_at)
                 VALUES (:uid, :message, 'status_change', :relatedId, 0, NOW())",
                [
                    'uid' => $participant['user_id'],
                    'message' => "{$statusMessages[$status]}: {$event['title']}",
                    'relatedId' => $id,
                ]
            );
        }
        
        return $this->json(['success' => true, 'status' => $status]);
    }

    // ── API routes used by the existing JS ──────────────────────────────────

    #[Route('/api/events', name: 'psycho_events_api_list', methods: ['GET'])]
    public function apiList(EntityManagerInterface $em): JsonResponse
    {
        $conn = $em->getConnection();
        $rows = $conn->executeQuery(
            "SELECT e.*,
                    (SELECT COUNT(*) FROM participations WHERE event_id = e.id) AS current_participants
             FROM events e ORDER BY e.event_date ASC"
        )->fetchAllAssociative();

        return $this->json($rows);
    }

    #[Route('/api/events', name: 'psycho_events_api_create', methods: ['POST'])]
    public function apiCreate(Request $request, EntityManagerInterface $em): JsonResponse
    {
        $data = json_decode($request->getContent(), true);
        $conn = $em->getConnection();
        $currentPsychologueId = $this->getUser() ? $this->getUser()->getId() : 0;

        // Support both camelCase (from create page) and snake_case (from modal)
        $eventDate       = $data['eventDate'] ?? $data['event_date'] ?? null;
        $maxParticipants = (int)($data['maxParticipants'] ?? $data['max_participants'] ?? 50);

        // Validate date is not in the past
        if ($eventDate) {
            $parsed = \DateTime::createFromFormat('Y-m-d', $eventDate);
            if ($parsed) {
                $parsed->setTime(0, 0, 0);
                if ($parsed < new \DateTime('today')) {
                    return $this->json(['success' => false, 'error' => 'La date de l\'événement ne peut pas être dans le passé.'], 422);
                }
            }
        }

        $conn->executeStatement(
            "INSERT INTO events (title, event_date, location, link, max_participants, creator_id, creator_type, created_at, status)
             VALUES (:title, :date, :location, :link, :max, :creator, 'psychologue', NOW(), 'upcoming')",
            [
                'title'    => $data['title'] ?? '',
                'date'     => $eventDate ?: null,
                'location' => $data['location'] ?? '',
                'link'     => $data['link'] ?? '',
                'max'      => $maxParticipants,
                'creator'  => $currentPsychologueId,
            ]
        );

        return $this->json(['success' => true, 'id' => (int)$conn->lastInsertId()]);
    }

    #[Route('/api/events/{id}', name: 'psycho_events_api_get', methods: ['GET'])]
    public function apiGet(int $id, EntityManagerInterface $em): JsonResponse
    {
        $conn  = $em->getConnection();
        $event = $conn->executeQuery("SELECT * FROM events WHERE id = :id", ['id' => $id])->fetchAssociative();

        return $event ? $this->json($event) : $this->json(['error' => 'Not found'], 404);
    }

    #[Route('/api/events/{id}', name: 'psycho_events_api_update', methods: ['PUT'])]
    public function apiUpdate(int $id, Request $request, EntityManagerInterface $em): JsonResponse
    {
        $data = json_decode($request->getContent(), true);
        $conn = $em->getConnection();
        $currentPsychologueId = $this->getUser() ? $this->getUser()->getId() : 0;
        
        // Vérifier si le psychologue est le créateur
        $event = $conn->executeQuery("SELECT creator_id FROM events WHERE id = :id", ['id' => $id])->fetchAssociative();
        if ($event && $event['creator_id'] != $currentPsychologueId) {
            return $this->json(['success' => false, 'error' => 'Vous ne pouvez pas modifier cet événement car vous n\'en êtes pas le créateur.'], 403);
        }

        $eventDate = $data['eventDate'] ?? $data['event_date'] ?? null;
        $maxParticipants = (int)($data['maxParticipants'] ?? $data['max_participants'] ?? 50);

        $conn->executeStatement(
            "UPDATE events SET title=:title, event_date=:date, location=:location, link=:link, max_participants=:max WHERE id=:id",
            [
                'title'    => $data['title'] ?? '',
                'date'     => $eventDate ?: null,
                'location' => $data['location'] ?? '',
                'link'     => $data['link'] ?? '',
                'max'      => $maxParticipants,
                'id'       => $id,
            ]
        );

        return $this->json(['success' => true]);
    }

    #[Route('/api/events/{id}', name: 'psycho_events_api_delete', methods: ['DELETE'])]
    public function apiDelete(int $id, EntityManagerInterface $em): JsonResponse
    {
        $conn = $em->getConnection();
        $currentPsychologueId = $this->getUser() ? $this->getUser()->getId() : 0;
        
        // Vérifier si le psychologue est le créateur
        $event = $conn->executeQuery("SELECT creator_id FROM events WHERE id = :id", ['id' => $id])->fetchAssociative();
        if ($event && $event['creator_id'] != $currentPsychologueId) {
            return $this->json(['success' => false, 'error' => 'Vous ne pouvez pas supprimer cet événement car vous n\'en êtes pas le créateur.'], 403);
        }
        
        $conn->executeStatement("DELETE FROM planification WHERE id_event = :id", ['id' => $id]);
        $conn->executeStatement("DELETE FROM participations WHERE event_id = :id", ['id' => $id]);
        $conn->executeStatement("DELETE FROM events WHERE id = :id", ['id' => $id]);

        return $this->json(['success' => true]);
    }

    #[Route('/api/planifications', name: 'psycho_events_api_create_planification', methods: ['POST'])]
    public function apiCreatePlanification(Request $request, EntityManagerInterface $em): JsonResponse
    {
        $data = json_decode($request->getContent(), true);
        $conn = $em->getConnection();

        // Support both camelCase (idEvent) and snake_case (id_event)
        $eventId = (int)($data['idEvent'] ?? $data['id_event'] ?? 0);

        $conn->executeStatement(
            "INSERT INTO planification (id_event, description, duree) VALUES (:event, :desc, :duree)",
            [
                'event' => $eventId,
                'desc'  => $data['description'] ?? '',
                'duree' => $data['duree'] ?? '',
            ]
        );

        return $this->json(['success' => true, 'id' => (int)$conn->lastInsertId()]);
    }

    #[Route('/api/planifications/{id}', name: 'psycho_events_api_update_planification', methods: ['PUT'])]
    public function apiUpdatePlanification(int $id, Request $request, EntityManagerInterface $em): JsonResponse
    {
        $data = json_decode($request->getContent(), true);
        $conn = $em->getConnection();

        $conn->executeStatement(
            "UPDATE planification SET description=:desc, duree=:duree WHERE id_planification=:id",
            ['desc' => $data['description'] ?? '', 'duree' => $data['duree'] ?? '', 'id' => $id]
        );

        return $this->json(['success' => true]);
    }

    #[Route('/api/planifications/{id}', name: 'psycho_events_api_delete_planification', methods: ['DELETE'])]
    public function apiDeletePlanification(int $id, EntityManagerInterface $em): JsonResponse
    {
        $em->getConnection()->executeStatement(
            "DELETE FROM planification WHERE id_planification = :id", ['id' => $id]
        );

        return $this->json(['success' => true]);
    }

    #[Route('/api/planifications/by-event/{eventId}', name: 'psycho_events_api_get_planification_by_event', methods: ['GET'])]
    public function apiGetPlanificationsByEvent(int $eventId, EntityManagerInterface $em): JsonResponse
    {
        $rows = $em->getConnection()->executeQuery(
            "SELECT * FROM planification WHERE id_event = :id", ['id' => $eventId]
        )->fetchAllAssociative();

        return $this->json($rows);
    }

    #[Route('/check-participation/{eventId}', name: 'psycho_events_check_participation', methods: ['GET'])]
    public function checkParticipation(int $eventId, EntityManagerInterface $em): JsonResponse
    {
        $currentPsychologueId = $this->getUser() ? $this->getUser()->getId() : 0;
        $existing = $em->getConnection()->executeQuery(
            "SELECT id FROM participations WHERE user_id = :uid AND event_id = :eid",
            ['uid' => $currentPsychologueId, 'eid' => $eventId]
        )->fetchOne();

        return $this->json(['participated' => (bool)$existing]);
    }

    #[Route('/api/correct-text', name: 'psycho_events_correct_text', methods: ['POST'])]
    public function correctText(Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);
        // Placeholder — wire to GeminiService if needed
        return $this->json(['success' => true, 'corrected' => $data['text'] ?? '']);
    }

    #[Route('/api/generate-planification', name: 'psycho_events_generate_planification', methods: ['POST'])]
    public function generatePlanification(Request $request): JsonResponse
    {
        $data  = json_decode($request->getContent(), true);
        $title = $data['title'] ?? '';

        // Basic server-side generation — replace with GeminiService call if available
        return $this->json([
            'success'     => true,
            'description' => 'Séance de bien-être : ' . $title,
            'duree'       => '2 heures',
        ]);
    }
}