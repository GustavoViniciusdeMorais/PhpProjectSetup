<?php

namespace App\Core\BasicBundle\Message;

use App\Core\BasicBundle\Message\SampleMessage;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
class SampleMessageHandler
{
    public function __invoke(SampleMessage $message)
    {
        print_r(json_encode([
            'inside handler: '.$message->getContent()
        ]));echo "\n\n";exit;
    }
}
