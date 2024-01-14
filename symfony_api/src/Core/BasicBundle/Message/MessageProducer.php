<?php

namespace App\Core\BasicBundle\Message;

use Symfony\Component\Messenger\MessageBusInterface;
use App\Core\BasicBundle\Message\SampleMessage;

class MessageProducer
{
    private $messageBus;

    public function __construct(MessageBusInterface $messageBus)
    {
        $this->messageBus = $messageBus;
    }

    public function produce(string $content): void
    {
        $message = new SampleMessage($content);
        $this->messageBus->dispatch($message);
    }
}
