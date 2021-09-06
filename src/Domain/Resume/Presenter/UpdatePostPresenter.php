<?php

namespace App\Domain\Resume\Presenter;

/**
 * Class UpdatePostPresenter
 * @package App\Domain\Resume\Presenter
 */
class UpdatePostPresenter extends AbstractEditPostPresenter implements UpdatePostPresenterInterface
{
    /**
     * @inheritDoc
     */
    protected function getView(): string
    {
        return "Resume/create.html.twig";
    }
}