<?php

$servername = "localhost";
$username   = "root";
$password   = "YourPassword"; // Set your MySQL root password here
$dbname     = "Restaurant";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {

    die("Connection failed: " . $conn->connect_error);
}

?>