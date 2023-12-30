<?php

namespace App\Core\ProductBundle\Controller;

use FOS\RestBundle\Controller\AbstractFOSRestController;

class DefaultController extends AbstractFOSRestController
{

    /**
     * @Rest\Get("/test", name="test_route")
     */
    public function testRoute()
    {
    }
}
