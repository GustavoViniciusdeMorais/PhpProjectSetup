<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BaseController extends AbstractController
{
    #[Route('/check', name: 'blog_list')]
    public function list(): Response
    {
        return $this->json([
            "data" => "data"
        ]);
    }
}
