<?php
require("../config/db_connection.php");
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';

    // Validate email format (optional)
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo json_encode(['status' => 'error', 'message' => 'Invalid email format.']);
        exit;
    }

    // Prepare the SQL query
    $email = mysqli_real_escape_string($conn, $email); // Escape the email for safety
    $query = "SELECT campus, college FROM users WHERE email = '$email'";

    // Execute the query
    $result = mysqli_query($conn, $query);

    // Check if the query was successful and if any user was found
    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            $user = mysqli_fetch_assoc($result); // Fetch campus and college
            echo json_encode(['status' => 'success', 'campus' => $user['campus'], 'college' => $user['college']]);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'No user found with this email.']);
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Query error: ' . mysqli_error($conn)]);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method.']);
}

// Close the database connection
mysqli_close($conn);

?>