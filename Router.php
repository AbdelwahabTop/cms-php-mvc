<?php

class Router
{
    protected array $routes;

    public function define(array $routes)
    {
        $this->routes = $routes;
    }
}
