<?php
// Database connection
require("../config/db_connection.php");
// Start the session
session_start();

// Ensure the user is logged in and the college is stored in the session
if (!isset($_SESSION['college'])) {
    // Handle the case where college is not set (e.g., redirect to login or return an error)
    echo json_encode(array('error' => 'User not logged in or college not set in session'));
    exit;
}

// Get the current user's college from the session
$userCollege = $_SESSION['college'];



// SQL query - filter data based on the current user's college
$query = "
    SELECT 
        fname, 
        mname, 
        lname,
        email, 
        password, 
        status 
    FROM users
    WHERE college = ?
";

// Prepare the SQL statement
$stmt = $conn->prepare($query);
$stmt->bind_param('s', $userCollege);
$stmt->execute();
$result = $stmt->get_result();

// Build an array to hold your data
$data = array();

// Fetch data
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = array(
            'name' => $row['fname'] . ' ' . $row['mname'] . ' ' . $row['lname'],
            'email' => $row['email'],
            'password' => $row['password'],
            'status' => $row['status'],
        );
    }
}

// Free the result set
$stmt->close();
mysqli_close($conn);

// Send the data back as JSON
echo json_encode(array('data' => $data));

?>
