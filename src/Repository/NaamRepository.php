<?php

namespace App\Repository;

use App\Entity\Naam;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Naam|null find($id, $lockMode = null, $lockVersion = null)
 * @method Naam|null findOneBy(array $criteria, array $orderBy = null)
 * @method Naam[]    findAll()
 * @method Naam[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class NaamRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Naam::class);
    }

    // /**
    //  * @return Naam[] Returns an array of Naam objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('n')
            ->andWhere('n.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('n.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Naam
    {
        return $this->createQueryBuilder('n')
            ->andWhere('n.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
