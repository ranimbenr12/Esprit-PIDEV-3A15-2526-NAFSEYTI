<?php

namespace App\Service;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class FaceppService
{
    private string $apiKey;
    private string $apiSecret;
    private HttpClientInterface $httpClient;

    public function __construct(HttpClientInterface $httpClient, string $faceppApiKey, string $faceppApiSecret)
    {
        $this->httpClient   = $httpClient;
        $this->apiKey       = $faceppApiKey;
        $this->apiSecret    = $faceppApiSecret;
    }

    public function analyserEmotion(string $base64Image): array
    {
        try {
            // Enlever le header data:image/jpeg;base64,
            $imageData = preg_replace('/^data:image\/\w+;base64,/', '', $base64Image);

            $response = $this->httpClient->request('POST',
                'https://api-us.faceplusplus.com/facepp/v3/detect',
                [
                    'body' => [
                        'api_key'           => $this->apiKey, //les donnees d'authentification pour l'API Face++
                        'api_secret'        => $this->apiSecret,
                        'image_base64'      => $imageData,
                        'return_attributes' => 'emotion,gender,age',
                    ]
                ]
            );

            $data = $response->toArray();

            if (empty($data['faces'])) {
                return $this->defaultEmotion();
            }

            $attributes = $data['faces'][0]['attributes'];
            $emotions   = $attributes['emotion'];

            // Trouver l'émotion dominante
            arsort($emotions);
            $emotionDominante = array_key_first($emotions);// Récupérer le score de l'émotion dominante
            $scoreEmotion     = round($emotions[$emotionDominante]);// Arrondir le score à l'entier le plus proche

            return [
                'success'           => true,// Indique que l'analyse a réussi
                'emotion_dominante' => $emotionDominante,// L'émotion dominante détectée
                'score'             => $scoreEmotion,// Le score de l'émotion dominante
                'toutes_emotions'   => $emotions,
                'age'               => $attributes['age']['value'] ?? null,
                'genre'             => $attributes['gender']['value'] ?? null,
                'label_fr'          => $this->traduireEmotion($emotionDominante),// La traduction de l'émotion dominante
                'emoji'             => $this->emotionEmoji($emotionDominante),
            ];

        } catch (\Exception $e) {
            return $this->defaultEmotion();
        }
    }

    private function traduireEmotion(string $emotion): string
    {
        $map = [
            'happiness' => 'Bonheur',
            'sadness'   => 'Tristesse',
            'anger'     => 'Colère',
            'fear'      => 'Peur',
            'surprise'  => 'Surprise',
            'disgust'   => 'Dégoût',
            'neutral'   => 'Neutre',
        ];
        return $map[$emotion] ?? $emotion;
    }

    private function emotionEmoji(string $emotion): string
    {
        $map = [
            'happiness' => '😊',
            'sadness'   => '😢',
            'anger'     => '😠',
            'fear'      => '😨',
            'surprise'  => '😲',
            'disgust'   => '😞',
            'neutral'   => '😐',
        ];
        return $map[$emotion] ?? '😐'; // Retourne l'emoji par défaut si l'émotion n'est pas trouvée
    }

    private function defaultEmotion(): array
    {
        return [
            'success'           => false,
            'emotion_dominante' => 'neutral',
            'score'             => 0,
            'toutes_emotions'   => [],
            'label_fr'          => 'Non détectée',
            'emoji'             => '😐',
        ];
    }
}