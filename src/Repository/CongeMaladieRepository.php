<?php

namespace App\Repository;

use App\Entity\CongeMaladie;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<CongeMaladie>
 */
class CongeMaladieRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CongeMaladie::class);
    }

    /**
     * Toutes les demandes en attente pour un psy
     */
    public function findEnAttenteByMedecin(int $medecinId): array
    {
        return $this->createQueryBuilder('c')
            ->where('c.medecin = :mid')
            ->andWhere('c.statut = :statut')
            ->setParameter('mid', $medecinId)
            ->setParameter('statut', 'en_attente')
            ->orderBy('c.createdAt', 'DESC')
            ->getQuery()
            ->getResult();
    }

    /**
     * Nombre de demandes en attente (pour le badge de notification psy)
     */
    public function countEnAttenteByMedecin(int $medecinId): int
    {
        return (int) $this->createQueryBuilder('c')
            ->select('COUNT(c.id)')
            ->where('c.medecin = :mid')
            ->andWhere('c.statut = :statut')
            ->setParameter('mid', $medecinId)
            ->setParameter('statut', 'en_attente')
            ->getQuery()
            ->getSingleScalarResult();
    }

    /**
     * Congés validés mais expirés (dateFin < aujourd'hui)
     * → utilisé par la commande d'archivage CRON
     */
    public function findExpires(): array
    {
        return $this->createQueryBuilder('c')
            ->where('c.statut = :statut')
            ->andWhere('c.dateFin < :today')
            ->setParameter('statut', 'valide')
            ->setParameter('today', new \DateTime('today'))
            ->getQuery()
            ->getResult();
    }
}