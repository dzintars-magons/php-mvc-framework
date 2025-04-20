<?php

$path = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);

// require "src/router.php";

spl_autoload_register(function (string $class_name) {

    require 'src/' . str_replace('\\', '/', $class_name) . '.php';
});

//autoload function is executed when we try to create a new object
$router = new Framework\Router;

//let's add a route for the home index path

$router->add("/home/index", ["controller" => "home", "action" => "index"]);
$router->add("/products", ["controller" => "products", "action" => "index"]);
$router->add("/", ["controller" => "home", "action" => "index"]);

$params = $router->match($path);

if (!$params) {
    exit("No route matched!");
}

// All the request are going throught the FRONT CONTROLLER
//Every single request goes through here
// This is deciding which controller action method to run based on the query string, 
// creating the controller object and running the action method dynamically

$action = $params['action'];
$controller = "App\Controllers\\" . ucwords($params['controller']);

// We require the controller based on the controller variable, 
// inserting the value of the controller variable directly into this path using string interpolation
// require "src/controllers/$controller.php";


 //create a new controller object based on a variable
$controller_object = new $controller;
$controller_object->$action();