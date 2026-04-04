<?php
namespace App\Repository;

use App\Entity\FicheConsultation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class FicheConsultationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, FicheConsultation::class);
    }

    public function findAllOrderedByDate(): array
    {
        return $this->createQueryBuilder('f')
            ->addSelect('r')
            ->leftJoin('f.rendezVous', 'r')
            ->orderBy('f.created_at', 'DESC')
            ->getQuery()
            ->getResult();
    }
}