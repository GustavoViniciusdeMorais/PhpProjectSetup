<?php declare(strict_types=1);

namespace Auth\Api\User\Infrastructure\Actions;

use Auth\Api\Common\Application\Actions\Action;

class ListUsersAction extends Action
{
    /**
     * {@inheritdoc}
     */
    public function execute()
    {
        return $this->respond(
            [
                'id' => 1,
                'name' => 'John',
            ],
            'Success!'
        );
    }
}
