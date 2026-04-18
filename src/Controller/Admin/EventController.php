<?php

namespace App\Controller\Admin;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;


class EventController extends AbstractController
{
    // ── Validation (mirrors JavaFX logic exactly) ──────────────────

    private function validateTitle(string $title): ?string
    {
        if ($title === '') return 'Le titre est obligatoire.';
        if (mb_strlen($title) < 3) return 'Le titre doit contenir au moins 3 caractères.';
        return null;
    }

    private function validateLocation(string $location): ?string
    {
        if ($location === '') return 'Le lieu est obligatoire.';
        if (mb_strlen($location) < 3) return 'Le lieu doit contenir au moins 3 caractères.';
        return null;
    }

    private function validateEventDate(string $date): ?string
    {
        if ($date === '') return 'La date est obligatoire.';
        $parsed = \DateTime::createFromFormat('Y-m-d', $date);
        if (!$parsed) return 'Format de date invalide.';
        $parsed->setTime(0, 0, 0);
        $today = new \DateTime('today');
        if ($parsed < $today) return 'La date de l\'événement ne peut pas être dans le passé.';
        return null;
    }

    private function validateMaxParticipants(string $raw): ?string
    {
        if ($raw === '') return 'Le nombre de participants est obligatoire.';
        if (!ctype_digit($raw)) return 'Le nombre de participants doit être un nombre entier valide.';
        if ((int)$raw <= 0) return 'Le nombre de participants doit être supérieur à 0.';
        return null;
    }

    /**
     * Planification is optional, but if one field is filled the other is required.
     * If both filled, description must be >= 4 chars.
     * Returns array ['planDescription' => error, 'planDuree' => error] or empty array.
     */
    private function validatePlanification(string $desc, string $duree): array
    {
        $errors = [];
        if ($desc === '' && $duree === '') return $errors; // both empty = valid

        if ($desc !== '' && $duree === '') {
            $errors['planDuree'] = 'Veuillez ajouter une durée pour la planification.';
        }
        if ($desc === '' && $duree !== '') {
            $errors['planDescription'] = 'Veuillez ajouter une description pour la planification.';
        }
        if ($desc !== '' && $duree !== '' && mb_strlen($desc) < 4) {
            $errors['planDescription'] = 'La description de la planification doit contenir au moins 4 caractères.';
        }
        return $errors;
    }

    // ── Index ──────────────────────────────────────────────────────

    #[Route('/admin/events', name: 'admin_events_index')]
    public function index(EntityManagerInterface $em): Response
    {
        $conn       = $em->getConnection();
        $eventsData = $conn->executeQuery("SELECT * FROM events ORDER BY id DESC")->fetchAllAssociative();

        $events = [];
        foreach ($eventsData as $event) {
            $count    = $conn->executeQuery(
                "SELECT COUNT(*) FROM participations WHERE event_id = :id", ['id' => $event['id']]
            )->fetchOne();

            $events[] = [
                'id'                  => $event['id'],
                'title'               => $event['title'],
                'eventDate'           => new \DateTime($event['event_date']),
                'location'            => $event['location'],
                'link'                => $event['link'],
                'createdAt'           => $event['created_at'] ? new \DateTime($event['created_at']) : null,
                'maxParticipants'     => $event['max_participants'],
                'currentParticipants' => (int)$count,
                'status'              => $event['status'] ?? 'upcoming',
            ];
        }

        $planifications = $conn->executeQuery(
            "SELECT id_planification as idPlanification, description, duree, id_event as idEvent FROM planification"
        )->fetchAllAssociative();

        $totalEvents       = count($events);
        $totalParticipants = array_sum(array_column($events, 'currentParticipants'));

        // Retrieve edit errors from session (after failed update redirect)
        $session      = $this->container->get('request_stack')->getSession();
        $editErrors   = $session->get('edit_errors', []);
        $editOld      = $session->get('edit_old', []);
        $editEventId  = $session->get('edit_event_id', null);
        $session->remove('edit_errors');
        $session->remove('edit_old');
        $session->remove('edit_event_id');

        // Retrieve create errors from session (after failed create redirect)
        $createErrors = $session->get('create_errors', []);
        $createOld    = $session->get('create_old', []);
        $session->remove('create_errors');
        $session->remove('create_old');

        return $this->render('back/events/index.html.twig', [
            'events'         => $events,
            'planifications' => $planifications,
            'unread_count'   => 0,
            'stats'          => [
                'total_events'       => $totalEvents,
                'total_participants' => $totalParticipants,
                'avg_participants'   => $totalEvents > 0 ? round($totalParticipants / $totalEvents) : 0,
            ],
            'editErrors'  => $editErrors,
            'editOld'     => $editOld,
            'editEventId' => $editEventId,
            'createErrors' => $createErrors,
            'createOld'    => $createOld,
        ]);
    }

