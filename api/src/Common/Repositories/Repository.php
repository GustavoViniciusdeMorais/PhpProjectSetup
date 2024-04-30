<?php

namespace Auth\Api\Common\Repositories;

interface Repository
{
    public function save(object $entity): object;
    public function find(object $entity): object;
}
