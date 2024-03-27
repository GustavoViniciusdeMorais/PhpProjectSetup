<?php
declare(strict_types=1);

use Gustavo\User\Infrastructure\Actions\ListUsersAction;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\App;
use Slim\Interfaces\RouteCollectorProxyInterface as Group;

return static function (App $app) {
    $app->get('/', function (Request $request, Response $response) {
        $response->getBody()->write('OK!');
        return $response;
    });

    $app->group('/api', function (Group $group) {
        $group->get('/users', ListUsersAction::class);
    });
};
