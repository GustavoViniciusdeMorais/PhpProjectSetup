<?php

namespace App\Core\BasicBundle\Controller;

use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;

class DefaultController extends AbstractFOSRestController
{
    /**
     * @Rest\Get("/im-alive", name="test_im_alive")
     */
    public function testImAlive()
    {
        return $this->json([
            "data" => "data"
        ]);
    }
}
