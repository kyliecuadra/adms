<?php
// Include database connection
require("../config/db_connection.php");

// Start session to get user email
session_start();

// Get the user's email from the session
if (!isset($_SESSION['email'])) {
    echo json_encode(['error' => 'User not logged in.']);
    exit;
}

$userEmail = $_SESSION['email'];

// SQL query to fetch data
$sql = "SELECT documentarea, parameter, quality, benchmark, daterequested, status FROM request_documents WHERE requestor = ?";

// Prepare and execute the statement
if ($stmt = $conn->prepare($sql)) {
    $stmt->bind_param("s", $userEmail);
    $stmt->execute();
    $result = $stmt->get_result();
    
    // Fetch all results
    $documents = [];
    while ($row = $result->fetch_assoc()) {
        $documents[] = $row;
    }

    // Return JSON response
    echo json_encode($documents);

    // Close the statement
    $stmt->close();
} else {
    echo json_encode(['error' => 'Error preparing the SQL statement.']);
}

// Close the connection
$conn->close();
?>