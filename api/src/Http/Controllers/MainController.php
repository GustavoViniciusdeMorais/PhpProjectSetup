<?php

namespace Gustavomorais\Geobash\Http\Controllers;

use DateTimeImmutable;
use DateTimeZone;
use Gustavomorais\Geobash\Services\Gateway\BancoCentralApi;
use Gustavomorais\Geobash\Utils\Logger;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Views\Twig;
use Throwable;

class MainController
{
    public function __construct(
    ) {}

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
        try {
            $twig = Twig::fromRequest($request);

            return $twig->render(
                $response,
                'dashboard.twig',
                [
                    'dollarValue' => $this->resolveDollarValue(),
                    // 'dollarValue' => '0',
                ]
            );
        } catch (Throwable $e) {
            (new Logger())->write('dashboard', [
                'message' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
                'details' => $e->getTraceAsString(),
            ]);

            $response->getBody()->write(json_encode([
                'status' => 'error',
                'message' => 'Erro ao carregar o dashboard.',
                'data' => [],
            ]));

            return $response->withHeader('Content-Type', 'application/json')->withStatus(500);
        }
    }

    private function resolveDollarValue(): string
    {
        try {
            $today = (new DateTimeImmutable('26-09-2026', new DateTimeZone('America/Sao_Paulo')))->format('m-d-Y');

            return (new BancoCentralApi())->getDollarValue('09-22-2026', '09-22-2026') ?: '—';
        } catch (Throwable $e) {
            (new Logger())->write('dashboard', [
                'message' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
                'details' => $e->getTraceAsString(),
            ]);

            return '—';
        }
    }
}
