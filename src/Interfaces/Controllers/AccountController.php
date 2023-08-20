<?php

namespace gustavo\vinicius\Interfaces\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use gustavo\vinicius\Infrastructure\Repositories\AccountRepository;
use gustavo\vinicius\Interfaces\Presenters\JsonResponder;
use gustavo\vinicius\UseCases\SearchAccount\SearchAccountInput;
use gustavo\vinicius\UseCases\SearchAccount\SearchAccountInteractor;

class AccountController
{
    public function findAll(Request $request, Response $response, $args = [])
    {
        // simple ddd controller function
        $repository = new AccountRepository();
        $accounts = $repository->findAll();
        $response->getBody()->write(
            JsonResponder::response($accounts)
        );
        return $response;
    }

    /**
     * Exampe of search with clean architecture pattern
     */
    public function findById(Request $request, Response $response, $args = [])
    {
        $result = false;
        $account = false;

        try {
            if (!empty($args['id'])) {
                $input = new SearchAccountInput($args['id']);
                $interactor = new SearchAccountInteractor();
                $output = $interactor->execute($input);
                $account = $output->account;
            }
    
            $result = JsonResponder::response($account);
        } catch (\Exception $e) {
            $result = json_encode(
                [
                    'status'=>'error',
                    'debug' => [
                        'error'=>$e->getMessage(),
                        'file'=>$e->getFile(),
                        'line'=>$e->getLine(),
                        'stack'=>$e->getTrace(),
                    ]
                ]
            );
        }

        $response->getBody()->write(
            $result
        );
        return $response;
    }
}
