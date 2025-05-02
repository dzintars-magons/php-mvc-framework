<?php

declare(strict_types=1);

namespace App\Models;

use PDO;
use App\Database;

class Product
{
    public function __construct(private Database $database)
    {
    }
    public function getData(): array
    {
        $pdo = $this->database->getConnection();
        //Then we can get some data from the DB. We call the query method on the PDO object, 
        // passing in some SQL that will select all the records from the product table.
        $stmt = $pdo->query("SELECT * FROM product");
        //We call the fetchAll method on the statement object, passing in the constant to get the data as an associative array
        $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $products;
    }
}