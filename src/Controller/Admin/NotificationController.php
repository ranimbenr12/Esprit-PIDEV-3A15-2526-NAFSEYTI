<?php

namespace App\Controller\Admin;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;

class NotificationController extends AbstractController
{
    #[Route('/admin/notifications/page', name: 'admin_notifications_page', methods: ['GET'])]
    public function page(EntityManagerInterface $em): Response
    {
        $conn   = $em->getConnection();
        $unread = (int)$conn->executeQuery(
            "SELECT COUNT(*) FROM notifications WHERE user_id = 1 AND is_read = 0"
        )->fetchOne();

        return $this->render('back/events/Notification.html.twig', [
            'unread' => $unread,
        ]);
    }

    #[Route('/admin/notifications', name: 'admin_notifications_list', methods: ['GET'])]
    public function list(EntityManagerInterface $em): JsonResponse
    {
        $conn = $em->getConnection();

        $rows = $conn->executeQuery(
            "SELECT n.id, n.message, n.type, n.is_read, n.created_at, n.related_id
             FROM notifications n
             WHERE n.user_id = 1
             ORDER BY n.created_at DESC
             LIMIT 50"
        )->fetchAllAssociative();

        $unread = (int)$conn->executeQuery(
            "SELECT COUNT(*) FROM notifications WHERE user_id = 1 AND is_read = 0"
        )->fetchOne();

        return $this->json([
            'notifications' => $rows,
            'unread'        => $unread,
        ]);
    }

    #[Route('/admin/notifications/{id}/detail', name: 'admin_notifications_detail', methods: ['GET'])]
    public function detail(int $id, EntityManagerInterface $em): JsonResponse
    {
        $conn = $em->getConnection();

        // mark as read
        $conn->executeStatement("UPDATE notifications SET is_read = 1 WHERE id = :id", ['id' => $id]);

        $row = $conn->executeQuery(
            "SELECT
                n.id, n.message, n.is_read, n.created_at,
                u.id as user_id, u.firstname, u.lastname, u.email,
                u.phone_number, u.role as user_role, u.address,
                u.profile_photo, u.status as user_status,
                p.id as participation_id, p.participation_date,
                p.status as participation_status,
                e.id as event_id, e.title as event_title,
                e.event_date, e.location, e.max_participants,
                (SELECT COUNT(*) FROM participations WHERE event_id = e.id) as current_participants
             FROM notifications n
             JOIN participations p ON n.related_id = p.id
             JOIN users u ON p.user_id = u.id
             JOIN events e ON p.event_id = e.id
             WHERE n.id = :id",
            ['id' => $id]
        )->fetchAssociative();

        if (!$row) {
            return $this->json(['error' => 'Not found'], 404);
        }

        return $this->json($row);
    }

    #[Route('/admin/notifications/mark-all-read', name: 'admin_notifications_mark_all', methods: ['POST'])]
    public function markAllRead(EntityManagerInterface $em): JsonResponse
    {
        $em->getConnection()->executeStatement(
            "UPDATE notifications SET is_read = 1 WHERE user_id = 1"
        );
        return $this->json(['success' => true]);
    }

    /**
     * Send confirmation email to the participant.
     */
    #[Route('/admin/notifications/{id}/send-email', name: 'admin_notifications_send_email', methods: ['POST'])]
    public function sendEmail(int $id, EntityManagerInterface $em, MailerInterface $mailer): JsonResponse
    {
        $conn = $em->getConnection();

        $row = $conn->executeQuery(
            "SELECT u.email, u.firstname, u.lastname,
                    e.title as event_title, e.event_date, e.location,
                    p.participation_date, p.status as participation_status
             FROM notifications n
             JOIN participations p ON n.related_id = p.id
             JOIN users u ON p.user_id = u.id
             JOIN events e ON p.event_id = e.id
             WHERE n.id = :id",
            ['id' => $id]
        )->fetchAssociative();

        if (!$row) {
            return $this->json(['success' => false, 'error' => 'Notification introuvable'], 404);
        }

        $name      = trim(($row['firstname'] ?? '') . ' ' . ($row['lastname'] ?? ''));
        $eventDate = $row['event_date'] ? (new \DateTime($row['event_date']))->format('d/m/Y') : 'N/A';
        $partDate  = $row['participation_date'] ? (new \DateTime($row['participation_date']))->format('d/m/Y H:i') : 'N/A';

        $htmlBody = "
        <div style='font-family:Arial,sans-serif;max-width:600px;margin:0 auto;background:#f9f7f4;padding:30px;border-radius:15px;'>
            <div style='background:linear-gradient(to right,#285921,#3d7e33);padding:20px;border-radius:10px;margin-bottom:20px;'>
                <h2 style='color:white;margin:0;'>✅ Confirmation d'inscription</h2>
                <p style='color:rgba(255,255,255,.8);margin:5px 0 0;'>NAFSEYTI - Plateforme de bien-être</p>
            </div>
            <p style='font-size:16px;'>Bonjour <strong>{$name}</strong>,</p>
            <p>Votre inscription à l'événement suivant a été <strong style='color:#285921;'>confirmée</strong> :</p>
            <div style='background:white;border-radius:10px;padding:20px;margin:20px 0;border-left:4px solid #285921;'>
                <p><strong>🎉 Événement :</strong> {$row['event_title']}</p>
                <p><strong>📅 Date :</strong> {$eventDate}</p>
                <p><strong>📍 Lieu :</strong> {$row['location']}</p>
                <p><strong>🕐 Inscrit le :</strong> {$partDate}</p>
            </div>
            <p style='color:#5a6c5a;font-size:13px;'>Merci de votre confiance. Nous vous souhaitons une excellente expérience.</p>
            <p style='color:#5a6c5a;font-size:13px;'>L'équipe NAFSEYTI</p>
        </div>";

        try {
            $email = (new Email())
                ->from('noreply@nafseyti.com')
                ->to($row['email'])
                ->subject("✅ Confirmation d'inscription - {$row['event_title']}")
                ->html($htmlBody);

            $mailer->send($email);

            return $this->json(['success' => true, 'message' => "Email envoyé à {$row['email']}"]);
        } catch (\Exception $e) {
            return $this->json(['success' => false, 'error' => $e->getMessage()], 500);
        }
    }
}
