<?php


namespace App\Domain\Resume\Controller;


use App\Application\Entity\Post;
use App\Application\Security\Voter\PostVoter;
use App\Domain\Resume\Handler\PostHandler;
use App\Infrastructure\Controller\AuthorizationTrait;
use App\Domain\Resume\Presenter\UpdatePostPresenterInterface;
use App\Domain\Resume\Responder\RedirectUpdatePostResponder;
use App\Domain\Resume\Responder\UpdatePostResponder;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class Update
{
    use AuthorizationTrait;

    /**
     * @param Request $request
     * @param Post $post
     * @param PostHandler $postHandler
     * @param UpdatePostPresenterInterface $presenter
     * @return Response
     */
    public function __invoke(
        Request $request,
        Post $post,
        PostHandler $postHandler,
        UpdatePostPresenterInterface $presenter
    ): Response {
        $this->denyAccessUnlessGranted(PostVoter::EDIT, $post);

        if($postHandler->handle($request, $post)) {
            return $presenter->redirect(new RedirectUpdatePostResponder($post));
        }

        return $presenter->present(new UpdatePostResponder($postHandler->createView()));
    }
}