<?php

$dbHost = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "varsityhire";

$connection = mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbName);

if(mysqli_connect_errno()){
    echo "Failed to connect to Database" . mysqli_connect_error();
}

?>
