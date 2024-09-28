<?php
header('Content-Type: application/json');
require("../config/db_connection.php");
session_start();

$stmt = mysqli_prepare($conn, "SELECT id, title, datestart, dateend FROM accreditation_schedule");
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$events = mysqli_fetch_all($result, MYSQLI_ASSOC);

mysqli_stmt_close($stmt);
mysqli_close($conn);

echo json_encode($events); // Return all events found
?>
