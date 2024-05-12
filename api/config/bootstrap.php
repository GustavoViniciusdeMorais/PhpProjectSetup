<?php

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Setup;
use DI\ContainerBuilder;
use Auth\Api\Domains\User;
use Auth\Api\User\Infrastructure\Repositories\UserRepository;
use Auth\Api\Common\Repositories\Repository;
use Psr\Container\ContainerInterface;

require_once __DIR__ . '/../vendor/autoload.php';

// Load Slim settings
$settings = require __DIR__ . '/settings.php';

// Create a DI container
$containerBuilder = new ContainerBuilder();
$containerBuilder->addDefinitions([
    EntityManager::class => function () use ($settings) {
        $config = Setup::createXMLMetadataConfiguration([__DIR__ . '/../config'], false);
        $entityManager = EntityManager::create($settings['settings']['doctrine']['connection'], $config);

        // Associate repository with entity
        $entityManager->getConfiguration()
            ->getDefaultRepositoryClassName(User::class, UserRepository::class);

        return $entityManager;
    },
    Repository::class => function (ContainerInterface $container) {
        $entityManager = $container->get(EntityManager::class);
        return new UserRepository($entityManager);
    },
]);

$container = $containerBuilder->build();
