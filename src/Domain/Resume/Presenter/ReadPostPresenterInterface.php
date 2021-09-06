<?php

namespace App\Domain\Resume\Presenter;

use App\Domain\Resume\Responder\ReadPostResponder;
use App\Domain\Resume\Responder\RedirectReadPostResponder;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;

/**
 * Interface ReadPostPresenterInterface
 * @package App\Domain\Resume\Presenter
 */
interface ReadPostPresenterInterface
{
    /**
     * @param RedirectReadPostResponder $responder
     * @return RedirectResponse
     */
    public function redirect(RedirectReadPostResponder $responder): RedirectResponse;

    /**
     * @param ReadPostResponder $responder
     * @return Response
     */
    public function present(ReadPostResponder $responder): Response;
}
