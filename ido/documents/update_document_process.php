<?php
require("../../config/db_connection.php");

// Get the form data and sanitize inputs
$id = isset($_POST['currentId']) ? mysqli_real_escape_string($conn, $_POST['currentId']) : '';
$campus = isset($_POST['campus']) ? mysqli_real_escape_string($conn, $_POST['campus']) : '';
$college = isset($_POST['college']) ? mysqli_real_escape_string($conn, $_POST['college']) : '';
$program = isset($_POST['program']) ? mysqli_real_escape_string($conn, $_POST['program']) : '';
$currentArea = isset($_POST['currentArea']) ? mysqli_real_escape_string($conn, $_POST['currentArea']) : '';
$currentParameter = isset($_POST['currentParameter']) ? mysqli_real_escape_string($conn, $_POST['currentParameter']) : '';
$currentQuality = isset($_POST['currentQuality']) ? mysqli_real_escape_string($conn, $_POST['currentQuality']) : '';
$currentBenchmark = isset($_POST['currentBenchmark']) ? mysqli_real_escape_string($conn, $_POST['currentBenchmark']) : '';
$currentFilename = isset($_POST['currentFilename']) ? mysqli_real_escape_string($conn, $_POST['currentFilename']) : '';
$currentParentBenchmark = isset($_POST['currentParentBenchmark']) ? mysqli_real_escape_string($conn, $_POST['currentParentBenchmark']) : '';

// Fetch existing document data from the database
$query = "SELECT * FROM documents WHERE id = '$id'";
$result = mysqli_query($conn, $query);
$existingData = mysqli_fetch_assoc($result);

// Initialize new values, default to existing values
$newArea = $currentArea ?: $existingData['area'];
$newParameter = $currentParameter ?: $existingData['parameter'];
$newQuality = $currentQuality ?: $existingData['quality'];
$newBenchmark = $currentBenchmark ?: $existingData['benchmark'];
$newFilename = $existingData['file_name']; // Start with existing filename

// Variable to track if the file has changed
$fileChanged = false;

// Check if a new file was uploaded
if (isset($_FILES['fileInput']) && $_FILES['fileInput']['error'] == UPLOAD_ERR_OK) {
    $file = $_FILES['fileInput'];
    $uploadDir = '../../assets/documents/'; // Directory where files will be stored
    $newFilename = basename($file['name']); // Get the new filename
    $uploadFile = $uploadDir . $newFilename;

    // Move the uploaded file to the server
    if (move_uploaded_file($file['tmp_name'], $uploadFile)) {
        $fileChanged = true; // Mark that the file has changed
    } else {
        die('Error: Unable to upload the file.'); // Handle file upload error
    }
}

// Check if any field (except file) has changed
$hasFieldChanges = false;

if ($newArea !== $existingData['area'] || 
    $newParameter !== $existingData['parameter'] || 
    $newQuality !== $existingData['quality'] || 
    $newBenchmark !== $existingData['benchmark']) {
    
    $hasFieldChanges = true; // Mark that there are field changes
}

// Process updates only if changes are detected
if ($hasFieldChanges || $fileChanged) {
    if($fileChanged){
        // Archive the existing record if there are changes
        $archiveSql = "INSERT INTO archived_documents (area, parameter, quality, file_name, benchmark, campus, college, program)
                        SELECT area, parameter, quality, file_name, benchmark, campus, college, program
                        FROM documents
                        WHERE id = '$id'";

        if (!mysqli_query($conn, $archiveSql)) {
            die('Error archiving record: ' . mysqli_error($conn)); // Handle archiving error
        }

        // Delete the old record from the documents table if archiving
        $deleteSql = "DELETE FROM documents WHERE id = '$id'";

        if (!mysqli_query($conn, $deleteSql)) {
            die('Error deleting old record: ' . mysqli_error($conn)); // Handle deletion error
        }
    }
    // Insert the new record into the documents table
    $insertSql = "INSERT INTO documents (id, area, parameter, quality, file_name, benchmark, campus, college, program, parent_benchmark)
                  VALUES ('$id', '$newArea', '$newParameter', '$newQuality', '$newFilename', '$newBenchmark', '$campus', '$college', '$program', '$currentParentBenchmark')
                  ON DUPLICATE KEY UPDATE 
                      area = '$newArea', 
                      parameter = '$newParameter', 
                      quality = '$newQuality', 
                      benchmark = '$newBenchmark', 
                      campus = '$campus', 
                      college = '$college',
                      program = '$program'";

    if (mysqli_query($conn, $insertSql)) {
        echo '1'; // Successfully updated
    } else {
        echo 'Error inserting/updating record: ' . mysqli_error($conn); // Handle insertion error
    }
} else {
    // No changes detected
    echo '0'; // Indicate no changes
}

// Close the database connection
mysqli_close($conn);
?>
