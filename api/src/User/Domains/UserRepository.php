<?php declare(strict_types=1);

namespace Gustavo\User\Domains;

interface UserRepository
{
    /**
     * @return User[]
     */
    public function findAll(): array;
}
