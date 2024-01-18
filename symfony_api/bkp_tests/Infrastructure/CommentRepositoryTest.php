<?php

namespace App\Tests\Infrastructure;

use App\Core\CommentBundle\Domain\Entity\Comment;
use PHPUnit\Framework\TestCase;
use App\Core\CommentBundle\Infrastructure\Repository\CommentRepository;

class CommentRepositoryTest extends TestCase
{

    /**
     * @test
     */
    public function testSave()
    {
        // $comment = $this->getComment();
        // $repository = new CommentRepository();
        // $response = $repository->save($comment);
        // $this->assertEquals('test', $response->getComment());
    }

    private function getComment()
    {
        return new Comment('asdf-asdf', 'asdf-asdf', 'test');
    }
}
