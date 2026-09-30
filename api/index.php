<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Gustavomorais\Geobash\MainController;
use Slim\Factory\AppFactory;

require __DIR__ . '/vendor/autoload.php';

$app = AppFactory::create();

$app->get('/', [MainController::class, 'index']);
$app->get('/dashboard', [MainController::class, 'dashboard']);

$app->run();
