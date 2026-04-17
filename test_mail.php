<?php
require "vendor/autoload.php";

use Symfony\Component\Mailer\Transport;
use Symfony\Component\Mailer\Mailer;
use Symfony\Component\Mime\Email;

$dsn = "smtp://sirineamri832%40gmail.com:uxponytcztmdszhf@smtp.gmail.com:587?encryption=tls&auth_mode=login";

try {
    $transport = Transport::fromDsn($dsn);
    $mailer = new Mailer($transport);

    $email = (new Email())
        ->from("sirineamri832@gmail.com")
        ->to("sirineamri832@gmail.com")
        ->subject("Test Symfony Mailer")
        ->text("Email de test fonctionne !");

    $mailer->send($email);
    echo "OK Email envoye avec succes\n";

} catch (\Exception $e) {
    echo "ERREUR : " . $e->getMessage() . "\n";
}
