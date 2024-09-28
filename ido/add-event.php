<?php
require("../config/db_connection.php");
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = trim($_POST['title']);
    $description = trim($_POST['description']);
    $campus = trim($_POST['campus']);
    $college = trim($_POST['college']);
    $program = trim($_POST['program']);
    $datestart = $_POST['datestart'];
    $dateend = $_POST['dateend'];

    // Validate inputs
    if (empty($title) || empty($description) || empty($campus) || empty($college) || empty($program) || empty($datestart) || empty($dateend)) {
        echo json_encode(['success' => false, 'message' => 'All fields are required.']);
        exit;
    }

    // Prepare statement to insert data
    $stmt = mysqli_prepare($conn, "INSERT INTO accreditation_schedule (title, description, campus, college, program, datestart, dateend) VALUES (?, ?, ?, ?, ?, ?, ?)");
    
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "sssssss", $title, $description, $campus, $college, $program, $datestart, $dateend);
        if (mysqli_stmt_execute($stmt)) {
            echo json_encode(['success' => true, 'message' => 'Accreditation schedule added successfully.']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Error executing query: ' . mysqli_stmt_error($stmt)]);
        }
        mysqli_stmt_close($stmt);
    } else {
        echo json_encode(['success' => false, 'message' => 'Error preparing statement: ' . mysqli_error($conn)]);
    }

    mysqli_close($conn);
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request method.']);
}
?>
