<?php

namespace Auth\Api\Common\Application\Actions;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Auth\Api\Common\Repositories\Repository;

abstract class Action
{
    private $data;

    public function __construct(
        protected Repository $repository
    ) {
        $this->repository = $repository;
    }

    public function __invoke(Request $request, Response $response, array $args): Response
    {
        $result = $this->execute();
        $response->getBody()->write($result);
        return $response;
    }

    abstract public function execute();

    public function setData($data)
    {
        $this->data = $data;
        return $this;
    }

    public function getData()
    {
        return $this->data;
    }

    public function respond(
        $data = false,
        $message = "Something went wrong. More info in the logs."
    ) {
        return json_encode([
           "message" => $message,
           "data" => $data
        ]);
    }
}
