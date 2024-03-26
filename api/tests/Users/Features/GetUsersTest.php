<?php

namespace Gustavo\Tests\Users;

use Gustavo\Tests\MainTest;

class GetUsersTest extends MainTest
{
    public function testGetUsers()
    {
        $response = $this->client->request('GET', $this->url . '/api/articles');
        $content = json_decode($response->getBody()->getContents());
        $this->assertEquals('200', $response->getStatusCode());
    }
}
