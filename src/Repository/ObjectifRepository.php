<?php
namespace App\Repository;

use App\Entity\Objectif;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class ObjectifRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Objectif::class);
    }

    /**
     * Équivalent de : objectifService.selectBySuivi(int idSuivi)
     * @return Objectif[]
     */
    public function findBySuivi(int $idSuivi): array
    {
        return $this->createQueryBuilder('o')
            ->where('o.suivi = :suiviId')
            ->setParameter('suiviId', $idSuivi)
            ->orderBy('o.date_creation', 'DESC')
            ->getQuery()
            ->getResult();
    }

    /**
     * Équivalent de : objectifService.selectAll()
     * @return Objectif[]
     */
    public function findAll(): array
    {
        return $this->createQueryBuilder('o')
            ->orderBy('o.date_creation', 'DESC')
            ->getQuery()
            ->getResult();
    }

    /**
     * Récupère uniquement les objectifs validés
     * @return Objectif[]
     */
    public function findValidatedBySuivi(int $idSuivi): array
    {
        return $this->createQueryBuilder('o')
            ->where('o.suivi = :suiviId')
            ->andWhere('o.valide = true')
            ->setParameter('suiviId', $idSuivi)
            ->orderBy('o.date_creation', 'DESC')
            ->getQuery()
            ->getResult();
    }

    /**
     * Récupère les objectifs en cours (non validés)
     * @return Objectif[]
     */
    public function findPendingBySuivi(int $idSuivi): array
    {
        return $this->createQueryBuilder('o')
            ->where('o.suivi = :suiviId')
            ->andWhere('o.valide = false')
            ->setParameter('suiviId', $idSuivi)
            ->orderBy('o.date_creation', 'DESC')
            ->getQuery()
            ->getResult();
    }

    /**
     * Recherche les objectifs échus (date échéance dépassée et non validés)
     * @return Objectif[]
     */
    public function findExpiredObjectives(): array
    {
        $now = new \DateTime();
        
        return $this->createQueryBuilder('o')
            ->where('o.date_echeance < :now')
            ->andWhere('o.valide = false')
            ->setParameter('now', $now)
            ->orderBy('o.date_echeance', 'ASC')
            ->getQuery()
            ->getResult();
    }

    /**
     * Statistiques : objectifs par statut (valide/non valide)
     * @return array
     */
    public function countByStatut(): array
    {
        return $this->createQueryBuilder('o')
            ->select('o.valide as statut', 'COUNT(o.idobjectif) as count')
            ->groupBy('o.valide')
            ->getQuery()
            ->getResult();
    }

    /**
     * Récupère un objectif avec ses médias associés
     * @return Objectif|null
     */
    public function findWithMedias(int $idObjectif): ?Objectif
    {
        return $this->createQueryBuilder('o')
            ->leftJoin('o.medias', 'm')
            ->addSelect('m')
            ->where('o.idobjectif = :id')
            ->setParameter('id', $idObjectif)
            ->getQuery()
            ->getOneOrNullResult();
    }

    /**
     * Compte le nombre d'objectifs pour un suivi donné
     * @return int
     */
    public function countBySuivi(int $idSuivi): int
    {
        return $this->createQueryBuilder('o')
            ->select('COUNT(o.idobjectif)')
            ->where('o.suivi = :suiviId')
            ->setParameter('suiviId', $idSuivi)
            ->getQuery()
            ->getSingleScalarResult();
    }

    /**
     * Récupère les objectifs avec échéance dans les 7 prochains jours
     * @return Objectif[]
     */
    public function findUpcomingObjectives(): array
    {
        $now = new \DateTime();
        $nextWeek = (new \DateTime())->modify('+7 days');
        
        return $this->createQueryBuilder('o')
            ->where('o.date_echeance BETWEEN :now AND :nextWeek')
            ->andWhere('o.valide = false')
            ->setParameter('now', $now)
            ->setParameter('nextWeek', $nextWeek)
            ->orderBy('o.date_echeance', 'ASC')
            ->getQuery()
            ->getResult();
    }
}