<?php

namespace App\Service;

use Symfony\Component\HttpClient\HttpClient;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Psr\Log\LoggerInterface;

class GeminiService
{
    private HttpClientInterface $httpClient;
    private string $apiKey;
    private string $apiUrl = 'https://openrouter.ai/api/v1/chat/completions';
    private LoggerInterface $logger;

    public function __construct(string $nafseytiAiKey, LoggerInterface $logger)
    {
        $this->httpClient = HttpClient::create();
        $this->apiKey     = trim( $nafseytiAiKey);
        $this->logger     = $logger;
    }

    public function analyserReponses(array $questionsReponses, string $testTitre, ?array $emotionVisage = null): array
    {
        if (empty($this->apiKey) || strlen($this->apiKey) < 20) {
            $this->logger->warning('GeminiService: clé OpenRouter manquante, fallback local.');
            return $this->getAnalysePersonnalisee($questionsReponses, $testTitre);
        }

        $contenu = "";
        foreach ($questionsReponses as $index => $qr) {
            $contenu .= "Q" . ($index + 1) . " : " . ($qr['question'] ?? '') . "\n";
            $contenu .= "→ Réponse : " . ($qr['reponse'] ?? '') . "\n\n";
        }

 $prompt = <<<PROMPT
Tu es un psychologue bienveillant analysant les résultats d'un test de bien-être mental appelé "$testTitre".
Tu travailles pour une plateforme tunisienne. Tous tes conseils et ressources doivent être adaptés à la Tunisie.

Voici les réponses EXACTES de l'utilisateur :

$contenu

En te basant UNIQUEMENT sur ces réponses spécifiques, rédige :
1. Une analyse personnalisée de 3-4 phrases qui mentionne des éléments concrets tirés des réponses
2. 3 conseils pratiques adaptés aux réponses, avec des ressources tunisiennes si nécessaire :
   - Ligne d'écoute Tunisie : 71 391 777 (Association Santé Mentale)
   - Urgences Tunisie : 190
   - CMSR (Centre de Médecine du Sport et de Réhabilitation) Tunis
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
                $this->apiUrl,
                [
                    'headers' => [
                        'Authorization' => 'Bearer ' . $this->apiKey,
                        'Content-Type'  => 'application/json',
                        'HTTP-Referer'  => 'https://nafseyti.tn',
                        'X-Title'       => 'Nafseyti',
                    ],
                    'json' => [
                  'model' => 'openrouter/auto',
                        'messages' => [
                            [
                                'role'    => 'system',
                                'content' => 'Tu es un psychologue clinicien bienveillant. Tu réponds toujours en JSON valide uniquement, sans aucun texte avant ou après.'
                            ],
                            [
                                'role'    => 'user',
                                'content' => $prompt
                            ]
                        ],
                        'temperature' => 0.7,
                        'max_tokens'  => 800,
                    ],
                    'timeout' => 30,
                ]
            );

            $statusCode = $response->getStatusCode();

            if ($statusCode !== 200) {
                $this->logger->error(
                    'OpenRouter HTTP error: ' . $statusCode,
                    ['body' => $response->getContent(false)]
                );
                return $this->getAnalysePersonnalisee($questionsReponses, $testTitre);
            }

            $data = $response->toArray();

            // OpenRouter/OpenAI : choices[0].message.content
            // DIFFÉRENT de Gemini qui avait : candidates[0].content.parts[0].text
            if (!isset($data['choices'][0]['message']['content'])) {
                $this->logger->error('OpenRouter: structure inattendue', $data);
                return $this->getAnalysePersonnalisee($questionsReponses, $testTitre);
            }

            $text = $data['choices'][0]['message']['content'];

            // Nettoyage backticks markdown
            $text = preg_replace('/^```(?:json)?\s*/i', '', $text);
            $text = preg_replace('/\s*```$/', '', $text);
            $text = trim($text);

            $result = json_decode($text, true);

            if (json_last_error() !== JSON_ERROR_NONE) {
                $this->logger->error('OpenRouter JSON invalide: ' . $text);
                return $this->getAnalysePersonnalisee($questionsReponses, $testTitre);
            }

            $this->logger->info('OpenRouter analyse reussie via Llama 3.3 70B');

