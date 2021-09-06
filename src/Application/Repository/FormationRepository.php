<?php

namespace App\Application\Repository;

use App\Application\Entity\Formation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\QueryBuilder;
use Doctrine\ORM\Tools\Pagination\Paginator;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Formation|null find($id, $lockMode = null, $lockVersion = null)
 * @method Formation|null findOneBy(array $criteria, array $orderBy = null)
 * @method Formation[]    findAll()
 * @method Formation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FormationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Formation::class);
    }

    /**
     * @return QueryBuilder
     */
    public function getPaginatedPosts(): QueryBuilder
    {
        return $this->createQueryBuilder("f")
            ->select([
                "f.id",
                "f.title",
                "f.publishedAt",
                "f.content",
                "f.image",
                "u.pseudo as pseudo"
            ])
            ->join("f.user", "u")
            ->groupBy("f.id")
            ;
    }
}
