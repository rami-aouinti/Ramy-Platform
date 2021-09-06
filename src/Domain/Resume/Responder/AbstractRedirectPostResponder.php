<?php

namespace App\Domain\Resume\Responder;

use App\Application\Entity\Post;

/**
 * Class AbstractRedirectPostResponder
 * @package App\Domain\Resume\Responder
 */
class AbstractRedirectPostResponder
{
    /**
     * @var Post
     */
    private Post $post;

    /**
     * RedirectReadPostResponder constructor.
     * @param Post $post
     */
    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    /**
     * @return Post
     */
    public function getPost(): Post
    {
        return $this->post;
    }
}