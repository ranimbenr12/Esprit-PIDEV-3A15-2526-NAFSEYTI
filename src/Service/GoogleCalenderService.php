<?php

namespace App\Service;

use Google\Client;
use Google\Service\Calendar;
use Google\Service\Calendar\Event;
use Google\Service\Calendar\EventDateTime;
use Symfony\Component\HttpFoundation\RequestStack;

class GoogleCalendarService
{
    private Client $client;

    public function __construct(
        private string $clientId,
        private string $clientSecret,
        private string $redirectUri,
        private RequestStack $requestStack
    ) {
        $this->client = new Client();
        $this->client->setClientId($clientId);
        $this->client->setClientSecret($clientSecret);
        $this->client->setRedirectUri($redirectUri);
        $this->client->addScope(Calendar::CALENDAR);
        $this->client->setAccessType('offline');
        $this->client->setPrompt('consent');
    }

    public function getAuthUrl(): string
    {
        return $this->client->createAuthUrl();
    }

    public function setAccessToken(array $token): void
    {
        $this->client->setAccessToken($token);
    }

    public function getClient(): Client
    {
        return $this->client;
    }

    public function fetchAccessToken(string $code): array
    {
        return $this->client->fetchAccessTokenWithAuthCode($code);
    }

    public function createEvent(
        array   $token,
        string  $summary,
        string  $description,
        string  $date,        // format: 'Y-m-d'
        string  $heureDebut,  // format: 'H:i:s'
        string  $heureFin,
        string  $type,        // 'en_ligne' ou 'Présentiel'
        string  $patientEmail = '',
        string  $psyEmail     = ''
    ): string {
        $this->client->setAccessToken($token);

        // Refresh si expiré
        if ($this->client->isAccessTokenExpired() && isset($token['refresh_token'])) {
            $newToken = $this->client->fetchAccessTokenWithRefreshToken($token['refresh_token']);
            $this->client->setAccessToken($newToken);
        }

        $service = new Calendar($this->client);

        $event = new Event();
        $event->setSummary($summary);
        $event->setDescription($description);

        // Location
        $location = $type === 'en_ligne' ? 'Consultation en ligne (visioconférence)' : 'Cabinet psychologique';
        $event->setLocation($location);

        // Dates
        $startDateTime = $date . 'T' . $heureDebut;
        $endDateTime   = $date . 'T' . $heureFin;

        $start = new EventDateTime();
        $start->setDateTime($startDateTime);
        $start->setTimeZone('Africa/Tunis');
        $event->setStart($start);

        $end = new EventDateTime();
        $end->setDateTime($endDateTime);
        $end->setTimeZone('Africa/Tunis');
        $event->setEnd($end);

        // Rappels
        $event->setReminders(new \Google\Service\Calendar\EventReminders([
            'useDefault' => false,
            'overrides'  => [
                ['method' => 'email',  'minutes' => 24 * 60],
                ['method' => 'popup',  'minutes' => 30],
            ],
        ]));

        // Attendees
        $attendees = [];
        if ($patientEmail) {
            $a = new \Google\Service\Calendar\EventAttendee();
            $a->setEmail($patientEmail);
            $attendees[] = $a;
        }
        if ($psyEmail) {
            $a = new \Google\Service\Calendar\EventAttendee();
            $a->setEmail($psyEmail);
            $attendees[] = $a;
        }
        if ($attendees) {
            $event->setAttendees($attendees);
        }

        // Couleur : bleu pour en ligne, vert pour présentiel
        $event->setColorId($type === 'en_ligne' ? '1' : '2');

        $createdEvent = $service->events->insert('primary', $event, [
            'sendUpdates' => 'all',
        ]);

        return $createdEvent->getId();
    }

    public function deleteEvent(array $token, string $eventId): void
    {
        $this->client->setAccessToken($token);
        if ($this->client->isAccessTokenExpired() && isset($token['refresh_token'])) {
            $this->client->setAccessToken(
                $this->client->fetchAccessTokenWithRefreshToken($token['refresh_token'])
            );
        }
        $service = new Calendar($this->client);
        try {
            $service->events->delete('primary', $eventId);
        } catch (\Exception) {
            // event peut déjà être supprimé
        }
    }
}