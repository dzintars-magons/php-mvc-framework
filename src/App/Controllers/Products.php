<?php

namespace App\Controllers;

use App\Models\Product;

class Products
{
    //methods inside controllers are known as actions or action methods
    public function index()
    {
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