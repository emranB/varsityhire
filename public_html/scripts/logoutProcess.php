<?php

error_reporting(E_ALL);
session_start();
session_unset();
unset($_SESSION["Name"]);
unset($_SESSION["Email"]);
session_destroy();
header('Location: ../index.php');

?>