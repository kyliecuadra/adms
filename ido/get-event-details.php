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
} elseif (isset($_GET['today'])) {
    $today = strtotime($_GET['today']);
    $dateStart = date('Y-m-01 00:00:00', $today); // First day of the month
    $dateEnd = date('Y-m-t 23:59:59', $today); // Last day of the month
    $stmt = mysqli_prepare($conn, "SELECT title, description, datestart, dateend FROM accreditation_schedule WHERE datestart >= ? AND datestart <= ?");
    mysqli_stmt_bind_param($stmt, "ss", $dateStart, $dateEnd); // Use the correct variables
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $events = mysqli_fetch_all($result, MYSQLI_ASSOC); // Fetch all events in range
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
} elseif (isset($_GET['today']) || isset($_GET['date'])) {
    echo json_encode($events); // Return events found within the specified range
} else {
    echo json_encode(['error' => 'No events found.']);
}
?>
