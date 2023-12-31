# Project Setup

### Route controllers
symfony_api/config/routes.yaml
```yaml
controllers:
    resource:
        path: '../src/Core/'
        namespace: App\Core
    type: attribute

kernel:
    resource: App\Kernel
    type: attribute
```

### Doctrine composer
symfony_api/composer.json
```
{
    "require": {
        "doctrine/orm": "^2.11.0",
        "doctrine/dbal": "^3.2"
    }
}
```

### Doctrine ORM at bundle
symfony_api/config/packages/doctrine.yaml
```
orm:
    Product:
        type: attribute
        is_bundle: false
        dir: '%kernel.project_dir%/src/Core/ProductBundle/Entity'
        prefix: 'App\Core\ProductBundle\Entity'
        alias: Product
```

### Migrate
```sh
php bin/console doctrine:migrations:migrate
```

### Seed database and check created data

```sh
composer require --dev orm-fixtures
```
symfony_api/src/DataFixtures/AppFixtures.php
```php
<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Core\ProductBundle\Entity\Product;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // create 20 products! Bam!
        for ($i = 0; $i < 3; $i++) {
            $product = new Product();
            $product->setName('product '.$i);
            $product->setPrice(mt_rand(10, 100));
            $manager->persist($product);
        }

        $manager->flush();
    }
}
```
```sh
php bin/console doctrine:fixtures:load
php bin/console dbal:run-sql 'SELECT * FROM product'
```
