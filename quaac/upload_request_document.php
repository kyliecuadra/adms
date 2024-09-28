<?php
header('Content-Type: application/json');

// Include database connection
require("../config/db_connection.php");

session_start();

$response = array('success' => false, 'message' => '');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['documentarea']) && isset($_POST['parameter']) && isset($_POST['quality']) && isset($_POST['benchmark'])) {

        $documentarea = $_POST['documentarea'];
        $parameter = $_POST['parameter'];
        $quality = $_POST['quality'];
        $benchmark = $_POST['benchmark'];
        $date_requested = date('Y-m-d');
        $email = $_SESSION['email'];
        $role = $_SESSION['role'];
        $status = 'Pending'; // Default status

        $sql = "INSERT INTO request_documents (requestor, role, documentarea, parameter, quality, benchmark, daterequested, status) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("ssssssss", $email, $role, $documentarea, $parameter, $quality, $benchmark, $date_requested, $status);

            if ($stmt->execute()) {
                $response['success'] = true;
                $response['message'] = "Request document submitted successfully!";
            } else {
                $response['message'] = "Error: " . $stmt->error;
            }

            $stmt->close();
        } else {
            $response['message'] = "Error preparing the statement.";
        }
    } else {
        $response['message'] = "All form fields are required.";
    }

    $conn->close();
}

echo json_encode($response);
?>
