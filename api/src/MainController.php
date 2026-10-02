<?php

namespace Gustavomorais\Geobash;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Views\Twig;

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
        $twig = Twig::fromRequest($request);

        return $twig->render($response, 'dashboard.twig');
    }
}
