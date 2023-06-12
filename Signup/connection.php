<?php

$servername = "localhost:3306";
$username = "moki";
$password = "Test123!@#";
$database = "moki_productdb";

$conn = new mysqli($servername, $username, $password,$database);

if (!$conn)
    die("Could not connect to database");
?>