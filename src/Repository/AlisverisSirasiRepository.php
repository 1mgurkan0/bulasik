<?php

namespace App\Repository;

use App\Entity\AlisverisSirasi;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<AlisverisSirasi>
 */
class AlisverisSirasiRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AlisverisSirasi::class);
    }

    //    /**
    //     * @return AlisverisSirasi[] Returns an array of AlisverisSirasi objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('a')
    //            ->andWhere('a.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('a.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?AlisverisSirasi
    //    {
    //        return $this->createQueryBuilder('a')
    //            ->andWhere('a.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
