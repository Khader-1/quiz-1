<?php
$server = "localhost";
$user = "root";
$pass = "1602";
$db = "quiz";
$port = "3306";

$con = mysqli_connect($server, $user, $pass, $db, $port);
if (!$con) {
    die("Failed to connect!!!");
}
