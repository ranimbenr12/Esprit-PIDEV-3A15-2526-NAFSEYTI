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
    // Dans RendezVouRepository.php

    public function searchByCriteria(string $search = '', string $statut = ''): array
    {
        $qb = $this->createQueryBuilder('r')
            ->leftJoin('r.medecin', 'm')
            ->addSelect('m');

        if ($search !== '') {
            $qb->andWhere(
                $qb->expr()->orX(
                    $qb->expr()->like('LOWER(m.firstname)', ':search'),
                    $qb->expr()->like('LOWER(m.lastname)', ':search'),
                    $qb->expr()->like('LOWER(r.type_seance)', ':search')
                )
            )->setParameter('search', '%' . strtolower($search) . '%');
        }

        if ($statut !== '') {
            $qb->andWhere('r.statut = :statut')
            ->setParameter('statut', $statut);
        }

        return $qb->orderBy('r.dateRendezVous', 'DESC')->getQuery()->getResult();
    }
}