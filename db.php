<?php
$host = 'localhost';
$dbName = 'revision';
$user = "root";
$password = '';


try {
    $conn = new PDO("mysql:host=$host;dbname=$dbName", $user, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // table must have a primary key 
    $sql_command = "create table Test(
        id int(6) unsigned auto_increment primary key, 
        firstname varchar(30) not null,
        lastname VARCHAR(30) not null,
        email VARCHAR(50),
        register_date timestamp default current_timestamp on update current_timestamp
    )";

    // $sql_command = 'drop table Test' ; 

    $conn->exec($sql_command) ; 

    echo "Connected successfully";
} catch (PDOException $e) {
    // echo "Connection failed: " . $e->getMessage();
    echo $sql . "<br>" . $e->getMessage();
}


$conn = null;
