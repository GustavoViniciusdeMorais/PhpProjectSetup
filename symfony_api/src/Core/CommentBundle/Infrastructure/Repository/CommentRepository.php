<?php

namespace App\Core\CommentBundle\Infrastructure\Repository;

use App\Core\CommentBundle\Domain\Entity\Comment;
use App\Core\CommentBundle\Domain\Repository\CommentRepositoryInterface;

class CommentRepository implements CommentRepositoryInterface
{
    public function save(Comment $comment): Comment
    {
        return new Comment();
    }
}
