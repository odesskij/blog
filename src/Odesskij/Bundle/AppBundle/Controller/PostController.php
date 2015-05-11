<?php
namespace Odesskij\Bundle\AppBundle\Controller;

use FOS\RestBundle\Controller\Annotations as Rest;
use Odesskij\Bundle\AppBundle\Entity\Post;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

/**
 * PostController.
 *
 * @author Vladimir Odesskij <odesskij1992@gmail.com>
 * @Rest\Route("/post")
 */
class PostController
{
    /**
     * @Rest\Put("/", name="post_create", defaults={"_format": "json"})
     * @Rest\View()
     */
    public function createAction(Post $post)
    {
        throw new AccessDeniedException();
        return $post;
    }

    /**
     * @Rest\Get("/{post}", name="post_read", defaults={"_format": "json"})
     * @Rest\View()
     */
    public function readAction(Post $post)
    {
        throw new AccessDeniedException();
        return $post;
    }

    /**
     * @Rest\Post("/", name="post_update", defaults={"_format": "json"})
     * @Rest\View()
     */
    public function updateAction(Post $post)
    {
        throw new AccessDeniedException();
        return $post;
    }

    /**
     * @Rest\Delete("/", name="post_delete", defaults={"_format": "json"})
     * @Rest\View()
     */
    public function deleteAction(Post $post)
    {
        throw new AccessDeniedException();
        return $post;
    }
}
