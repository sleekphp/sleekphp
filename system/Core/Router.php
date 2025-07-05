<?php

namespace System\Core;

class Router {
    protected $routes = [];

    public function get($uri, $controller) {
        $this->routes['GET'][$uri] = $controller;
    }

    public function post($uri, $controller) {
        $this->routes['POST'][$uri] = $controller;
    }

    public function dispatch($uri, $method) {
        if (isset($this->routes[$method][$uri])) {
            $controllerAction = explode('@', $this->routes[$method][$uri]);
            $controller = "App\\Controllers\\" . $controllerAction[0];
            $action = $controllerAction[1];
            return (new $controller)->$action();
        }
        http_response_code(404);
        echo "404 Not Found";
    }
}
