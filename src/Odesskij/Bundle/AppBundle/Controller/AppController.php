<?php
namespace Odesskij\Bundle\AppBundle\Controller;

use FOS\RestBundle\Controller\Annotations as Rest;

/**
 * AppController.
 *
 * @author Vladimir Odesskij <odesskij1992@gmail.com>
 */
class AppController
{
    /**
     * @Rest\Get("/", name="index")
     * @Rest\View()
     */
    public function indexAction()
    {
        return [];
    }
}
