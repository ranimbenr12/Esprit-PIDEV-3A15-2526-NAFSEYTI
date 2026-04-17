<?php

namespace App\Service;

use Symfony\Component\HttpClient\HttpClient;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Psr\Log\LoggerInterface;

class GeminiService
{
    private HttpClientInterface $httpClient;
    private string $apiKey;
    private string $apiUrl;
    private LoggerInterface $logger;

    public function __construct(string $geminiApiKey, LoggerInterface $logger)
    {
        $this->httpClient = HttpClient::create();
        $this->apiKey     = trim($geminiApiKey);
        // ✅ Modèle mis à jour (gemini-pro est déprécié)
        $this->apiUrl     = 'https://generativelanguage.googleapis.com/v1beta/models/gemini-2.0-flash:generateContent';
        $this->logger     = $logger;
    }

    public function analyserReponses(array $questionsReponses, string $testTitre, ?array $emotionVisage = null): array
    {
        // Vérifier si la clé API est configurée
        if (empty($this->apiKey) || strlen($this->apiKey) < 20) {
            $this->logger->warning('GeminiService: clé API manquante ou invalide, fallback local.');
            return $this->getAnalysePersonnalisee($questionsReponses, $testTitre);
        }

        // ✅ Construire un résumé détaillé des réponses
        $contenu = "";
        foreach ($questionsReponses as $index => $qr) {
            $contenu .= "Q" . ($index + 1) . " : " . ($qr['question'] ?? '') . "\n";
            $contenu .= "→ Réponse : " . ($qr['reponse'] ?? '') . "\n\n";
        }

        // ✅ Prompt enrichi et plus strict
        $prompt = <<<PROMPT
Tu es un psychologue bienveillant analysant les résultats d'un test de bien-être mental appelé "$testTitre".

Voici les réponses EXACTES de l'utilisateur :

$contenu

En te basant UNIQUEMENT sur ces réponses spécifiques (ne génère pas une réponse générique), rédige :
1. Une analyse personnalisée de 3-4 phrases qui mentionne des éléments concrets tirés des réponses
2. 3 conseils pratiques adaptés aux réponses
3. Un niveau de risque : "normal", "attention" ou "critique"

Critères niveau_risque :
- "critique" si l'utilisateur mentionne des idées suicidaires, automutilation, désespoir profond
- "attention" si stress élevé, anxiété marquée, troubles du sommeil sévères
- "normal" sinon

Réponds UNIQUEMENT en JSON valide, sans Markdown, sans backticks :
{
    "analyse": "Cher utilisateur de Nafseyti, [analyse basée sur SES réponses spécifiques]...",
    "conseils": ["conseil concret 1", "conseil concret 2", "conseil concret 3"],
    "niveau_risque": "normal"
}
PROMPT;

        try {
            $response = $this->httpClient->request(
                'POST',
                $this->apiUrl . '?key=' . $this->apiKey,
                [
                    'json' => [
                        'contents' => [
                            [
                                'parts' => [
                                    ['text' => $prompt]
                                ]
                            ]
                        ],
                        'generationConfig' => [
                            'temperature'     => 0.7,
                            'maxOutputTokens' => 800,
                        ],
                    ],
                    'timeout' => 30,
                ]
            );

            $statusCode = $response->getStatusCode();

            if ($statusCode !== 200) {
                $this->logger->error('GeminiService HTTP error: ' . $statusCode . ' — ' . $response->getContent(false));
                return $this->getAnalysePersonnalisee($questionsReponses, $testTitre);
            }

            $data = $response->toArray();

            if (!isset($data['candidates'][0]['content']['parts'][0]['text'])) {
                $this->logger->error('GeminiService: structure de réponse inattendue', $data);
                return $this->getAnalysePersonnalisee($questionsReponses, $testTitre);
            }

            $text = $data['candidates'][0]['content']['parts'][0]['text'];

            // ✅ Nettoyage robuste du JSON (Gemini ajoute parfois des backticks)
            $text = preg_replace('/^```(?:json)?\s*/i', '', $text);
            $text = preg_replace('/\s*```$/', '', $text);
            $text = trim($text);

            $result = json_decode($text, true);

            if (json_last_error() !== JSON_ERROR_NONE) {
                $this->logger->error('GeminiService JSON invalide: ' . $text);
                return $this->getAnalysePersonnalisee($questionsReponses, $testTitre);
            }

            return [
                'analyse'      => $result['analyse']      ?? $this->getAnalysePersonnalisee($questionsReponses, $testTitre)['analyse'],
                'conseils'     => $result['conseils']      ?? $this->getDefaultConseils(),
                'niveau_risque'=> $result['niveau_risque'] ?? 'normal',
                'message_sos'  => null,
            ];

        } catch (\Exception $e) {
            $this->logger->error('GeminiService exception: ' . $e->getMessage());
            return $this->getAnalysePersonnalisee($questionsReponses, $testTitre);
        }
    }

