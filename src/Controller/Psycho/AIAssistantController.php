<?php

namespace App\Controller\Psycho;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/psycho/ai-assistant')]
class AIAssistantController extends AbstractController
{
    #[Route('', name: 'psycho_ai_assistant_index')]
    public function index(): Response
    {
        return $this->render('Psychologue/evente/AIAssitant.html.twig', [
            'geminiKey' => $_ENV['GEMINI_API_KEY'] ?? '',
        ]);
    }

    #[Route('/generate', name: 'psycho_ai_assistant_generate', methods: ['POST'])]
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

        $prompt  = $description . "\n\n";
        if ($eventType) $prompt .= "Type d'événement: $eventType\n";
        if ($budget)    $prompt .= "Budget: $budget\n";
        if ($audience)  $prompt .= "Participants: $audience\n";
        $prompt .= "\nAide demandée: $helpType\n";
        $prompt .= "\nFournis des conseils détaillés, apaisants et bienveillants en français.";

        $apiKey = $_ENV['GEMINI_API_KEY']  ?? $_SERVER['GEMINI_API_KEY']  ?? getenv('GEMINI_API_KEY')  ?? '';
        $apiUrl = $_ENV['GEMINI_API_URL']  ?? 'https://generativelanguage.googleapis.com/v1beta';
        $model  = $_ENV['GEMINI_MODEL']    ?? 'gemini-2.0-flash-lite';
        $maxTok = (int)($_ENV['GEMINI_MAX_TOKENS']   ?? 2048);
        $temp   = (float)($_ENV['GEMINI_TEMPERATURE'] ?? 0.7);

        if (!$apiKey || $apiKey === 'your_gemini_api_key_here') {
            return $this->json(['success' => true, 'result' => $this->fallback($description, $helpType)]);
        }

