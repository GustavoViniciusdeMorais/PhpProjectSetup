# PHP Session Tutorial

## Introduction to PHP Sessions

PHP sessions allow you to store data across multiple pages. This is useful for maintaining user state and passing information without the need to pass variables via URLs.

### Starting a Session

To start a session in PHP, you use the `session_start()` function. This function must be called before any HTML output.

```php
<?php
// Start the session
session_start();
?>
```

### Writing to a Session

To store data in a session, you simply assign values to the `$_SESSION` superglobal array.

```php
<?php
// Start the session
session_start();

// Store session data
$_SESSION['username'] = 'JohnDoe';
$_SESSION['email'] = 'john.doe@example.com';
?>
```

### Reading from a Session

To read data from a session, you access the `$_SESSION` superglobal array.

```php
<?php
// Start the session
session_start();

// Access session data
$username = $_SESSION['username'];
$email = $_SESSION['email'];

echo "Username: $username<br>";
echo "Email: $email<br>";
?>
```

### Viewing Session Data File

PHP stores session data in files on the server. The location of these files is specified in the `php.ini` configuration file. By default, session files are stored in the `/var/lib/php/sessions` directory on Linux systems.

You can use the `cat` command to view the contents of a session file. Here's an example:

```bash
# Assuming the session ID is abc123
cat /var/lib/php/sessions/sess_abc123
```

### How PHP Handles Sessions

1. **Session Initialization**: When `session_start()` is called, PHP checks if a session already exists. If not, it generates a new session ID and starts a new session.

2. **Session ID Transmission**:
    - **Server to Browser**: When a session is started, PHP sends the session ID to the browser via a `Set-Cookie` header in the HTTP response.
    - **Example Response Header**:
      ```
      Set-Cookie: PHPSESSID=abc123; path=/
      ```
    
3. **Session ID Storage**: The browser stores the session ID in a cookie. The cookie is typically named `PHPSESSID`.

4. **Subsequent Requests**: For subsequent requests to the server, the browser includes the session ID in the `Cookie` header.
    - **Example Request Header**:
      ```
      Cookie: PHPSESSID=abc123
      ```

5. **Session Data Access**: When the server receives a request with a session ID, it retrieves the corresponding session data from the session file.

### Example: Login and Session Handling

Let's put it all together with a simple login example.

### `index.php`

```php
<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;
use Slim\Routing\RouteCollectorProxy;

require __DIR__ . '/../vendor/autoload.php';

$app = AppFactory::create();

session_start();

$app->get('/', function (Request $request, Response $response) {
    $response->getBody()->write("Gustavo Slim version 4");
    return $response;
});

$app->post('/login', function (Request $request, Response $response) {
    $data = $request->getParsedBody();
    $username = $data['username'] ?? '';
    $password = $data['password'] ?? '';

    if ($username === 'JohnDoe' && $password === 'password123') {
        $_SESSION['username'] = $username;
        $_SESSION['email'] = 'john.doe@example.com';

        $response->getBody()->write(json_encode([
            'status' => 'success',
            'message' => 'Login successful',
        ]));
    } else {
        $response->getBody()->write(json_encode([
            'status' => 'error',
            'message' => 'Invalid username or password',
        ]));
        return $response->withStatus(401);
    }

    return $response->withHeader('Content-Type', 'application/json');
});

$app->get('/welcome', function (Request $request, Response $response) {
    if (!isset($_SESSION['username'])) {
        $response->getBody()->write(json_encode([
            'status' => 'error',
            'message' => 'Not authenticated',
        ]));
        return $response->withStatus(401)->withHeader('Content-Type', 'application/json');
    }

    $response->getBody()->write(json_encode([
        'status' => 'success',
        'username' => $_SESSION['username'],
        'email' => $_SESSION['email'],
    ]));

    return $response->withHeader('Content-Type', 'application/json');
});

$app->post('/logout', function (Request $request, Response $response) {
    session_unset();
    session_destroy();

    $response->getBody()->write(json_encode([
        'status' => 'success',
        'message' => 'Logged out successfully',
    ]));

    return $response->withHeader('Content-Type', 'application/json');
});

$app->run();
```

### Curl Requests Examples

#### Login Request

```bash
curl -X POST http://localhost:YOUR_PORT/login -d 'username=JohnDoe&password=password123' -c cookies.txt
```

#### Welcome Request

```bash
curl -X GET http://localhost:YOUR_PORT/welcome -b cookies.txt
```

#### Logout Request

```bash
curl -X POST http://localhost:YOUR_PORT/logout -b cookies.txt
```

Replace `YOUR_PORT` with the port number on which your Slim application is running.

### Explanation

1. **Login Request**:
    - Sends a POST request to `/login` with the username and password.
    - If the credentials are correct, a session is created and stored on the server.
    - The session ID is saved in the `cookies.txt` file.

2. **Welcome Request**:
    - Sends a GET request to `/welcome` using the session cookie stored in `cookies.txt`.
    - If the session is valid, it returns the username and email.

3. **Logout Request**:
    - Sends a POST request to `/logout` using the session cookie stored in `cookies.txt`.
    - The session is destroyed on the server.
