<?php
require("../../config/db_connection.php");

$campus = isset($_GET['campus']) ? mysqli_real_escape_string($conn, $_GET['campus']) : '';
$college = isset($_GET['college']) ? mysqli_real_escape_string($conn, $_GET['college']) : '';

$sql = "SELECT programs FROM university_structure WHERE campus = '$campus' AND colleges = '$college'"; // Adjust table and column names as needed
$result = mysqli_query($conn, $sql);

// Generate the HTML list items
$html = '';
while ($row = mysqli_fetch_assoc($result)) {
    $programName = htmlspecialchars($row['programs']); // Escape special characters
    $html .= '<li class="d-flex align-items-center mb-2">
                <label class="me-auto">' . $programName . '</label>
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" name="programs[]" value="'.$programName.'">
                </div>
              </li>';
}

// Return the HTML
echo $html;

// Close connection
mysqli_free_result($result);
mysqli_close($conn);
?>
