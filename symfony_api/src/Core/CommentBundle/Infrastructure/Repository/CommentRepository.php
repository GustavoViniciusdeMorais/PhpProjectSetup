<?php

namespace App\Core\CommentBundle\Infrastructure\Repository;

use App\Core\CommentBundle\Domain\Entity\Comment;
use App\Core\CommentBundle\Domain\Repository\CommentRepositoryInterface;
use Doctrine\ORM\EntityRepository;

class CommentRepository extends EntityRepository implements CommentRepositoryInterface
{
    public function findById(int $id): Comment
    {
        /** @var Comment */
        return $this->find($id);
    }

    public function save(Comment $comment): Comment
    {
        return new Comment();
    }
}
