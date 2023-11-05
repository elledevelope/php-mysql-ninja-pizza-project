<?php
//There are 2 methods of connecting database to PHP:
//MySQLi or PDO (Php Data Object)


//MySQLi - connect to database:
$user = 'root'; //Database server - User: root@localhost 
$pass = '';
$conn = mysqli_connect('localhost', $user, $pass, 'ninja_pizza'); //4 parametres: hostname, username, password, database name

//check connection:
if(!$conn){//if connection to database is successful $conn will be true, so if{} statement will be executed. But because we want it to execute only if there is no conn, we reverse $conn using ! (negation operator)

echo 'Connection error: ' . mysqli_connect_error();
};



?>