<?php

namespace App\Application\Repository;

use App\Application\Entity\Experience;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\QueryBuilder;
use Doctrine\ORM\Tools\Pagination\Paginator;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Experience|null find($id, $lockMode = null, $lockVersion = null)
 * @method Experience|null findOneBy(array $criteria, array $orderBy = null)
 * @method Experience[]    findAll()
 * @method Experience[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ExperienceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Experience::class);
    }

    /**
     * @return QueryBuilder
     */
    public function getPaginatedPosts(): QueryBuilder
    {
        return $this->createQueryBuilder("e")
            ->select([
                "e.id",
                "e.title",
                "e.publishedAt",
                "e.content",
                "e.image",
                "u.pseudo as pseudo"
            ])
            ->join("e.user", "u")
            ->groupBy("e.id")
            ;
    }
}