    // ── Create GET ─────────────────────────────────────────────────

    #[Route('/admin/events/create', name: 'admin_events_create', methods: ['GET'])]
    public function create(Request $request): Response
    {
        $session     = $this->container->get('request_stack')->getSession();
        $errors      = $session->get('create_errors', []);
        $old         = $session->get('create_old', []);
        $session->remove('create_errors');
        $session->remove('create_old');

        return $this->render('back/events/create.html.twig', [
            'errors' => $errors,
            'old'    => $old,
        ]);
    }

    // ── Create POST ────────────────────────────────────────────────

    #[Route('/admin/events/create', name: 'admin_events_create_save', methods: ['POST'])]
    public function createSave(Request $request, EntityManagerInterface $em): Response
    {
        $title    = trim($request->request->get('title', ''));
        $location = trim($request->request->get('location', ''));
        $dateRaw  = $request->request->get('eventDate', '');
        $maxRaw   = trim($request->request->get('maxParticipants', ''));
        $link     = trim($request->request->get('link', ''));
        $planDesc = trim($request->request->get('planDescription', ''));
        $planDuree= trim($request->request->get('planDuree', ''));

        $errors = [];
        if ($e = $this->validateTitle($title))           $errors['title']           = $e;
        if ($e = $this->validateLocation($location))     $errors['location']        = $e;
        if ($e = $this->validateEventDate($dateRaw))     $errors['eventDate']       = $e;
        if ($e = $this->validateMaxParticipants($maxRaw))$errors['maxParticipants'] = $e;
        $errors = array_merge($errors, $this->validatePlanification($planDesc, $planDuree));

        if ($errors) {
            $session = $this->container->get('request_stack')->getSession();
            $session->set('create_errors', $errors);
            $session->set('create_old', [
                'title'           => $title,
                'location'        => $location,
                'eventDate'       => $dateRaw,
                'maxParticipants' => $maxRaw,
                'link'            => $link,
                'planDescription' => $planDesc,
                'planDuree'       => $planDuree,
            ]);
            return $this->redirectToRoute('admin_events_index');
        }

        $conn = $em->getConnection();

        // Handle uploaded image
        $imageFile = $request->files->get('imageFile');
        if ($imageFile) {
            $uploadsDir = $this->getParameter('kernel.project_dir') . '/public/uploads/events';
            if (!is_dir($uploadsDir)) mkdir($uploadsDir, 0777, true);
            $filename = uniqid() . '.' . $imageFile->guessExtension();
            $imageFile->move($uploadsDir, $filename);
            $link = '/uploads/events/' . $filename;
        }

        $maxParticipants = (int)$maxRaw;
        $conn->executeStatement(
            "INSERT INTO events (title, location, event_date, max_participants, link, created_at, creator_id, status)
             VALUES (:title, :location, :eventDate, :maxParticipants, :link, NOW(), 1, 'upcoming')",
            compact('title', 'location', 'maxParticipants', 'link') + ['eventDate' => $dateRaw]
        );
        $eventId = (int)$conn->lastInsertId();

        if ($planDesc && $planDuree) {
            $conn->executeStatement(
                "INSERT INTO planification (id_event, description, duree) VALUES (:eventId, :planDesc, :planDuree)",
                compact('eventId', 'planDesc', 'planDuree')
            );
        }

        $this->addFlash('success', 'Événement créé avec succès !');
        return $this->redirectToRoute('admin_events_index');
    }

