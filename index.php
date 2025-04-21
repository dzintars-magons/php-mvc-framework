<?php

$path = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);

// require "src/router.php";

spl_autoload_register(function (string $class_name) {

    require 'src/' . str_replace('\\', '/', $class_name) . '.php';
});

//autoload function is executed when we try to create a new object
$router = new Framework\Router;

//let's add a route for the home index path

$router->add("/product/{slug:[\w-]+}", ["controller" => "products", "action" => "show"]);
$router->add("/{controller}/{id:\d+}/{action}");
$router->add("/home/index", ["controller" => "home", "action" => "index"]);
$router->add("/products", ["controller" => "products", "action" => "index"]);
$router->add("/", ["controller" => "home", "action" => "index"]);
$router->add("/{controller}/{action}");


$dispatcher = new Framework\Dispatcher($router);
$dispatcher->handle($path);