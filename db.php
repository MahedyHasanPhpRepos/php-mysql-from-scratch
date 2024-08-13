<?php
$host = 'localhost';
$dbName = 'revision';
$user = "root";
$password = '';


try {
    $conn = new PDO("mysql:host=$host;dbname=$dbName", $user, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    $sql = 'insert into Test 
            (id,firstname,lastname,email,register_date) 
            values 
            (:id,:firstname,:lastname,:email,:register_date) ' ; 


    $stmt = $conn->prepare($sql) ; 
    $stmt->bindParam(':id',$id) ; 
    $stmt->bindParam(':firstname', $firstname);
    $stmt->bindParam(':lastname',$lastname) ; 
    $stmt->bindParam(':email',$email) ; 
    $stmt->bindParam(':register_date',$register_date) ;

    //inserting row and execution - 1
    $id = '8' ; 
    $firstname = 'mhdy' ; 
    $lastname = 'hasan' ; 
    $email = "mhdy@gmail.com" ; 
    $register_date = '12-12-12' ; 
    $stmt->execute() ; 

     //inserting row and execution - 2
     $id = '88' ; 
     $firstname = 'mhdy2' ; 
     $lastname = 'hasan' ; 
     $email = "mhdy2@gmail.com" ; 
     $register_date = '12-12-12' ; 
     $stmt->execute() ; 


     //inserting row and execution - 3
     $id = '888' ; 
     $firstname = 'ajax' ; 
     $lastname = 'mhdy' ; 
     $email = "ajax@gmail.com" ; 
     $register_date = '12-12-12' ; 
     $stmt->execute() ; 


    echo "Everything is ok !";
} catch (PDOException $e) {
    // echo "Connection failed: " . $e->getMessage();
    echo $sql . "<br>" . $e->getMessage();
}


$conn = null;
