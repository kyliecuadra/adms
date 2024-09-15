<?php
require ("../../config/db_connection.php");
session_start();

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $identifier = $_POST['identifier'];

    if($identifier == "area"){
        $campusName = $_POST['campus'];
        $collegeName = $_POST['college'];
        $areaName = $_POST['area'];

        $query = "SELECT id FROM document_filter WHERE campus = '$campusName' AND colleges = '$collegeName' AND area = '$areaName'";
        $result = mysqli_query($conn, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            echo "existing";
        }else{
            mysqli_query($conn, "INSERT INTO document_filter (campus, colleges, area) VALUES ('".$campusName."','".$collegeName."','".$areaName."')");
            echo "success";
        }
        
    }
    else {
        $campusName = $_POST['campus'];
        $collegeName = $_POST['college'];
        $areaName = $_POST['area'];
        $parameterName = $_POST['parameter'];

        $query = "SELECT id FROM document_filter WHERE campus = '$campusName' AND colleges = '$collegeName' AND area = '$areaName' AND parameter = '$parameterName'";
        $result = mysqli_query($conn, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            echo "existing";
        }else{
            mysqli_query($conn, "INSERT INTO document_filter (campus, colleges, area, parameter) VALUES ('".$campusName."','".$collegeName."','".$areaName."','".$parameterName."')");
            echo "success";
        }
    }
}
?>