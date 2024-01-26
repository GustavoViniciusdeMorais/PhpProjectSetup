<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Core\ArticleBundle\Domain\Entity\Article;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // create 3 products! Bam!
        // for ($i = 0; $i < 3; $i++) {
        //     $product = new Product();
        //     $product->setName('product '.$i);
        //     $product->setPrice(mt_rand(10, 100));
        //     $manager->persist($product);
        // }
        $manager = $this->createArticle($manager);
        $manager->flush();
    }

    public function createArticle($manager)
    {
        $article = new Article();
        $article->setTitle("Some title");
        $article->setContent("Some content");
        $article->setAuthor("John Doe");
        $article->setCreatedAt(new \DateTime("01-01-2024"));
        $article->setUpdatedAt(new \DateTime("01-01-2024"));
        $article->setDeletedAt(new \DateTime("01-01-2024"));
        $manager->persist($article);
        return $manager;
    }
}
