<?php

namespace App\Notification;

use App\Entity\User;
use Symfony\Component\EventDispatcher\Attribute\AsEventListener;
use Symfony\Component\Mime\Email;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Security\Http\Event\LoginSuccessEvent;
use Twig\Environment;
use Symfony\Component\Mime\Address;

#[AsEventListener(event: LoginSuccessEvent::class)]
class LoginNotificationListener
{
    public function __construct(
        private MailerInterface $mailer,
        private Environment $twig
    ) {}

    public function __invoke(LoginSuccessEvent $event): void
{
    $user = $event->getUser();

    if (!$user instanceof User || !$user->getEmail()) {
        return;
    }

    try {
        $email = (new Email())
            ->from(new Address('ahmedkhlass9@gmail.com', 'Nafseyti'))
            ->to($user->getEmail())
            ->replyTo('ahmedkhlass9@gmail.com')
            ->priority(Email::PRIORITY_HIGH)
            ->subject('🔐 Nouvelle connexion à votre compte Nafseyti')
            ->html($this->twig->render('emails/login_notification.html.twig', [
                'user' => $user,
                'loginTime' => new \DateTime(),
                'ipAddress' => $event->getRequest()->getClientIp(),
            ]));

        // Small delay to ensure session is established
        sleep(1);

        
file_put_contents(
    __DIR__ . '/../../var/log/mail_debug.log',
    date('Y-m-d H:i:s') . ' - DSN IN USE: ' . $_ENV['MAILER_DSN'] . "\n",
    FILE_APPEND
);
        
        $this->mailer->send($email);

        file_put_contents(
            __DIR__ . '/../../var/log/mail_debug.log',
            date('Y-m-d H:i:s') . ' - Email sent successfully to: ' . $user->getEmail() . "\n",
            FILE_APPEND
        );
    } catch (\Exception $e) {
        file_put_contents(
            __DIR__ . '/../../var/log/mail_debug.log',
            date('Y-m-d H:i:s') . ' - ERROR: ' . $e->getMessage() . "\n" .
            date('Y-m-d H:i:s') . ' - TRACE: ' . $e->getTraceAsString() . "\n",
            FILE_APPEND
        );
    }
}
}
