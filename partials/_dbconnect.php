<?php

$username = "root";
$password = "";
$host = "localhost";
$database = "nitk";
$link = mysqli_connect($host, $username, $password, $database);

if (!$link) {
    die("Error :" . mysqli_connect_error());
}
