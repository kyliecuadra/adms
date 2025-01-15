<?php
// Database connection settings
require("config/db_connection.php");

// Check if the request is a POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the subject and message from the POST request
    $subject = isset($_POST['subject']) ? trim($_POST['subject']) : '';
    $message = isset($_POST['message']) ? trim($_POST['message']) : '';

    // Query to get all admin emails with 'ido' role
    $result = mysqli_query($conn, "SELECT email FROM users WHERE role = 'ido'");

    if ($result) {
        // Initialize an empty array for the recipient emails
        $adminEmails = [];

        // Fetch all the emails and store them in the array
        while ($row = mysqli_fetch_assoc($result)) {
            $adminEmails[] = $row['email'];
        }

        if (!empty($adminEmails)) {
            // Create a comma-separated list of email addresses
            $to = implode(',', $adminEmails);

            // Create the Gmail link
            $gmailLink = "https://mail.google.com/mail/?view=cm&fs=1&to=" . urlencode($to) . "&su=" . urlencode($subject) . "&body=" . urlencode($message);

            // Respond with the Gmail link
            echo json_encode(["status" => "success", "link" => $gmailLink]);
        } else {
            echo json_encode(["status" => "error", "message" => "No admin emails found."]);
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
