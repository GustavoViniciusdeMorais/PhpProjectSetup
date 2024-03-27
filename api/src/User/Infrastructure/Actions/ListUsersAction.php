<?php declare(strict_types=1);

namespace Gustavo\User\Infrastructure\Actions;

use Psr\Http\Message\ResponseInterface as Response;

class ListUsersAction extends UserAction
{
    /**
     * {@inheritdoc}
     */
    protected function action(): Response
    {
        $users = ["test"];

        $this->logger->info('Users list was viewed.');

        return $this->respondWithData($users);
    }
}