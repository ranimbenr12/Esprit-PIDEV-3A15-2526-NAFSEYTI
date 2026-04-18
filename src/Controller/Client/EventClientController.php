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
    #[Route('/events', name: 'client_events_index')]
    public function index(EntityManagerInterface $em, Request $request): Response
    {
        $conn = $em->getConnection();
        $currentUserId = $this->getUser() ? $this->getUser()->getId() : 0;

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
            ['uid' => $currentUserId]
        )->fetchFirstColumn();

        // ========== AI RECOMMENDATION LOGIC ==========
        // Get user's past interests from participations and ratings
        $userInterests = $conn->executeQuery(
            "SELECT DISTINCT 
                CASE 
                    WHEN e.title LIKE '%méditation%' OR e.title LIKE '%yoga%' OR e.title LIKE '%relaxation%' OR e.title LIKE '%calme%' THEN 'relaxation'
                    WHEN e.title LIKE '%stress%' OR e.title LIKE '%anxiété%' OR e.title LIKE '%burnout%' OR e.title LIKE '%pression%' THEN 'stress-management'
                    WHEN e.title LIKE '%confiance%' OR e.title LIKE '%estime%' OR e.title LIKE '%affirmation%' OR e.title LIKE '%positif%' THEN 'confidence'
                    WHEN e.title LIKE '%sommeil%' OR e.title LIKE '%dormir%' OR e.title LIKE '%insomnie%' THEN 'sleep'
                    WHEN e.title LIKE '%émotion%' OR e.title LIKE '%colère%' OR e.title LIKE '%tristesse%' THEN 'emotional-intelligence'
                    WHEN e.title LIKE '%relation%' OR e.title LIKE '%couple%' OR e.title LIKE '%ami%' OR e.title LIKE '%communication%' THEN 'relationships'
                    WHEN e.title LIKE '%carrière%' OR e.title LIKE '%travail%' OR e.title LIKE '%professionnel%' THEN 'career'
                    WHEN e.title LIKE '%mindfulness%' OR e.title LIKE '%pleine conscience%' THEN 'mindfulness'
                    ELSE 'wellness'
                END as category
            FROM participations p
            JOIN events e ON p.event_id = e.id
            WHERE p.user_id = :userId
            UNION
            SELECT DISTINCT
                CASE 
                    WHEN e.title LIKE '%méditation%' OR e.title LIKE '%yoga%' OR e.title LIKE '%relaxation%' OR e.title LIKE '%calme%' THEN 'relaxation'
                    WHEN e.title LIKE '%stress%' OR e.title LIKE '%anxiété%' OR e.title LIKE '%burnout%' OR e.title LIKE '%pression%' THEN 'stress-management'
                    WHEN e.title LIKE '%confiance%' OR e.title LIKE '%estime%' OR e.title LIKE '%affirmation%' OR e.title LIKE '%positif%' THEN 'confidence'
                    WHEN e.title LIKE '%sommeil%' OR e.title LIKE '%dormir%' OR e.title LIKE '%insomnie%' THEN 'sleep'
                    WHEN e.title LIKE '%émotion%' OR e.title LIKE '%colère%' OR e.title LIKE '%tristesse%' THEN 'emotional-intelligence'
                    WHEN e.title LIKE '%relation%' OR e.title LIKE '%couple%' OR e.title LIKE '%ami%' OR e.title LIKE '%communication%' THEN 'relationships'
                    WHEN e.title LIKE '%carrière%' OR e.title LIKE '%travail%' OR e.title LIKE '%professionnel%' THEN 'career'
                    WHEN e.title LIKE '%mindfulness%' OR e.title LIKE '%pleine conscience%' THEN 'mindfulness'
                    ELSE 'wellness'
                END as category
            FROM event_ratings r
            JOIN events e ON r.event_id = e.id
            WHERE r.user_id = :userId AND r.rating >= 4",
            ['userId' => $currentUserId]
        )->fetchAllAssociative();

        $userCategories = array_column($userInterests, 'category');
        
        // Function to determine event category
        function getEventCategory($title) {
            $titleLower = strtolower($title);
            if (strpos($titleLower, 'méditation') !== false || strpos($titleLower, 'yoga') !== false || 
                strpos($titleLower, 'relaxation') !== false || strpos($titleLower, 'calme') !== false) {
                return 'relaxation';
            }
            if (strpos($titleLower, 'stress') !== false || strpos($titleLower, 'anxiété') !== false || 
                strpos($titleLower, 'burnout') !== false || strpos($titleLower, 'pression') !== false) {
                return 'stress-management';
            }
            if (strpos($titleLower, 'confiance') !== false || strpos($titleLower, 'estime') !== false || 
                strpos($titleLower, 'affirmation') !== false || strpos($titleLower, 'positif') !== false) {
                return 'confidence';
            }
            if (strpos($titleLower, 'sommeil') !== false || strpos($titleLower, 'dormir') !== false || 
                strpos($titleLower, 'insomnie') !== false) {
                return 'sleep';
            }
            if (strpos($titleLower, 'émotion') !== false || strpos($titleLower, 'colère') !== false || 
                strpos($titleLower, 'tristesse') !== false) {
                return 'emotional-intelligence';
            }
            if (strpos($titleLower, 'relation') !== false || strpos($titleLower, 'couple') !== false || 
                strpos($titleLower, 'ami') !== false || strpos($titleLower, 'communication') !== false) {
                return 'relationships';
            }
            if (strpos($titleLower, 'carrière') !== false || strpos($titleLower, 'travail') !== false || 
                strpos($titleLower, 'professionnel') !== false) {
                return 'career';
            }
            if (strpos($titleLower, 'mindfulness') !== false || strpos($titleLower, 'pleine conscience') !== false) {
                return 'mindfulness';
            }
            return 'wellness';
        }

        $allEvents = [];
        foreach ($eventsData as $e) {
            // Get rating stats for this event
            $ratingStats = $conn->executeQuery(
                "SELECT AVG(rating) as avg_rating, COUNT(*) as rating_count FROM event_ratings WHERE event_id = :eventId",
                ['eventId' => $e['id']]
            )->fetchAssociative();
            
            // Get user's rating for this event
            $userRating = $conn->executeQuery(
                "SELECT rating FROM event_ratings WHERE event_id = :eventId AND user_id = :userId",
                ['eventId' => $e['id'], 'userId' => $currentUserId]
            )->fetchOne();
            
            $eventCategory = getEventCategory($e['title']);
            $isRecommended = in_array($eventCategory, $userCategories) && !in_array($e['id'], $participatedIds);
            
            $allEvents[] = [
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
                'avgRating'           => round($ratingStats['avg_rating'] ?? 0, 1),
                'ratingCount'         => (int)($ratingStats['rating_count'] ?? 0),
                'userRating'          => (int)($userRating ?? 0),
                'isRecommended'       => $isRecommended,
                'category'            => $eventCategory,
                'status'              => $e['status'] ?? 'upcoming',
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

        return $this->render('home/events/index.html.twig', [
            'events' => $events,
            'geminiKey' => $_ENV['GEMINI_API_KEY'] ?? '',
            'currentPage' => $page,
            'totalPages' => $totalPages,
            'totalItems' => $totalItems,
            'currentLimit' => $limit,
        ]);
    }

    #[Route('/events/{id}/participate', name: 'client_events_participate', methods: ['POST'])]
    public function participate(int $id, EntityManagerInterface $em): JsonResponse
    {
        $conn = $em->getConnection();
        $currentUserId = $this->getUser() ? $this->getUser()->getId() : 0;

        // Check already participated
        $existing = $conn->executeQuery(
            "SELECT id FROM participations WHERE user_id = :uid AND event_id = :eid",
            ['uid' => $currentUserId, 'eid' => $id]
        )->fetchOne();

        if ($existing) {
            return $this->json(['success' => false, 'message' => 'Vous êtes déjà inscrit à cet événement.']);
        }

        // Check if full
        $event = $conn->executeQuery("SELECT max_participants, title, status FROM events WHERE id = :id", ['id' => $id])->fetchAssociative();
        
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
            ['uid' => $currentUserId, 'eid' => $id]
        );

        $participationId = (int)$conn->lastInsertId();

        // Get event title for notification message
        $eventTitle = $event['title'] ?? 'événement';

        // Get user name for notification message
        $user = $conn->executeQuery(
            "SELECT firstname, lastname FROM users WHERE id = :uid",
            ['uid' => $currentUserId]
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

    #[Route('/events/{id}/rate', name: 'client_events_rate', methods: ['POST'])]
    public function rateEvent(int $id, Request $request, EntityManagerInterface $em): JsonResponse
    {
        $data = json_decode($request->getContent(), true);
        $rating = $data['rating'] ?? 0;
        $userId = $this->getUser() ? $this->getUser()->getId() : 0;
        
        if ($rating < 1 || $rating > 5) {
            return $this->json(['success' => false, 'message' => 'Note invalide']);
        }
        
        $conn = $em->getConnection();
        
        // Check if user already rated this event
        $existing = $conn->executeQuery(
            "SELECT id FROM event_ratings WHERE event_id = :eventId AND user_id = :userId",
            ['eventId' => $id, 'userId' => $userId]
        )->fetchOne();
        
        if ($existing) {
            // Update existing rating
            $conn->executeStatement(
                "UPDATE event_ratings SET rating = :rating, updated_at = NOW() WHERE event_id = :eventId AND user_id = :userId",
                ['rating' => $rating, 'eventId' => $id, 'userId' => $userId]
            );
        } else {
            // Insert new rating
            $conn->executeStatement(
                "INSERT INTO event_ratings (event_id, user_id, rating, created_at) VALUES (:eventId, :userId, :rating, NOW())",
                ['eventId' => $id, 'userId' => $userId, 'rating' => $rating]
            );
        }
        
        // Get updated average rating and count
        $stats = $conn->executeQuery(
            "SELECT AVG(rating) as avg_rating, COUNT(*) as rating_count FROM event_ratings WHERE event_id = :eventId",
            ['eventId' => $id]
        )->fetchAssociative();
        
        return $this->json([
            'success' => true,
            'averageRating' => round($stats['avg_rating'], 1),
            'ratingCount' => $stats['rating_count']
        ]);
    }

    // ── Calendar page ────────────────────────────────────────────────────────
    #[Route('/events/calendar', name: 'client_events_calendar')]
    public function calendar(): Response
    {
        return $this->render('home/events/calendar.html.twig');
    }

    // ── Calendar events JSON feed (used by FullCalendar JS) ──────────────────
    #[Route('/events/calendar/feed', name: 'client_events_calendar_feed', methods: ['GET'])]
    public function calendarFeed(EntityManagerInterface $em, Request $request): JsonResponse
    {
        $conn  = $em->getConnection();
        $start = $request->query->get('start');
        $end   = $request->query->get('end');

        $sql = "SELECT e.id, e.title, e.event_date, e.location, e.status,
                       e.max_participants,
                       (SELECT COUNT(*) FROM participations WHERE event_id = e.id) AS current_participants
                FROM events e
                WHERE e.event_date IS NOT NULL";

        $params = [];
        if ($start) { $sql .= " AND e.event_date >= :start"; $params['start'] = $start; }
        if ($end)   { $sql .= " AND e.event_date <= :end";   $params['end']   = $end;   }
        $sql .= " ORDER BY e.event_date ASC";

        $rows = $conn->executeQuery($sql, $params)->fetchAllAssociative();

        $events = array_map(function ($e) {
            $isFull = (int)$e['current_participants'] >= (int)$e['max_participants'];
            $color  = match ($e['status'] ?? 'upcoming') {
                'ongoing'   => '#4CAF50',
                'completed' => '#9E9E9E',
                'cancelled' => '#f44336',
                default     => $isFull ? '#e67e22' : '#285921',
            };
            return [
                'id'    => $e['id'],
                'title' => $e['title'],
                'start' => $e['event_date'],
                'url'   => '/events#event-' . $e['id'],
                'color' => $color,
                'extendedProps' => [
                    'location'    => $e['location'],
                    'status'      => $e['status'] ?? 'upcoming',
                    'spots'       => $e['max_participants'] - $e['current_participants'],
                    'isFull'      => $isFull,
                ],
            ];
        }, $rows);

        return $this->json($events);
    }
}