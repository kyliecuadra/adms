<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require("../config/db_connection.php");
header('Content-Type: application/json');
session_start();

$id = $_SESSION['id'];

// Updated query to include email and unread messages count
$query = "
    SELECT u.id, u.fname, u.lname, u.email,
           COUNT(CASE WHEN m.is_read = 0 AND m.receiver_id = '$id' THEN 1 END) AS unread_count
    FROM users u
    LEFT JOIN messages m ON m.sender_id = u.id AND m.receiver_id = '$id'
    WHERE u.id != '$id'
    GROUP BY u.id, u.fname, u.lname, u.email order by timestamp DESC
";

$result = mysqli_query($conn, $query);

if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}

$users = [];
while ($row = mysqli_fetch_assoc($result)) {
    $users[] = $row;
}

echo json_encode($users);
mysqli_close($conn);
?>
