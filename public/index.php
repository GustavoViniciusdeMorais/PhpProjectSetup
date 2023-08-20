<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;
use Slim\Routing\RouteCollectorProxy;
use gustavo\vinicius\Interfaces\Controllers\AccountController;

require __DIR__ . '/../vendor/autoload.php';

$app = AppFactory::create();

$app->get('/', function (Request $request, Response $response, $args) {
    $response->getBody()->write("Gustavo Slim version 4");
    return $response;
});

$app->group('/api/v1', function(RouteCollectorProxy $group){
    $group->get('/accounts', [AccountController::class, 'findAll']);
}); // add middleware later ->add(new GroupMiddleware());


$app->run();