    // ── Analytics data for Analyser modal ─────────────────────────

    #[Route('/admin/events/analytics', name: 'admin_events_analytics', methods: ['GET'])]
    public function analytics(EntityManagerInterface $em): JsonResponse
    {
        $conn = $em->getConnection();

        $events = $conn->executeQuery(
            "SELECT e.id, e.title, e.location, e.event_date, e.max_participants,
             (SELECT COUNT(*) FROM participations WHERE event_id = e.id) as current_participants
             FROM events e ORDER BY current_participants DESC"
        )->fetchAllAssociative();

        $totalEvents       = count($events);
        $totalParticipants = array_sum(array_column($events, 'current_participants'));
        $totalCapacity     = array_sum(array_column($events, 'max_participants'));
        $avgRate           = $totalCapacity > 0 ? round($totalParticipants / $totalCapacity * 100, 1) : 0;
        $topEvent          = $events[0] ?? null;

        return $this->json([
            'totalEvents'       => $totalEvents,
            'totalParticipants' => $totalParticipants,
            'totalCapacity'     => $totalCapacity,
            'avgRate'           => $avgRate,
            'topEvent'          => $topEvent,
        ]);
    }

    #[Route('/admin/events/list', name: 'admin_events_list', methods: ['GET'])]
    public function listJson(EntityManagerInterface $em): JsonResponse
    {
        $conn       = $em->getConnection();
        $eventsData = $conn->executeQuery("SELECT * FROM events ORDER BY id DESC")->fetchAllAssociative();

        $planifications = $conn->executeQuery(
            "SELECT id_event as idEvent, description, duree FROM planification"
        )->fetchAllAssociative();

        $planMap = [];
        foreach ($planifications as $p) {
            $planMap[$p['idEvent']] = $p;
        }

        $events = [];
        foreach ($eventsData as $e) {
            $count = $conn->executeQuery(
                "SELECT COUNT(*) FROM participations WHERE event_id = :id", ['id' => $e['id']]
            )->fetchOne();

            $createdAt  = $e['created_at'] ? new \DateTime($e['created_at']) : null;
            $daysDiff   = $createdAt ? (new \DateTime())->diff($createdAt)->days : 999;
            $eventDate  = new \DateTime($e['event_date']);
            $max        = (int)$e['max_participants'];
            $current    = (int)$count;
            $ratio      = $max > 0 ? round($current / $max * 100) : 0;
            $plan       = $planMap[$e['id']] ?? null;

            $events[] = [
                'id'              => $e['id'],
                'title'           => $e['title'],
                'eventDate'       => $eventDate->format('d/m/Y'),
                'eventDateInput'  => $eventDate->format('Y-m-d'),
                'location'        => $e['location'],
                'link'            => $e['link'] ?? '',
                'maxParticipants' => $max,
                'current'         => $current,
                'ratio'           => $ratio,
                'isNew'           => $daysDiff <= 7,
                'planDesc'        => $plan['description'] ?? '',
                'planDuree'       => $plan['duree'] ?? '',
                'status'          => $e['status'] ?? 'upcoming',
            ];
        }

        return $this->json($events);
    }

    #[Route('/admin/events/{id}/edit', name: 'admin_events_edit', methods: ['GET'])]
    public function edit(int $id): Response
    {
        return $this->redirectToRoute('admin_events_index');
    }

    // ── Edit JSON (for data-* fallback if needed) ──────────────────

    #[Route('/admin/events/{id}/json', name: 'admin_events_json', methods: ['GET'])]
    public function eventJson(int $id, EntityManagerInterface $em): JsonResponse
    {
        $conn      = $em->getConnection();
        $eventData = $conn->executeQuery("SELECT * FROM events WHERE id = :id", ['id' => $id])->fetchAssociative();
        if (!$eventData) return $this->json(['error' => 'Not found'], 404);

        $planification = $conn->executeQuery(
            "SELECT description, duree FROM planification WHERE id_event = :id LIMIT 1", ['id' => $id]
        )->fetchAssociative();

        return $this->json([
            'id'              => $eventData['id'],
            'title'           => $eventData['title'],
            'eventDate'       => (new \DateTime($eventData['event_date']))->format('Y-m-d'),
            'location'        => $eventData['location'],
            'link'            => $eventData['link'],
            'maxParticipants' => $eventData['max_participants'],
            'planDescription' => $planification['description'] ?? '',
            'planDuree'       => $planification['duree'] ?? '',
            'status'          => $eventData['status'] ?? 'upcoming',
        ]);
    }

