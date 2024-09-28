<?php
// Database connection
require("../config/db_connection.php");

// Start the session
session_start();

// Check if the session variable for college is set
if (!isset($_SESSION['college'])) {
    echo json_encode(['error' => 'No college information found.']);
    exit();
}

// Get the current user's college from the session
$current_college = $_SESSION['college'];

// Query to get programs based on the user's college using a JOIN
$query = "SELECT us.programs FROM university_structure us WHERE us.colleges = ?";
$stmt = $conn->prepare($query);
if (!$stmt) {
    echo json_encode(['error' => 'Database query preparation failed.']);
    exit();
}

$stmt->bind_param("s", $current_college);
$stmt->execute();
$result = $stmt->get_result();

// Initialize an array to hold the programs
$programs = [];

while ($row = $result->fetch_assoc()) {
    $programs[] = $row['programs'];
}
$stmt->close();

// Check if programs were found
if (empty($programs)) {
    echo json_encode(['message' => 'No programs found for this college.']);
    exit();
}

// Set the content type to JSON
header('Content-Type: application/json');

// Return the programs as a JSON response
echo json_encode($programs);
?>