<?php

namespace Framework;

use ReflectionMethod;

class Dispatcher
{
    public function __construct(private Router $router)
    {
    }

    public function handle(string $path)
    {
        $params = $this->router->match($path);

        if (!$params) {
            exit("No route matched!");
        }

        // All the request are going throught the FRONT CONTROLLER
        //Every single request goes through here
        // This is deciding which controller action method to run based on the query string, 
        // creating the controller object and running the action method dynamically

        $action = $this->getActionName($params);
        $controller = $this->getControllerName($params);

        // We require the controller based on the controller variable, 
        // inserting the value of the controller variable directly into this path using string interpolation
        // require "src/controllers/$controller.php";


        //create a new controller object based on a variable
        $controller_object = new $controller;
        $args = $this->getActionArguments($controller, $action, $params);
        $controller_object->$action(...$args);
    }

    private function getActionArguments(string $controller, string $action, array $params): array
    {
        $args = [];

        $method = new ReflectionMethod($controller, $action);

        foreach ($method->getParameters() as $parameter) {
             $name = $parameter->getName();
             $args[$name] = $params[$name];
        }

        return $args;
    }

    private function getControllerName(array $params):string
    {
        $controller = $params["controller"];

        $controller = str_replace("-", "", ucwords(strtolower($controller), "-"));

        $namespace = "App\Controllers";

        if (array_key_exists("namespace", $params)) {
            $namespace .= "\\" . $params["namespace"];
        }

        return $namespace . "\\" . $controller;
    }

    private function getActionName(array $params): string
    {
        $action = $params["action"];

        $action = lcfirst(str_replace("-", "", ucwords(strtolower($action), "-")));

        return $action;
    }
}