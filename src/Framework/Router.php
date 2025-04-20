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
    public function add(string $path, array $params = []): void
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
            $pattern = '#^/(?<controller>[a-z]+)/(?<action>[a-z]+)$#';

            echo $pattern, "\n", $route["path"], "\n";

            $this->getPatternFromRoutePath($route['path']);

            if (preg_match($pattern, $path, $matches)) {
                $matches = array_filter($matches, "is_string", ARRAY_FILTER_USE_KEY);
            return $matches;
            }
        }

        return false;
    }

    
    private function getPatternFromRoutePath(string $route_path)
    {
        $route_path = trim($route_path, "/");
        $segments = explode("/", $route_path);
        $segments = array_map(function(string $segment): string {
            return $segment;
        }, $segments);
        print_r($segments);
    } 
}