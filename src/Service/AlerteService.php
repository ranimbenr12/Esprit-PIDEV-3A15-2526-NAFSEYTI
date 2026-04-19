<?php

namespace App\Service;

use App\Entity\AlerteCritique;
use App\Entity\Test;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Log\LoggerInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

class AlerteService
{
    public function __construct(
        private EntityManagerInterface $em,
        private MailerInterface $mailer,
        private LoggerInterface $logger,
        private string $adminEmail
    ) {}

    public function creerAlerte(?User $user, Test $test, array $questionsReponses): void
    {
        // 1. Construire le résumé des réponses
        $resume = '';
        foreach ($questionsReponses as $qr) {
            $resume .= $qr['question'] . ': ' . $qr['reponse'] . "\n\n";
        }

        // 2. Vérifier doublon avec une vraie requête DQL (findOneBy ne supporte pas IN)
        $existingAlerte = $this->em->getRepository(AlerteCritique::class)
            ->createQueryBuilder('a')
            ->where('a.test = :test')
            ->andWhere('a.utilisateur ' . ($user ? '= :user' : 'IS NULL'))
            ->andWhere('a.statut IN (:statuts)')
            ->setParameter('test', $test)
            ->setParameter('statuts', ['nouveau', 'en_cours'])
            ->setMaxResults(1)
            ->getQuery()
            ->getOneOrNullResult();

        if ($user) {
            $existingAlerte = $this->em->getRepository(AlerteCritique::class)
                ->createQueryBuilder('a')
                ->where('a.test = :test')
                ->andWhere('a.utilisateur = :user')
                ->andWhere('a.statut IN (:statuts)')
                ->setParameter('test', $test)
                ->setParameter('user', $user)
                ->setParameter('statuts', ['nouveau', 'en_cours'])
                ->setMaxResults(1)
                ->getQuery()
                ->getOneOrNullResult();
        } else {
            $existingAlerte = $this->em->getRepository(AlerteCritique::class)
                ->createQueryBuilder('a')
                ->where('a.test = :test')
                ->andWhere('a.utilisateur IS NULL')
                ->andWhere('a.statut IN (:statuts)')
                ->setParameter('test', $test)
                ->setParameter('statuts', ['nouveau', 'en_cours'])
                ->setMaxResults(1)
                ->getQuery()
                ->getOneOrNullResult();
        }

        if ($existingAlerte) {
            $this->logger->info('Alerte déjà existante, pas de doublon créé', [
                'alerte_id' => $existingAlerte->getId(),
                'test_id'   => $test->getId(),
            ]);
            return;
        }

        // 3. Créer l'alerte
        $alerte = new AlerteCritique();
        $alerte->setUtilisateur($user);
        $alerte->setTest($test);
        $alerte->setStatut('nouveau');
        $alerte->setReponsesResume($resume);
        $alerte->setCreatedAt(new \DateTime());

        $this->em->persist($alerte);
        $this->em->flush();

        // 4. Logger
        $this->logger->warning('Alerte critique créée', [
            'alerte_id'   => $alerte->getId(),
            'user_id'     => $user?->getId(),
            'user_email'  => $user?->getEmail(),
            'test_id'     => $test->getId(),
            'test_titre'  => $test->getTitre(),
        ]);

        // 5. Email admin
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