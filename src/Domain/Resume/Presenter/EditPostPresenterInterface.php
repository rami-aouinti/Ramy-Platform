<?php


namespace App\Domain\Resume\Presenter;

use App\Domain\Resume\Responder\AbstractEditPostResponder;
use App\Domain\Resume\Responder\AbstractRedirectPostResponder;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;

/**
 * Interface EditPostPresenterInterface
 * @package App\Domain\Resume\Presenter
 */
interface EditPostPresenterInterface
{
    /**
     * @param AbstractRedirectPostResponder $responder
     * @return RedirectResponse
     */
    public function redirect(AbstractRedirectPostResponder $responder): RedirectResponse;

    /**
     * @param AbstractEditPostResponder $responder
     * @return Response
     */
    public function present(AbstractEditPostResponder $responder): Response;
}