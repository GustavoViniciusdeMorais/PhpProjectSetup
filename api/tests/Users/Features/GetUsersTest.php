<?php

namespace Gustavo\Tests\Users;

use Gustavo\Tests\MainTest;

class GetUsersTest extends MainTest
{
    public function testGetUsers()
    {
        $response = $this->makeRequest($this->url . '/api/users');
        $expectedResponse = __DIR__ . '/../Responses/GetUsersTest.json';
        $expectedResponse = json_decode(file_get_contents($expectedResponse));
        print_r(json_encode(['status' => 'success', 'data' => $response]));echo "\n\n";exit;
    }
}