            return [
                'analyse'       => $result['analyse']       ?? $this->getAnalysePersonnalisee($questionsReponses, $testTitre)['analyse'],
                'conseils'      => $result['conseils']       ?? $this->getDefaultConseils(),
                'niveau_risque' => $result['niveau_risque']  ?? 'normal',
                'message_sos'   => null,
            ];

        } catch (\Exception $e) {
            $this->logger->error('OpenRouter exception: ' . $e->getMessage());
            return $this->getAnalysePersonnalisee($questionsReponses, $testTitre);
        }
    }

    // ============================================================
    // FALLBACK LOCAL — inchangé, identique à ton code original
    // ============================================================
    private function getAnalysePersonnalisee(array $questionsReponses, string $testTitre): array
    {
        $motsPositifs  = ['bien', 'content', 'heureux', 'satisfait', 'bon', 'belle', 'positif', 'énergie', 'calme', 'serein'];
        $motsNegatifs  = ['stress', 'anxiété', 'anxieux', 'fatigué', 'fatigue', 'triste', 'tristesse', 'mal', 'difficile', 'inquiet', 'peur', 'seul', 'isolé'];

        $scorePositif  = 0;
        $scoreNegatif  = 0;
        $themes        = [];
        $reponsesTexte = [];

        foreach ($questionsReponses as $qr) {
            $reponse         = strtolower($qr['reponse'] ?? '');
            $reponsesTexte[] = $qr['reponse'] ?? '';

            foreach ($motsPositifs as $mot) {
                if (str_contains($reponse, $mot)) { $scorePositif++; $themes[] = $mot; }
            }
            foreach ($motsNegatifs as $mot) {
                if (str_contains($reponse, $mot)) { $scoreNegatif++; $themes[] = $mot; }
            }
        }

        $premiereReponse = $reponsesTexte[0] ?? '';
        $themes          = array_unique($themes);

        if ($scorePositif > $scoreNegatif) {
            $analyse = "Cher utilisateur de Nafseyti, vos réponses témoignent d'un état d'esprit globalement positif. ";
            if ($premiereReponse) {
                $analyse .= "Vous avez notamment mentionné \"" . mb_strimwidth($premiereReponse, 0, 60, '...') . "\". ";
            }
            $analyse .= "Continuez à entretenir cet équilibre au quotidien !";
        } elseif ($scoreNegatif > 0) {
            $analyse = "Cher utilisateur de Nafseyti, je perçois dans vos réponses quelques signaux qui méritent attention. ";
            if (in_array('stress', $themes) || in_array('anxiété', $themes)) {
                $analyse .= "Le stress ou l'anxiété que vous évoquez sont des ressentis importants à ne pas ignorer. ";
            } elseif (in_array('fatigue', $themes) || in_array('fatigué', $themes)) {
                $analyse .= "La fatigue que vous mentionnez peut affecter votre équilibre global. ";
            }
            $analyse .= "Prendre soin de vous est une priorité.";
        } else {
            $analyse = "Cher utilisateur de Nafseyti, merci d'avoir complété le test \"$testTitre\". Chaque étape de connaissance de soi est précieuse.";
        }

        $conseils = [];
        if (in_array('stress', $themes) || in_array('anxiété', $themes) || in_array('anxieux', $themes)) {
            $conseils[] = "🧘 Pratiquez la respiration abdominale : inspirez 4s, retenez 2s, expirez 6s";
        }
        if (in_array('fatigué', $themes) || in_array('fatigue', $themes)) {
            $conseils[] = "😴 Établissez une routine de sommeil fixe chaque jour";
        }
        if (in_array('triste', $themes) || in_array('seul', $themes)) {
            $conseils[] = "💬 Partagez vos ressentis avec un proche ou un professionnel";
        }
        if (empty($conseils)) {
            $conseils = [
                "🌿 Intégrez 20 minutes d'activité physique légère par jour",
                "📱 Revenez sur Nafseyti pour suivre votre progression",
                "🌟 Célébrez vos petites victoires du quotidien !",
            ];
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
            '🌟 Prenez 5 minutes par jour pour vous recentrer',
            '📱 Revenez régulièrement sur Nafseyti',
            '📖 Découvrez nos articles sur le bien-être mental',
        ];
    }

    public function detecterMotsCritiques(array $questionsReponses): bool
    {
        $motsCritiques = [
            'suicide', 'suicid', 'mort', 'mourir', 'finir ma vie', 'plus rien',
            'désespoir', 'abandonner', 'souffrance', 'me tuer', 'en finir',
            'plus envie de vivre', 'انتحار', 'موت', 'يموت', 'يأس',
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