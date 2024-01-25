<?php

namespace App\Core\ArticleBundle\Infrastructure\Controller\Api;

use Symfony\Component\Messenger\HandleTrait;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Core\ArticleBundle\Application\Model\FindArticleQuery;
use App\Core\ArticleBundle\Domain\Repository\ArticleRepositoryInterface;

/**
 * @Route("/api/articles/{id}", name="api_article", methods={"GET"})
 */
class GetArticleController extends AbstractController
{
    use HandleTrait;

    private ArticleRepositoryInterface $articleRepository;

    public function __construct(
        MessageBusInterface $messageBus,
        ArticleRepositoryInterface $articleRepository
    ){
        $this->messageBus = $messageBus;
        $this->articleRepository = $articleRepository;
    }

    public function __invoke(string $id): JsonResponse
    {
        // print_r(json_encode(['test']));echo "\n\n";exit;
        $article = $this->articleRepository->find($id);
        return JsonResponse::fromJsonString($article);
    }
}
