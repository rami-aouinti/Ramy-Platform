<?php

namespace App\Domain\Resume\Handler;

use App\Domain\Resume\DataTransferObject\Post;
use App\Domain\Resume\Form\ExperienceType;
use App\Infrastructure\Handler\AbstractHandler;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\UnitOfWork;

/**
 * Class PostHandler
 * @package App\Domain\Resume\Handler
 */
class PostHandler extends AbstractHandler
{
    /**
     * @var EntityManagerInterface
     */
    private EntityManagerInterface $entityManager;

    /**
     * PostHandler constructor.
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @inheritDoc
     */
    protected function getFormType(): string
    {
        return ExperienceType::class;
    }

    /**
     * @inheritDoc
     */
    protected function process($data): void
    {
        if ($this->entityManager->getUnitOfWork()->getEntityState($data) === UnitOfWork::STATE_NEW) {
            $this->entityManager->persist($data);
        }
        $this->entityManager->flush();
    }

    /**
     * @inheritDoc
     */
    protected function getDataTransferObject(): object
    {
        return new Post();
    }
}
