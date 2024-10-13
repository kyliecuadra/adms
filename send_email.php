<?php
// Database connection settings
require("config/db_connection.php");

// Check if the request is a POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the subject and message from the POST request
    $subject = isset($_POST['subject']) ? trim($_POST['subject']) : '';
    $message = isset($_POST['message']) ? trim($_POST['message']) : '';

    // Query to get the admin's email from the users table
    $result = mysqli_query($conn, "SELECT email FROM users WHERE role = 'ido' LIMIT 1");

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $adminEmail = $row['email'] ?? null;

        if ($adminEmail) {
            // Set the recipient email address
            $to = $adminEmail;

            // Create the Gmail link
            $gmailLink = "https://mail.google.com/mail/?view=cm&fs=1&to=" . urlencode($to) . "&su=" . urlencode($subject) . "&body=" . urlencode($message);

            // Respond with the Gmail link
            echo json_encode(["status" => "success", "link" => $gmailLink]);
        } else {
            echo json_encode(["status" => "error", "message" => "Admin email not found."]);
        }
    } else {
        echo json_encode(["status" => "error", "message" => "Query failed: " . mysqli_error($conn)]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "Invalid request."]);
}

// Close the database connection
mysqli_close($conn);
?>
