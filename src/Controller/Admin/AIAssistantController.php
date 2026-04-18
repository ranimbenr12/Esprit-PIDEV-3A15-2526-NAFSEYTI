<?php

namespace App\Controller\Admin;

use Dompdf\Dompdf;
use Dompdf\Options;
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
        return $this->render('back/events/AIAssitant.html.twig', [
            'geminiKey' => $_ENV['GEMINI_API_KEY'] ?? '',
        ]);
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
            return $this->json(['success' => true, 'result' => $this->fallback($description, $helpType)]);
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

        $filename = 'idees_bien_etre_' . date('Ymd_His');

        if ($format === 'pdf') {
            // Render the PDF HTML template
            $html = $this->renderView('back/events/pdf/export.html.twig', [
                'content' => $content,
                'date'    => date('d/m/Y H:i'),
            ]);

            // Generate PDF with Dompdf
            $options = new Options();
            $options->set('defaultFont', 'DejaVu Sans');
            $options->set('isRemoteEnabled', false);
            $options->set('isHtml5ParserEnabled', true);

            $dompdf = new Dompdf($options);
            $dompdf->loadHtml($html, 'UTF-8');
            $dompdf->setPaper('A4', 'portrait');
            $dompdf->render();

            $pdfOutput = $dompdf->output();

            return new Response($pdfOutput, 200, [
                'Content-Type'        => 'application/pdf',
                'Content-Disposition' => 'attachment; filename="' . $filename . '.pdf"',
                'Content-Length'      => strlen($pdfOutput),
            ]);
        }

        // TXT / DOC fallback
        $sep  = str_repeat('=', 60);
        $body = "$sep\n         IDÉES POUR MON ÉVÉNEMENT BIEN-ÊTRE\n$sep\n\n$content\n\n$sep\nGénéré par Assistant Bien-Être - " . date('d/m/Y H:i') . "\n$sep";

        $mime = $format === 'doc' ? 'application/msword' : 'text/plain';

        return new Response($body, 200, [
            'Content-Type'        => $mime . '; charset=UTF-8',
            'Content-Disposition' => 'attachment; filename="' . $filename . '.' . $format . '"',
        ]);
    }

    private function fallback(string $input, string $helpType = ''): string
    {
        $lower = strtolower($input);
        $sep   = str_repeat('─', 50);

        // Budget
        if (str_contains($lower, 'budget') || str_contains($helpType, 'budget') || str_contains($helpType, 'Budget')) {
            return "💰 PLANIFICATION BUDGÉTAIRE\n$sep\n\n"
                 . "Voici une répartition harmonieuse pour votre événement :\n\n"
                 . "  🏛️  Lieu & logistique      → 25–30 % du budget\n"
                 . "  🍽️  Restauration           → 20–25 %\n"
                 . "  🎵  Animation & activités  → 15–20 %\n"
                 . "  🌸  Décoration & ambiance  → 10–15 %\n"
                 . "  📢  Communication          →  5–10 %\n"
                 . "  🔧  Imprévus (réserve)     →  5–10 %\n\n"
                 . "💡 Conseils pratiques :\n"
                 . "  • Demandez 3 devis pour chaque prestataire\n"
                 . "  • Négociez les tarifs hors saison\n"
                 . "  • Prévoyez toujours 10 % de marge de sécurité\n"
                 . "  • Privilégiez les prestataires locaux pour réduire les coûts\n\n"
                 . $sep . "\n⚡ Conseil : Configurez une clé Gemini valide dans .env pour des conseils personnalisés.";
        }

        // Timeline / planning
        if (str_contains($lower, 'planning') || str_contains($lower, 'calendrier') || str_contains($lower, 'timeline')
            || str_contains($helpType, 'temporelle') || str_contains($helpType, 'Planning')) {
            return "📅 PLANNING TEMPOREL\n$sep\n\n"
                 . "Calendrier recommandé pour votre événement :\n\n"
                 . "  📌  J-90  → Définir le concept, le budget, la date\n"
                 . "  📌  J-60  → Réserver le lieu, contacter les prestataires\n"
                 . "  📌  J-45  → Lancer les invitations & la communication\n"
                 . "  📌  J-30  → Confirmer tous les prestataires\n"
                 . "  📌  J-15  → Finaliser le programme détaillé\n"
                 . "  📌  J-7   → Briefing équipe, vérification logistique\n"
                 . "  📌  J-1   → Répétition générale, installation\n"
                 . "  📌  Jour J → Accueil, animation, gestion en temps réel\n"
                 . "  📌  J+3   → Bilan, remerciements, retours participants\n\n"
                 . $sep . "\n⚡ Conseil : Configurez une clé Gemini valide dans .env pour un planning personnalisé.";
        }

        // Marketing / partage
        if (str_contains($lower, 'partage') || str_contains($lower, 'marketing') || str_contains($lower, 'communication')
            || str_contains($helpType, 'Partage') || str_contains($helpType, 'marketing')) {
            return "📢 STRATÉGIE DE COMMUNICATION\n$sep\n\n"
                 . "Pour toucher votre audience avec bienveillance :\n\n"
                 . "  📱  Réseaux sociaux\n"
                 . "      • Instagram : visuels apaisants, stories quotidiennes J-30\n"
                 . "      • Facebook : événement public, partage communautaire\n"
                 . "      • LinkedIn : si événement professionnel\n\n"
                 . "  📧  Email marketing\n"
                 . "      • Newsletter J-30, rappel J-7, confirmation J-1\n"
                 . "      • Objet accrocheur, visuel soigné, CTA clair\n\n"
                 . "  🤝  Bouche-à-oreille\n"
                 . "      • Partenariats avec associations locales\n"
                 . "      • Programme de parrainage (1 place offerte pour 3 inscrits)\n\n"
                 . "  🎨  Contenu visuel\n"
                 . "      • Palette de couleurs douces et naturelles\n"
                 . "      • Photos authentiques, témoignages participants\n\n"
                 . $sep . "\n⚡ Conseil : Configurez une clé Gemini valide dans .env pour une stratégie personnalisée.";
        }

        // Lieu / venue
        if (str_contains($lower, 'lieu') || str_contains($lower, 'salle') || str_contains($lower, 'espace')
            || str_contains($helpType, 'lieux') || str_contains($helpType, 'Lieux')) {
            return "🏛️ SUGGESTIONS DE LIEUX\n$sep\n\n"
                 . "Espaces qui respirent la sérénité :\n\n"
                 . "  🌿  Espaces naturels\n"
                 . "      • Jardins botaniques, parcs arborés\n"
                 . "      • Domaines viticoles, fermes pédagogiques\n"
                 . "      • Bords de lac ou de rivière\n\n"
                 . "  🏡  Lieux atypiques\n"
                 . "      • Lofts industriels rénovés\n"
                 . "      • Anciennes chapelles ou granges\n"
                 . "      • Rooftops avec vue panoramique\n\n"
                 . "  🧘  Centres dédiés au bien-être\n"
                 . "      • Centres de yoga et méditation\n"
                 . "      • Spas et centres de thalassothérapie\n"
                 . "      • Retraites spirituelles\n\n"
                 . "  ✅  Critères de sélection\n"
                 . "      • Accessibilité (transport, parking)\n"
                 . "      • Capacité adaptée (+20 % de marge)\n"
                 . "      • Équipements techniques disponibles\n\n"
                 . $sep . "\n⚡ Conseil : Configurez une clé Gemini valide dans .env pour des suggestions personnalisées.";
        }

        // Activités
        if (str_contains($lower, 'activit') || str_contains($helpType, 'activit') || str_contains($helpType, 'Activit')) {
            return "✨ IDÉES D'ACTIVITÉS BIEN-ÊTRE\n$sep\n\n"
                 . "Des moments qui nourrissent l'âme :\n\n"
                 . "  🧘  Ateliers corps & esprit\n"
                 . "      • Méditation guidée (20–30 min)\n"
                 . "      • Yoga doux ou Qi Gong\n"
                 . "      • Cohérence cardiaque & respiration\n\n"
                 . "  🎨  Ateliers créatifs\n"
                 . "      • Mandala & art-thérapie\n"
                 . "      • Écriture expressive & journaling\n"
                 . "      • Musique & sons thérapeutiques\n\n"
                 . "  🌱  Ateliers nature\n"
                 . "      • Bain de forêt (Shinrin-yoku)\n"
                 . "      • Jardinage thérapeutique\n"
                 . "      • Herboristerie & plantes médicinales\n\n"
                 . "  💬  Ateliers relationnels\n"
                 . "      • Cercles de parole bienveillants\n"
                 . "      • Communication non-violente\n"
                 . "      • Gratitude & ancrage positif\n\n"
                 . $sep . "\n⚡ Conseil : Configurez une clé Gemini valide dans .env pour des activités personnalisées.";
        }

        // Décoration
        if (str_contains($lower, 'décor') || str_contains($lower, 'decor') || str_contains($helpType, 'écor')) {
            return "🎨 IDÉES DE DÉCORATION\n$sep\n\n"
                 . "Une ambiance douce et apaisante :\n\n"
                 . "  🌿  Palette de couleurs\n"
                 . "      • Verts naturels, beiges, blancs cassés\n"
                 . "      • Touches de terracotta et de bois\n\n"
                 . "  🕯️  Éclairage\n"
                 . "      • Guirlandes lumineuses chaudes\n"
                 . "      • Bougies et lanternes\n"
                 . "      • Lumière naturelle privilégiée\n\n"
                 . "  🌸  Végétation\n"
                 . "      • Plantes vertes en pot\n"
                 . "      • Fleurs séchées et branches\n"
                 . "      • Mousse et fougères\n\n"
                 . "  🪨  Matières naturelles\n"
                 . "      • Lin, coton, jute pour les nappes\n"
                 . "      • Bois brut, pierre, céramique\n\n"
                 . $sep . "\n⚡ Conseil : Configurez une clé Gemini valide dans .env pour des idées personnalisées.";
        }

        // Restauration
        if (str_contains($lower, 'restaur') || str_contains($lower, 'repas') || str_contains($lower, 'traiteur')
            || str_contains($helpType, 'estaur') || str_contains($helpType, 'Restaur')) {
            return "🍽️ IDÉES DE RESTAURATION\n$sep\n\n"
                 . "Des saveurs qui nourrissent l'âme :\n\n"
                 . "  🥗  Buffet bien-être\n"
                 . "      • Salades composées colorées\n"
                 . "      • Bowls végétariens & vegan\n"
                 . "      • Jus frais & smoothies detox\n\n"
                 . "  🫖  Pause thé & infusions\n"
                 . "      • Sélection de thés du monde\n"
                 . "      • Infusions aux plantes médicinales\n"
                 . "      • Eaux aromatisées (concombre, menthe)\n\n"
                 . "  🍰  Douceurs saines\n"
                 . "      • Fruits de saison & compotes\n"
                 . "      • Gâteaux sans gluten & sans lactose\n"
                 . "      • Barres énergétiques maison\n\n"
                 . "  ✅  Conseils pratiques\n"
                 . "      • Indiquer les allergènes clairement\n"
                 . "      • Prévoir options végétariennes & vegan\n"
                 . "      • Favoriser les producteurs locaux\n\n"
                 . $sep . "\n⚡ Conseil : Configurez une clé Gemini valide dans .env pour des idées personnalisées.";
        }

        // Default — thèmes & idées générales
        return "🎯 IDÉES POUR VOTRE ÉVÉNEMENT BIEN-ÊTRE\n$sep\n\n"
             . "Basé sur votre demande : « " . mb_substr($input, 0, 80) . " »\n\n"
             . "🌿 THÈMES APAISANTS\n"
             . "  • Retraite de méditation & pleine conscience\n"
             . "  • Atelier gestion du stress et des émotions\n"
             . "  • Journée reconnexion à la nature\n"
             . "  • Cercle de parole & intelligence émotionnelle\n"
             . "  • Atelier confiance en soi & estime personnelle\n\n"
             . "🌸 STRUCTURE SUGGÉRÉE\n"
             . "  1. Accueil & ancrage (15 min)\n"
             . "  2. Présentation & intention (10 min)\n"
             . "  3. Atelier principal (60–90 min)\n"
             . "  4. Pause bien-être & collation (20 min)\n"
             . "  5. Intégration & partage (20 min)\n"
             . "  6. Clôture & ressources (15 min)\n\n"
             . "💡 CONSEILS CLÉS\n"
             . "  • Limitez à 20–30 participants pour une ambiance intime\n"
             . "  • Choisissez un lieu calme avec lumière naturelle\n"
             . "  • Prévoyez des pauses régulières\n"
             . "  • Créez un espace sécurisant et bienveillant\n\n"
             . $sep . "\n⚡ Conseil : Configurez une clé Gemini valide dans .env pour des conseils personnalisés à votre projet.";
    }
}