    /**
     * Fallback local enrichi — utilisé si Gemini est indisponible
     */
    private function getAnalysePersonnalisee(array $questionsReponses, string $testTitre): array
    {
        $motsPositifs = ['bien', 'content', 'heureux', 'satisfait', 'bon', 'belle', 'positif', 'énergie', 'calme', 'serein'];
        $motsNegatifs = ['stress', 'anxiété', 'anxieux', 'fatigué', 'fatigue', 'triste', 'tristesse', 'mal', 'difficile', 'inquiet', 'peur', 'seul', 'isolé'];

        $scorePositif = 0;
        $scoreNegatif = 0;
        $themes       = [];
        $reponsesTexte = [];

        foreach ($questionsReponses as $qr) {
            $reponse        = strtolower($qr['reponse'] ?? '');
            $reponsesTexte[] = $qr['reponse'] ?? '';

            foreach ($motsPositifs as $mot) {
                if (str_contains($reponse, $mot)) {
                    $scorePositif++;
                    $themes[] = $mot;
                }
            }
            foreach ($motsNegatifs as $mot) {
                if (str_contains($reponse, $mot)) {
                    $scoreNegatif++;
                    $themes[] = $mot;
                }
            }
        }

        // ✅ Analyse qui mentionne le contenu réel des réponses
        $premiereReponse = $reponsesTexte[0] ?? '';
        $themes          = array_unique($themes);

        if ($scorePositif > $scoreNegatif) {
            $analyse = "Cher utilisateur de Nafseyti, vos réponses témoignent d'un état d'esprit globalement positif. ";
            if ($premiereReponse) {
                $analyse .= "Vous avez notamment mentionné \"" . mb_strimwidth($premiereReponse, 0, 60, '...') . "\", ce qui reflète une bonne conscience de soi. ";
            }
            $analyse .= "Continuez à entretenir cet équilibre au quotidien !";
        } elseif ($scoreNegatif > 0) {
            $analyse = "Cher utilisateur de Nafseyti, je perçois dans vos réponses quelques signaux qui méritent attention. ";
            if (in_array('stress', $themes) || in_array('anxiété', $themes)) {
                $analyse .= "Le stress ou l'anxiété que vous évoquez sont des ressentis importants à ne pas ignorer. ";
            } elseif (in_array('fatigue', $themes) || in_array('fatigué', $themes)) {
                $analyse .= "La fatigue que vous mentionnez peut affecter votre équilibre global. ";
            }
            $analyse .= "Prendre soin de vous est une priorité, et chercher du soutien est un acte de courage.";
        } else {
            $analyse = "Cher utilisateur de Nafseyti, merci d'avoir complété le test \"$testTitre\". "
                . "Vos réponses ont été enregistrées avec attention. "
                . "Chaque étape de connaissance de soi est précieuse pour votre bien-être.";
        }

        // Conseils adaptés aux thèmes détectés
        $conseils = [];
        if (in_array('stress', $themes) || in_array('anxiété', $themes) || in_array('anxieux', $themes)) {
            $conseils[] = "🧘 Pratiquez la respiration abdominale : inspirez 4s, retenez 2s, expirez 6s — 5 fois par jour";
        }
        if (in_array('fatigué', $themes) || in_array('fatigue', $themes)) {
            $conseils[] = "😴 Établissez une routine de sommeil fixe : couchez-vous et levez-vous à la même heure chaque jour";
        }
        if (in_array('triste', $themes) || in_array('tristesse', $themes) || in_array('seul', $themes)) {
            $conseils[] = "💬 Partagez vos ressentis avec un proche de confiance ou un professionnel de santé";
        }
        if (in_array('inquiet', $themes) || in_array('peur', $themes)) {
            $conseils[] = "📓 Tenez un journal de vos pensées pour identifier les déclencheurs de votre inquiétude";
        }
        if (empty($conseils)) {
            $conseils[] = "🌿 Intégrez 20 minutes d'activité physique légère par jour pour booster votre bien-être";
            $conseils[] = "📱 Revenez sur Nafseyti pour suivre votre progression dans le temps";
            $conseils[] = "🌟 Célébrez vos petites victoires du quotidien, elles comptent !";
        }

        return [
            'analyse'       => $analyse,
            'conseils'      => array_slice($conseils, 0, 3),
            'niveau_risque' => $scoreNegatif >= 3 ? 'attention' : 'normal',
            'message_sos'   => null,
        ];
    }

    private function getDefaultConseils(): array
    {
        return [
            '🌟 Prenez 5 minutes par jour pour vous recentrer sur vous-même',
            '📱 Revenez régulièrement sur Nafseyti pour suivre votre évolution',
            '📖 Découvrez nos articles sur le bien-être mental',
        ];
    }

    public function detecterMotsCritiques(array $questionsReponses): bool
    {
        $motsCritiques = [
            'suicide', 'suicid', 'mort', 'mourir', 'finir ma vie', 'plus rien',
            'désespoir', 'abandonner', 'souffrance', 'hopital',
            'me tuer', 'en finir', 'plus envie de vivre',
            'انتحار', 'موت', 'يموت', 'يأس',
        ];

        foreach ($questionsReponses as $qr) {
            $reponse = strtolower($qr['reponse'] ?? '');
            foreach ($motsCritiques as $mot) {
                if (str_contains($reponse, strtolower($mot))) {
                    return true;
                }
            }
        }
        return false;
    }
}