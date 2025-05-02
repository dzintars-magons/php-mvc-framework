<?php

namespace App;

use PDO;

class Database
{
    public function __construct(private string $host,
                                private string $name,
                                private string $user,
                                private string $password)
    {

    }
    public function getConnection(): PDO
    {
        $dsn = "mysql:host={$this->host};dbname={$this->name};charset=utf8;port=3306";
        //creating a new PDO object, passing in the $dsn variable. Then the username and password that we created earlier.
        //We also want PDO to throw exceptions when an error occurs so we are passing an array as the next argument, setting the error mode accordingly.
        return new PDO($dsn, $this->user, $this->password, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]);
    }
}