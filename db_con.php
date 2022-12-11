<?php

$serverName = "localhost";
$userName = "root";
$passwrod = "";
$db_name = "test_db";

$conn = mysqli_connect($serverName, $userName, $passwrod, $db_name);

if(!$conn) {
    echo "Connection failed!";
    exit();
}