    // ── Update POST ────────────────────────────────────────────────

    #[Route('/admin/events/{id}/edit', name: 'admin_events_update', methods: ['POST'])]
    public function update(int $id, Request $request, EntityManagerInterface $em): Response
    {
        $title    = trim($request->request->get('title', ''));
        $location = trim($request->request->get('location', ''));
        $dateRaw  = $request->request->get('eventDate', '');
        $maxRaw   = trim($request->request->get('maxParticipants', ''));
        $link     = trim($request->request->get('link', ''));
        $planDesc = trim($request->request->get('planDescription', ''));
        $planDuree= trim($request->request->get('planDuree', ''));

        $errors = [];
        if ($e = $this->validateTitle($title))           $errors['title']           = $e;
        if ($e = $this->validateLocation($location))     $errors['location']        = $e;
        if ($e = $this->validateEventDate($dateRaw))     $errors['eventDate']       = $e;
        if ($e = $this->validateMaxParticipants($maxRaw))$errors['maxParticipants'] = $e;
        $errors = array_merge($errors, $this->validatePlanification($planDesc, $planDuree));

        if ($errors) {
            // Store errors + submitted values in session, reopen edit modal on index
            $session = $this->container->get('request_stack')->getSession();
            $session->set('edit_errors', $errors);
            $session->set('edit_old', [
                'id'              => $id,
                'title'           => $title,
                'location'        => $location,
                'eventDate'       => $dateRaw,
                'maxParticipants' => $maxRaw,
                'link'            => $link,
                'planDescription' => $planDesc,
                'planDuree'       => $planDuree,
            ]);
            $session->set('edit_event_id', $id);
            return $this->redirectToRoute('admin_events_index');
        }

        $conn = $em->getConnection();

        $imageFile = $request->files->get('imageFile');
        if ($imageFile) {
            $uploadsDir = $this->getParameter('kernel.project_dir') . '/public/uploads/events';
            if (!is_dir($uploadsDir)) mkdir($uploadsDir, 0777, true);
            $filename = uniqid() . '.' . $imageFile->guessExtension();
            $imageFile->move($uploadsDir, $filename);
            $link = '/uploads/events/' . $filename;
        }

        $maxParticipants = (int)$maxRaw;
        $conn->executeStatement(
            "UPDATE events SET title=:title, location=:location, event_date=:eventDate,
             max_participants=:maxParticipants, link=:link WHERE id=:id",
            compact('title', 'location', 'maxParticipants', 'link', 'id') + ['eventDate' => $dateRaw]
        );

        $existing = $conn->executeQuery(
            "SELECT id_planification FROM planification WHERE id_event = :id LIMIT 1", ['id' => $id]
        )->fetchOne();

        if ($planDesc && $planDuree) {
            if ($existing) {
                $conn->executeStatement(
                    "UPDATE planification SET description=:planDesc, duree=:planDuree WHERE id_event=:id",
                    compact('planDesc', 'planDuree', 'id')
                );
            } else {
                $conn->executeStatement(
                    "INSERT INTO planification (id_event, description, duree) VALUES (:id, :planDesc, :planDuree)",
                    compact('id', 'planDesc', 'planDuree')
                );
            }
        } elseif (!$planDesc && !$planDuree && $existing) {
            $conn->executeStatement("DELETE FROM planification WHERE id_event = :id", ['id' => $id]);
        }

        $this->addFlash('success', 'Événement modifié avec succès !');
        return $this->redirectToRoute('admin_events_index');
    }

    // ── Delete ─────────────────────────────────────────────────────

