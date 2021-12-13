<?php

namespace App\Repository;

use App\Entity\PanierCommande;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PanierCommande|null find($id, $lockMode = null, $lockVersion = null)
 * @method PanierCommande|null findOneBy(array $criteria, array $orderBy = null)
 * @method PanierCommande[]    findAll()
 * @method PanierCommande[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PanierCommandeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PanierCommande::class);
    }

    // /**
    //  * @return PanierCommande[] Returns an array of PanierCommande objects
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
    public function findOneBySomeField($value): ?PanierCommande
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
