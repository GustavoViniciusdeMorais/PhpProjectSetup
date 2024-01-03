<?php

namespace App\Tests\Application;

use Liip\FunctionalTestBundle\Test\WebTestCase;

class AddCommentToDataSetStoreHandlerTest extends WebTestCase
{

    /** @test */
    public function ItHandlesComment()
    {
        $request = file_get_contents(__DIR__ . '/AddCommentToDataSetStoreHandlerTest/request.json');
    }
}
