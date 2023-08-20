<?php

namespace gustavo\vinicius\Infrastructure\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use gustavo\vinicius\Infrastructure\Repositories\PostRepository;
use gustavo\vinicius\Infrastructure\Responders\JsonResponder;

class PostController
{
    public function list(Request $request, Response $response, $args = [])
    {
        
        $postRepository = new PostRepository();
        $result = JsonResponder::response(
            $postRepository->all()
        );

        $response->getBody()->write($result);
        return $response;
    }
}
