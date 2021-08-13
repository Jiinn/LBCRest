<?php

namespace App\Repository;

use App\Entity\Product;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Product|null find($id, $lockMode = null, $lockVersion = null)
 * @method Product|null findOneBy(array $criteria, array $orderBy = null)
 * @method Product[]    findAll()
 * @method Product[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProductRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Product::class);
    }

    // /**
    //  * @return Product[] Returns an array of Product objects
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

    // /*
    // public function findOneBySomeField($value): ?Product
    // {
    //     return $this->createQueryBuilder('p')
    //         ->andWhere('p.exampleField = :val')
    //         ->setParameter('val', $value)
    //         ->getQuery()
    //         ->getOneOrNullResult()
    //     ;
    // }
    // */

    public function search($search)
    {
        return $this->createQueryBuilder('p')    
        ->leftJoin('p.productCategory', 'pc')
        ->leftJoin('p.option1', 'o')
        ->leftJoin('p.option2', 'oo')
        ->where(":search like concat('%',p.title,'%')")
        ->orWhere(":search like concat('%',p.content,'%')")
        ->orWhere(":search like concat('%',pc.name,'%')")
        ->orWhere(":search like concat('%',o.name,'%')")
        ->orWhere(":search like concat('%',oo.name,'%')")
        ->setParameter('search', $search)
        // ->setParameter('name', "%o.name%")
        ->getQuery()
        ->getResult();
    }
}
