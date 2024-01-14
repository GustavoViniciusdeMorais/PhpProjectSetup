Sure, let's create a simple example of a Symfony post route with a controller that saves data to the database. For this example, we'll use Symfony's ORM (Doctrine) to interact with the database.

### Step 1: Install Symfony and Doctrine

```bash
composer create-project symfony/skeleton my_symfony_project
cd my_symfony_project
composer require symfony/orm-pack
composer require symfony/maker-bundle --dev
```

### Step 2: Create an Entity

Create a `Product` entity:

```bash
php bin/console make:entity
```

Follow the prompts and create a `Product` entity with properties like `name`, `price`, etc.

### Step 3: Run Migrations

```bash
php bin/console doctrine:migrations:diff
php bin/console doctrine:migrations:migrate
```

### Step 4: Create a Controller

```bash
php bin/console make:controller ProductController
```

Edit the `src/Controller/ProductController.php` file to include a method for handling the post request:

```php
// src/Controller/ProductController.php
namespace App\Controller;

use App\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
    /**
     * @Route("/api/products", methods={"POST"})
     */
    public function create(Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        $entityManager = $this->getDoctrine()->getManager();

        $product = new Product();
        $product->setName($data['name']);
        $product->setPrice($data['price']);

        $entityManager->persist($product);
        $entityManager->flush();

        return new JsonResponse(['message' => 'Product created!'], JsonResponse::HTTP_CREATED);
    }
}
```

### Step 5: Configure Routes

Open `config/routes.yaml` and add the following:

```yaml
# config/routes.yaml
product:
    resource: App\Controller\ProductController
    type: annotation
```

### Step 6: Run the Symfony Development Server

```bash
php bin/console server:run
```

Now, your Symfony application is running.

### Step 7: Make a CURL POST Request

Open a new terminal window and use CURL to make a POST request:

```bash
curl -X POST http://localhost:8000/api/products -H "Content-Type: application/json" -d '{"name": "Sample Product", "price": 19.99}'
```

This CURL command sends a POST request to the specified endpoint with JSON data containing the name and price of the product.

### Step 8: Verify the Data

Check the Symfony server console for any output, and you can also verify the data in your database:

```bash
php bin/console doctrine:query:sql "SELECT * FROM product"
```

You should see the product you added using the CURL request.

Remember to adapt this example based on your specific needs and requirements.