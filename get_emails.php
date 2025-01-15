<?php
// Database connection settings
require("config/db_connection.php");

// SQL query to fetch emails where role is 'ido'
$sql = "SELECT email FROM users WHERE role = 'ido'";

// Execute the query using mysqli_query
$result = mysqli_query($conn, $sql);

// Initialize an empty array to store emails
$emails = [];

// Check if any rows are returned
if (mysqli_num_rows($result) > 0) {
    // Fetch all emails
    while ($row = mysqli_fetch_assoc($result)) {
        $emails[] = $row['email'];
    }
}

// Close the database connection
mysqli_close($conn);

// Return emails as a JSON response
echo json_encode($emails);
?>
