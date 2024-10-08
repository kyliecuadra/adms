<?php
// Check if the request is a POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the subject and message from the POST request
    $subject = isset($_POST['subject']) ? trim($_POST['subject']) : '';
    $message = isset($_POST['message']) ? trim($_POST['message']) : '';

    // Set the recipient email address
    $to = 'rickajunecharlotte.panton@cvsu.edu.ph'; // Replace with the recipient's email

    // Create the Gmail link
    $gmailLink = "https://mail.google.com/mail/?view=cm&fs=1&to=" . urlencode($to) . "&su=" . urlencode($subject) . "&body=" . urlencode($message);

    // Respond with the Gmail link
    echo json_encode(["status" => "success", "link" => $gmailLink]);
} else {
    echo json_encode(["status" => "error", "message" => "Invalid request."]);
}
?>
