<?php
namespace App\Repository;

use App\Entity\Suivi;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class SuiviRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Suivi::class);
    }

    /**
     * Équivalent de : suiviService.selectAll()
     * @return Suivi[]
     */
    public function findAll(): array
    {
        return $this->createQueryBuilder('s')
            ->select('s')  // ✅ Ne charge PAS les relations automatiquement
            ->orderBy('s.idsuivi', 'DESC')
            ->getQuery()
            ->getResult();
    }

    /**
     * Équivalent de : suiviService.rechercher(String motCle)
     * @return Suivi[]
     */
    public function rechercher(string $motCle): array
    {
        $qb = $this->createQueryBuilder('s')
            ->select('s');  // ✅ Sélection explicite
        
        // Vérifier si c'est un nombre (ID)
        if (is_numeric($motCle)) {
            $qb->where('s.idsuivi = :id')
               ->setParameter('id', (int)$motCle);
        } else {
            $qb->where('s.titre LIKE :titre')
               ->setParameter('titre', '%' . $motCle . '%');
        }
        
        return $qb->getQuery()->getResult();
    }

    /**
     * Équivalent de : getObjectifsBySuivi (dans objectifService)
     * Recherche les suivis d'un utilisateur spécifique
     */
    public function findByUtilisateur(int $idUtilisateur): array
    {
        return $this->createQueryBuilder('s')
            ->select('s')
            ->where('s.idutilisateur = :userId')
            ->setParameter('userId', $idUtilisateur)
            ->orderBy('s.idsuivi', 'DESC')
            ->getQuery()
            ->getResult();
    }

    /**
     * Recherche les suivis d'un psychologue
     */
    public function findByPsychologue(int $idPsychologue): array
    {
        return $this->createQueryBuilder('s')
            ->select('s')
            ->where('s.idpsychologue = :psyId')
            ->setParameter('psyId', $idPsychologue)
            ->getQuery()
            ->getResult();
    }

    /**
     * Statistiques : nombre de suivis par type
     */
    public function countByType(): array
    {
        return $this->createQueryBuilder('s')
            ->select('s.type_suivi as type', 'COUNT(s.idsuivi) as count')
            ->groupBy('s.type_suivi')
            ->getQuery()
            ->getResult();
    }
    
    /**
     * ✅ NOUVELLE MÉTHODE : Récupérer un suivi avec ses objectifs (quand nécessaire)
     * Utilisez cette méthode uniquement quand vous avez besoin des objectifs
     */
    public function findWithObjectifs(int $id): ?Suivi
    {
        return $this->createQueryBuilder('s')
            ->leftJoin('s.objectifs', 'o')
            ->addSelect('o')  // Charge les objectifs uniquement ici
            ->where('s.idsuivi = :id')
            ->setParameter('id', $id)
            ->getQuery()
            ->getOneOrNullResult();
    }
    
    /**
     * ✅ NOUVELLE MÉTHODE : Récupérer un suivi avec ses objectifs ET médias
     * Utilisez avec précaution - peut être lourd
     */
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