<?php

namespace App\Core\CommentBundle\Infrastructure\Controller;

use App\Core\CommentBundle\Domain\Repository\CommentRepositoryInterface;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;

class CommentController extends AbstractFOSRestController
{
    // private $commentRepository;

    // public function __construct(CommentRepositoryInterface $commentRepository)
    // {
    //     $this->commentRepository = $commentRepository;
    // }

    // /**
    //  * @Rest\Get("/api/comment/{id}", name="search_comment_by_id")
    //  */
    // public function testImAlive($id = null)
    // {
    //     $comment = $this->commentRepository->findById($id);
    //     return $this->json($comment);
    // }
}
