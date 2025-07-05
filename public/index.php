<?php

require_once __DIR__ . '/../system/Helpers/env.php';
loadEnv();

require_once __DIR__ . '/../vendor/autoload.php';

use System\Core\Route;
require_once __DIR__ . '/../routes/web.php';

$requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$requestMethod = $_SERVER['REQUEST_METHOD'];

Route::dispatch($requestUri, $requestMethod);
