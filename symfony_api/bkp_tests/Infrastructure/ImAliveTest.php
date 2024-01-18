<?php

namespace App\Tests\Infrastructure;

use Liip\FunctionalTestBundle\Test\WebTestCase;

class ImAliveTest extends WebTestCase
{
    /** @test */
    public function testImAlive()
    {
        $client = $this->createClient();
        $client->request(
            'GET',
            '/im-alive'
        );
        $this->assertEquals(
            200,
            $client->getResponse()->getStatusCode()
        );
    }
}
