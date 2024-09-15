<?php
require("../../config/db_connection.php");

// Get the search term from the query string
$term = isset($_GET['term']) ? mysqli_real_escape_string($conn, $_GET['term']) : '';
$indicator = isset($_GET['indicator']) ? mysqli_real_escape_string($conn, $_GET['indicator']) : '';
$campus = isset($_GET['campus']) ? mysqli_real_escape_string($conn, $_GET['campus']) : '';
$college = isset($_GET['college']) ? mysqli_real_escape_string($conn, $_GET['college']) : '';
$area = isset($_GET['area']) ? mysqli_real_escape_string($conn, $_GET['area']) : '';
$result = "";
$tags = array();


// Prepare the query based on the indicator
if ($indicator === 'filter') {
    $sql = "SELECT parameter FROM document_filter WHERE parameter LIKE '%$term%' GROUP BY parameter";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $tags[] = $row['parameter'];
    }
} else if ($indicator === 'area') {
    // Another query based on a different indicator
    $sql = "SELECT area FROM document_filter WHERE campus = '$campus' AND colleges = '$college' AND area LIKE '%$term%' GROUP BY area";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $tags[] = $row['area'];
    }
} else{
    // Another query based on a different indicator
    $sql = "SELECT parameter FROM document_filter WHERE campus = '$campus' AND colleges = '$college' AND area = '$area' AND parameter LIKE '%$term%' GROUP BY parameter";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $tags[] = $row['parameter'];
    }
}

// Execute the query


// Fetch the results and build the response array



// Return the results as JSON
header('Content-Type: application/json');
echo json_encode($tags);

// Close connection
mysqli_free_result($result);
mysqli_close($conn);
?>