    #[Route('/admin/events/{id}/delete', name: 'admin_events_delete', methods: ['POST'])]
    public function delete(int $id, EntityManagerInterface $em): JsonResponse
    {
        $conn = $em->getConnection();
        $conn->executeStatement("DELETE FROM planification WHERE id_event = :id", ['id' => $id]);
        $conn->executeStatement("DELETE FROM participations WHERE event_id = :id", ['id' => $id]);
        $conn->executeStatement("DELETE FROM events WHERE id = :id", ['id' => $id]);
        return $this->json(['success' => true]);
    }

    // ── Search ─────────────────────────────────────────────────────

    #[Route('/admin/events/search', name: 'admin_events_search', methods: ['GET'])]
    public function search(Request $request, EntityManagerInterface $em): JsonResponse
    {
        $term = $request->query->get('term', '');
        if (empty($term)) return $this->json([]);

        $conn   = $em->getConnection();
        $events = $conn->executeQuery(
            "SELECT * FROM events WHERE title LIKE :term OR location LIKE :term",
            ['term' => '%' . $term . '%']
        )->fetchAllAssociative();

        return $this->json($events);
    }

    // ── Planifications ─────────────────────────────────────────────

    #[Route('/admin/events/planifications/{eventId}', name: 'admin_events_planifications', methods: ['GET'])]
    public function getPlanifications(int $eventId, EntityManagerInterface $em): JsonResponse
    {
        $conn = $em->getConnection();
        $rows = $conn->executeQuery(
            "SELECT id_planification as id, description, duree, id_event as eventId
             FROM planification WHERE id_event = :eventId",
            ['eventId' => $eventId]
        )->fetchAllAssociative();
        return $this->json($rows);
    }

    // ── Gemini proxy ───────────────────────────────────────────────

    #[Route('/admin/events/gemini', name: 'admin_events_gemini', methods: ['POST'])]
    public function geminiProxy(Request $request): JsonResponse
    {
        $data   = json_decode($request->getContent(), true);
        $prompt = $data['prompt'] ?? '';
        if (!$prompt) return $this->json(['error' => 'No prompt provided'], 400);

        $apiKey = $_ENV['GEMINI_API_KEY'] ?? $_SERVER['GEMINI_API_KEY'] ?? getenv('GEMINI_API_KEY') ?? '';
        $apiUrl = $_ENV['GEMINI_API_URL'] ?? 'https://generativelanguage.googleapis.com/v1beta';
        $model  = $_ENV['GEMINI_MODEL']   ?? 'gemini-2.5-flash';

        if (!$apiKey || $apiKey === 'your_gemini_api_key_here') {
            return $this->json(['error' => 'Gemini API key not configured'], 500);
        }

        $url     = $apiUrl . '/models/' . $model . ':generateContent?key=' . $apiKey;
        $payload = json_encode([
            'contents'         => [['parts' => [['text' => $prompt]]]],
            'generationConfig' => [
                'temperature'     => (float)($_ENV['GEMINI_TEMPERATURE'] ?? 0.7),
                'maxOutputTokens' => (int)($_ENV['GEMINI_MAX_TOKENS'] ?? 2048),
            ],
        ]);

        $ch = curl_init($url);
        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST           => true,
            CURLOPT_POSTFIELDS     => $payload,
            CURLOPT_HTTPHEADER     => ['Content-Type: application/json'],
            CURLOPT_TIMEOUT        => 15,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_SSL_VERIFYHOST => false,
        ]);
        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($httpCode !== 200) return $this->json(['error' => 'Gemini API error', 'code' => $httpCode], 502);

        $result = json_decode($response, true);
        $text   = $result['candidates'][0]['content']['parts'][0]['text'] ?? '';
        return $this->json(['text' => $text]);
    }

    // ========== ADDED: STATUS MANAGEMENT ==========

    #[Route('/admin/events/{id}/status', name: 'admin_events_update_status', methods: ['POST'])]
    public function updateStatus(int $id, Request $request, EntityManagerInterface $em): JsonResponse
    {
        $conn = $em->getConnection();
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
        
        // Get event title for notification
        $event = $conn->executeQuery(
            "SELECT title FROM events WHERE id = :id",
            ['id' => $id]
        )->fetchAssociative();
        
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
}