<?php

namespace App\Repository;

use App\Entity\NotificationrendezVou;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class NotificationrendezVouRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, NotificationrendezVou::class);
    }

    public function findNonLues(int $userId): array
    {
        return $this->createQueryBuilder('n')
            ->where('n.destinataire = :uid')
            ->andWhere('n.lu = false')
            ->setParameter('uid', $userId)
            ->orderBy('n.createdAt', 'DESC')
            ->getQuery()
            ->getResult();
    }
}