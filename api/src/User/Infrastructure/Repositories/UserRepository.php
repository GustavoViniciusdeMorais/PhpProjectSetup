<?php

namespace Auth\Api\User\Infrastructure\Repositories;

use Auth\Api\Domains\User;
use Doctrine\ORM\EntityManagerInterface;
use Auth\Api\Common\Repositories\Repository;

class UserRepository implements Repository
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function findById(int $id): ?User
    {
        return $this->entityManager->find(User::class, $id);
    }

    public function findAll(): array
    {
        return $this->entityManager->getRepository(User::class)->findAll();
    }
}
