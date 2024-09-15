<?php
require("../../config/db_connection.php");

// Define the target directory where files will be uploaded
$targetDir = "../../assets/documents/";

if (!file_exists($targetDir)) {
    mkdir($targetDir, 0755, true);
}

$response = array();

if (isset($_FILES['fileInput']) && isset($_POST['area']) && isset($_POST['parameter']) && isset($_POST['quality'])) {
    $file = $_FILES['fileInput'];
    $fileName = basename($file["name"]);
    $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);
    $fileBaseName = pathinfo($fileName, PATHINFO_FILENAME);
    $campus = $_POST['campus'];
    $college = $_POST['college'];

    // Create a unique file name if the file already exists
    $targetFilePath = $targetDir . $fileName;
    $counter = 1;
    while (file_exists($targetFilePath)) {
        $newFileName = $fileBaseName . '_' . $counter . '.' . $fileExtension;
        $targetFilePath = $targetDir . $newFileName;
        $counter++;
    }
    $fileName = basename($targetFilePath); // Update fileName to the new unique name

    $area = mysqli_real_escape_string($conn, $_POST['area']);
    $parameter = mysqli_real_escape_string($conn, $_POST['parameter']);
    $quality = mysqli_real_escape_string($conn, $_POST['quality']);

    // Collect and concatenate selected programs
    $programs = isset($_POST['programs']) ? $_POST['programs'] : '';

    // Get the current date in YYYY-MM-DD format
    $uploadDate = date('Y-m-d');
    
    if ($file["error"] === UPLOAD_ERR_OK) {
        if (move_uploaded_file($file["tmp_name"], $targetFilePath)) {
            $query = "INSERT INTO documents (area, parameter, quality, campus, college, program, file_name, upload_date) VALUES ('$area', '$parameter', '$quality', '$campus', '$college', '$programs', '$fileName', '$uploadDate')";

            if (mysqli_query($conn, $query)) {
                $response['status'] = 'success';
                $response['message'] = 'File uploaded and data saved successfully.';
                $response['fileName'] = $fileName;
            } else {
                $response['status'] = 'error';
                $response['message'] = 'Failed to insert data into the database: ' . mysqli_error($conn);
            }
        } else {
            $response['status'] = 'error';
            $response['message'] = 'Failed to move uploaded file.';
        }
    } else {
        $response['status'] = 'error';
        $response['message'] = 'Error during file upload.';
    }
} else {
    $response['status'] = 'error';
    $response['message'] = 'No file uploaded or missing form data.';
}

mysqli_close($conn);

header('Content-Type: application/json');
echo json_encode($response);
?>
