<?php

namespace App\Domain\Resume\Paginator;

use App\Application\Repository\ExperienceRepository;
use App\Infrastructure\Representation\AbstractPaginator;
use App\Infrastructure\Representation\RepresentationBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class ResumePaginator
 * @package App\Domain\Resume\Paginator
 */
class ResumePaginator extends AbstractPaginator
{
    /**
     * @var ExperienceRepository
     */
    private ExperienceRepository $experienceRepository;

    /**
     * ResumePaginator constructor.
     * @param ExperienceRepository $experienceRepository
     */
    public function __construct(ExperienceRepository $experienceRepository)
    {
        $this->experienceRepository = $experienceRepository;
    }

    /**
     * @inheritDoc
     */
    public function build(RepresentationBuilderInterface $builder, array $options): void
    {
        $builder->setQueryBuilder($this->experienceRepository->getPaginatedPosts());
    }

    /**
     * @inheritDoc
     */
    public function configure(OptionsResolver $resolver): void
    {
        $resolver->setDefault("route", "index");
        $resolver->setDefault("field", "e.publishedAt");
        $resolver->setDefault("order", "desc");
    }
}