        $url     = $apiUrl . '/models/' . $model . ':generateContent?key=' . $apiKey;
        $payload = json_encode([
            'contents'         => [['parts' => [['text' => $prompt]]]],
            'generationConfig' => ['temperature' => $temp, 'maxOutputTokens' => $maxTok],
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
            // Any error (including 429 quota) → return rich fallback content so the assistant still works
            return $this->json(['success' => true, 'result' => $this->fallback($description, $helpType)]);
        }

        $result = json_decode($response, true);
        $text   = $result['candidates'][0]['content']['parts'][0]['text'] ?? $this->fallback($description, $helpType);

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

    #[Route('/history', name: 'psycho_ai_assistant_history', methods: ['GET'])]
    public function history(): JsonResponse
    {
        $session = $this->container->get('request_stack')->getSession();
        $history = $session->get('ai_history', []);

        return $this->json(['success' => true, 'history' => $history]);
    }

    #[Route('/save-favorite', name: 'psycho_ai_assistant_save_favorite', methods: ['POST'])]
    public function saveFavorite(Request $request): JsonResponse
    {
        $data    = json_decode($request->getContent(), true);
        $content = $data['content'] ?? '';

        if (!$content) {
            return $this->json(['success' => false, 'error' => 'Contenu vide'], 400);
        }

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

    #[Route('/favorites', name: 'psycho_ai_assistant_favorites', methods: ['GET'])]
    public function favorites(): JsonResponse
    {
        $session   = $this->container->get('request_stack')->getSession();
        $favorites = $session->get('ai_favorites', []);

        return $this->json(['success' => true, 'favorites' => $favorites]);
    }

    #[Route('/export', name: 'psycho_ai_assistant_export', methods: ['POST'])]
    public function export(Request $request): Response
    {
        $data    = json_decode($request->getContent(), true);
        $content = $data['content'] ?? '';
        $format  = $data['format']  ?? 'txt';

        $sep  = str_repeat('=', 60);
        $body = "$sep\n         IDÉES POUR MON ÉVÉNEMENT BIEN-ÊTRE\n$sep\n\n$content\n\n$sep\nGénéré par Assistant Bien-Être - " . date('d/m/Y H:i') . "\n$sep";

        $filename = 'idees_bien_etre_' . date('Ymd_His') . '.' . $format;
        $mime     = match ($format) {
            'pdf'   => 'application/pdf',
            'doc'   => 'application/msword',
            default => 'text/plain',
        };

        return new Response($body, 200, [
            'Content-Type'        => $mime . '; charset=UTF-8',
            'Content-Disposition' => 'attachment; filename="' . $filename . '"',
        ]);
    }

    private function fallback(string $input, string $helpType = ''): string
    {
        $lower = strtolower($input . ' ' . $helpType);
        $sep   = str_repeat('─', 50);

        if (str_contains($lower, 'budget')) {
            return "💰 PLANIFICATION BUDGÉTAIRE\n$sep\n\n"
                 . "Répartition harmonieuse recommandée :\n\n"
                 . "  🏛️  Lieu & logistique      → 25–30 %\n"
                 . "  🍽️  Restauration           → 20–25 %\n"
                 . "  🎵  Animation & activités  → 15–20 %\n"
                 . "  🌸  Décoration & ambiance  → 10–15 %\n"
                 . "  📢  Communication          →  5–10 %\n"
                 . "  🔧  Imprévus (réserve)     →  5–10 %\n\n"
                 . "💡 Conseils :\n"
                 . "  • Demandez 3 devis par prestataire\n"
                 . "  • Négociez hors saison\n"
                 . "  • Gardez 10 % de marge de sécurité\n"
                 . "  • Privilégiez les prestataires locaux\n\n"
                 . $sep . "\n⚡ Ajoutez une clé Gemini valide dans .env pour des conseils personnalisés.";
        }

        if (str_contains($lower, 'planning') || str_contains($lower, 'calendrier') || str_contains($lower, 'temporel')) {
            return "📅 PLANNING TEMPOREL\n$sep\n\n"
                 . "  📌  J-90  → Concept, budget, date\n"
                 . "  📌  J-60  → Lieu, prestataires\n"
                 . "  📌  J-45  → Invitations & communication\n"
                 . "  📌  J-30  → Confirmation prestataires\n"
                 . "  📌  J-15  → Programme détaillé\n"
                 . "  📌  J-7   → Briefing équipe\n"
                 . "  📌  J-1   → Installation\n"
                 . "  📌  Jour J → Animation & gestion\n"
                 . "  📌  J+3   → Bilan & remerciements\n\n"
                 . $sep . "\n⚡ Ajoutez une clé Gemini valide dans .env pour un planning personnalisé.";
        }

        if (str_contains($lower, 'partage') || str_contains($lower, 'marketing') || str_contains($lower, 'communication')) {
            return "📢 STRATÉGIE DE COMMUNICATION\n$sep\n\n"
                 . "  📱  Réseaux sociaux : visuels apaisants, stories J-30\n"
                 . "  📧  Email : newsletter J-30, rappel J-7, confirmation J-1\n"
                 . "  🤝  Partenariats locaux & bouche-à-oreille\n"
                 . "  🎨  Palette douce : verts naturels, beiges, blancs\n\n"
                 . $sep . "\n⚡ Ajoutez une clé Gemini valide dans .env pour une stratégie personnalisée.";
        }

        if (str_contains($lower, 'lieu') || str_contains($lower, 'salle') || str_contains($lower, 'espace')) {
            return "🏛️ SUGGESTIONS DE LIEUX\n$sep\n\n"
                 . "  🌿  Jardins botaniques, parcs, bords de lac\n"
                 . "  🏡  Lofts, granges rénovées, rooftops\n"
                 . "  🧘  Centres yoga, spas, retraites spirituelles\n\n"
                 . "  ✅  Critères : accessibilité, capacité +20 %, équipements\n\n"
                 . $sep . "\n⚡ Ajoutez une clé Gemini valide dans .env pour des suggestions personnalisées.";
        }

        if (str_contains($lower, 'activit')) {
            return "✨ IDÉES D'ACTIVITÉS BIEN-ÊTRE\n$sep\n\n"
                 . "  🧘  Méditation, yoga doux, cohérence cardiaque\n"
                 . "  🎨  Mandala, art-thérapie, journaling\n"
                 . "  🌱  Bain de forêt, jardinage, herboristerie\n"
                 . "  💬  Cercles de parole, CNV, gratitude\n\n"
                 . $sep . "\n⚡ Ajoutez une clé Gemini valide dans .env pour des activités personnalisées.";
        }

        if (str_contains($lower, 'décor') || str_contains($lower, 'decor')) {
            return "🎨 IDÉES DE DÉCORATION\n$sep\n\n"
                 . "  🌿  Couleurs : verts naturels, beiges, terracotta\n"
                 . "  🕯️  Éclairage : guirlandes chaudes, bougies\n"
                 . "  🌸  Végétation : plantes, fleurs séchées, mousse\n"
                 . "  🪨  Matières : lin, bois brut, céramique\n\n"
                 . $sep . "\n⚡ Ajoutez une clé Gemini valide dans .env pour des idées personnalisées.";
        }

        if (str_contains($lower, 'restaur') || str_contains($lower, 'repas') || str_contains($lower, 'traiteur')) {
            return "🍽️ IDÉES DE RESTAURATION\n$sep\n\n"
                 . "  🥗  Buffet : salades, bowls végétariens, jus frais\n"
                 . "  🫖  Thés & infusions aux plantes médicinales\n"
                 . "  🍰  Douceurs saines : fruits, gâteaux sans gluten\n"
                 . "  ✅  Indiquer allergènes, options vegan, local\n\n"
                 . $sep . "\n⚡ Ajoutez une clé Gemini valide dans .env pour des idées personnalisées.";
        }

        return "🎯 IDÉES POUR VOTRE ÉVÉNEMENT BIEN-ÊTRE\n$sep\n\n"
             . "Basé sur : « " . mb_substr($input, 0, 80) . " »\n\n"
             . "🌿 THÈMES\n"
             . "  • Retraite méditation & pleine conscience\n"
             . "  • Atelier gestion du stress\n"
             . "  • Journée reconnexion à la nature\n"
             . "  • Cercle de parole & intelligence émotionnelle\n\n"
             . "🌸 STRUCTURE (3h)\n"
             . "  1. Accueil & ancrage (15 min)\n"
             . "  2. Atelier principal (90 min)\n"
             . "  3. Pause bien-être (20 min)\n"
             . "  4. Intégration & clôture (35 min)\n\n"
             . "💡 CONSEILS\n"
             . "  • 20–30 participants max pour l'intimité\n"
             . "  • Lieu calme avec lumière naturelle\n"
             . "  • Espace sécurisant et bienveillant\n\n"
             . $sep . "\n⚡ Ajoutez une clé Gemini valide dans .env pour des conseils personnalisés.";
    }
}
