<?php
$host = 'localhost';
$dbName = 'revision';
$user = "root";
$password = '';


try {
    $conn = new PDO("mysql:host=$host;dbname=$dbName", $user, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // $sql_command = "create database TestDb" ; 
    // $conn->exec($sql_command) ; 
    // $sql_command = "drop database TestDb" ; 
    // $conn->exec($sql_command) ; 

    echo "Connected successfully";

} catch (PDOException $e) {
    // echo "Connection failed: " . $e->getMessage();
    echo $sql . "<br>" . $e->getMessage();
}


$conn = null ; 

?>

