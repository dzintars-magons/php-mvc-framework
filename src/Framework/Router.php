<?php

namespace Framework;

class Router
{
    //Add a private property to the router class to store the routes to being an array
    // We default its value to be an empty array
    private array $routes = [];
    // We add a public method to add a route
    // The arguments are the route path, which is a string, and an array of parameters
    //This method isn't going to return anything so we'll specify the return type declaration as void
    public function add(string $path, array $params): void
    {
        // To add the route to the routing table we'll append an element to the routes property
        // Each element will be an array , containing the path and its parameters
        $this->routes[] = [
            "path" => $path,
            "params" => $params
        ];
    }

    public function match(string $path): array|bool
    {
        foreach ($this->routes as $route) {
            if ($route["path"] === $path) {
                return $route["params"];
            }
        }

        return false;
    }
}