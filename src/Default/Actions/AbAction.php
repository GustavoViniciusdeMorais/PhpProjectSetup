<?php

namespace gustavo\vinicius\Default\Actions;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

abstract class AbAction
{
    protected $data;

    public function __invoke(Request $request, Response $response, $args = [])
    {
        $response->getBody()->write($this->execute());
        return $response;
    }

    public function withData($data)
    {
        $this->$data = $data;
        return $this;
    }

    abstract public function execute(): mixed;
}
