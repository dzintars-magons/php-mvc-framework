<?php

namespace App\Controllers;

class Products
{
    //methods inside controllers are known as actions or action methods
    public function index()
    {
        require "src/models/product.php";
        //create an object of that class
        $model = new Product;
        // call the getData() method on that object, assigning its return value to a variable
        $products = $model->getData();

        require "views/products_index.php";
    }

    public function show()
    {
        require "views/products_show.php";
    }
}