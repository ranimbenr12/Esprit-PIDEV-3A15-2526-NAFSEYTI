<?php

namespace App\Service;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class GeminiService
{
    private string $apiKey;
    private HttpClientInterface $httpClient;

    public function __construct(HttpClientInterface $httpClient, string $geminiApiKey)
    {
        $this->httpClient = $httpClient;
        $this->apiKey = $geminiApiKey;
    }

   public function analyserReponses(array $questionsReponses, string $testTitre, ?array $emotionVisage = null): array
{
    $prompt = "Tu es un psychologue bienveillant. Analyse les réponses suivantes à un test psychologique intitulé \"$testTitre\".\n\n";

    // Ajouter l'émotion si disponible
    if ($emotionVisage && $emotionVisage['success']) {
        $prompt .= "⚠️ IMPORTANT — Émotion détectée sur le visage de l'utilisateur AVANT le test : {$emotionVisage['label_fr']} ({$emotionVisage['score']}% de certitude).\n";
        $prompt .= "Tiens compte de cette émotion dans ton analyse.\n\n";
    }

    $prompt .= "Réponses de l'utilisateur :\n";
    foreach ($questionsReponses as $item) {
        $prompt .= "- Question : {$item['question']}\n";
        $prompt .= "  Réponse : {$item['reponse']}\n\n";
    }

    $prompt .= "\nRéponds en JSON uniquement sans markdown :\n";
    $prompt .= "1. 'analyse' : analyse bienveillante qui mentionne l'émotion du visage si disponible (3-4 phrases)\n";
    $prompt .= "2. 'conseils' : tableau de 3 conseils pratiques personnalisés\n";
    $prompt .= "3. 'niveau_risque' : 'normal', 'attention' ou 'critique'\n";
    $prompt .= "4. 'message_sos' : message d'aide si critique, sinon null\n";
    $prompt .= "5. 'coherence_visage' : si émotion détectée, dis si l'émotion du visage est cohérente avec les réponses (1 phrase), sinon null\n";

        try {
            $response = $this->httpClient->request('POST',
                'https://generativelanguage.googleapis.com/v1beta/models/gemini-1.5-flash:generateContent?key=' . $this->apiKey,
                [
                    'json' => [
                        'contents' => [
                            ['parts' => [['text' => $prompt]]]
                        ]
                    ]
                ]
            );

            $data = $response->toArray();
            $text = $data['candidates'][0]['content']['parts'][0]['text'] ?? '';

            // Nettoyer le JSON
            $text = preg_replace('/```json|```/', '', $text);
            $text = trim($text);

            $result = json_decode($text, true);

            if (!$result) {
                return $this->defaultResponse();
            }

            return $result;

        } catch (\Exception $e) {
            return $this->defaultResponse();
        }
    }

    // Détection locale des mots critiques (en plus de Gemini)
    public function detecterMotsCritiques(array $questionsReponses): bool
    {
        $motsCritiques = [
            'suicide', 'mourir', 'tuer', 'me tuer', 'me suicider',
            'je veux mourir', 'plus envie de vivre', 'en finir',
            'disparaître', 'disparaitre', 'me faire du mal',
            'automutilation', 'me blesser', 'sans issue', 'désespoir',
            'desespoir', 'sos', 'au secours', 'aide moi'
        ];

        foreach ($questionsReponses as $item) {
            $reponse = strtolower($item['reponse'] ?? '');
            foreach ($motsCritiques as $mot) {
                if (str_contains($reponse, $mot)) {
                    return true;
                }
            }
        }

        return false;
    }

    private function defaultResponse(): array
    {
        return [
            'analyse' => 'Merci d\'avoir complété ce test. Vos réponses ont été enregistrées.',
            'conseils' => [
                'Prenez soin de vous au quotidien.',
                'N\'hésitez pas à consulter un professionnel de santé.',
                'Parlez de vos ressentis à des personnes de confiance.'
            ],
            'niveau_risque' => 'normal',
            'message_sos' => null
        ];
    }
}