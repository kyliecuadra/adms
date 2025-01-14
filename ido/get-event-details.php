<?php
// Set the response content type to JSON
header('Content-Type: application/json');

// Include the database connection file
require("../config/db_connection.php");

// Start a session (if required for further functionality)
session_start();

// Initialize an empty array to store event data
$events = [];

// Check if an 'id' is provided in the GET request
if (isset($_GET['id'])) {
    // Fetch a specific event by its ID
    $id = $_GET['id'];

    // Prepare the SQL statement to prevent SQL injection
    $stmt = mysqli_prepare($conn, "SELECT id, title, description, datestart, dateend FROM accreditation_schedule WHERE id = ?");

    // Bind the event ID parameter to the SQL statement
    mysqli_stmt_bind_param($stmt, "i", $id);

    // Execute the prepared statement
    mysqli_stmt_execute($stmt);

    // Retrieve the result of the query
    $result = mysqli_stmt_get_result($stmt);

    // Fetch a single event as an associative array
    $events = mysqli_fetch_assoc($result);
} elseif (isset($_GET['today'])) {
    // Fetch events for the current month if 'today' is provided in the GET request
    $today = strtotime($_GET['today']); // Convert 'today' to a timestamp
    $dateStart = date('Y-m-01 00:00:00', $today); // Get the first day of the month
    $dateEnd = date('Y-m-t 23:59:59', $today); // Get the last day of the month

    // Prepare the SQL statement to fetch events within the date range
    $stmt = mysqli_prepare($conn, "SELECT title, description, datestart, dateend FROM accreditation_schedule WHERE datestart >= ? AND datestart <= ?");

    // Bind the start and end dates to the SQL statement
    mysqli_stmt_bind_param($stmt, "ss", $dateStart, $dateEnd);

    // Execute the prepared statement
    mysqli_stmt_execute($stmt);

    // Retrieve the result of the query
    $result = mysqli_stmt_get_result($stmt);

    // Fetch all matching events as an associative array
    $events = mysqli_fetch_all($result, MYSQLI_ASSOC);
} elseif (isset($_GET['date'])) {
    // Fetch events for a specific date if 'date' is provided in the GET request
    $date = $_GET['date']; // The date provided in 'YYYY-MM-DD' format

    // Prepare the SQL statement to fetch events for the specific date
    $stmt = mysqli_prepare($conn, "SELECT title, description, datestart, dateend FROM accreditation_schedule WHERE DATE(datestart) = ?");

    // Bind the date parameter to the SQL statement
    mysqli_stmt_bind_param($stmt, "s", $date);

    // Execute the prepared statement
    mysqli_stmt_execute($stmt);

    // Retrieve the result of the query
    $result = mysqli_stmt_get_result($stmt);

    // Fetch all matching events as an associative array
    $events = mysqli_fetch_all($result, MYSQLI_ASSOC);
}

// Close the prepared statement to free resources
mysqli_stmt_close($stmt);

// Close the database connection
mysqli_close($conn);

// Return the results in JSON format
if (isset($id) && $events) {
    // If an 'id' is provided and an event is found, return the single event
    echo json_encode($events);
} elseif (isset($_GET['today']) || isset($_GET['date'])) {
    // If 'today' or 'date' is provided and events are found, return all events
    echo json_encode($events);
} else {
    // If no events are found, return an error message
    echo json_encode(['error' => 'No events found.']);
}
?>
