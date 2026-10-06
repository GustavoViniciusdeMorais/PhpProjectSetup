<?php

use Dotenv\Dotenv;
use Gustavomorais\Geobash\Database\DatabaseConnection;
use Gustavomorais\Geobash\Http\Controllers\MainController;
use Slim\Factory\AppFactory;
use Slim\Views\Twig;
use Slim\Views\TwigMiddleware;

require __DIR__ . '/vendor/autoload.php';

Dotenv::createImmutable(__DIR__)->load();

// DatabaseConnection::boot();

$app = AppFactory::create();

$twig = Twig::create(__DIR__ . '/templates', ['cache' => false]);

$app->add(TwigMiddleware::create($app, $twig));

$app->get('/', [MainController::class, 'index']);
$app->get('/dashboard', [MainController::class, 'dashboard']);

$app->run();
