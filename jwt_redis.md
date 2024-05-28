# JWT with Redis

### Step 1: Create the PHP Slim App

First, set up a simple Slim framework application with JWT authentication.

**Directory Structure:**
```
/myapp
  /src
    /routes.php
    /middleware.php
  /public
    index.php
  composer.json
  Dockerfile
  docker-compose.yml
```

#### 1.1. `composer.json`
```json
{
  "require": {
    "slim/slim": "^4.8",
    "slim/psr7": "^1.4",
    "tuupola/slim-jwt-auth": "^3.6",
    "predis/predis": "^1.1"
  }
}
```

#### 1.2. `Dockerfile`
```Dockerfile
FROM php:8.1-cli

# Install necessary extensions
RUN docker-php-ext-install pdo pdo_mysql

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

# Copy existing application directory contents
COPY . /var/www

# Install PHP dependencies
RUN composer install

CMD [ "php", "-S", "0.0.0.0:8080", "-t", "public" ]
```

#### 1.3. `docker-compose.yml`
```yaml
version: '3.8'

services:
  app:
    build:
      context: .
      dockerfile: Dockerfile
    ports:
      - "8080:8080"
    depends_on:
      - redis
    volumes:
      - .:/var/www

  redis:
    image: "redis:alpine"
    ports:
      - "6379:6379"
```

#### 1.4. `public/index.php`
```php
<?php
require __DIR__ . '/../vendor/autoload.php';

use Slim\Factory\AppFactory;

$app = AppFactory::create();

require __DIR__ . '/../src/middleware.php';
require __DIR__ . '/../src/routes.php';

$app->run();
```

#### 1.5. `src/middleware.php`
```php
<?php

use Tuupola\Middleware\JwtAuthentication;

$app->add(new JwtAuthentication([
    "path" => "/api",
    "secret" => "supersecretkeyyoushouldnotcommittogithub",
    "attribute" => "decoded_token_data",
    "before" => function ($request, $arguments) {
        $userData = $arguments["decoded"];
        $request = $request->withAttribute("userData", $userData);
        return $request;
    }
]));
```

#### 1.6. `src/routes.php`
```php
<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Routing\RouteCollectorProxy;
use Predis\Client;

$app->post('/login', function (Request $request, Response $response) {
    $params = (array)$request->getParsedBody();

    // Dummy authentication logic
    if ($params['username'] === 'user' && $params['password'] === 'password') {
        $now = new DateTime();
        $future = new DateTime("now +2 hours");
        $jti = base64_encode(random_bytes(16));

        $payload = [
            "iat" => $now->getTimeStamp(),
            "exp" => $future->getTimeStamp(),
            "jti" => $jti,
            "sub" => $params['username']
        ];

        $secret = "supersecretkeyyoushouldnotcommittogithub";
        $token = \Firebase\JWT\JWT::encode($payload, $secret, "HS256");

        // Save session in Redis
        $redis = new Client();
        $redis->set($jti, json_encode($payload), 'EX', 7200);

        $data["status"] = "success";
        $data["token"] = $token;

        $response->getBody()->write(json_encode($data));
        return $response->withHeader("Content-Type", "application/json");
    }

    return $response->withStatus(401);
});

$app->group('/api', function (RouteCollectorProxy $group) {
    $group->get('/protected', function (Request $request, Response $response) {
        $userData = $request->getAttribute("userData");

        $data = [
            "status" => "success",
            "data" => $userData
        ];

        $response->getBody()->write(json_encode($data));
        return $response->withHeader("Content-Type", "application/json");
    });
});
```

### Step 2: Build and Run the Docker Containers

Navigate to the root of your project directory and run the following commands:

```sh
docker-compose up --build
```

### Step 3: Testing the Application

1. **Login to get a JWT token:**

   ```sh
   curl -X POST -d "username=user&password=password" http://localhost:8080/login
   ```

   You should receive a response with a JWT token.

2. **Access a protected route using the JWT token:**

   ```sh
   curl -X GET http://localhost:8080/api/protected -H "Authorization: Bearer YOUR_JWT_TOKEN"
   ```

Replace `YOUR_JWT_TOKEN` with the token you received from the login response.

### Explanation

- **`Dockerfile` and `docker-compose.yml`:** These files set up the Docker containers for the PHP Slim app and Redis.
- **`index.php`:** This is the entry point for the Slim application.
- **`middleware.php`:** This sets up JWT authentication middleware.
- **`routes.php`:** This defines the routes for login and accessing a protected route.
- **Redis integration:** When a user logs in, a JWT is created and stored in Redis with an expiration time. This session data is then used for subsequent requests to protected routes.
