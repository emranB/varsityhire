<?php

$dbHost = "sql101.byethost5.com";
$dbUsername = "b5_17181923";
$dbPassword = "Ga11betron";
$dbName = "b5_17181923_varsityhire";

$connection = mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbName);

if(mysqli_connect_errno()){
    echo "Failed to connect to Database" . mysqli_connect_error();
}

?>
