<?php

namespace App\Tests\Infrastructure;

use Liip\FunctionalTestBundle\Test\WebTestCase;

class GetArticlesTest extends WebTestCase
{
    public function testSearchArticleById()
    {
        $client = $this->createClient();
        $client->request(
            'GET',
            '/api/articles/1'
        );
        $this->assertEquals(
            200,
            $client->getResponse()->getStatusCode()
        );
        $this->assertJsonStringEqualsJsonString(
            $client->getResponse()->getContent(),
            file_get_contents(__DIR__ . '/Fixture/searchArticleResponse.json')
        );
    }
}
