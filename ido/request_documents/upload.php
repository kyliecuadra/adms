<?php
require("../../config/db_connection.php");

// Define the target directory where files will be uploaded
$targetDir = "../../assets/documents/";

if (!file_exists($targetDir)) {
    mkdir($targetDir, 0755, true);
}

$response = array();

if (isset($_FILES['fileInput']) && isset($_POST['area']) && isset($_POST['parameter']) && isset($_POST['quality'])) {
    $id = $_POST['id'];
    $file = $_FILES['fileInput'];
    $fileName = basename($file["name"]);
    $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);
    $fileBaseName = pathinfo($fileName, PATHINFO_FILENAME);
    $campus = $_POST['campus'];
    $college = $_POST['college'];
    $program = $_POST['program'];
    $benchmark = $_POST['benchmark'];

    // Create a unique file name if the file already exists
    $targetFilePath = $targetDir . $fileName;
    $counter = 1;
    while (file_exists($targetFilePath)) {
        $newFileName = $fileBaseName . '_' . $counter . '.' . $fileExtension;
        $targetFilePath = $targetDir . $newFileName;
        $counter++;
    }
    $fileName = basename($targetFilePath); // Update fileName to the new unique name

    // Sanitize user inputs
    $area = mysqli_real_escape_string($conn, $_POST['area']);
    $parameter = mysqli_real_escape_string($conn, $_POST['parameter']);
    $quality = mysqli_real_escape_string($conn, $_POST['quality']);
    $campus = mysqli_real_escape_string($conn, $campus);
    $college = mysqli_real_escape_string($conn, $college);
    $program = mysqli_real_escape_string($conn, $program);
    $uploadDate = date('Y-m-d');
    
    // Validate file type (allow only PDF for example)
    $allowedExtensions = ['pdf', 'jpg', 'jpeg', 'png', 'gif'];
    if (!in_array(strtolower($fileExtension), $allowedExtensions)) {
        $response['status'] = 'error';
        $response['message'] = 'Invalid file type. Only PDF, DOC, DOCX, and XLSX files are allowed.';
        echo json_encode($response);
        exit;
    }

    // Check for file upload errors
    if ($file["error"] !== UPLOAD_ERR_OK) {
        $response['status'] = 'error';
        $response['message'] = 'Error during file upload. Error code: ' . $file["error"];
        echo json_encode($response);
        exit;
    }

    if ($area != "Select Area" && $parameter != "Select Parameter") {
        if (move_uploaded_file($file["tmp_name"], $targetFilePath)) {
            // Prepare the SQL query
            $query = "INSERT INTO documents (area, parameter, quality, campus, college, program, benchmark, file_name, upload_date) 
                      VALUES ('$area', '$parameter', '$quality', '$campus', '$college', '$program', '$benchmark', '$fileName', '$uploadDate')";

            if (mysqli_query($conn, $query)) {
                // Update the request status to "Approved"
                $approveDocument = "UPDATE request_documents SET file_name = '$fileName', status = 'Approved', processed_date = CURDATE() WHERE id = $id";
                $result = mysqli_query($conn, $approveDocument);

                if ($result) {
                    // Fetch requestor details
                    $requestDetailsQuery = "SELECT requestor, area, parameter, quality FROM request_documents WHERE id = $id";
                    $detailsResult = mysqli_query($conn, $requestDetailsQuery);

                    if ($detailsResult && mysqli_num_rows($detailsResult) > 0) {
                        $row = mysqli_fetch_assoc($detailsResult);
                        $requestorEmail = $row['requestor'];
                        $area = $row['area'];
                        $parameter = $row['parameter'];
                        $quality = $row['quality'];

                        // Get the recipient user ID based on the requestor email
                        $userIdQuery = "SELECT id FROM users WHERE email = '$requestorEmail'";
                        $userIdResult = mysqli_query($conn, $userIdQuery);

                        if ($userIdResult && mysqli_num_rows($userIdResult) > 0) {
                            $userRow = mysqli_fetch_assoc($userIdResult);
                            $recipientUserId = $userRow['id'];

                            // Insert the notification
                            $notificationDescription = "Your requested document in $area; $parameter; $quality has been <strong>Approved!</strong>";
                            $notificationQuery = "INSERT INTO notifications (recipient_user_id, notification_description) 
                                                   VALUES ($recipientUserId, '$notificationDescription')";
                            mysqli_query($conn, $notificationQuery);
                        }
                    }
                    $response['status'] = 'success';
                    $response['message'] = 'File uploaded and data saved successfully.';
                    $response['fileName'] = $fileName;
                } else {
                    $response['status'] = 'error';
                    $response['message'] = 'Failed to update the document request status.';
                }
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
        $response['message'] = 'Invalid form data.';
    }
} else {
    $response['status'] = 'error';
    $response['message'] = 'No file uploaded or missing form data.';
}

mysqli_close($conn);

header('Content-Type: application/json');
echo json_encode($response);
?>
