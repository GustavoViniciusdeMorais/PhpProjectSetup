<?php

namespace Gustavo\Tests;

use PHPUnit\Framework\TestCase;
use GuzzleHttp\Client;

abstract class MainTest extends TestCase
{
    protected $client;
    protected $url;

    public function setUp(): void
    {
        $this->client = new Client();
        $this->url = 'http://localhost';
    }
}
