<?php

namespace App\Controller\Client;

use App\Service\QRCodeService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class QRCodeDialogController extends AbstractController
{
    #[Route('/events/{id}/qrcode', name: 'client_events_qrcode', methods: ['GET'])]
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

        // Build Google Maps URL — mirrors QRCodeService.generateGoogleMapsUrl()
        $mapsUrl = QRCodeService::generateGoogleMapsUrl($location);

        // Generate QR code as base64 PNG — mirrors QRCodeService.generateQRCode()
        $qrBase64 = QRCodeService::generateQRCode($mapsUrl);

        return $this->json([
            'title'    => $title,
            'location' => $location,
            'mapsUrl'  => $mapsUrl,
            'qrCode'   => $qrBase64,
        ]);
    }
}
