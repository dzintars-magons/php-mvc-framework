<?php

namespace App\Controllers;

use App\Models\Product;
use Framework\Viewer;

class Products
{
    //methods inside controllers are known as actions or action methods
    public function index()
    {
        //create an object of that class
        $model = new Product;
        // call the getData() method on that object, assigning its return value to a variable
        $products = $model->getData();

        $viewer = new Viewer;

        echo $viewer->render("shared/header.php", [
            "title" => "Products"
        ]);

        echo $viewer->render("Products/index.php", [
            "products" => $products
        ]);
    }

    public function show(string $id)
    {
        $viewer = new Viewer;

        echo $viewer->render("shared/header.php", [
            "title" => "product with id: $id"
        ]);

        echo $viewer->render("Products/show.php", [
            "id" => $id
        ]);
    }

    public function showPage(string $title, string $id, string $page)
    {
        echo $title, " ", $id, " ", $page;
    }
}