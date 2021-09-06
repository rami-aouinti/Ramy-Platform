<?php

namespace App\Application\Repository;

use App\Application\Entity\Project;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\QueryBuilder;
use Doctrine\ORM\Tools\Pagination\Paginator;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Project|null find($id, $lockMode = null, $lockVersion = null)
 * @method Project|null findOneBy(array $criteria, array $orderBy = null)
 * @method Project[]    findAll()
 * @method Project[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProjectRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Project::class);
    }

    /**
     * @return QueryBuilder
     */
    public function getPaginatedPosts(): QueryBuilder
    {
        return $this->createQueryBuilder("p")
            ->select([
                "p.id",
                "p.title",
                "p.publishedAt",
                "p.content",
                "p.image",
                "u.pseudo as pseudo"
            ])
            ->join("p.user", "u")
            ->groupBy("p.id")
            ;
    }
}
