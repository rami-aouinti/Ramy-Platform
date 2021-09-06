<?php

namespace App\Domain\Resume\Handler;

use App\Domain\Resume\DataTransferObject\Comment;
use App\Domain\Resume\Form\FormationType;
use App\Infrastructure\Handler\AbstractHandler;
use Doctrine\ORM\EntityManagerInterface;

/**
 * Class CommentHandler
 * @package App\Domain\Resume\Handler
 */
class CommentHandler extends AbstractHandler
{
    /**
     * @var EntityManagerInterface
     */
    private EntityManagerInterface $entityManager;

    /**
     * CommentHandler constructor.
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
        return FormationType::class;
    }

    /**
     * @inheritDoc
     */
    protected function process($data): void
    {
        $this->entityManager->persist($data);
        $this->entityManager->flush();
    }

    /**
     * @inheritDoc
     */
    protected function getDataTransferObject(): object
    {
        return new Comment();
    }
}
