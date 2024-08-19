<?php
require("config/db_connection.php");
session_start();

extract($_POST);

if (isset($_POST['email']) && isset($_POST['password'])) {
    $check_user = mysqli_query($conn, "SELECT * FROM users WHERE email='" . $email . "' AND password = '" . $password . "'");
    if (mysqli_num_rows($check_user) > 0) {
        while ($row = mysqli_fetch_assoc($check_user)) {
            $id = $row["id"];
            $fname = $row["fname"];
            $mname = $row["mname"];
            $lname = $row["lname"];
            $email = $row["email"];
            $campus = $row["campus"];
            $college = $row["college"];
            $password = $row["password"];
            $role = $row["role"];
            $status = $row["status"];
            
            if ($status === 'inactive') {
                echo 'inactive';
            } else {

                $_SESSION["id"] = $id;
                $_SESSION["fname"] = $fname;
                $_SESSION["mname"] = $mname;
                $_SESSION["lname"] = $lname;
                $_SESSION["email"] = $email;
                $_SESSION["campus"] = $campus;
                $_SESSION["college"] = $college;
                $_SESSION["password"] = $password;
                $_SESSION["role"] = $role;

                if ($role == "ido") {
                    echo "ido";
                } elseif ($role == "quaac") {
                    echo "quaac";
                } else {
                    echo "areacoordinator";
                }
            }

        }
    } else {
        echo '0';
    }
}
?>