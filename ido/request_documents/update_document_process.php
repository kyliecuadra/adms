<?php
require("../../config/db_connection.php");
date_default_timezone_set('Asia/Manila');
// Get the form data
$id = isset($_POST['currentId']) ? mysqli_real_escape_string($conn, $_POST['currentId']) : '';
$campus = isset($_POST['campus']) ? mysqli_real_escape_string($conn, $_POST['campus']) : '';
$college = isset($_POST['college']) ? mysqli_real_escape_string($conn, $_POST['college']) : '';
$currentArea = isset($_POST['currentArea']) ? mysqli_real_escape_string($conn, $_POST['currentArea']) : '';
$currentParameter = isset($_POST['currentParameter']) ? mysqli_real_escape_string($conn, $_POST['currentParameter']) : '';
$currentQuality = isset($_POST['currentQuality']) ? mysqli_real_escape_string($conn, $_POST['currentQuality']) : '';
$currentFilename = isset($_POST['currentFilename']) ? mysqli_real_escape_string($conn, $_POST['currentFilename']) : ''; // Existing filename
$programs = isset($_POST['programs']) ? $_POST['programs'] : array();

// Initialize a flag to check if the file was uploaded
$fileUploaded = false;
$newFilename = $currentFilename;

// Check if a new file was uploaded
if (isset($_FILES['fileInput']) && $_FILES['fileInput']['error'] == UPLOAD_ERR_OK) {
    $file = $_FILES['fileInput'];
    $uploadDir = '../../assets/documents/'; // Directory where files will be stored
    $newFilename = basename($file['name']);
    $uploadFile = $uploadDir . $newFilename;

    // Move the uploaded file to the server
    if (move_uploaded_file($file['tmp_name'], $uploadFile)) {
        $fileUploaded = true;
    } else {
        die('Error: Unable to upload the file.');
    }
}

// Convert programs array to a comma-separated string
$programsEscaped = array_map(function($program) use ($conn) {
    return mysqli_real_escape_string($conn, $program);
}, $programs);

$programsString = implode(',', $programsEscaped);

// Archive the existing record
$archiveSql = "INSERT INTO archived_documents (area, parameter, quality, file_name, program, campus, college)
                SELECT area, parameter, quality, file_name, program, campus, college
                FROM documents
                WHERE id = '$id'";

if (!mysqli_query($conn, $archiveSql)) {
    die('Error archiving record: ' . mysqli_error($conn));
}

// Delete the old record from the documents table
$deleteSql = "DELETE FROM documents WHERE id = '$id'";

if (!mysqli_query($conn, $deleteSql)) {
    die('Error deleting old record: ' . mysqli_error($conn));
}

// Insert the new record into the documents table
$uploadDate = date('Y-m-d');
$insertSql = "INSERT INTO documents (area, parameter, quality, file_name, program, campus, college, upload_date)
              VALUES ('$currentArea', '$currentParameter', '$currentQuality', '$newFilename', '$programsString', '$campus', '$college', '$uploadDate')";

              echo $insertSql;

if (mysqli_query($conn, $insertSql)) {
    echo 'Document updated successfully!';
} else {
    echo 'Error inserting new record: ' . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);
?>
