<?php
require("config/db_connection.php");

if (isset($_POST['email'])) {
    $email = $_POST['email'];

    // Check if the user exists in the database
    $check = mysqli_query($conn, "SELECT * FROM users WHERE email = '".$email."'");
    if (mysqli_num_rows($check) > 0) {
        echo 'exists';
    } else {
        echo 'not_exists';
    }
} else {
    echo 'error';
}
?>
