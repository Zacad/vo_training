<?php

namespace App\Repository;

use App\Entity\ProductEmbeddable;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ProductEmbeddable|null find($id, $lockMode = null, $lockVersion = null)
 * @method ProductEmbeddable|null findOneBy(array $criteria, array $orderBy = null)
 * @method ProductEmbeddable[]    findAll()
 * @method ProductEmbeddable[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProductEmbeddableRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ProductEmbeddable::class);
    }

    // /**
    //  * @return ProductEmbeddable[] Returns an array of ProductEmbeddable objects
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
    public function findOneBySomeField($value): ?ProductEmbeddable
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
