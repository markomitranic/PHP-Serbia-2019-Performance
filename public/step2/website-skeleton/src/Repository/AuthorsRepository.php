<?php

namespace App\Repository;

use App\Entity\Authors;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * Class AuthorsRepository
 * @package App\Repository
 */
class AuthorsRepository extends ServiceEntityRepository
{

    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Authors::class);
    }

    /**
     * @param \DateTime $from
     * @param \DateTime $to
     * @return Authors[]
     */
    public function getBornBetween(\DateTime $from, \DateTime $to)
    {
        return $this->createQueryBuilder('authors')
            ->andWhere('authors.birthdate >= :dateFrom')
            ->andWhere('authors.birthdate <= :dateTo')
            ->setParameter('dateFrom', $from)
            ->setParameter('dateTo', $to)
            ->getQuery()
            ->execute();
    }
}