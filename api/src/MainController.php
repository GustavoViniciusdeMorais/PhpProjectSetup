<?php

namespace Gustavomorais\Geobash;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class MainController
{
    public function index(Request $request, Response $response): Response
    {
        $response->getBody()->write(json_encode([
            'status' => 'success',
            'message' => 'Requisição realizada com sucesso.',
            'data' => [],
        ]));

        return $response->withHeader('Content-Type', 'application/json');
    }
}
