<?php
header('Content-Type: application/json');
require("../config/db_connection.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the accreditation ID from the AJAX request
    $accreditationId = $_POST['id'];

    // Validate the ID to ensure it is not empty and is numeric
    if (!empty($accreditationId) && is_numeric($accreditationId)) {
        // Sanitize the ID to prevent SQL injection
        $accreditationId = intval($accreditationId);

        // Construct the DELETE query
        $query = "DELETE FROM accreditation_schedule WHERE id = $accreditationId";

        // Execute the query
        if (mysqli_query($conn, $query)) {
            // If the query is successful, return a success response
            echo json_encode(['success' => true]);
        } else {
            // If the query fails, return an error message
            echo json_encode(['success' => false, 'message' => 'Failed to delete accreditation.']);
        }
    } else {
        // Return an error response for invalid accreditation ID
        echo json_encode(['success' => false, 'message' => 'Invalid accreditation ID.']);
    }

    // Close the database connection
    mysqli_close($conn);
} else {
    // Return an error response for invalid request method
    echo json_encode(['success' => false, 'message' => 'Invalid request method.']);
}
?>
