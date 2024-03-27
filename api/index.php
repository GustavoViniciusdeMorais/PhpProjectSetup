<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;
use Slim\Factory\ServerRequestCreatorFactory;
use Slim\ResponseEmitter;

require_once __DIR__ . '/vendor/autoload.php';

$app = AppFactory::create();

// Register routes
$routes = require __DIR__ . '/../config/routes.php';
$routes($app);

// Run App & Emit Response
$response = $app->handle($request);
$response_emitter = new ResponseEmitter();
$response_emitter->emit($response);
