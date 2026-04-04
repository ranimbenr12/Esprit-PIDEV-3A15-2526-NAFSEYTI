<?php

namespace App\Repository;

use App\Entity\RendezVou;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class RendezVouRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, RendezVou::class);
    }

    public function findAllOrderedByDate(): array
{
    return $this->createQueryBuilder('r')
        ->addSelect('u', 'm')
        ->leftJoin('r.user', 'u')
        ->leftJoin('r.medecin', 'm')
        ->orderBy('r.dateRendezVous', 'ASC')
        ->getQuery()
        ->getResult();
}
}