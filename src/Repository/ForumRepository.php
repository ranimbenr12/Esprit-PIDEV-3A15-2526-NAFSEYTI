<?php

namespace App\Repository;

use App\Entity\Forum;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Forum>
 */
class ForumRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Forum::class);
    }

    // Récupérer tous les forums triés par date
    public function findAllOrderByDate(): array
    {
        return $this->createQueryBuilder('f')
            ->orderBy('f.dateCreation', 'DESC')
            ->getQuery()
            ->getResult();
    }

    // Récupérer les forums les plus actifs (avec le plus de posts)
    public function findMostActiveForums(int $limit = 5): array
    {
        return $this->createQueryBuilder('f')
            ->leftJoin('f.posts', 'p')
            ->groupBy('f.id')
            ->orderBy('COUNT(p.id)', 'DESC')
            ->setMaxResults($limit)
            ->getQuery()
            ->getResult();
    }

    // Rechercher des forums par titre
    public function searchByTitle(string $keyword): array
    {
        return $this->createQueryBuilder('f')
            ->where('f.titre LIKE :keyword')
            ->setParameter('keyword', '%' . $keyword . '%')
            ->orderBy('f.titre', 'ASC')
            ->getQuery()
            ->getResult();
    }

    // Compter le nombre total de forums
    public function countForums(): int
    {
        return $this->createQueryBuilder('f')
            ->select('COUNT(f.id)')
            ->getQuery()
            ->getSingleScalarResult();
    }

    // Récupérer les forums créés entre deux dates
    public function findByDateRange(\DateTime $startDate, \DateTime $endDate): array
    {
        return $this->createQueryBuilder('f')
            ->where('f.dateCreation BETWEEN :start AND :end')
            ->setParameter('start', $startDate)
            ->setParameter('end', $endDate)
            ->orderBy('f.dateCreation', 'DESC')
            ->getQuery()
            ->getResult();
    }
}