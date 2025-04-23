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

    public function show(string $id)
    {
        var_dump($id);
        require "views/products_show.php";
    }

    public function showPage(string $title, string $id, string $page)
    {
        echo $title, " ", $id, " ", $page;
    }
}