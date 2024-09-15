<?php
require ("../../config/db_connection.php");
session_start();

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $identifier = $_POST['identifier'];

    if($identifier == "campus"){
        $campusName = $_POST['campus'];

        $query = "SELECT id FROM university_structure WHERE campus = '$campusName'";
        $result = mysqli_query($conn, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            echo "existing";
        }else{
            mysqli_query($conn, "INSERT INTO university_structure (campus) VALUES ('".$campusName."')");
            echo "success";
        }
        
    }
    elseif($identifier == "college"){
        $campusName = $_POST['campus'];
        $collegeName = $_POST['college'];

        $query = "SELECT id FROM university_structure WHERE campus = '$campusName' AND colleges = '$collegeName'";
        $result = mysqli_query($conn, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            echo "existing";
        }else{
            mysqli_query($conn, "INSERT INTO university_structure (campus, colleges) VALUES ('".$campusName."','".$collegeName."')");
            echo "success";
        }
    }
    else {
        $campusName = $_POST['campus'];
        $collegeName = $_POST['college'];
        $programName = $_POST['program'];

        $query = "SELECT id FROM university_structure WHERE campus = '$campusName' AND colleges = '$collegeName' AND programs = '$programName'";
        $result = mysqli_query($conn, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            echo "existing";
        }else{
            mysqli_query($conn, "INSERT INTO university_structure (campus, colleges, programs) VALUES ('".$campusName."','".$collegeName."','".$programName."')");
            echo "success";
        }
    }
}
?>