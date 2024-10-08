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
                $_SESSION["name"] = $fname." ". $mname." ".$lname;
                $_SESSION["email"] = $email;
                $_SESSION["campus"] = $campus;
                $_SESSION["college"] = $college;
                $_SESSION["password"] = $password;
                $_SESSION["role"] = $role;

                $old_password = $_SESSION["fname"][0].$_SESSION["lname"];
                $old_password = str_replace(' ', '', $old_password);
                $old_password = mb_strtoupper($old_password);
                
                if($old_password == $password){
                    echo "defaultPassword";
                }else{
                    if ($role == "ido") {
                        echo "ido";
                    } elseif ($role == "quaac") {
                        echo "quaac";
                    } else {
                        echo "areacoordinator";
                    }
                }
            }

        }
    } else {
        echo '0';
    }
}
?>