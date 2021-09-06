<?php

namespace App\Domain\Resume\Presenter;

use App\Domain\Resume\Responder\ListingPostsResponder;
use Symfony\Component\HttpFoundation\Response;

/**
 * Interface PresenterInterface
 * @package App\Domain\Resume\Presenter
 */
interface ListingPostsPresenterInterface
{
    /**
     * @param ListingPostsResponder $responder
     * @return Response
     */
    public function present(ListingPostsResponder $responder): Response;
}
