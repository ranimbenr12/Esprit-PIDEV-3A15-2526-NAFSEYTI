<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/ai-assistant')]
class AIAssistantController extends AbstractController
{
    #[Route('/', name: 'admin_ai_assistant_index')]
    public function index(): Response
    {
        return $this->render('back/events/AIAssitant.html.twig');
    }

    #[Route('/generate', name: 'admin_ai_assistant_generate', methods: ['POST'])]
    public function generate(Request $request): JsonResponse
    {
        $data        = json_decode($request->getContent(), true);
        $description = trim($data['description'] ?? '');
        $eventType   = $data['event_type']    ?? '';
        $budget      = $data['budget']        ?? '';
        $audience    = $data['audience_size'] ?? '';
        $helpType    = $data['help_type']     ?? '🎯 Idées de thèmes';

        if (empty($description)) {
            $description = "Donne-moi des idées d'événements apaisants et bienveillants";
        }

        $prompt = $description . "\n\n";
        if ($eventType) $prompt .= "Type d'événement: $eventType\n";
        if ($budget)    $prompt .= "Budget: $budget\n";
        if ($audience)  $prompt .= "Participants: $audience\n";
        $prompt .= "\nAide demandée: $helpType\n";
        $prompt .= "\nFournis des conseils détaillés, apaisants et bienveillants en français.";

        $apiKey  = $_ENV['GEMINI_API_KEY']  ?? $_SERVER['GEMINI_API_KEY']  ?? getenv('GEMINI_API_KEY')  ?? '';
        $apiUrl  = $_ENV['GEMINI_API_URL']  ?? 'https://generativelanguage.googleapis.com/v1beta';
        $model   = $_ENV['GEMINI_MODEL']    ?? 'gemini-2.5-flash';
        $maxTok  = (int)($_ENV['GEMINI_MAX_TOKENS'] ?? 2048);
        $temp    = (float)($_ENV['GEMINI_TEMPERATURE'] ?? 0.7);

        if (!$apiKey || $apiKey === 'your_gemini_api_key_here') {
            return $this->json(['success' => true, 'result' => $this->fallback($description)]);
        }

        $url     = $apiUrl . '/models/' . $model . ':generateContent?key=' . $apiKey;
        $payload = json_encode([
            'contents'           => [['parts' => [['text' => $prompt]]]],
            'generationConfig'   => [
                'temperature'     => $temp,
                'maxOutputTokens' => $maxTok,
            ],
        ]);

        $ch = curl_init($url);
        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST           => true,
            CURLOPT_POSTFIELDS     => $payload,
            CURLOPT_HTTPHEADER     => ['Content-Type: application/json'],
            CURLOPT_TIMEOUT        => 20,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_SSL_VERIFYHOST => false,
        ]);
        $response = curl_exec($ch);
        $code     = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($code !== 200) {
            return $this->json(['success' => true, 'result' => $this->fallback($description)]);
        }

        $result = json_decode($response, true);
        $text   = $result['candidates'][0]['content']['parts'][0]['text'] ?? $this->fallback($description);

        // Save to session history
        $session = $this->container->get('request_stack')->getSession();
        $history = $session->get('ai_history', []);
        array_unshift($history, [
            'question'   => $description,
            'result'     => $text,
            'type'       => $helpType,
            'created_at' => date('d/m/Y H:i'),
        ]);
        $session->set('ai_history', array_slice($history, 0, 50));

        return $this->json(['success' => true, 'result' => $text]);
    }

    #[Route('/history', name: 'admin_ai_assistant_history', methods: ['GET'])]
    public function history(Request $request): JsonResponse
    {
        $session = $this->container->get('request_stack')->getSession();
        $history = $session->get('ai_history', []);
        return $this->json(['success' => true, 'history' => $history]);
    }

    #[Route('/save-favorite', name: 'admin_ai_assistant_save_favorite', methods: ['POST'])]
    public function saveFavorite(Request $request): JsonResponse
    {
        $data    = json_decode($request->getContent(), true);
        $content = $data['content'] ?? '';
        if (!$content) return $this->json(['success' => false, 'error' => 'Contenu vide'], 400);

        $session   = $this->container->get('request_stack')->getSession();
        $favorites = $session->get('ai_favorites', []);
        array_unshift($favorites, [
            'content'     => $content,
            'description' => $data['description'] ?? '',
            'created_at'  => date('d/m/Y H:i'),
        ]);
        $session->set('ai_favorites', array_slice($favorites, 0, 50));

        return $this->json(['success' => true, 'message' => 'Ajouté aux favoris']);
    }

    #[Route('/favorites', name: 'admin_ai_assistant_favorites', methods: ['GET'])]
    public function favorites(Request $request): JsonResponse
    {
        $session   = $this->container->get('request_stack')->getSession();
        $favorites = $session->get('ai_favorites', []);
        return $this->json(['success' => true, 'favorites' => $favorites]);
    }

    #[Route('/export', name: 'admin_ai_assistant_export', methods: ['POST'])]
    public function export(Request $request): Response
    {
        $data    = json_decode($request->getContent(), true);
        $content = $data['content'] ?? '';
        $format  = $data['format']  ?? 'txt';

        $sep      = str_repeat('=', 60);
        $body     = "$sep\n         IDÉES POUR MON ÉVÉNEMENT BIEN-ÊTRE\n$sep\n\n$content\n\n$sep\nGénéré par Assistant Bien-Être - " . date('d/m/Y H:i') . "\n$sep";
        $filename = 'idees_bien_etre_' . date('Ymd_His') . '.' . $format;

        $mime = match($format) {
            'pdf'  => 'application/pdf',
            'doc'  => 'application/msword',
            default => 'text/plain',
        };

        return new Response($body, 200, [
            'Content-Type'        => $mime . '; charset=UTF-8',
            'Content-Disposition' => 'attachment; filename="' . $filename . '"',
        ]);
    }

    private function fallback(string $input): string
    {
        $lower = strtolower($input);
        if (str_contains($lower, 'budget')) {
            return "💰 CONSEILS BUDGÉTAIRES\n\n• Lieu: 25-30%\n• Restauration: 20-25%\n• Animation: 15-20%\n• Décoration: 10-15%\n• Imprévus: 5-10%\n\n🔄 Configurez votre clé Gemini pour des conseils personnalisés.";
        }
        return "🎯 IDÉES DE THÈMES\n\n• Atelier Bien-être - Méditation, yoga\n• Conférence Innovation\n• Team Building collaboratif\n• Gala de Charité\n\n🔄 Configurez votre clé Gemini pour des suggestions personnalisées.";
    }
}
