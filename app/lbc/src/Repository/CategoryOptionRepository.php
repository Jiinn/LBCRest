<?php

namespace App\Repository;

use App\Entity\CategoryOption;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CategoryOption|null find($id, $lockMode = null, $lockVersion = null)
 * @method CategoryOption|null findOneBy(array $criteria, array $orderBy = null)
 * @method CategoryOption[]    findAll()
 * @method CategoryOption[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CategoryOptionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CategoryOption::class);
    }

    // /**
    //  * @return CategoryOption[] Returns an array of CategoryOption objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?CategoryOption
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */

    public function findOption($search)
    {
        // return $this->createQueryBuilder('o')    
        // ->select('MATCH (`name`) AGAINST (:search IN BOOLEAN MODE) as `score`')
        // ->where(":search like concat('%',o.name,'%')")
        // ->orderBy("`name` = :search DESC,`score` DESC")
        // ->setParameter('search', $search)
        // // ->setParameter('name', "%o.name%")
        // ->getQuery()
        // ->getResult();

        $conn = $this->getEntityManager()->getConnection();

        $sql = "
            SELECT *, MATCH (`name`) AGAINST (:search IN BOOLEAN MODE) as `score` 
            FROM `category_option` 
            WHERE :search like concat('%',name,'%') 
            AND parent_option is not null 
            ORDER BY `name` = :search DESC, `score` DESC LIMIT 1";
            $stmt = $conn->prepare($sql);
            $stmt->executeQuery(['search' => $search]);

        // returns an array of arrays (i.e. a raw data set)
        return $stmt->fetchAll();
    }
}
