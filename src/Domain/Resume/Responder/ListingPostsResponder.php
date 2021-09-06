<?php

namespace App\Domain\Resume\Responder;

use App\Infrastructure\Representation\RepresentationInterface;

/**
 * Class ListingPostsResponder
 * @package App\Domain\Resume\Responder
 */
class ListingPostsResponder
{
    /**
     * @var RepresentationInterface
     */
    private RepresentationInterface $representation;

    /**
     * ListingPostsResponder constructor.
     * @param RepresentationInterface $representation
     */
    public function __construct(RepresentationInterface $representation)
    {
        $this->representation = $representation;
    }

    /**
     * @return RepresentationInterface
     */
    public function getRepresentation(): RepresentationInterface
    {
        return $this->representation;
    }
}
