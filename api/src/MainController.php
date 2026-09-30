<?php

namespace Gustavomorais\Geobash;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Gustavomorais\Geobash\TemplateRenderer;

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

    public function dashboard(Request $request, Response $response): Response
    {
        $renderer = new TemplateRenderer();

        $response->getBody()->write($renderer->render('dashboard'));

        return $response->withHeader('Content-Type', 'text/html');
    }
}
