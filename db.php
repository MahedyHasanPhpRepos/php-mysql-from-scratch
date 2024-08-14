<?php

use PDO;

$host = 'localhost';
$dbName = 'revision';
$user = "root";
$password = '';


try {
    $conn = new PDO("mysql:host=$host;dbname=$dbName", $user, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // where condition search in row 
    // mysql where column_name like operator search in a column

    // like operator is used in where statement to search for a specific pattern
    // there is two wildcards used in conjunction the like operator 
    // 1.The % sign represent zero , one , or multiple characture 
    // 2.The underscore _ sign represents one single characture 

    // syntex for like operator 
    // select * from table where column LIKE pattern


    // like 'a%' means find value starts with characture 'a'
    //  goto product_name column  search start with a then % means other charactures 
    // $sqlCommand = "select * from Products where product_name like 'a%' ";

    // Finds any values that end with "a"
    // goto product_name column search with value is end with a and return all row values 
    // $sqlCommand = "select * from Products where product_name like '%a' ";


    //  goto product_name column search with value contains 'dp' characture at any position
    // $sqlCommand = "select * from Products where product_name like '%dp%' ";
    // $sqlCommand = "select * from Products where product_name like '%a%' ";


    //  goto product_name column search with value which second characture is 'a' and return all row values 
    //one underscore and a
    $sqlCommand = "select * from Products where product_name like '_a%' ";

    //  goto product_name column search with value which third characture is 'a' and return all row values 
    //two underscore and a
    $sqlCommand = "select * from Products where product_name like '__a%' ";


    //  goto product_name column search with value which fourth characture is 'a' and return all row values 
    //three underscore and a
    $sqlCommand = "select * from Products where product_name like '___a%' ";


    //  goto product_name column search with value which second from back characture is 'a' and return all row values 
    $sqlCommand = "select * from Products where product_name like '%a_' ";

    //  goto product_name column search with value which second from back characture is 'a' and return all row values 
    $sqlCommand = "select * from Products where product_name like '%a__' ";

    //  goto product_name column search with value which start with 's' and end with 'e' and return all row values 
    // $sqlCommand = "select * from Products where product_name like 's%e'";

    // $sqlCommand = "select * from Products where product_name like 'a_%'" ; 
    //will return ac 
    
    // Finds any values that starts with "a" and are at least 3 characters in length
    $sqlCommand = "select * from Products where product_name like 'a_%_%'" ; 

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
