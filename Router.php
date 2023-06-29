<?php

class Router
{
    protected array $routes = [
        'GET' => [],
        'POST' => []
    ];

    public function get($uri, $controller)
    {
        $this->routes['GET'][$uri] = $controller;
    }

    public function post($uri, $controller)
    {
        $this->routes['POST'][$uri] = $controller;
    }

    public static function load($file)
    {
        $router = new static;

        require $file;

        return $router;
    }

    public function show($uri, $method)
    {
        if (array_key_exists($uri, $this->routes[$method])) {
            return $this->callMethod(...explode('@', $this->routes[$method][$uri]));
        }

        throw new Exception('Route not found.');
    }

    public function callMethod($controller, $action)
    {
        $cont = (new $controller);
        return $cont->$action();
    }
}
