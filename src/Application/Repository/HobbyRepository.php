<?php

namespace App\Application\Repository;

use App\Application\Entity\Hobby;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\QueryBuilder;
use Doctrine\ORM\Tools\Pagination\Paginator;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Hobby|null find($id, $lockMode = null, $lockVersion = null)
 * @method Hobby|null findOneBy(array $criteria, array $orderBy = null)
 * @method Hobby[]    findAll()
 * @method Hobby[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class HobbyRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Hobby::class);
    }

    /**
     * @return QueryBuilder
     */
    public function getPaginatedPosts(): QueryBuilder
    {
        return $this->createQueryBuilder("h")
            ->select([
                "h.id",
                "h.title",
                "h.publishedAt",
                "h.content",
                "h.image",
                "u.pseudo as pseudo"
            ])
            ->join("h.user", "u")
            ->groupBy("h.id")
            ;
    }
}
