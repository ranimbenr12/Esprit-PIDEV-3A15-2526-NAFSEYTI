<?php

namespace App\Service;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class RecaptchaService
{
    private string $secretKey;
    private HttpClientInterface $httpClient;
    private const RECAPTCHA_VERIFY_URL = 'https://www.google.com/recaptcha/api/siteverify';

    public function __construct(
        string $secretKey,
        HttpClientInterface $httpClient
    ) {
        $this->secretKey = $secretKey;
        $this->httpClient = $httpClient;
    }

    /**
     * Verify reCAPTCHA token with Google
     *
     * @param string $token The token from client-side reCAPTCHA
     * @param float $minScore Minimum score required (0.0-1.0) for reCAPTCHA v3, ignored for v2
     * @return array ['success' => bool, 'score' => float|null, 'error' => string|null]
     */
    public function verify(string $token, float $minScore = 0.5): array
    {
        try {
            $response = $this->httpClient->request('POST', self::RECAPTCHA_VERIFY_URL, [
                'body' => [
                    'secret' => $this->secretKey,
                    'response' => $token,
                ],
            ]);

            $data = $response->toArray();

            // Check if verification was successful
            if (!isset($data['success']) || !$data['success']) {
                $errors = $data['error-codes'] ?? ['unknown-error'];
                return [
                    'success' => false,
                    'score' => $data['score'] ?? null,
                    'error' => 'reCAPTCHA verification failed: ' . implode(', ', $errors),
                ];
            }

            // For reCAPTCHA v3, check the score
            if (isset($data['score']) && $data['score'] < $minScore) {
                return [
                    'success' => false,
                    'score' => $data['score'],
                    'error' => 'reCAPTCHA score too low: ' . $data['score'],
                ];
            }

            return [
                'success' => true,
                'score' => $data['score'] ?? null,
                'error' => null,
            ];
        } catch (\Exception $e) {
            return [
                'success' => false,
                'score' => null,
                'error' => 'Error verifying reCAPTCHA: ' . $e->getMessage(),
            ];
        }
    }
}
