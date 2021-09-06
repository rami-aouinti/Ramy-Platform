<?php

namespace App\Domain\Resume\Presenter;

use App\Domain\Resume\Responder\ListingPostsResponder;
use App\Domain\Resume\Responder\ResponderInterface;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

/**
 * Class ListingPostsPresenter
 * @package App\Domain\Resume\Presenter
 */
class ListingPostsPresenter implements ListingPostsPresenterInterface
{
    /**
     * @var Environment
     */
    private Environment $twig;

    /**
     * ListingPostsPresenter constructor.
     * @param Environment $twig
     */
    public function __construct(Environment $twig)
    {
        $this->twig = $twig;
    }

    /**
     * @inheritDoc
     */
    public function present(ListingPostsResponder $responder): Response
    {
        return new Response($this->twig->render("Resume/index.html.twig", [
            "representation" => $responder->getRepresentation()
        ]));
    }
}
