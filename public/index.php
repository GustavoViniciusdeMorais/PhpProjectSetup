<?php
// Enable strict error reporting
declare(strict_types=1);
error_reporting(E_ALL);
ini_set('display_errors', '1');

// Check if vendor autoload exists
$autoloadPath = __DIR__ . '/vendor/autoload.php';
if (!file_exists($autoloadPath)) {
    header('Content-Type: text/plain');
    die("ERROR: Composer dependencies not found. Run 'composer install' in your project root.\n");
}

// Load dependencies
require_once $autoloadPath;

// Verify Slim Framework is loadable
if (!class_exists('Slim\Factory\AppFactory')) {
    header('Content-Type: text/plain');
    die("ERROR: Slim Framework not found. Check your composer.json and run 'composer update'.\n");
}

// Import classes
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

use Gustavo\Api\Config\Database\MyDatabase;
$instance = MyDatabase::getInstance();

try {
    // Create Slim App instance
    $app = AppFactory::create();

    // Add session support if needed
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    // Define routes
    $app->get('/', function (Request $request, Response $response, $args) {
        $response->getBody()->write("PHP API Service\n");
        return $response;
    });

    // Run application
    $app->run();

} catch (Throwable $e) {
    // Handle any startup errors
    header('Content-Type: text/plain');
    die("FATAL ERROR: " . $e->getMessage() . "\n" . $e->getTraceAsString());
}
