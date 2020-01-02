<?php

namespace App\Repository;

use App\Entity\AGProject;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method AGProject|null find($id, $lockMode = null, $lockVersion = null)
 * @method AGProject|null findOneBy(array $criteria, array $orderBy = null)
 * @method AGProject[]    findAll()
 * @method AGProject[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AGProjectRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AGProject::class);
    }

    // /**
    //  * @return AGProject[] Returns an array of AGProject objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?AGProject
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
