<?php

use PDO;

$host = 'localhost';
$dbName = 'revision';
$user = "root";
$password = '';


try {
    $conn = new PDO("mysql:host=$host;dbname=$dbName", $user, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);



    // $sqlCommand = "select last_name , email from authors" ; 

    // syntax for where statement 
    // select column1 , column2 from table_name where condition 

    // echo $conn->exec($sqlCommand ); 

    
    $sqlCommand = "select first_name , email , birthdate from authors where birthdate > '1995-05-27' and id != 20 and email = 'bogan.lesly@example.com' "  ; 
    

    //simply and or not logic similar to if(condition1 and condition2 or condition3)
    //if(!condition)

    $stmt = $conn->prepare($sqlCommand);
    $stmt->execute();
    $authors = $stmt->fetchAll(); //fetchAll will return us

    // echo $authors ; 

    foreach($authors as $author){
        echo $author['first_name']. " | ". $author['email']. " | " .$author['birthdate']. " | " ; 
    }

    echo "\n";

    echo "Everything is ok !";
} catch (PDOException $e) {
    // echo "Connection failed: " . $e->getMessage();
    echo $sql . "<br>" . $e->getMessage();
}


$conn = null;
