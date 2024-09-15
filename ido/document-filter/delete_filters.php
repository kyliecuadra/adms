<?php
require ("../../config/db_connection.php");
session_start();

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $identifier = $_POST['identifier'];

    if($identifier == "area"){
        $campus = $_POST['campus'];
        $college =  $_POST['college'];
        $area = $_POST['area'];

        $query = "DELETE FROM document_filter WHERE campus = '$campus' AND colleges = '$college' AND area = '$area'";
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
        $area = $_POST['area'];
        $parameter = $_POST['parameter'];

        $query = "DELETE FROM document_filter  WHERE campus = '$campus' AND colleges = '$college' AND area = '$area' AND parameter = '$parameter'";
        $result = mysqli_query($conn, $query);

        if ($result) {
            echo "success";
        }else{
            echo "failed";
        }
    }
}
?>