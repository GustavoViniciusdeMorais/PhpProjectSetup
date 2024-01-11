<?php

namespace App\Core\CommentBundle\Domain\Repository;

use App\Core\CommentBundle\Domain\Entity\Comment;

interface CommentRepositoryInterface
{
    public function save(Comment $comment): Comment;
    public function findById(int $id): Comment;
}
