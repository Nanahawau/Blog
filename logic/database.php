<?php
$db_hostname = 'localhost';
$db_name ='blog';
$db_username ='root' ;
$db_password ='';

$conn = new mysqli($db_hostname, $db_username, $db_password, $db_name);

//check connection

if ($conn -> connect_error){
    die("connection failed:". $conn -> connect_error);
}