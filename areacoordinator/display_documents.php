<?php
// display_faculty.php
header('Content-Type: application/json');

// Database connection
require("../config/db_connection.php");

// SQL query
$query = "
    SELECT 
        fname, 
        mname, 
        lname,
        email, 
        password, 
        status 
    FROM users
";

$result = mysqli_query($conn, $query);

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
mysqli_free_result($result);

// Close the database connection
mysqli_close($conn);

// Send the data back as JSON
echo json_encode(array('data' => $data));

?>

