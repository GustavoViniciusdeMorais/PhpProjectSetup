<?php

namespace App\Core\CommentBundle\Application;

use App\Core\CommentBundle\Domain\ValueObject\CommentUpsertedEvent;

class AddCommnetToDataStoreHandler
{
    public function handle(CommentUpsertedEvent $event)
    {
        return $event->getData()->getComment();
    }
}
