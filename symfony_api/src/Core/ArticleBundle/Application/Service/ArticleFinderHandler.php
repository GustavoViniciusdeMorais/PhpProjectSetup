<?php

namespace App\Core\ArticleBundle\Application\Service;

use Symfony\Component\Messenger\Handler\MessageHandlerInterface;
use App\Core\ArticleBundle\Application\Model\FindArticleQuery;
use App\Core\ArticleBundle\Domain\Repository\ArticleRepositoryInterface;

class ArticleFinderHandler implements MessageHandlerInterface
{
    private ArticleRepositoryInterface $articleRepository;

    public function __construct(
        ArticleRepositoryInterface $articleRepository
    ) {
        $this->articleRepository = $articleRepository;
    }

    public function __invoke(FindArticleQuery $findArticleQuery): string
    {
        $articleId = $findArticleQuery->getArticleId();
        $article = $this->articleRepository->find($articleId);
        return json_encode($article);
    }
}
