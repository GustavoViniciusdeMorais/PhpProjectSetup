<?php

namespace App\Core\BasicBundle\Controller;

use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use App\Core\BasicBundle\Message\MessageProducer;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

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

    /**
     * @Rest\Post("/api/sample", name="api_sample_message")
     */
    public function sample(Request $request, MessageProducer $producer): Response
    {
        $content = $request->getContent();
        $data = json_decode($content, true);
        $message = $data['message'] ?? 'default message';
        $producer->produce($message);

        return new Response('Message sent to queue');
    }
}
