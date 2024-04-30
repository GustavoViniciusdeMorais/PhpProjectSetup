<?php

namespace Auth\Api\Tests;

use PHPUnit\Framework\TestCase;

abstract class MainTest extends TestCase
{
    protected $url;

    public function setUp(): void
    {
        $this->url = 'http://localhost';
    }

    public function makeRequest($url, $method = 'GET', $params = array()) {
        $ch = curl_init();
    
        // Set cURL options
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    
        // Check if method is POST
        if ($method == 'POST') {
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params));
        } elseif ($method == 'GET' && !empty($params)) {
            // If method is GET and params are not empty, append params to URL
            $url .= '?' . http_build_query($params);
            curl_setopt($ch, CURLOPT_URL, $url);
        }
    
        // Execute cURL request
        $response = curl_exec($ch);
    
        // Check for errors
        if ($response === false) {
            echo 'cURL Error: ' . curl_error($ch);
        }
    
        // Close cURL session
        curl_close($ch);
    
        // Return response
        return $response;
    }
}
