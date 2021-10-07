<?php

namespace App\Repository;

use App\Entity\ProductCustomMapping;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ProductCustomMapping|null find($id, $lockMode = null, $lockVersion = null)
 * @method ProductCustomMapping|null findOneBy(array $criteria, array $orderBy = null)
 * @method ProductCustomMapping[]    findAll()
 * @method ProductCustomMapping[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProductCustomMappingRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ProductCustomMapping::class);
    }

    // /**
    //  * @return ProductCustomMapping[] Returns an array of ProductCustomMapping objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ProductCustomMapping
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
