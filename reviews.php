<?php
// Database connection
$conn = new mysqli("localhost", "root", "", "reviews_db");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch reviews
$sql = "SELECT username, is_useful, rating, suggestion, created_at FROM reviews ORDER BY created_at DESC";
$result = $conn->query($sql);

// Calculate average rating
$avg_sql = "SELECT AVG(rating) as avg_rating FROM reviews";
$avg_result = $conn->query($avg_sql);
$avg_row = $avg_result->fetch_assoc();
$average_rating = round($avg_row['avg_rating'], 1);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reviews</title>
</head>
<body>
    <h2>User Reviews</h2>
    <p><strong>Average Rating:</strong> <?php echo $average_rating; ?> / 5 ⭐</p>
    <table border="1">
        <tr>
            <th>Username</th>
            <th>Useful?</th>
            <th>Rating</th>
            <th>Suggestion</th>
            <th>Date</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                    <td>{$row['username']}</td>
                    <td>{$row['is_useful']}</td>
                    <td>{$row['rating']}</td>
                    <td>{$row['suggestion']}</td>
                    <td>{$row['created_at']}</td>
                </tr>";
            }
        } else {
            echo "<tr><td colspan='5'>No reviews yet.</td></tr>";
        }
        ?>
    </table>
</body>
</html>

<?php
$conn->close();
?>
