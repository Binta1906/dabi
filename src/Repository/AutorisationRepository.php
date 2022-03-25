<?php

namespace App\Repository;

use App\Entity\autorisation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method autorisation|null find($id, $lockMode = null, $lockVersion = null)
 * @method autorisation|null findOneBy(array $criteria, array $orderBy = null)
 * @method autorisation[]    findAll()
 * @method autorisation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AutorisationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, autorisation::class);
    }

    // /**
    //  * @return Autorisation[] Returns an array of Autorisation objects
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
    public function findOneBySomeField($value): ?Autorisation
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
