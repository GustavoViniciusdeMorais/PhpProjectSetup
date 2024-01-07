<?php

namespace App\Tests\Application;

use App\Core\CommentBundle\Domain\ValueObject\CommentUpsertedEvent;
use Liip\FunctionalTestBundle\Test\WebTestCase;
use App\Core\CommentBundle\Application\AddCommnetToDataStoreHandler;
use App\Core\CommentBundle\Domain\Entity\Comment;

class AddCommentToDataSetStoreHandlerTest extends WebTestCase
{

    /** @test */
    public function ItHandlesComment()
    {
        $request = file_get_contents(__DIR__ . '/AddCommentToDataSetStoreHandlerTest/request.json');
        $response = file_get_contents(__DIR__ . '/AddCommentToDataSetStoreHandlerTest/response.json');
        $request = json_decode($request, true);
        $response = json_decode($response, true);
        
        $comment = new Comment(
            $request['data']['userId'],
            $request['data']['topcId'],
            $request['data']['comment']
        );
        $event = new CommentUpsertedEvent($comment);
        $handler = new AddCommnetToDataStoreHandler();
        $this->assertEquals(
            $response['data']['comment'],
            $handler->handle($event)
        );
    }
}
