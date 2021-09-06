<?php

namespace App\Domain\Resume\Presenter;

/**
 * Class CreatePostPresenter
 * @package App\Domain\Resume\Presenter
 */
class CreatePostPresenter extends AbstractEditPostPresenter implements CreatePostPresenterInterface
{
    /**
     * @inheritDoc
     */
    protected function getView(): string
    {
        return "Resume/create.html.twig";
    }
}