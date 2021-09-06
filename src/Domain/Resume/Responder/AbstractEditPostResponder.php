<?php

namespace App\Domain\Resume\Responder;

use Symfony\Component\Form\FormView;

/**
 * Class AbstractEditPostResponder
 * @package App\Domain\Resume\Responder
 */
abstract class AbstractEditPostResponder
{
    /**
     * @var FormView
     */
    private FormView $form;

    /**
     * CreatePostResponder constructor.
     * @param FormView $form
     */
    public function __construct(FormView $form)
    {
        $this->form = $form;
    }

    /**
     * @return FormView
     */
    public function getForm(): FormView
    {
        return $this->form;
    }
}