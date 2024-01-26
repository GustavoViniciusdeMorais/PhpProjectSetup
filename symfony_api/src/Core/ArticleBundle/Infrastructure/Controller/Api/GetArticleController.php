<?php

namespace App\Core\ArticleBundle\Infrastructure\Controller\Api;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Core\ArticleBundle\Domain\Repository\ArticleRepositoryInterface;
use App\Core\ArticleBundle\Application\UseCase\GetArticleByCriteriaUseCase;
use Symfony\Component\HttpFoundation\Response;

/**
 * @Route("/api/articles/{id}", name="api_article", methods={"GET"})
 */
class GetArticleController extends AbstractController
{
    private ArticleRepositoryInterface $articleRepository;

    public function __construct(
        ArticleRepositoryInterface $articleRepository
    ){
        $this->articleRepository = $articleRepository;
    }

    public function __invoke(string $id): JsonResponse
    {
        $articleContract = new GetArticleByCriteriaUseCase($this->articleRepository);
        $article = $articleContract->setData(['id' => $id])->execute();
        $articleData = [
            'id' => $article->getId(),
            'title' => $article->getTitle(),
            'content' => $article->getContent(),
            'author' => $article->getAuthor(),
            'created_at' => $article->getCreatedAt()->format('Y-m-d H:i:s'),
            'updated_at' => $article->getUpdatedAt() ? $article->getUpdatedAt()->format('Y-m-d H:i:s') : null,
            'deleted_at' => $article->getDeletedAt() ? $article->getDeletedAt()->format('Y-m-d H:i:s') : null,
        ];

        return new JsonResponse(
            $articleData,
            Response::HTTP_OK
        );
    }
}
