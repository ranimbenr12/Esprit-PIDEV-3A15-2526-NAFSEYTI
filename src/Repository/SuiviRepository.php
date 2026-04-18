<?php
namespace App\Repository;

use App\Entity\Suivi;
use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class SuiviRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Suivi::class);
    }

    public function findAll(): array
    {
        return $this->createQueryBuilder('s')
            ->select('s')
            ->orderBy('s.idsuivi', 'DESC')
            ->getQuery()
            ->getResult();
    }

    public function rechercher(string $motCle): array
    {
        $qb = $this->createQueryBuilder('s')->select('s');
        if (is_numeric($motCle)) {
            $qb->where('s.idsuivi = :id')->setParameter('id', (int)$motCle);
        } else {
            $qb->where('s.titre LIKE :titre')->setParameter('titre', '%' . $motCle . '%');
        }
        return $qb->getQuery()->getResult();
    }

    public function findByUtilisateur(User $user): array
    {
        return $this->createQueryBuilder('s')
            ->select('s')
            ->where('s.utilisateur = :user')
            ->setParameter('user', $user)
            ->orderBy('s.idsuivi', 'DESC')
            ->getQuery()
            ->getResult();
    }

    // Recherche par ID brut — SQL natif, fonctionne sans FK Doctrine
    public function findByUtilisateurId(int $userId): array
    {
        $conn = $this->getEntityManager()->getConnection();
        $ids = $conn->fetchFirstColumn(
            'SELECT id_suivi FROM suivis WHERE id_utilisateur = ? ORDER BY id_suivi DESC',
            [$userId]
        );
        if (empty($ids)) return [];
        return $this->createQueryBuilder('s')
            ->where('s.idsuivi IN (:ids)')
            ->setParameter('ids', $ids)
            ->orderBy('s.idsuivi', 'DESC')
            ->getQuery()
            ->getResult();
    }

    // Recherche par ID brut — SQL natif, fonctionne sans FK Doctrine
    public function findByPsychologueId(int $psyId): array
    {
        $conn = $this->getEntityManager()->getConnection();
        $ids = $conn->fetchFirstColumn(
            'SELECT id_suivi FROM suivis WHERE id_psychologue = ? ORDER BY id_suivi DESC',
            [$psyId]
        );
        if (empty($ids)) return [];
        return $this->createQueryBuilder('s')
            ->where('s.idsuivi IN (:ids)')
            ->setParameter('ids', $ids)
            ->orderBy('s.idsuivi', 'DESC')
            ->getQuery()
            ->getResult();
    }

    public function countByType(): array
    {
        return $this->createQueryBuilder('s')
            ->select('s.type_suivi as type', 'COUNT(s.idsuivi) as count')
            ->groupBy('s.type_suivi')
            ->getQuery()
            ->getResult();
    }

    public function findWithObjectifs(int $id): ?Suivi
    {
        return $this->createQueryBuilder('s')
            ->leftJoin('s.objectifs', 'o')
            ->addSelect('o')
            ->where('s.idsuivi = :id')
            ->setParameter('id', $id)
            ->getQuery()
            ->getOneOrNullResult();
    }

    public function findWithAllRelations(int $id): ?Suivi
    {
        return $this->createQueryBuilder('s')
            ->leftJoin('s.objectifs', 'o')
            ->leftJoin('o.medias', 'm')
            ->addSelect('o', 'm')
            ->where('s.idsuivi = :id')
            ->setParameter('id', $id)
            ->getQuery()
            ->getOneOrNullResult();
    }
}
