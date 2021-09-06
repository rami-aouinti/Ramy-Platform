<?php

namespace App\Domain\Resume\Controller;

use App\Infrastructure\Representation\RepresentationFactoryInterface;
use App\Domain\Resume\Paginator\ResumePaginator;
use App\Domain\Resume\Presenter\ListingPostsPresenterInterface;
use App\Domain\Resume\Responder\ListingPostsResponder;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class Listing
{
    /**
     * @param Request $request
     * @param RepresentationFactoryInterface $representationFactory
     * @param ListingPostsPresenterInterface $presenter
     * @return Response
     */
    public function __invoke(
        Request $request,
        RepresentationFactoryInterface $representationFactory,
        ListingPostsPresenterInterface $presenter
    ): Response {
        $representation = $representationFactory->create(ResumePaginator::class)->handleRequest($request);

        return $presenter->present(new ListingPostsResponder($representation->paginate()));
    }
}