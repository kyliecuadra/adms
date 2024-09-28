<?php
require("../config/db_connection.php");
session_start();

if (isset($_POST['txt']) && $_POST['txt'] === 'getInfo') {
    $status = $_POST['status'];
    $id = $_POST['id'];

    $sql = "SELECT * from users where id = $id";

    $query = mysqli_query($conn, $sql);

    $data = '';

    if (mysqli_num_rows($query) > 0) {
        while ($row = mysqli_fetch_assoc($query)) {
            $id = $row['id'];
            $name = $row['fname'] . ' ' . $row['mname'] . ' ' . $row['lname'];
            $status = $row['status'];
            $tempStatus = '';
            if($status === "inactive"){
                $tempStatus = "active";
            }else {
                $tempStatus = "inactive";
            }

            $data .= '
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Update Status</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      Are you sure you want to update <strong>' . $name . '</strong> as <strong>' . $tempStatus . '</strong> QUAAC?
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="background-color: #8592a3 !important; border-color: #8592a3 !important;">Close</button>
                      <button type="button" class="btn btn-primary" data-bs-dismiss="modal" onclick="setQuaacStatus( \'' . htmlspecialchars($status) . '\', ' . $id . ')">Update</button>
                    </div>
                  ';
        }
    }
    echo $data;
}

if (isset($_POST['txt']) && $_POST['txt'] === 'setStatus') {
    $status = $_POST['status'];
    $id = $_POST['id'];
    $query = '';

    if ($status == 'inactive') {
        $query = "UPDATE users SET status = 'active' WHERE id = $id";
    } else {
        $query = "UPDATE users SET status = 'inactive' WHERE id = $id";
    }
    if (mysqli_query($conn, $query)) {
        echo 'success';
    } else {
        echo 'failed';
    }

}

?>