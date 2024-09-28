<?php
require("../../config/db_connection.php");

// Initialize an empty array for the data
$data = array();

// Check if 'identifier' parameter is set and equals "campus"
if (isset($_GET['identifier']) && $_GET['identifier'] === "campus") {
    // SQL query to get campus data
    $query = "SELECT * FROM university_structure GROUP BY campus";
    
    // Execute the query
    $result = mysqli_query($conn, $query);
    
    // Check if the query was successful
    if ($result) {
        // Fetch data
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $data[] = array(
                    'id' => $row['id'],
                    'campus' => $row['campus'] // Ensure this matches the DataTable 'campus' column
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
elseif (isset($_GET['identifier']) && $_GET['identifier'] === "college") {
    $campusName = $_GET['campus'];
    // SQL query to get campus data
    $query = "SELECT * FROM university_structure WHERE campus = '$campusName' AND colleges != '' GROUP BY colleges";
    
    // Execute the query
    $result = mysqli_query($conn, $query);
    
    // Check if the query was successful
    if ($result) {
        // Fetch data
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $data[] = array(
                    'id' => $row['id'],
                    'campus' => $row['campus'], // Ensure this matches the DataTable 'campus' column
                    'college' => $row['colleges'] // Ensure this matches the DataTable 'colleges' column
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
elseif (isset($_GET['identifier']) && $_GET['identifier'] === "documents") {
    $campusName = $_GET['campus'];
    $collegeName = $_GET['college'];
    // SQL query to get campus data
    $query = "SELECT * FROM request_documents WHERE campus = '$campusName' AND college = '$collegeName' AND status = 'Pending'";
    
    // Execute the query
    $result = mysqli_query($conn, $query);
    
    // Check if the query was successful
    if ($result) {
        // Fetch data
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $date = new DateTime($row['requested_date']);
                $formattedDate = $date->format('F d, Y');
                $data[] = array(
                    'id' => $row['id'],
                    'requestor' => $row['requestor'], // Ensure this matches the DataTable 'requestor' column
                    'area' => $row['area'], // Ensure this matches the DataTable 'area' column
                    'parameter' => $row['parameter'], // Ensure this matches the DataTable 'parameter' column
                    'quality' => $row['quality'], // Ensure this matches the DataTable 'quality' column
                    'campus' => $row['campus'], // Ensure this matches the DataTable 'campus' column
                    'college' => $row['college'], // Ensure this matches the DataTable 'colleges' column
                    'program' => $row['program'], // Ensure this matches the DataTable 'program' column
                    'benchmark' => $row['benchmark'], // Ensure this matches the DataTable 'benchmark' column
                    'filename' => $row['file_name'], // Ensure this matches the DataTable 'filename' column
                    'requested_date' => $formattedDate, // Ensure this matches the DataTable 'requested_date' column
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
elseif (isset($_GET['identifier']) && $_GET['identifier'] === "filterSearch") {
    $parameter = $_GET['parameter'];
    $quality = $_GET['quality'];
    $campusName = $_GET['campus'];
    $collegeName = $_GET['college'];
    // SQL query to get campus data
    $query = "SELECT * FROM documents WHERE campus = '$campusName' AND college = '$collegeName' AND parameter = '$parameter' AND quality = '$quality'";
    
    // Execute the query
    $result = mysqli_query($conn, $query);
    
    // Check if the query was successful
    if ($result) {
        // Fetch data
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $date = new DateTime($row['upload_date']);
                $formattedDate = $date->format('F d, Y');
                $data[] = array(
                    'id' => $row['id'],
                    'area' => $row['area'], // Ensure this matches the DataTable 'area' column
                    'parameter' => $row['parameter'], // Ensure this matches the DataTable 'parameter' column
                    'quality' => $row['quality'], // Ensure this matches the DataTable 'quality' column
                    'campus' => $row['campus'], // Ensure this matches the DataTable 'campus' column
                    'college' => $row['college'], // Ensure this matches the DataTable 'colleges' column
                    'program' => $row['program'], // Ensure this matches the DataTable 'program' column
                    'filename' => $row['file_name'], // Ensure this matches the DataTable 'filename' column
                    'upload_date' => $formattedDate, // Ensure this matches the DataTable 'upload_date' column
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
else {
    // Retrieve and sanitize input parameters
    $campusName = mysqli_real_escape_string($conn, $_GET['campus']);
    $collegeName = mysqli_real_escape_string($conn, $_GET['college']);
    
    // SQL query to get campus data
    $query = "SELECT * FROM university_structure WHERE campus = '$campusName' AND colleges = '$collegeName' AND programs != ''";
    
    // Execute the query
    $result = mysqli_query($conn, $query);
    
    // Initialize an array to hold the data
    $data = array();
    
    // Check if the query was successful
    if ($result) {
        // Fetch data
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $data[] = array(
                    'id' => $row['id'],
                    'campus' => $row['campus'], // Ensure this matches the DataTable 'campus' column
                    'college' => $row['colleges'], // Ensure this matches the DataTable 'colleges' column
                    'program' => $row['programs'] // Ensure this matches the DataTable 'program' column
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


// Output the data as JSON
echo json_encode(array('data' => $data));

// Close the database connection
mysqli_close($conn);
?>
