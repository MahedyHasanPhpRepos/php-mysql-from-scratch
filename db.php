<?php

use PDO;

$host = 'localhost';
$dbName = 'revision';
$user = "root";
$password = '';


try {
    $conn = new PDO("mysql:host=$host;dbname=$dbName", $user, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // $sqlCommand = "select * from Products" ; 
    // $sqlCommand = "delete from Products where unit_price = '937593'" ; 

    // $sqlCommand = "insert into Products (product_id , product_name , category , unit_price)
    // values ('8934','text_product' , 'text_caory' , '937593') ";

    // update table_name set column1=new_value1 , column2=new_value2 , column3=new_value3
    // where condition 




    $sqlCommand = "update Products 
        set 
        product_id='8' , product_name='test' , category='test',unit_price='88.8'
        where unit_price='937593'";


    // $sqlCommand = "delete from Products where product_name = 'test'" ; 

    $stmt = $conn->prepare($sqlCommand);
    $stmt->execute();
    $products = $stmt->fetchAll(); //fetchAll will return us


    foreach ($products as $product) {
        echo $product['product_id'] . " | " . $product['product_name'] . " | " . $product['category'] . " | " . "---";
    }

    echo "\n";

    echo "Everything is ok !";
} catch (PDOException $e) {
    // echo "Connection failed: " . $e->getMessage();
    echo $sql . "<br>" . $e->getMessage();
}


$conn = null;
