<?php

namespace App\Core\ProductBundle\Controller;

use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;

class DefaultController extends AbstractFOSRestController
{

    /**
     * @Rest\Get("/test", name="test_route")
     */
    public function testRoute()
    {
        return $this->json([
            "data" => "data"
        ]);
    }
}
