<?php 
require("config/db_connection.php");

// Delete archived documents older than 5 years
mysqli_query($conn, "DELETE FROM archived_documents WHERE archived_date < NOW() - INTERVAL 5 YEAR");

session_start();

if (isset($_SESSION['email']) && isset($_SESSION['status'])) { 
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
                        <a href="#" class="text-decoration-none" data-bs-toggle="modal" data-bs-target="#contactModal">Contact us</a>
                    </p>
                </div>
            </div>
        </div>
    </main>

    <!-- CONTACT US MODAL START -->
    <div class="modal fade" id="contactModal" tabindex="-1" aria-labelledby="contactModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="contactModalLabel">Contact Us</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="contactForm">
                        <div class="mb-3">
                            <label for="subject" class="form-label">Subject</label>
                            <input type="text" class="form-control" id="subject" placeholder="Enter subject" required autofocus>
                        </div>
                        <div class="mb-3">
                            <label for="message" class="form-label">Message</label>
                            <textarea class="form-control" id="message" rows="3" placeholder="Your message..." required></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer d-flex justify-content-end">
                    <button type="button" class="btn btn-secondary w-auto" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary ms-2 w-auto" id="sendEmail">Send Message</button>
                </div>
            </div>
        </div>
    </div>
    <!-- CONTACT US MODAL END -->

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

        $('#sendEmail').on('click', function() {
        const subject = $('#subject').val();
        const message = $('#message').val();

        // Validate inputs
        if (!subject || !message) {
            alert("Subject and message cannot be empty.");
            return;
        }

        $.ajax({
            type: "POST",
            url: "send_email.php", // Update to your correct path
            data: { subject: subject, message: message },
            success: function(response) {
                const res = JSON.parse(response);
                if (res.status === "success") {
                    // Open the Gmail link
                    window.open(res.link, '_blank');
                    const modal = bootstrap.Modal.getInstance(document.getElementById('contactModal'));
                    modal.hide();
                    $('#contactForm')[0].reset(); // Clear the form
                } else {
                    alert(res.message);
                }
            },
            error: function() {
                alert("An error occurred while sending the email.");
            }
        });
    });

    </script>
    <script type="text/javascript" src="assets/bootstrap/js/popper.min.js"></script>
    <script type="text/javascript" src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
