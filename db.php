<?php
$host = 'localhost';
$dbName = 'revision';
$user = "root";
$password = '';


try {
    $conn = new PDO("mysql:host=$host;dbname=$dbName", $user, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);



    $sqlCommand = "select last_name , email from authors" ; 

    // DISTINCT statement 
    // distinct will return us unique values or no duplicate values 
    $sqlCommand = "select distinct last_name , email from authors" ;
    
    
    // $sqlCommand = "select count(last_name) as count_author from authors" ; 

    // echo $conn->exec($sqlCommand ); 
    


    $stmt = $conn->prepare($sqlCommand);
    $stmt->execute();
    $authors = $stmt->fetchAll(); //fetchAll will return us

    echo $authors ; 

    foreach($authors as $author){
        echo $author['last_name']. " | " ; 
    }

    echo "\n";

    echo "Everything is ok !";
} catch (PDOException $e) {
    // echo "Connection failed: " . $e->getMessage();
    echo $sql . "<br>" . $e->getMessage();
}


$conn = null;
