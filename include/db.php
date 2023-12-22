<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "wisaduma_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Optionally set the character set to utf8 (depending on your needs)
$conn->set_charset("utf8");



?>
