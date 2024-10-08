<?php
header('Content-Type: application/json');
require("../config/db_connection.php");
session_start();

// Only allow POST requests
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the password and user ID from the AJAX request
    $newPassword = isset($_POST['password']) ? $_POST['password'] : '';
    $userId = isset($_POST['userId']) ? (int)$_POST['userId'] : 0; // Casting to int for safety

    // Validate input
    if (empty($newPassword)) {
        echo json_encode(['success' => false, 'message' => 'Password cannot be empty']);
        exit;
    }

    if ($userId <= 0) {
        echo json_encode(['success' => false, 'message' => 'Invalid user ID']);
        exit;
    }

    // Prepare the SQL query
    $sql = "UPDATE users SET password = '$newPassword' WHERE id = $userId";

    // Execute the query
    if (mysqli_query($conn, $sql)) {
        echo json_encode(['success' => true, 'message' => 'Password updated successfully']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Error updating password: ' . mysqli_error($conn)]);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request method']);
}

// Close the connection
mysqli_close($conn);
?>
