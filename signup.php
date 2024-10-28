<?php
require("config/db_connection.php");

// Function to check if a user already exists
function userExists($conn, $email) {
    $check = mysqli_query($conn, "SELECT * FROM users WHERE email = '".$email."'");
    return mysqli_num_rows($check) > 0;
}

// Main registration logic
// if (isset($_POST['fname'], $_POST['mname'], $_POST['lname'], $_POST['program'],
//         $_POST['department'], $_POST['email'], $_POST['cnumber'], $_POST['password'])) {
if (isset($_POST['fname'], $_POST['mname'], $_POST['lname'], $_POST['email'], $_POST['cnumber'], $_POST['password'])) {

    $fname = $_POST['fname'];
    $mname = $_POST['mname'];
    $lname = $_POST['lname'];
    // $program = $_POST['program'];
    // $department = $_POST['department'];
    $email = $_POST['email'];
    $cnumber = $_POST['cnumber'];
    //$password = $_POST['password'];

    $password = $_SESSION["fname"][0].$_SESSION["lname"];
    $password = str_replace(' ', '', $password);
    $password = mb_strtoupper($password);

    if (!userExists($conn, $email)) {
        // Using plain mysqli to insert data
        //$query = "INSERT INTO users (name, program, department, phoneNumber, email, password, user_level) VALUES ('$name', '$program', '$department', '$cnumber', '$email', '$password', 'quaac')";
        $query = "INSERT INTO users (fname, mname, lname, phoneNumber, email, password, role, status) VALUES ('$fname', '$mname.', '$lname', '$cnumber', '$email', '$password', 'quaac', 'inactive')";
        if (mysqli_query($conn, $query)) {
            echo 'success'; // Success response
        } else {
            echo 'failed'; // Error response
        }
    } else {
        echo '<script>toastr.error("User already exists");</script>';
    }
} else {
    echo '<script>toastr.error("Incomplete form data");</script>';
}
?>
