<?php

namespace App\Service;

use App\Entity\AlerteCritique;
use App\Entity\Test;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Log\LoggerInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use \DateTimeImmutable;  

class AlerteService
{
    public function __construct(
        private EntityManagerInterface $em,
        private MailerInterface $mailer,
        private LoggerInterface $logger,
        private string $adminEmail
    ) {}

    /**
     * Crée une alerte critique
     * @param User|null $user L'utilisateur concerné (peut être null si non connecté)
     * @param Test $test Le test passé
     * @param array $questionsReponses Les questions et réponses
     */
    public function creerAlerte(?User $user, Test $test, array $questionsReponses): void  // ← Ajoute ? avant User
    {
        // 1. Construire le résumé des réponses
        $resume = '';
        foreach ($questionsReponses as $qr) {
            $resume .= $qr['question'] . ': ' . $qr['reponse'] . "\n\n";
        }
   $existingAlerte = $this->em->getRepository(AlerteCritique::class)->findOneBy([
        'test' => $test,
        'utilisateur' => $user,
        'statut' => ['nouveau', 'en_cours'] // Évite de créer un doublon si déjà traité
    ]);

    if ($existingAlerte) {
        // Une alerte existe déjà, ne pas en créer une nouvelle
        return;
    }
        // 2. Créer l'alerte
        $alerte = new AlerteCritique();
        $alerte->setUtilisateur($user);  // $user peut être null
        $alerte->setTest($test);
        $alerte->setStatut('nouveau');
        $alerte->setReponsesResume($resume);
     $alerte->setCreatedAt(new \DateTime()); 

        $this->em->persist($alerte);
        $this->em->flush();

        // 3. Logger l'alerte
        $this->logger->warning('Alerte critique créée', [
            'alerte_id' => $alerte->getId(),
            'user_id' => $user?->getId(),
            'user_email' => $user?->getEmail(),
            'test_id' => $test->getId(),
            'test_titre' => $test->getTitre(),
        ]);

        // 4. Envoyer un email à l'admin
        try {
            $email = (new Email())
                ->from('noreply@nafseyti.com')
                ->to($this->adminEmail)
                ->subject('🚨 Alerte critique - Nafseyti')
                ->html($this->renderEmailContent($alerte, $user));

            $this->mailer->send($email);
        } catch (\Exception $e) {
            $this->logger->error('Erreur envoi email alerte: ' . $e->getMessage());
        }
    }

    private function renderEmailContent(AlerteCritique $alerte, ?User $user): string
    {
        $userInfo = $user ? 
            "{$user->getFirstname()} {$user->getLastname()} ({$user->getEmail()})" : 
            'Utilisateur non connecté (anonyme)';

        return "
            <h2>🚨 Nouvelle alerte critique</h2>
            <p><strong>Utilisateur:</strong> {$userInfo}</p>
            <p><strong>Test:</strong> {$alerte->getTest()->getTitre()}</p>
            <p><strong>Date:</strong> {$alerte->getCreatedAt()->format('d/m/Y H:i')}</p>
            <h3>Résumé des réponses:</h3>
            <pre>{$alerte->getReponsesResume()}</pre>
            <p><a href='https://ton-site.com/admin/alertes/{$alerte->getId()}'>Voir l'alerte</a></p>
        ";
    }
}