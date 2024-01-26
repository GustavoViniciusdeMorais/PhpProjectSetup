<?php

namespace App\Core\ArticleBundle\Application\UseCase;

use App\Core\ArticleBundle\Domain\Entity\Article;
use App\Core\ArticleBundle\Domain\Repository\ArticleRepositoryInterface;

class GetArticleByCriteriaUseCase
{
    private $data;
    private ArticleRepositoryInterface $articleRepository;

    public function __construct(
        ArticleRepositoryInterface $articleRepository
    ){
        $this->articleRepository = $articleRepository;
    }

    public function setData(array $data = [])
    {
        $this->data = $data;
        return $this;
    }

    public function execute(): Article
    {
        $article = new Article();
        if (!empty($this->data) && isset($this->data['id'])) {
            $article = $this->articleRepository->find($this->data['id']);
        }
        return $article;
    }
}
