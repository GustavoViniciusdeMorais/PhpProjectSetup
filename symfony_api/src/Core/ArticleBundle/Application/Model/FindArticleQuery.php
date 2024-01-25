<?php

namespace App\Core\ArticleBundle\Application\Model;

class FindArticleQuery
{
    private string $articleId;

    public function __construct(string $articleId)
    {
        $this->articleId = $articleId;
    }

    public function getArticleId(): string
    {
        return $this->articleId;
    }
}
