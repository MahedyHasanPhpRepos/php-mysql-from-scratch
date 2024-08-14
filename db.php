<?php

use PDO;

$host = 'localhost';
$dbName = 'revision';
$user = "root";
$password = '';


try {
    $conn = new PDO("mysql:host=$host;dbname=$dbName", $user, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    // MySQL IN Operator
    // The IN operator allows you to specify multiple values in a WHERE clause.
    // The IN operator is a shorthand for multiple OR conditions.

    // SELECT column_name(s)
    // FROM table_name
    // WHERE column_name IN (value1, value2, ...);

    // SELECT column_name(s)
    // FROM table_name
    // WHERE column_name IN (SELECT STATEMENT);    

    // The IN operator is a shorthand for multiple OR conditions.
    // $sqlCommand = "select * from Products where product_name IN ('Laptop','Smartphone')";
    // $sqlCommand = "select * from Products where product_name NOT IN ('Laptop','Smartphone')";



    // $subCommand = "select * from Sales where total_price < 60" ;  

    // this subquery returning value 

    //in operator is working like multiple or and returning value is matched with
    $sqlCommand = "select * from Products where unit_price in (select total_price from Sales where total_price < 60)";


    $stmt = $conn->prepare($sqlCommand);
    $stmt->execute();
    $products = $stmt->fetchAll(); //fetchAll will return us


    foreach ($products as $product) {
        echo $product['product_id'] . " | " . $product['product_name'] . " | " . $product['category'] . " | " . $product['total_price'] . "---";
    }

    echo "\n";

    echo "Everything is ok !";
} catch (PDOException $e) {
    // echo "Connection failed: " . $e->getMessage();
    echo $sql . "<br>" . $e->getMessage();
}


$conn = null;
