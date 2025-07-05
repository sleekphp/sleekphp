<?php

namespace System\Core;

class Route {
    protected static $routes = [];

    public static function get($uri, $controller) {
        self::$routes['GET'][$uri] = $controller;
    }

    public static function post($uri, $controller) {
        self::$routes['POST'][$uri] = $controller;
    }

    public static function dispatch($uri, $method) {
        if (isset(self::$routes[$method][$uri])) {
            $controllerAction = explode('@', self::$routes[$method][$uri]);
            $controller = "App\\Controllers\\" . $controllerAction[0];
            $action = $controllerAction[1];
            return (new $controller)->$action();
        }
        http_response_code(404);
        echo "404 Not Found";
    }
}
