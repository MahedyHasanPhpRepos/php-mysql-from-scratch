<?php

use PDO;

$host = 'localhost';
$dbName = 'revision';
$user = "root";
$password = '';


try {
    $conn = new PDO("mysql:host=$host;dbname=$dbName", $user, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    // $sqlCommand = "CREATE TABLE Products (
    // product_id INT PRIMARY KEY,
    // product_name VARCHAR(100),
    // category VARCHAR(50),
    // unit_price DECIMAL(10, 2)
    // )";

    // $sqlCommand = "delete from Sales" ;  

    // basic syntex for insert into 
    // INSERT INTO Table_name (col1,col2,col3,...) VALUES (val1,val2,val3, ...)

    //inserting one row of data 

    // $sqlCommand = "insert into Sales 
    // (sale_id , product_id , quantity_sold , sale_date , total_price) 
    //     values 
    // (88,808, 8,'2024-01-08',8000.00)
    // ";

    //inserting more then row of data 

    // $sqlCommand = "INSERT INTO Products (product_id, product_name, category, unit_price) VALUES
    //     (101, 'Laptop', 'Computer', 500.00),
    //     (102, 'Smartphone', 'Phone', 300.00),
    //     (103, 'Headphones', 'Electronics', 30.00),
    //     (106, 'TV', 'Electronics', 700.00),
    //      (107, 'AC', 'Electronics', 800.00),
    //     (104, 'Keyboard', 'Computer', 20.00),
    //     (105, 'Mouse', 'Computer', 15.00);
    //     ";

    // $conn->exec($sqlCommand);

    $sqlCommand = "select * from Products" ; 

    $stmt = $conn->prepare($sqlCommand);
    $stmt->execute();
    $products = $stmt->fetchAll(); //fetchAll will return us


    foreach ($products as $product) {
        echo $product['product_id'] . " | " . $product['product_name'] . " | " . $product['category'] . " | ". "---";
    }

    echo "\n";

    echo "Everything is ok !";
} catch (PDOException $e) {
    // echo "Connection failed: " . $e->getMessage();
    echo $sql . "<br>" . $e->getMessage();
}


$conn = null;
