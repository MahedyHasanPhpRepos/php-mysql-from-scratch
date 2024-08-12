<?php
$host = 'localhost';
$dbName = 'revision';
$user = "root";
$password = '';


try {
    $conn = new PDO("mysql:host=$host;dbname=$dbName", $user, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    // begin the transaction
    $conn->beginTransaction();

    //single execution - 1
    $sql_command = "insert into Test 
        (id,firstname,lastname,email,register_date) 
        values 
        ('8','ajax','mhdy','ajax@gmail.com','8-12-1995')";

    $conn->exec($sql_command);



    //single execution - 2
    $sql_command = "insert into Test 
        (id,firstname,lastname,email,register_date) 
        values 
        ('88','mhdy','hasen','mhdy@gmail.com','8-12-1995')";

    $conn->exec($sql_command);



    //single execution - 3
    $sql_command = "insert into Test 
        (id,firstname,lastname,email,register_date) 
        values 
        ('888','mhdy','hasan-2','mhdy@gmail.com','8-12-1995')";

    $conn->exec($sql_command);

    // commit the transaction
    $conn->commit() ;


    echo "Everything is ok !";
} catch (PDOException $e) {
    // echo "Connection failed: " . $e->getMessage();
    echo $sql . "<br>" . $e->getMessage();
}


$conn = null;
