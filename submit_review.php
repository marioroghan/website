<?php
// Database connection
$conn = new mysqli("localhost", "root", "", "reviews_db");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$username = $_POST['username'];
$is_useful = $_POST['useful'];
$rating = $_POST['rating'];
$suggestion = $_POST['suggestion'];

// Insert data into the database
$sql = "INSERT INTO reviews (username, is_useful, rating, suggestion) VALUES ('$username', '$is_useful', '$rating', '$suggestion')";

if ($conn->query($sql) === TRUE) {
    echo "Review submitted successfully! <a href='reviews.php'>View Reviews</a>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close connection
$conn->close();
?>
