<?php
require("../config/db_connection.php");

$sender_id = $_POST['sender_id'];
$receiver_id = $_POST['receiver_id'];
$message = $_POST['message'];

$query = "INSERT INTO messages (sender_id, receiver_id, message, is_read) VALUES ('$sender_id', '$receiver_id', '$message', 0)";
mysqli_query($conn, $query);
mysqli_close($conn);
?>
