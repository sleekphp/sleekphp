<?php

// Load environment variables
require_once __DIR__ . '/../system/Helpers/env.php';
loadEnv();

// Autoload all classes via Composer
require_once __DIR__ . '/../vendor/autoload.php';

// Load route definitions
require_once __DIR__ . '/../routes/web.php';

use System\Core\Router;

// Get the requested URI
$requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$requestMethod = $_SERVER['REQUEST_METHOD'];

// Dispatch the route
$router = $GLOBALS['router'] ?? new Router();
$router->dispatch($requestUri, $requestMethod);
