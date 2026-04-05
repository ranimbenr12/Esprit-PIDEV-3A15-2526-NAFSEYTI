<?php
namespace App\Repository;

use App\Entity\MediasObjectif;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class MediasObjectifRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MediasObjectif::class);
    }

    public function findByObjectif(int $idObjectif): array
    {
        return $this->createQueryBuilder('m')
            ->where('m.objectif = :objectifId')
            ->setParameter('objectifId', $idObjectif)
            ->orderBy('m.date_ajout', 'DESC')
            ->getQuery()
            ->getResult();
    }

    public function findAll(): array
    {
        return $this->createQueryBuilder('m')
            ->orderBy('m.date_ajout', 'DESC')
            ->getQuery()
            ->getResult();
    }

    public function findByType(string $typeMedia): array
    {
        return $this->createQueryBuilder('m')
            ->where('m.type_media = :type')
            ->setParameter('type', $typeMedia)
            ->getQuery()
            ->getResult();
    }

    public function deleteByObjectif(int $idObjectif): int
    {
        return $this->createQueryBuilder('m')
            ->delete()
            ->where('m.objectif = :objectifId')
            ->setParameter('objectifId', $idObjectif)
            ->getQuery()
            ->execute();
    }
}