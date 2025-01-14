<?php
require("../../config/db_connection.php");
session_start();
$targetDir = "../../assets/documents/";

if (!file_exists($targetDir)) {
    mkdir($targetDir, 0755, true);
}

$response = array();

if (isset($_FILES['subFile']) && isset($_POST['subArea']) && isset($_POST['subParameter']) && isset($_POST['subQuality']) && isset($_POST['subBenchmark'])) {
    $files = $_FILES['subFile'];
    $campus = mysqli_real_escape_string($conn, $_POST['subCampus']);
    $college = mysqli_real_escape_string($conn, $_POST['subCollege']);
    $program = mysqli_real_escape_string($conn, $_POST['subProgram']);
    $area = mysqli_real_escape_string($conn, $_POST['subArea']);
    $parameter = mysqli_real_escape_string($conn, $_POST['subParameter']);
    $quality = mysqli_real_escape_string($conn, $_POST['subQuality']);
    $benchmark = isset($_POST['subBenchmark']) ? mysqli_real_escape_string($conn, $_POST['subBenchmark']) : '';
    $parentId =  isset($_POST['parentId']) ? mysqli_real_escape_string($conn, $_POST['parentId']) : '';
    $uploadDate = date('Y-m-d');
    mysqli_begin_transaction($conn);
    $success = true;

    for ($i = 0; $i < count($files['name']); $i++) {
        $newFileName = ''; // Initialize the variable here

        if ($files['error'][$i] === UPLOAD_ERR_OK) {
            $fileName = preg_replace('/[^a-zA-Z0-9-_\.]/', '_', $files["name"][$i]);
            $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
            $fileBaseName = pathinfo($fileName, PATHINFO_FILENAME);

            $allowedExtensions = ['pdf', 'jpg', 'jpeg', 'png', 'gif'];
            if (!in_array($fileExtension, $allowedExtensions)) {
                $response[] = array('status' => 'error', 'message' => 'Invalid file type: ' . $fileName);
                continue;
            }

            if ($files['size'][$i] > 50 * 1024 * 1024) {
                $response[] = array('status' => 'error', 'message' => 'File size exceeds limit for: ' . $fileName);
                continue;
            }

            $targetFilePath = $targetDir . $fileName;
            $counter = 1;
            while (file_exists($targetFilePath)) {
                $newFileName = $fileBaseName . '_' . $counter . '.' . $fileExtension;
                $targetFilePath = $targetDir . $newFileName;
                $counter++;
            }

            if (move_uploaded_file($files["tmp_name"][$i], $targetFilePath)) {
                // Assign the unique filename after a successful move
                $newFileName = $counter > 1 ? $fileBaseName . '_' . ($counter - 1) . '.' . $fileExtension : $fileName;

                $query = "INSERT INTO documents (area, parameter, quality, campus, college, program, benchmark, file_name, upload_date, parent_benchmark) VALUES ('$area', '$parameter', '$quality', '$campus', '$college', '$program', '$benchmark', '$newFileName', '$uploadDate', '$parentId')";

                if (mysqli_query($conn, $query)) {
                    // Insert notification for users with 'quaac' role
                    $notificationDescription = "<strong>".$_SESSION['email']."</strong> uploaded a new document for ".$college." in ".$campus." under ".$program.".<small>.$area; .$parameter;.$quality</small>";
                    $quaacQuery = "SELECT id FROM users WHERE role = 'quaac'";
                    $quaacResult = mysqli_query($conn, $quaacQuery);

                    if ($quaacResult && mysqli_num_rows($quaacResult) > 0) {
                        while ($quaacUser = mysqli_fetch_assoc($quaacResult)) {
                            $recipientUserId = $quaacUser['id'];
                            $notificationInsert = "INSERT INTO notifications (recipient_user_id, notification_description) VALUES ('$recipientUserId', '$notificationDescription')";
                            mysqli_query($conn, $notificationInsert);
                        }
                    }
                    $response[] = array('status' => 'success', 'message' => 'File uploaded and data saved successfully.', 'fileName' => $newFileName);
                } else {
                    $success = false;
                    $response[] = array('status' => 'error', 'message' => 'Failed to insert data into the database: ' . mysqli_error($conn));
                    break;
                }
            } else {
                $success = false;
                $response[] = array('status' => 'error', 'message' => 'Failed to move uploaded file: ' . $fileName);
            }
        } else {
            $success = false;
            switch ($files['error'][$i]) {
                case UPLOAD_ERR_INI_SIZE:
                case UPLOAD_ERR_FORM_SIZE:
                    $response[] = array('status' => 'error', 'message' => 'File size is too large for: ' . $files['name'][$i]);
                    break;
                default:
                    $response[] = array('status' => 'error', 'message' => 'Error during file upload for: ' . $files['name'][$i]);
            }
        }
    }

    if ($success) {
        mysqli_commit($conn); // Commit only if all succeeded
    } else {
        mysqli_rollback($conn);
    }
} else {
    $response[] = array('status' => 'error', 'message' => 'No file uploaded or missing form data.');
}

mysqli_close($conn);

header('Content-Type: application/json');
echo json_encode($response);
?>
