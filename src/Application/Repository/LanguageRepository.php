<?php

namespace App\Application\Repository;

use App\Application\Entity\Language;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\QueryBuilder;
use Doctrine\ORM\Tools\Pagination\Paginator;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Language|null find($id, $lockMode = null, $lockVersion = null)
 * @method Language|null findOneBy(array $criteria, array $orderBy = null)
 * @method Language[]    findAll()
 * @method Language[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LanguageRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Language::class);
    }

    /**
     * @return QueryBuilder
     */
    public function getPaginatedPosts(): QueryBuilder
    {
        return $this->createQueryBuilder("l")
            ->select([
                "l.id",
                "l.title",
                "l.publishedAt",
                "l.content",
                "l.image",
                "u.pseudo as pseudo"
            ])
            ->join("l.user", "u")
            ->groupBy("l.id")
            ;
    }
}
