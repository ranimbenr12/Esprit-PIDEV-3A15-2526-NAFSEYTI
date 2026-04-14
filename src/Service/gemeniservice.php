<?php

namespace App\Service;

use Symfony\Component\HttpClient\HttpClient;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class GeminiService
{
    private HttpClientInterface $httpClient;
    private string $apiKey;
    private string $apiUrl;

    public function __construct(string $geminiApiKey)
    {
        $this->httpClient = HttpClient::create();
        $this->apiKey = $geminiApiKey;
        $this->apiUrl = 'https://generativelanguage.googleapis.com/v1beta/models/gemini-pro:generateContent';
    }

    /**
     * Analyse les réponses d'un utilisateur (version améliorée)
     */
    public function analyserReponses(array $questionsReponses, string $testTitre, ?array $emotionVisage = null): array
    {
        // Formater les questions/réponses pour le prompt
        $contenu = "";
        foreach ($questionsReponses as $index => $qr) {
            $contenu .= ($index + 1) . ". Question: " . $qr['question'] . "\n";
            $contenu .= "   Réponse: " . $qr['reponse'] . "\n\n";
        }

        $emotionTexte = "";
        if ($emotionVisage && isset($emotionVisage['emotion_detectee'])) {
            $emotionTexte = "\n\nAnalyse faciale détectée: L'utilisateur semble " . $emotionVisage['emotion_detectee'] . 
                           " (confiance: " . ($emotionVisage['confiance'] ?? 'N/A') . "%).";
        }

        $prompt = sprintf(
            "Tu es un psychologue expert. Analyse en détail les réponses suivantes d'un utilisateur au test '%s'.

%s%s

Fournit une analyse complète au format JSON avec les clés suivantes:
- analyse: Une analyse détaillée de 3-4 phrases sur le profil psychologique de l'utilisateur
- forces: Les forces principales détectées (tableau de 2-3 éléments)
- axes_amelioration: Les axes d'amélioration identifiés (tableau de 2-3 éléments)
- conseils: 3 conseils personnalisés pour l'utilisateur
- niveau_risque: 'normal', 'attention' ou 'critique'
- message_sos: (uniquement si niveau_risque est 'critique') Message d'urgence avec numéros utiles
- coherence_visage: (si émotion fournie) Corrélation entre l'émotion détectée et les réponses

Retourne UNIQUEMENT le JSON, sans texte avant ou après.",
            $testTitre,
            $contenu,
            $emotionTexte
        );

        $response = $this->generateResponse($prompt);
        
        // Nettoyer la réponse (enlever les éventuels backticks)
        $response = preg_replace('/^```json\s*|\s*```$/', '', $response);
        
        $data = json_decode($response, true);
        
        if (json_last_error() === JSON_ERROR_NONE) {
            // S'assurer que les champs requis existent
            return array_merge([
                'analyse' => 'Analyse en cours de traitement.',
                'forces' => [],
                'axes_amelioration' => [],
                'conseils' => [],
                'niveau_risque' => 'normal',
                'message_sos' => null,
                'coherence_visage' => null,
            ], $data);
        }
        
        // Fallback si l'API ne répond pas correctement
        return [
            'analyse' => 'Merci d\'avoir complété ce test. Votre score a été enregistré avec succès.',
            'forces' => ['Participation active', 'Honnêteté dans les réponses'],
            'axes_amelioration' => ['Continuer à explorer votre profil'],
            'conseils' => [
                'Prenez le temps de réfléchir à vos réponses',
                'Consultez nos ressources complémentaires',
                'Refaites ce test dans quelques mois pour suivre votre évolution'
            ],
            'niveau_risque' => 'normal',
            'message_sos' => null,
            'coherence_visage' => null,
        ];
    }

    /**
     * Détecte les mots critiques dans les réponses
     */
    public function detecterMotsCritiques(array $questionsReponses): bool
    {
        $motsCritiques = [
            'suicide', 'mort', 'mourir', 'finir ma vie', 'plus rien', 
            'désespoir', 'abandonner', 'souffrance intense', 'hopital'
        ];
        
        $motsCritiquesAr = [
            'انتحار', 'موت', 'يموت', 'ينهي حياته', 'مي', 'لا شيء', 'يأس'
        ];
        
        $motsCritiques = array_merge($motsCritiques, $motsCritiquesAr);
        
        foreach ($questionsReponses as $qr) {
            $reponse = strtolower($qr['reponse']);
            foreach ($motsCritiques as $mot) {
                if (str_contains($reponse, strtolower($mot))) {
                    return true;
                }
            }
        }
        
        return false;
    }

    private function generateResponse(string $prompt): string
    {
        try {
            $response = $this->httpClient->request('POST', $this->apiUrl . '?key=' . $this->apiKey, [
                'json' => [
                    'contents' => [
                        [
                            'parts' => [
                                ['text' => $prompt]
                            ]
                        ]
                    ]
                ]
            ]);

            $data = $response->toArray();
            
            if (isset($data['candidates'][0]['content']['parts'][0]['text'])) {
                return $data['candidates'][0]['content']['parts'][0]['text'];
            }

            return json_encode([
                'analyse' => 'Analyse non disponible pour le moment.',
                'forces' => [],
                'axes_amelioration' => [],
                'conseils' => ['Continuez à prendre soin de votre bien-être mental.'],
                'niveau_risque' => 'normal',
            ]);
            
        } catch (\Exception $e) {
            return json_encode([
                'analyse' => 'Service d\'analyse temporairement indisponible.',
                'forces' => [],
                'axes_amelioration' => [],
                'conseils' => ['Réessayez plus tard.'],
                'niveau_risque' => 'normal',
            ]);
        }
    }
}