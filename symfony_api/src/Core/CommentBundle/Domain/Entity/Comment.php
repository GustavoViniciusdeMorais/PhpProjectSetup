<?php

namespace App\Core\CommentBundle\Domain\Entity;

class Comment
{
    private $userId;
    private $topcId;
    private $comment;

    public function __construct(
        $userId = null,
        $topcId = null,
        $comment = null
    ) {
        $this->userId = $userId;
        $this->topcId = $topcId;
        $this->comment = $comment;
    }

    // Getter for userId
    public function getUserId() {
        return $this->userId;
    }

    // Setter for userId
    public function setUserId($userId) {
        $this->userId = $userId;
    }

    // Getter for topcId
    public function getTopcId() {
        return $this->topcId;
    }

    // Setter for topcId
    public function setTopcId($topcId) {
        $this->topcId = $topcId;
    }

    // Getter for comment
    public function getComment() {
        return $this->comment;
    }

    // Setter for comment
    public function setComment($comment) {
        $this->comment = $comment;
    }

}
