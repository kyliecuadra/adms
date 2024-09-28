<?php
header('Content-Type: application/json');
require("../config/db_connection.php");
session_start();

$events = []; // Initialize events array

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = mysqli_prepare($conn, "SELECT title, description, datestart, dateend FROM accreditation_schedule WHERE id = ?");
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $events = mysqli_fetch_assoc($result); // Fetch single event
} elseif (isset($_GET['date'])) {
    $date = $_GET['date'];
    $stmt = mysqli_prepare($conn, "SELECT title, description, datestart, dateend FROM accreditation_schedule WHERE DATE(datestart) = ?");
    mysqli_stmt_bind_param($stmt, "s", $date);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $events = mysqli_fetch_all($result, MYSQLI_ASSOC); // Fetch all events
}

mysqli_stmt_close($stmt);
mysqli_close($conn);

// Return results based on the query type
if (isset($id) && $events) {
    echo json_encode($events); // Return the single event found
} elseif (isset($date)) {
    echo json_encode($events); // Return all events found
} else {
    echo json_encode(['error' => 'No events found.']);
}
?>
