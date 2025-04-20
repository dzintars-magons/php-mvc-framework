<?php

namespace App\Models;

class Product
{
    public function getData(): array
    {
        $dsn = "mysql:host=localhost;dbname=product_db;charset=utf8;port=3306";
        //creating a new PDO object, passing in the $dsn variable. Then the username and password that we created earlier.
        //We also want PDO to throw exceptions when an error occurs so we are passing an array as the next argument, setting the error mode accordingly.
        $pdo = new PDO($dsn, "product_db_user", "secret", [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]);
        //Then we can get some data from the DB. We call the query method on the PDO object, 
        // passing in some SQL that will select all the records from the product table.
        $stmt = $pdo->query("SELECT * FROM product");
        //We call the fetchAll method on the statement object, passing in the constant to get the data as an associative array
        $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $products;
    }
}