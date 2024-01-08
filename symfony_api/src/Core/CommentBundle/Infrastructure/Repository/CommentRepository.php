<?php

namespace App\Core\CommentBundle\Infrastructure\Repository;

use App\Core\CommentBundle\Domain\Entity\Comment;
use App\Core\CommentBundle\Domain\Repository\CommentRepositoryInterface;
use Doctrine\ORM\EntityRepository;

class CommentRepository extends EntityRepository implements CommentRepositoryInterface
{
    public function save(Comment $comment): Comment
    {
        $this->_em->persist($comment);
        $this->_em->flush();
        return new Comment();
    }
}
