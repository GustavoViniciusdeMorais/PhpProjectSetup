<?php declare(strict_types=1);

namespace Auth\Api\User\Domains;

use Auth\Api\Common\Repositories\Repository;
use stdClass;

class UserRepository implements Repository
{
    public function save(object $entity): object
    {
        return new stdClass();
    }

    public function find(object $entity): object
    {
        return new stdClass();
    }
}
