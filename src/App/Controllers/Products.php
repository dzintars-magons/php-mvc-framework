<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\Product;
use Framework\Viewer;

class Products
{
    public function __construct(private Viewer $viewer, private Product $model)
    {
    }
    //methods inside controllers are known as actions or action methods
    public function index()
    {
        // call the getData() method on that object, assigning its return value to a variable
        $products = $this->model->getData();

        echo $this->viewer->render("shared/header.php", [
            "title" => "Products"
        ]);

        echo $this->viewer->render("Products/index.php", [
            "products" => $products
        ]);
    }

    public function show(string $id)
    {
        echo $this->viewer->render("shared/header.php", [
            "title" => "product with id: $id"
        ]);

        echo $this->viewer->render("Products/show.php", [
            "id" => $id
        ]);
    }

    public function showPage(string $title, string $id, string $page)
    {
        echo $title, " ", $id, " ", $page;
    }
}