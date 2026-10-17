<?php

use Dotenv\Dotenv;
use Gustavomorais\Geobash\Database\DatabaseConnection;
use Gustavomorais\Geobash\Http\Controllers\MainController;
use Gustavomorais\Geobash\Utils\Logger;
use Slim\Factory\AppFactory;
use Slim\Views\Twig;
use Slim\Views\TwigMiddleware;
use Throwable;

require __DIR__ . '/vendor/autoload.php';

Dotenv::createImmutable(__DIR__)->load();

try {
    DatabaseConnection::boot();
} catch (Throwable $e) {
    (new Logger())->write('database', [
        'message' => $e->getMessage(),
        'file' => $e->getFile(),
        'line' => $e->getLine(),
        'details' => $e->getTraceAsString(),
    ]);

    throw $e;
}

$app = AppFactory::create();

$twig = Twig::create(__DIR__ . '/templates', ['cache' => false]);

$app->add(TwigMiddleware::create($app, $twig));

$app->get('/', [MainController::class, 'index']);
$app->get('/dashboard', [MainController::class, 'dashboard']);

$app->run();
