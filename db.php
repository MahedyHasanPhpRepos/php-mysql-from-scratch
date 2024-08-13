<?php
$host = 'localhost';
$dbName = 'revision';
$user = "root";
$password = '';


try {
    $conn = new PDO("mysql:host=$host;dbname=$dbName", $user, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    // basic syntax for select statement 
    // SELECT column_name(s) FROM table_name
    // SELECT * FROM table_name //here * means all 

    // $sqlCommand = 'select * from Test' ; 
    // $sqlCommand = 'select id , firstname from Test' ; 
    // $sqlCommand = 'select id , firstname, email , register_date from Test' ; 
    // $sqlCommand = 'select id , firstname, email  from Test' ; 



    // basic syntax for where statement 
    // select column_name(s) from table_name WHERE(where) column_name operator value 
    // where column_name condition conditional value 
    // where is similar to if(condition) in database 


    // $sqlCommand = "select * from Test where firstname = 'mhdy'" ; 

    // $sqlCommand = "select id , firstname, lastname  from Test where firstname = 'mhdy'";
    // this line will return us data only we select such as [id , firstname , lastname]


    // $sqlCommand = "select id , firstname, email  from Test where lastname = 'mhdy'";
    // this will return us [ id , firstname , email] according to seach result


    // basic syntax for ORDER BY statement 
    // SELECT column_name(s) FROM table_name ORDER BY column_name(s) ASC|DESC 

    // $sqlCommand = "select id , email from Test order by id desc" ; 
    // $sqlCommand = "select id , email from Test order by id asc" ; //by default order by is asc




    // basic syntax for DELETE statement 
    // DELETE FROM table_name WHERE some_column = some_value
    // $sqlCommand = "delete from Test where id = 888" ; 




    // UPDATE table_name //target table 
    // SET column1=value, column2=value2,... //set updated values for specific column
    // WHERE some_column=some_value  // target the row should be updated using where condition


    // $sqlCommand = "update Test Set firstname='updated-name' , lastname='ulname' , email='u@mail.com' where id='888' " ;


    // limit statement 
    // $sqlCommand = "select * from Test limit 2" ; 



    $stmt = $conn->prepare($sqlCommand);
    $stmt->execute();
    $users = $stmt->fetchAll(); //fetchAll will return us
    //Array data of total Table Test 
    // $users[0] //is a single row of Test table 
    // $users[0][0] //is first element of data in first row of Test table 
    // echo $users[0][1] ; //is firstname of first row in Test table 

    foreach ($users as $user) {
        echo $user['id'] . "\t" . $user['firstname'] . "\t" . $user['email'] . " ::: " . "\n";
        // echo "\n" ; 
    }


    echo "\n";

    echo "Everything is ok !";
} catch (PDOException $e) {
    // echo "Connection failed: " . $e->getMessage();
    echo $sql . "<br>" . $e->getMessage();
}


$conn = null;
