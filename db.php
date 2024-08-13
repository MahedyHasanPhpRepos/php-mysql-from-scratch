<?php
$host = 'localhost';
$dbName = 'revision';
$user = "root";
$password = '';


try {
    $conn = new PDO("mysql:host=$host;dbname=$dbName", $user, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // $sqlCommand = 'select * from Test' ; 
    // $sqlCommand = 'select id , firstname from Test' ; 
    // $sqlCommand = 'select id , firstname, email , register_date from Test' ; 
    $sqlCommand = 'select id , firstname, email  from Test' ; 

    $stmt = $conn->prepare($sqlCommand) ; 
    $stmt->execute() ; 
    $users = $stmt->fetchAll() ; //fetchAll will return us
    //Array data of total Table Test 
    // $users[0] //is a single row of Test table 
    // $users[0][0] //is first element of data in first row of Test table 
    // echo $users[0][1] ; //is firstname of first row in Test table 

    foreach($users as $user){
        echo $user['id']."\t".$user['firstname']."\t".$user['email']." ::: "."\n" ; 
        // echo "\n" ; 
    }


    echo "\n";

    echo "Everything is ok !";
} catch (PDOException $e) {
    // echo "Connection failed: " . $e->getMessage();
    echo $sql . "<br>" . $e->getMessage();
}


$conn = null;
