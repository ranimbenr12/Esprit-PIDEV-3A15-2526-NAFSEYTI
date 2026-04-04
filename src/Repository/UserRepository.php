<?php

namespace App\Repository;

use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class UserRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, User::class);
    }

    /**
     * Retourne les utilisateurs dont le rôle est dans la liste donnée.
     * Ex: findByRoles(['psychologue', 'coach_vie'])
     *
     * @param string[] $roles
     * @return User[]
     */
    public function findByRoles(array $roles): array
    {
        return $this->createQueryBuilder('u')
            ->where('u.role IN (:roles)')
            ->setParameter('roles', $roles)
            ->orderBy('u.firstname', 'ASC')
            ->getQuery()
            ->getResult();
    }
}