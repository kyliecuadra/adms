<?php
require ("../../config/db_connection.php");
session_start();

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $identifier = $_POST['identifier'];

    if($identifier == "campus"){
        $campus = $_POST['campus'];

        $query = "DELETE FROM university_structure WHERE campus = '$campus'";
        $result = mysqli_query($conn, $query);

        if ($result) {
            echo "success";
        }else{
            echo "failed";
        }
    }
    elseif($identifier == "college"){
        $campus = $_POST['campus'];
        $college =  $_POST['college'];

        $query = "DELETE FROM university_structure WHERE campus = '$campus' AND colleges = '$college'";
        $result = mysqli_query($conn, $query);

        if ($result) {
            echo "success";
        }else{
            echo "failed";
        }
    }
    else{
        $campus = $_POST['campus'];
        $college =  $_POST['college'];
        $program = $_POST['program'];

        $query = "DELETE FROM university_structure WHERE campus = '$campus' AND colleges = '$college' AND programs = '$program'";
        $result = mysqli_query($conn, $query);

        if ($result) {
            echo "success";
        }else{
            echo "failed";
        }
    }
}
?>