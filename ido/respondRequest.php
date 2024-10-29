<?php
require("../config/db_connection.php");
session_start();

if (isset($_POST['txt']) && $_POST['txt'] === 'getInfo') {
    // Get ID and status from POST data
    $id = intval($_POST['id']); // Ensure that $id is an integer
    $status = $_POST['status'];

    // Prepare the SQL statement
    $sql = "SELECT * FROM account_mngmt WHERE id = $id";
    $query = mysqli_query($conn, $sql);

    $data = '';

    if (mysqli_num_rows($query) > 0) {
        // Fetch the user details
        $row = mysqli_fetch_assoc($query);
        $id = $row['id'];
        $name = htmlspecialchars($row['fname'] . ' ' . $row['mname'] . ' ' . $row['lname']); // Escape user data

        $data .= '
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Status</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">';

        // Display confirmation message based on status
        if ($status == 'approve') {
            $data .= 'Are you sure you want to approve <strong>' . $name . '</strong> as QUAAC?';
        } else {
            $data .= 'Are you sure you want to reject <strong>' . $name . '</strong> as QUAAC?';
        }

        $data .= '</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="background-color: #8592a3 !important; border-color: #8592a3 !important;">Close</button>';
                if ($status == 'approve') {
            $data .= '<button type="button" class="btn btn-primary" data-bs-dismiss="modal" onclick="respondRequest(\'' . htmlspecialchars($status) . '\', ' . $id . ')">Approve</button>';
        } else {
            $data .= '<button type="button" class="btn btn-primary" data-bs-dismiss="modal" onclick="respondRequest(\'' . htmlspecialchars($status) . '\', ' . $id . ')">Reject</button>';
        }

            $data .= '</div>
        ';
    } else {
        // Handle case where no user is found
        $data .= '<div class="modal-body">No user found with the given ID.</div>';
    }

    // Free the result set
    mysqli_free_result($query);
    echo $data;
}


if (isset($_POST['txt']) && $_POST['txt'] === 'respond') {
    $status = $_POST['status'];
    $id = $_POST['id'];
    $query = '';

    if ($status === 'approve') {
        // Move data from account_mngmt to users
        // Ensure you select the correct columns that match the users table structure
        $select_query = "SELECT fname, mname, lname, email, campus, college, phonenumber, password, role FROM account_mngmt WHERE id = $id";
        $result = mysqli_query($conn, $select_query);

        if ($result && mysqli_num_rows($result) > 0) {
            $user_data = mysqli_fetch_assoc($result);

            // Prepare the insert query for users table
            $insert_query = "INSERT INTO users (fname, mname, lname, email, campus, college, phonenumber, password, role, status)
                             VALUES ('" . mysqli_real_escape_string($conn, $user_data['fname']) . "',
                                     '" . mysqli_real_escape_string($conn, $user_data['mname']) . "',
                                     '" . mysqli_real_escape_string($conn, $user_data['lname']) . "',
                                     '" . mysqli_real_escape_string($conn, $user_data['email']) . "',
                                     '" . mysqli_real_escape_string($conn, $user_data['campus']) . "',
                                     '" . mysqli_real_escape_string($conn, $user_data['college']) . "',
                                     '" . mysqli_real_escape_string($conn, $user_data['phonenumber']) . "',
                                     '" . mysqli_real_escape_string($conn, $user_data['password']) . "',
                                     '" . mysqli_real_escape_string($conn, $user_data['role']) . "',
                                     'inactive')";

            // Execute the insert query
            if (mysqli_query($conn, $insert_query)) {
                // If successful, delete the record from account_mngmt
                $delete_query = "DELETE FROM account_mngmt WHERE id = $id";
                if (mysqli_query($conn, $delete_query)) {
                    echo 'success';
                } else {
                    echo 'failed to delete account_mngmt record';
                }
            } else {
                echo 'failed to insert into users';
            }
        } else {
            echo 'no account_mngmt record found';
        }
    } else if ($status === 'reject') {
        // If rejected, delete the record from account_mngmt
        $delete_query = "DELETE FROM account_mngmt WHERE id = $id";
        if (mysqli_query($conn, $delete_query)) {
            echo 'success';
        } else {
            echo 'failed to delete account_mngmt record';
        }
    }
}


?>