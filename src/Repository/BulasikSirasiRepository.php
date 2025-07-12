<?php

namespace App\Repository;

use App\Entity\BulasikSirasi;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<BulasikSirasi>
 */
class BulasikSirasiRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, BulasikSirasi::class);
    }

    //    /**
    //     * @return BulasikSirasi[] Returns an array of BulasikSirasi objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('b')
    //            ->andWhere('b.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('b.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?BulasikSirasi
    //    {
    //        return $this->createQueryBuilder('b')
    //            ->andWhere('b.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
