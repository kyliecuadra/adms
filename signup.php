<?php
require("config/db_connection.php");

// Function to check if a user already exists
function userExists($conn, $email)
{
    $check = mysqli_query($conn, "SELECT * FROM users WHERE email = '" . $email . "'");
    return mysqli_num_rows($check) > 0;
}

// Main registration logic
if (isset($_POST['fname'], $_POST['mname'], $_POST['lname'], $_POST['email'], $_POST['cnumber'], $_POST['password'], $_POST['campus'], $_POST['college'])) {

    $fname = $_POST['fname'];
    $mname = $_POST['mname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $cnumber = $_POST['cnumber'];
    $password = $_POST['password'];
    $campus = $_POST['campus'];
    $college = $_POST['college'];

    if (!userExists($conn, $email)) {
        // Using plain mysqli to insert data
        //$query = "INSERT INTO users (name, program, department, phoneNumber, email, password, user_level) VALUES ('$name', '$program', '$department', '$cnumber', '$email', '$password', 'quaac')";
        $query = "INSERT INTO account_mngmt (fname, mname, lname, phoneNumber, email, campus, college, password, role, status) VALUES ('$fname', '$mname.', '$lname', '$cnumber', '$email', '$campus', '$college', '$password', 'quaac', 'Pending')";
        if (mysqli_query($conn, $query)) {

            // Retrieve the ID of the user with the role "ido"
            $ido_query = "SELECT id FROM users WHERE role = 'ido' LIMIT 1";
            $ido_result = mysqli_query($conn, $ido_query);

            if ($ido_result && mysqli_num_rows($ido_result) > 0) {
                $ido_user = mysqli_fetch_assoc($ido_result);
                $ido_user_id = $ido_user['id'];
                // Insert a notification for the IDO user
                $notification_query = "INSERT INTO notifications (recipient_user_id, notification_description, timestamp, is_read)
                                   VALUES ($ido_user_id, '<strong>$email</strong> account is waiting for approval.', NOW(), 0)";

                if (mysqli_query($conn, $notification_query)) {
                    echo 'success'; // Success response for both insertions
                } else {
                    echo 'failed to insert notification'; // Error response for notification
                }
            } else {
                echo 'IDO user not found'; // Error if no IDO user is found
            }
        } else {
            echo 'failed'; // Error response
        }
    } else {
        echo '<script>toastr.error("User already exists");</script>';
    }
} else {
    echo '<script>toastr.error("Incomplete form data");</script>';
}
