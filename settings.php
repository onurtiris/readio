<?php
$server = "localhost";
$username = "db_user";
$password = "db_pw";
$database = "db_name";
$connection = mysqli_connect($server, $username, $password, $database);
$connection->set_charset("utf8");
if(!$connection) { die("Connection error: " . mysqli_connect_error()); }
?>