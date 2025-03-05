<?php
$host = "localhost";
$username = "root"; // Default MySQL user in XAMPP
$password = ""; // Default is empty in XAMPP
$database = "reviews_db"; // Must match the created database

$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
