<?php

namespace App\Repository;

use App\Entity\SIDNNummer;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method SIDNNummer|null find($id, $lockMode = null, $lockVersion = null)
 * @method SIDNNummer|null findOneBy(array $criteria, array $orderBy = null)
 * @method SIDNNummer[]    findAll()
 * @method SIDNNummer[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SIDNNummerRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SIDNNummer::class);
    }

    // /**
    //  * @return SIDNNummer[] Returns an array of SIDNNummer objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?SIDNNummer
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
