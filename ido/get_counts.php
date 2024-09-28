<?php
require("../config/db_connection.php");

// Initialize an array to hold the counts
$counts = array();

// Query for documents count
$result = mysqli_query($conn, "SELECT COUNT(*) as document_count FROM documents");
$counts['documents'] = mysqli_fetch_assoc($result)['document_count'];

// Query for requests count
$result = mysqli_query($conn, "SELECT COUNT(*) as request_count FROM request_documents");
$counts['requests'] = mysqli_fetch_assoc($result)['request_count'];

// Query for users count
$result = mysqli_query($conn, "SELECT COUNT(*) as user_count FROM users");
$counts['users'] = mysqli_fetch_assoc($result)['user_count'];

// // Query for messages count
// $result = mysqli_query($conn, "SELECT COUNT(*) as message_count FROM messages");
// $counts['messages'] = mysqli_fetch_assoc($result)['message_count'];

// Return the counts as a JSON response
echo json_encode($counts);

// Close the database connection
mysqli_close($conn);
?>
