<?php
$host = 'localhost';
$dbName = 'revision';
$user = "root";
$password = '';


try {
    $conn = new PDO("mysql:host=$host;dbname=$dbName", $user, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);



    // $sqlCommand = "create database revision" ; 
    // $sqlCommand = "CREATE TABLE `authors` (
    //     `id` INT(11) NOT NULL AUTO_INCREMENT,
    //     `first_name` VARCHAR(50) NOT NULL COLLATE 'utf8_unicode_ci',
    //     `last_name` VARCHAR(50) NOT NULL COLLATE 'utf8_unicode_ci',
    //     `email` VARCHAR(100) NOT NULL COLLATE 'utf8_unicode_ci',
    //     `birthdate` DATE NOT NULL,
    //     `added` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    //     PRIMARY KEY (`id`),
    //     UNIQUE INDEX `email` (`email`)
    // )";

    $conn->exec($sqlCommand) ; 


    // $stmt = $conn->prepare($sqlCommand);
    // $stmt->execute();
    // $users = $stmt->fetchAll(); //fetchAll will return us

    echo "\n";

    echo "Everything is ok !";
} catch (PDOException $e) {
    // echo "Connection failed: " . $e->getMessage();
    echo $sql . "<br>" . $e->getMessage();
}


$conn = null;
