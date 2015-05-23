<?php
namespace Odesskij\Bundle\AppBundle\Controller;

use FOS\RestBundle\Controller\Annotations as Rest;
use JMS\DiExtraBundle\Annotation as DI;
use Odesskij\Bundle\AppBundle\Entity\Post;
use Odesskij\Bundle\AppBundle\Entity\PostRepository;
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
     * @var PostRepository
     * @DI\Inject("odesskij_app.repo.post")
     */
    private $repository;

    /**
     * @Rest\Get("/list", name="post_list", defaults={"_format": "json"})
     * @Rest\View()
     */
    public function listAction()
    {
        return $this->repository->findAll();
    }

    /**
     * @Rest\Put("/", name="post_create", defaults={"_format": "json"})
     * @Rest\View()
     */
    public function createAction(
        Post $post
    ) {
        throw new AccessDeniedException();
        return $post;
    }

    /**
     * @Rest\Get("/{post}", name="post_read", defaults={"_format": "json"})
     * @Rest\View()
     */
    public function readAction(
        Post $post
    ) {
        throw new AccessDeniedException();
        return $post;
    }

    /**
     * @Rest\Post("/", name="post_update", defaults={"_format": "json"})
     * @Rest\View()
     */
    public function updateAction(
        Post $post
    ) {
        throw new AccessDeniedException();
        return $post;
    }

    /**
     * @Rest\Delete("/", name="post_delete", defaults={"_format": "json"})
     * @Rest\View()
     */
    public function deleteAction(
        Post $post
    ) {
        throw new AccessDeniedException();
        return $post;
    }
}
