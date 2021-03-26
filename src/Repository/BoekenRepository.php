<?php

namespace App\Repository;

use App\Entity\Boeken;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Boeken|null find($id, $lockMode = null, $lockVersion = null)
 * @method Boeken|null findOneBy(array $criteria, array $orderBy = null)
 * @method Boeken[]    findAll()
 * @method Boeken[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BoekenRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Boeken::class);
    }

    // /**
    //  * @return Boeken[] Returns an array of Boeken objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('b.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Boeken
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
