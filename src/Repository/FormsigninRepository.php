<?php

namespace App\Repository;

use App\Entity\user;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<user>
 *
 * @method user|null find($id, $lockMode = null, $lockVersion = null)
 * @method user|null findOneBy(array $criteria, array $orderBy = null)
 * @method user[]    findAll()
 * @method user[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FormsigninRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, user::class);
    }

//    /**
//     * @return user[] Returns an array of user objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('f')
//            ->andWhere('f.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('f.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?user
//    {
//        return $this->createQueryBuilder('f')
//            ->andWhere('f.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
