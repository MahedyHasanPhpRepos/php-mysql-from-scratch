<?php

use PDO;

$host = 'localhost';
$dbName = 'revision';
$user = "root";
$password = '';


try {
    $conn = new PDO("mysql:host=$host;dbname=$dbName", $user, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    // SELECT column_name(s)
    // FROM table_name
    // WHERE column_name BETWEEN value1 AND value2;


    // $sqlCommand = "select * from Products where unit_price between 500 and 800" ; 
    // $sqlCommand = "select * from Products where unit_price not between 500 and 800
    //     and product_id in (103)
    // " ; 
    // $sqlCommand = "select * from Products where unit_price not between 500 and 800
    // and product_id not in (103)
    // ";

    $sqlCommand = "select * from Sales where sale_date between '2024-01-02' and '2024-01-03'" ; 


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
