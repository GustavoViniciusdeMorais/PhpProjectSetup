<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;
use DI\Container;
use Slim\Routing\RouteCollectorProxy;
use Auth\Api\User\Infrastructure\Actions\ListUsersAction;
use Auth\Api\Common\Repositories\Repository;
use Auth\Api\User\Domains\UserRepository;

require_once __DIR__ . '/vendor/autoload.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

// Create PHP-DI container and set dependencies
$container = new Container();
$container->set(Repository::class, function ($container) {
    return new UserRepository();
});

AppFactory::setContainer($container);
$app = AppFactory::create();

$app->get('/', function (Request $request, Response $response, $args) {
    $response->getBody()->write("Gustavo Slim version 4");
    return $response;
});

$app->group('/api', function(RouteCollectorProxy $group){
    $group->get('/users', ListUsersAction::class);
}); // add middleware later ->add(new GroupMiddleware());

$app->run();
