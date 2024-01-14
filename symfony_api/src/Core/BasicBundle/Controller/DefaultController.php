<?php

namespace App\Core\BasicBundle\Controller;

use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\HttpFoundation\Response;
use App\Core\BasicBundle\Message\SampleMessage;

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
     * @Rest\Get("/sample", name="sample_message")
     */
    public function sample(MessageBusInterface $bus): Response
    {
        $bus->dispatch(new SampleMessage('test message'));
        return new Response('Message sent to queue');
    }
}
