<?php

use PDO;

$host = 'localhost';
$dbName = 'revision';
$user = "root";
$password = '';


try {
    $conn = new PDO("mysql:host=$host;dbname=$dbName", $user, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    // $sqlCommand = "CREATE TABLE Sales (
    //     sale_id INT PRIMARY KEY,
    //     product_id INT,
    //     quantity_sold INT,
    //     sale_date DATE,
    //     total_price DECIMAL(10, 2)
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

    $sqlCommand = "insert into Sales
    (sale_id , product_id , quantity_sold , sale_date , total_price)
        values 
    (1, 101, 5, '2024-01-01', 2500.00),
    (2, 102, 3, '2024-01-02', 900.00),
    (3, 103, 2, '2024-01-02', 60.00),
    (4, 104, 4, '2024-01-03', 80.00),
    (5, 105, 6, '2024-01-03', 90.00)
    ";

    $conn->exec($sqlCommand);


    // $sqlCommand = "select last_name , email from authors" ; 

    // syntax for where statement 
    // select column1 , column2 from table_name where condition 

    // echo $conn->exec($sqlCommand ); 


    // $sqlCommand = "select first_name , email , birthdate from authors where birthdate > '1995-05-27' and id != 20 and email = 'bogan.lesly@example.com' "  ; 


    //simply and or not logic similar to if(condition1 and condition2 or condition3)
    //if(!condition)

    //order by statement for sorting asc or desc

    // $stmt = $conn->prepare($sqlCommand);
    // $stmt->execute();
    // $authors = $stmt->fetchAll(); //fetchAll will return us

    // // echo $authors ; 

    // foreach($authors as $author){
    //     echo $author['first_name']. " | ". $author['email']. " | " .$author['birthdate']. " | " ; 
    // }

    echo "\n";

    echo "Everything is ok !";
} catch (PDOException $e) {
    // echo "Connection failed: " . $e->getMessage();
    echo $sql . "<br>" . $e->getMessage();
}


$conn = null;
