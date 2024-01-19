<?php

namespace App\Core\ArticleBundle\Domain\Repository;

use App\Core\ArticleBundle\Domain\Entity\Article;

interface ArticleRepositoryInterface
{
    public function find($id, $lockMode = null, $lockVersion = null);

    public function save(Article $article): void;
}
