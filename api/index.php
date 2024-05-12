<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;
use DI\Container;
use Slim\Routing\RouteCollectorProxy;
use Auth\Api\User\Infrastructure\Actions\ListUsersAction;

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/config/bootstrap.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

$app = AppFactory::createFromContainer($container);

$app->get('/', function (Request $request, Response $response, $args) {
    $response->getBody()->write("Gustavo Slim version 4");
    return $response;
});

$app->group('/api', function(RouteCollectorProxy $group){
    $group->get('/users', ListUsersAction::class);
}); // add middleware later ->add(new GroupMiddleware());

$app->run();
