<?php
header('Content-Type: application/json');
require("../config/db_connection.php");
session_start();

// Check if user is logged in
if (!isset($_SESSION['id'])) {
    echo json_encode(["error" => "User not logged in."]);
    exit;
}

$sender_id = $_SESSION['id'];
$receiver_id = $_POST['receiver_id'];

// Mark messages sent from the receiver to the sender as read
$update_query = "
    UPDATE messages
    SET is_read = 1
    WHERE sender_id = '$receiver_id' AND receiver_id = '$sender_id' AND is_read = 0
";
$update_result = mysqli_query($conn, $update_query);

if (!$update_result) {
    echo json_encode(["error" => mysqli_error($conn)]);
    exit;
}

// Fetch messages
$query = "
    SELECT message, sender_id, is_read
    FROM messages
    WHERE (sender_id = '$sender_id' AND receiver_id = '$receiver_id')
    OR (sender_id = '$receiver_id' AND receiver_id = '$sender_id')
    ORDER BY timestamp ASC
";
$result = mysqli_query($conn, $query);

if (!$result) {
    echo json_encode(["error" => mysqli_error($conn)]);
    exit;
}

$messages = [];
while ($row = mysqli_fetch_assoc($result)) {
    $messages[] = $row;
}

// Return the messages in JSON format
echo json_encode($messages);
mysqli_close($conn);
?>
