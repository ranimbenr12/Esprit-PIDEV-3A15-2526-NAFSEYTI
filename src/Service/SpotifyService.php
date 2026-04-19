<?php

namespace App\Service;

use Symfony\Component\HttpClient\HttpClient;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Psr\Log\LoggerInterface;

class SpotifyService
{
    private HttpClientInterface $httpClient;
    private string $clientId;
    private string $clientSecret;
    private ?string $accessToken = null;
    private LoggerInterface $logger;

    public function __construct(
        string $spotifyClientId,
        string $spotifyClientSecret,
        LoggerInterface $logger
    ) {
        $this->httpClient   = HttpClient::create();
        $this->clientId     = $spotifyClientId;
        $this->clientSecret = $spotifyClientSecret;
        $this->logger       = $logger;
    }

    /**
     * Point d'entrée principal
     * Retourne des playlists selon le niveau de risque et le pourcentage
     */
    public function getPlaylistsSelonEtat(
        string $niveauRisque,
        int $percentage,
        string $langue = 'fr'
    ): array {
        try {
            $token = $this->getAccessToken();
            if (!$token) {
                return $this->getPlaylistsDefaut($niveauRisque);
            }

            // Choisir les mots-clés selon l'état
            $keywords = $this->getKeywords($niveauRisque, $percentage);

            $playlists = [];
            foreach ($keywords as $keyword) {
                $results = $this->searchPlaylists($keyword, 2);
                $playlists = array_merge($playlists, $results);
            }

            // Limiter à 4 playlists maximum
            $playlists = array_slice($playlists, 0, 4);

            if (empty($playlists)) {
                return $this->getPlaylistsDefaut($niveauRisque);
            }

            return [
                'success'   => true,
                'playlists' => $playlists,
                'message'   => $this->getMessage($niveauRisque),
                'emoji'     => $this->getEmoji($niveauRisque),
            ];

        } catch (\Exception $e) {
            $this->logger->error('SpotifyService erreur: ' . $e->getMessage());
            return $this->getPlaylistsDefaut($niveauRisque);
        }
    }

    /**
     * Obtenir le token d'accès via Client Credentials Flow
     * Pas besoin de connexion utilisateur — juste client_id + client_secret
     */
    private function getAccessToken(): ?string
    {
        if ($this->accessToken) {
            return $this->accessToken;
        }

        try {
            $response = $this->httpClient->request(
                'POST',
                'https://accounts.spotify.com/api/token',
                [
                    'headers' => [
                        // Authentification Basic : base64(client_id:client_secret)
                        'Authorization' => 'Basic ' . base64_encode(
                            $this->clientId . ':' . $this->clientSecret
                        ),
                        'Content-Type' => 'application/x-www-form-urlencoded',
                    ],
                    'body' => [
                        'grant_type' => 'client_credentials',
                    ],
                ]
            );

            $data = $response->toArray();
            $this->accessToken = $data['access_token'] ?? null;

            $this->logger->info('Spotify token obtenu avec succès');
            return $this->accessToken;

        } catch (\Exception $e) {
            $this->logger->error('Spotify token erreur: ' . $e->getMessage());
            return null;
        }
    }

    /**
     * Rechercher des playlists par mot-clé
     */
    private function searchPlaylists(string $keyword, int $limit = 2): array
    {
        $response = $this->httpClient->request(
            'GET',
            'https://api.spotify.com/v1/search',
            [
                'headers' => [
                    'Authorization' => 'Bearer ' . $this->accessToken,
                ],
                'query' => [
                    'q'     => $keyword,
                    'type'  => 'playlist',
                    'limit' => $limit,
                    // Marché tunisien
                    'market' => 'TN',
                ],
            ]
        );

        $data      = $response->toArray();
        $items     = $data['playlists']['items'] ?? [];
        $playlists = [];

        foreach ($items as $item) {
            if (!$item) continue;

            // Extraire les infos importantes
            $playlists[] = [
                'id'          => $item['id'],
                'name'        => $item['name'],
                'description' => $item['description'] ?? '',
                'url'         => $item['external_urls']['spotify'] ?? '#',
                'image'       => $item['images'][0]['url'] ?? null,
                'tracks'      => $item['tracks']['total'] ?? 0,
                'owner'       => $item['owner']['display_name'] ?? 'Spotify',
                // URI pour l'embed Spotify
                'embed_url'   => 'https://open.spotify.com/embed/playlist/' . $item['id'],
            ];
        }

        return $playlists;
    }

    /**
     * Mots-clés selon l'état psychologique
     */
    private function getKeywords(string $niveauRisque, int $percentage): array
    {
        return match ($niveauRisque) {
            'critique' => [
                'calming anxiety relief',
                'peaceful meditation healing',
                'gentle stress relief music',
            ],
            'attention' => [
                'stress relief relaxation',
                'mindfulness meditation music',
                'positive energy uplift',
            ],
            default => match (true) {
                $percentage >= 80 => [
                    'happy positive vibes',
                    'motivation energy boost',
                ],
                $percentage >= 60 => [
                    'feel good music',
                    'positive mindset',
                ],
                default => [
                    'relaxing calm music',
                    'mindfulness focus',
                ],
            },
        };
    }

    /**
     * Message affiché selon l'état
     */
    private function getMessage(string $niveauRisque): string
    {
        return match ($niveauRisque) {
            'critique'  => 'La musicothérapie peut vous aider à traverser ce moment difficile',
            'attention' => 'Ces playlists sont sélectionnées pour réduire votre stress',
            default     => 'La musique booste votre bien-être au quotidien',
        };
    }

    /**
     * Emoji selon l'état
     */
    private function getEmoji(string $niveauRisque): string
    {
        return match ($niveauRisque) {
            'critique'  => '🎵',
            'attention' => '🎶',
            default     => '🎸',
         }; 
    }

    /**
     * Fallback si Spotify indisponible
     */
    private function getPlaylistsDefaut(string $niveauRisque): array
    {
        $playlists = match ($niveauRisque) {
            'critique' => [
                [
                    'name'      => 'Anxiety Relief & Calm',
                    'url'       => 'https://open.spotify.com/playlist/4GqYFMJDgsMCYoXoGlpE8o',
                    'image'     => null,
                    'embed_url' => 'https://open.spotify.com/embed/playlist/4GqYFMJDgsMCYoXoGlpE8o',
                    'owner'     => 'Spotify',
                    'tracks'    => 50,
                ],
            ],
            'attention' => [
                [
                    'name'      => 'Stress Relief',
                    'url'       => 'https://open.spotify.com/playlist/37i9dQZF1DX3Ogo9pFvBkY',
                    'image'     => null,
                    'embed_url' => 'https://open.spotify.com/embed/playlist/37i9dQZF1DX3Ogo9pFvBkY',
                    'owner'     => 'Spotify',
                    'tracks'    => 50,
                ],
            ],
            default => [
                [
                    'name'      => 'Mood Booster',
                    'url'       => 'https://open.spotify.com/playlist/37i9dQZF1DX3rxVfibe1L0',
                    'image'     => null,
                    'embed_url' => 'https://open.spotify.com/embed/playlist/37i9dQZF1DX3rxVfibe1L0',
                    'owner'     => 'Spotify',
                    'tracks'    => 50,
                ],
            ],
        };

        return [
            'success'   => false,
            'playlists' => $playlists,
            'message'   => $this->getMessage($niveauRisque),
            'emoji'     => $this->getEmoji($niveauRisque),
        ];
    }
}