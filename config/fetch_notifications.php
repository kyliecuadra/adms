<?php
require("db_connection.php");
session_start();

// Assume user ID is 6 (you might want to get this dynamically)
$userId = $_SESSION["id"];

// Mark notifications as read
$updateSql = "UPDATE notifications SET is_read = 1 WHERE recipient_user_id = $userId AND is_read = 0";
mysqli_query($conn, $updateSql);

// Fetch notifications with created_at
$sql = "SELECT id, notification_description AS description, timestamp FROM notifications WHERE recipient_user_id = $userId AND is_read = 1";
$result = mysqli_query($conn, $sql);

$notifications = [];
while ($row = mysqli_fetch_assoc($result)) {
    $notifications[] = $row;
}

// Return as JSON
header('Content-Type: application/json');
echo json_encode($notifications);

// Close the connection
mysqli_close($conn);
?>