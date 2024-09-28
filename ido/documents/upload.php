<?php
require("../../config/db_connection.php");

// Define the target directory where files will be uploaded
$targetDir = "../../assets/documents/";

if (!file_exists($targetDir)) {
    mkdir($targetDir, 0755, true);
}

$response = array();

if (isset($_FILES['fileInput']) && isset($_POST['area']) && isset($_POST['parameter']) && isset($_POST['quality']) && isset($_POST['benchmark'])) {
    $files = $_FILES['fileInput'];
    $campus = mysqli_real_escape_string($conn, $_POST['campus']);
    $college = mysqli_real_escape_string($conn, $_POST['college']);
    $area = mysqli_real_escape_string($conn, $_POST['area']);
    $parameter = mysqli_real_escape_string($conn, $_POST['parameter']);
    $quality = mysqli_real_escape_string($conn, $_POST['quality']);
    $programs = isset($_POST['programs']) ? mysqli_real_escape_string($conn, $_POST['programs']) : '';
    $benchmark = isset($_POST['benchmark']) ? mysqli_real_escape_string($conn, $_POST['benchmark']) : '';
    $uploadDate = date('Y-m-d');

    mysqli_begin_transaction($conn);

    for ($i = 0; $i < count($files['name']); $i++) {
        if ($files['error'][$i] === UPLOAD_ERR_OK) {
            $fileName = basename($files["name"][$i]);
            $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);
            $fileBaseName = pathinfo($fileName, PATHINFO_FILENAME);

            // Create a unique file name if the file already exists
            $targetFilePath = $targetDir . $fileName;
            $counter = 1;
            while (file_exists($targetFilePath)) {
                $newFileName = $fileBaseName . '_' . $counter . '.' . $fileExtension;
                $targetFilePath = $targetDir . $newFileName;
                $counter++;
            }

            if (move_uploaded_file($files["tmp_name"][$i], $targetFilePath)) {
                $query = "INSERT INTO documents (area, parameter, quality, campus, college, program, benchmark, file_name, upload_date) VALUES ('$area', '$parameter', '$quality', '$campus', '$college', '$programs', '$benchmark', '$newFileName', '$uploadDate')";

                if (mysqli_query($conn, $query)) {
                    $response[] = array('status' => 'success', 'message' => 'File uploaded and data saved successfully.', 'fileName' => $newFileName);
                } else {
                    mysqli_rollback($conn);
                    $response[] = array('status' => 'error', 'message' => 'Failed to insert data into the database: ' . mysqli_error($conn));
                    break; // Exit the loop on error
                }
            } else {
                $response[] = array('status' => 'error', 'message' => 'Failed to move uploaded file: ' . $fileName);
            }
        } else {
            $response[] = array('status' => 'error', 'message' => 'Error during file upload for: ' . $files['name'][$i]);
        }
    }

    mysqli_commit($conn); // Commit all successful inserts
} else {
    $response[] = array('status' => 'error', 'message' => 'No file uploaded or missing form data.');
}

mysqli_close($conn);

header('Content-Type: application/json');
echo json_encode($response);
?>
