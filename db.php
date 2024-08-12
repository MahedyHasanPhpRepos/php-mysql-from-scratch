<?php
$host = 'localhost';
$dbName = 'revision';
$user = "root";
$password = '';


try {
    $conn = new PDO("mysql:host=$host;dbname=$dbName", $user, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);



    // $sql_command = "alter table Test add column register_date varchar(100)" ; 
    // $sql_command = "alter table Test drop column register" ; 

    $sql_command = "insert into Test 
        (id,firstname,lastname,email,register_date) 
        values 
        ('888','ajax','mhdy','ajax@gmail.com','8-12-1995')";


    $conn->exec($sql_command);
    $last_id = $conn->lastInsertId();
    echo "New record created successfully. Last inserted ID is: " . $last_id . "\n";


    echo "Everythings ok !"  ; 

} catch (PDOException $e) {
    // echo "Connection failed: " . $e->getMessage();
    echo $sql . "<br>" . $e->getMessage();
}


$conn = null;
