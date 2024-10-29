<?php
// display_faculty.php
header('Content-Type: application/json');

// Database connection
require("../config/db_connection.php");

// Initialize the data array
$data = array();

// Check if the identifier parameter is set and has the value "users"
// FOR ACCOUNT
if (isset($_GET['identifier']) && $_GET['identifier'] === "accounts") {
    // SQL query
    $query = "SELECT * FROM account_mngmt";

    // Execute the query
    $result = mysqli_query($conn, $query);

    // Check if the query was successful
    if ($result) {
        // Fetch data
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $data[] = array(
                    'id' => $row['id'],
                    'name' => $row['fname'] . ' ' . $row['mname'] . ' ' . $row['lname'],
                    'campus' => $row['campus'],
                    'college' => $row['college'],
                    'phoneNumber' => $row['phonenumber'],
                    'email' => $row['email'],
                    'status' => $row['status'],
                );
            }
        }

        // Free the result set
        mysqli_free_result($result);
    } else {
        // Handle query error
        echo json_encode(array('error' => 'Query failed: ' . mysqli_error($conn)));
        exit();
    }
}
// FOR ALL USERS
elseif (isset($_GET['identifier']) && $_GET['identifier'] === "users") {
    // SQL query
    $query = "SELECT * FROM USERS";

    // Execute the query
    $result = mysqli_query($conn, $query);

    // Check if the query was successful
    if ($result) {
        // Fetch data
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                // Construct the expected password based on the first letter of fname and last name, all uppercase
                $expectedPassword = strtoupper(substr($row['fname'], 0, 1) . $row['lname']);

                // Determine the status based on password match
                $status = ($row['password'] === $expectedPassword) ? 'UNREGISTERED' : strtoupper($row['status']);
                $data[] = array(
                    'id' => $row['id'],
                    'name' => $row['fname'] . ' ' . $row['mname'] . ' ' . $row['lname'],
                    'campus' => $row['campus'],
                    'college' => $row['college'],
                    'phoneNumber' => $row['phonenumber'],
                    'email' => $row['email'],
                    'password' => $row['password'],
                    'role' => $row['role'],
                    'status' => $status,
                );
            }
        }

        // Free the result set
        mysqli_free_result($result);
    } else {
        // Handle query error
        echo json_encode(array('error' => 'Query failed: ' . mysqli_error($conn)));
        exit();
    }
}
// FOR QUAAC
elseif (isset($_GET['identifier']) && $_GET['identifier'] === "quaac") {
    // SQL query
    $query = "SELECT * FROM USERS WHERE role = 'quaac'";

    // Execute the query
    $result = mysqli_query($conn, $query);

    // Check if the query was successful
    if ($result) {
        // Fetch data
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                // Construct the expected password based on the first letter of fname and last name, all uppercase
                $expectedPassword = strtoupper(substr($row['fname'], 0, 1) . $row['lname']);

                // Determine the status based on password match
                $status = ($row['password'] === $expectedPassword) ? 'UNREGISTERED' : strtoupper($row['status']);
                $data[] = array(
                    'id' => $row['id'],
                    'name' => $row['fname'] . ' ' . $row['mname'] . ' ' . $row['lname'],
                    'campus' => $row['campus'],
                    'college' => $row['college'],
                    'phoneNumber' => $row['phonenumber'],
                    'email' => $row['email'],
                    'password' => $row['password'],
                    'status' => $status,
                );
            }
        }

        // Free the result set
        mysqli_free_result($result);
    } else {
        // Handle query error
        echo json_encode(array('error' => 'Query failed: ' . mysqli_error($conn)));
        exit();
    }
}
// FOR TASKFORCE
else {
    // SQL query
    $query = "SELECT * FROM USERS WHERE role = 'taskforce'";

    // Execute the query
    $result = mysqli_query($conn, $query);

    // Check if the query was successful
    if ($result) {
        // Fetch data
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {

                // Construct the expected password based on the first letter of fname and last name, all uppercase
                $expectedPassword = strtoupper(substr($row['fname'], 0, 1) . $row['lname']);

                // Determine the status based on password match
                $status = ($row['password'] === $expectedPassword) ? 'UNREGISTERED' : strtoupper($row['status']);

                $data[] = array(
                    'id' => $row['id'],
                    'name' => $row['fname'] . ' ' . $row['mname'] . ' ' . $row['lname'],
                    'campus' => $row['campus'],
                    'college' => $row['college'],
                    'phoneNumber' => $row['phonenumber'],
                    'email' => $row['email'],
                    'password' => $row['password'],
                    'status' => $status,
                );
            }
        }

        // Free the result set
        mysqli_free_result($result);
    } else {
        // Handle invalid identifier
        echo json_encode(array('error' => 'Invalid identifier.'));
        exit();
    }

}

// Close the database connection
mysqli_close($conn);

// Send the data back as JSON
echo json_encode(array('data' => $data));
?>