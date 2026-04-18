<?php

namespace App\Controller\Psycho;

use App\Service\QRCodeService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/psycho/evente')]
class QRCodeDialogController extends AbstractController
{
    #[Route('/qrcode/{id}', name: 'psycho_events_qrcode', methods: ['GET'])]
    public function qrcode(int $id, EntityManagerInterface $em): JsonResponse
    {
        $conn  = $em->getConnection();
        $event = $conn->executeQuery(
            "SELECT id, title, location FROM events WHERE id = :id",
            ['id' => $id]
        )->fetchAssociative();

        if (!$event) {
            return $this->json(['error' => 'Event not found'], 404);
        }

        $location = $event['location'] ?? '';
        $title    = $event['title']    ?? '';
        $mapsUrl  = QRCodeService::generateGoogleMapsUrl($location);

        // QR code is generated client-side via qrcode.js — no server-side image needed
        return $this->json([
            'title'    => $title,
            'location' => $location,
            'mapsUrl'  => $mapsUrl,
        ]);
    }
}
