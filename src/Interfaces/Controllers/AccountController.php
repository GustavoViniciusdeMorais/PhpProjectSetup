<?php

namespace gustavo\vinicius\Interfaces\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use gustavo\vinicius\Infrastructure\Repositories\AccountRepository;
use gustavo\vinicius\Interfaces\Presenters\JsonResponder;

class AccountController
{
    public function findAll(Request $request, Response $response, $args = [])
    {
        $repository = new AccountRepository();
        $accounts = $repository->findAll();
        $response->getBody()->write(
            JsonResponder::response($accounts)
        );
        return $response;
    }
}
