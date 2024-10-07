<?php 
require("config/db_connection.php");

// Delete archived documents older than 5 years
mysqli_query($conn, "DELETE FROM archived_documents WHERE archived_date < NOW() - INTERVAL 5 YEAR");

session_start();

if (isset($_SESSION['email'])) { 
    if ($_SESSION['role'] == "ido") {
        header("location: ido/dashboard.php");
        exit;
    } elseif ($_SESSION['role'] == "quaac") {
        header("location: quaac/dashboard.php");
        exit;
    } else {
        header("location: areacoordinator/dashboard.php");
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="assets/img/icon.png" />
    <link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/toastr.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    
    <script type="text/javascript" src="assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="assets/js/toastr.min.js"></script>
    <script type="text/javascript" src="config/toastr_config.js"></script>
    
    <title>Sign In</title>
</head>

<body>
    <main>
        <div class="container-fluid d-flex justify-content-center align-items-center">
            <div class="formBox d-flex justify-content-center align-items-center flex-column">
                <img class="mb-4" src="assets/img/logo.png" alt="Logo">
                <form id="loginForm" onsubmit="return false;">
                    <div class="mb-3">
                        <input class="form-control" type="email" placeholder="Email" name="email" id="email" required autofocus>
                    </div>
                    <div class="mb-3">
                        <input class="form-control" type="password" id="password" name="password" placeholder="Password" required>
                    </div>
                    <div class="mb-3">
                        <p>Don't have an account? <a href="register.php"> Sign up.</a></p>
                        <button class="submitBtn btn" type="submit" onclick="login()">Sign In</button>
                    </div>
                </form>
                <div class="d-flex justify-content-end w-100">
                    <p class="small mb-0 me-5">
                        <a href="contactus.php" class="text-decoration-none">Contact us</a>
                    </p>
                </div>
            </div>
        </div>
    </main>

    <ul class="slideshow-container">
    <li>
        <div>
            <h3>Truth</h3>
        </div>
    </li>
    <li>
        <div>
            <h3>Excellence</h3>
        </div>
    </li>
    <li>
        <div>
            <h3>Service</h3>
        </div>
    </li>
    <li>
        <div>
            <h3>Morally Upright</h3>
        </div>
    </li>
    <li>
        <div>
            <h3>Globally Competitive</h3>
        </div>
    </li>
    <li>
        <div>
            <h3>Equality</h3>
        </div>
    </li>
</ul>


    <script>
        window.onload = function() {
            document.getElementById("email").value = '';
            document.getElementById("password").value = '';
        }

        function login() {
            var email = $('#email').val();
            var password = $('#password').val();
            const validDomain = '@cvsu.edu.ph';

            // Check if email ends with the valid domain
            if (!email.endsWith(validDomain)) {
                toastr.error("Only CvSU email is accepted!");
                return; // Prevent form submission
            }

            if (email && password) {
                $.ajax({
                    url: "login.php",
                    type: "POST",
                    data: {
                        email: email,
                        password: password,
                    },
                    success: function(data) {
                        if (data === "ido") {
                            toastr.success("Login Successful");
                            location.replace("ido/dashboard.php");
                        } else if (data === "quaac") {
                            toastr.success("Login Successful");
                            location.replace("quaac/dashboard.php");
                        } else if (data === "areacoordinator") {
                            toastr.success("Login Successful");
                            location.replace("areacoordinator/dashboard.php");
                        } else if (data === "inactive") {
                            toastr.error("Account Deactivated!");
                        } else if (data === "defaultPassword") {
                            location.replace("registerPassword.php");
                        } else {
                            toastr.error("Incorrect email or password!");
                        }
                    },
                    error: function() {
                        toastr.error("An error occurred. Please try again later.");
                    }
                });
            } else {
                toastr.error("Please fill in all the fields!");
            }
        }
    </script>
    <script type="text/javascript" src="assets/bootstrap/js/popper.min.js"></script>
    <script type="text/javascript" src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
