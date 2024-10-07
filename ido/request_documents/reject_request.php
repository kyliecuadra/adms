<?php
require ("../../config/db_connection.php");
session_start();

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $id = $_POST['id'];

    // Update the status of the request document
    $query = "UPDATE request_documents SET status = 'Rejected' WHERE id = $id";
    $result = mysqli_query($conn, $query);

    if ($result) {
        // Fetch the requestor email, area, parameter, and quality
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
                $notificationDescription = "Your requested document in $area; $parameter; $quality has been <strong>Rejected!</strong>";
                $notificationQuery = "INSERT INTO notifications (recipient_user_id, notification_description) VALUES ($recipientUserId, '$notificationDescription')";
                mysqli_query($conn, $notificationQuery);
            }
        }

        echo "success";
    } else {
        echo "failed";
    }
}
?>
