<?php

namespace App\Tests\Infrastructure;

use Liip\FunctionalTestBundle\Test\WebTestCase;

class GetCommentsTest extends WebTestCase
{
    public function testSearchCommentById()
    {
        $client = $this->createClient();
        $client->request(
            'GET',
            '/api/comment/1'
        );
        $this->assertEquals(
            200,
            $client->getResponse()->getStatusCode()
        );
        $this->assertJsonStringEqualsJsonString(
            $client->getResponse()->getContent(),
            file_get_contents(__DIR__ . '/Fixture/searchCommentResponse.json')
        );
    }
}
