<?php
// Importing DBConfig.php file.
include 'DBConfig.php';
// Creating connection.
 $con = mysqli_connect($HostName,$HostUser,$HostPass,$DatabaseName);
 // Getting the received JSON into $json variable.
 $json = file_get_contents('php://input');
 // decoding the received JSON and store into $obj variable.
 $obj = json_decode($json,true);
 // Populate name from JSON $obj array and store into $name.
$first_name = $obj['first_name'];
// Populate email from JSON $obj array and store into $email.
$last_name = $obj['last_name'];
 // Creating SQL query and insert the record into MySQL database table.
$Sql_Query = "insert into test (first_name,last_name) values ('$first_name','$last_name')";
 if(mysqli_query($con,$Sql_Query)){
 // If the record inserted successfully then show the message.
$MSG = 'Data Inserted Successfully into MySQL Database' ;
// Converting the message into JSON format.
$json = json_encode($MSG);
// Echo the message.
 echo $json ;
 }
 else{
 echo 'Try Again';
 }
 mysqli_close($con);
?>