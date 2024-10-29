<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="assets/img/icon.png" />
    <!-- LOCAL STYLES -->
    <link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/toastr.css">
    <link rel="stylesheet" href="assets/css/register.css">
    <!-- LOCAL SCRIPTS -->
    <script type="text/javascript" src="assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="assets/js/toastr.min.js"></script>
    <script type="text/javascript" src="config/toastr_config.js"></script>
    <title>Sign Up</title>
</head>

<body>
    <main>
        <div class="container d-flex justify-content-center align-items-center">
            <div class="formBox  d-flex justify-content-center align-items-center flex-column">
                <img class="mt-4" src="assets/img/logo.png" alt="">
                <form class="mt-4 signin" id="registrationForm">
                    <div class="first_form">
                        <h3>Personal Information</h3>
                        <div class="mb-2 row">
                            <div class="col-lg-4 col-md-4 col-xs-4 mb-1">
                                <input class="form-control capitalize" type="text" id="fname" placeholder="First Name" required>
                            </div>
                            <div class="col-lg-4 col-md-4 col-xs-4 mb-1">
                                <input class="form-control add-period" type="text" id="mname" maxlength="1" oninput="this.value = this.value.toUpperCase();" placeholder="Middle Initial" required>
                            </div>
                            <div class="col-lg-4 col-md-4 col-xs-4 mb-1">
                                <input class="form-control capitalize" type="text" id="lname" placeholder="Last Name" required>
                            </div>
                        </div>
                        <div class="mb-2 row">
                            <div class="col-lg-6 col-md-6 col-xs-6 mb-1">
                                <input class="form-control" id="email" type="email" placeholder="Email Address" required>
                                <div style="color: red; font-size: 12px;" id="email_validation"></div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-xs-6 mb-1">
                                <div class="input-group flex-nowrap">
                                  <span class="input-group-text">+63</span>
                                  <input type="tel" class="form-control" id="cnumber" placeholder="123 456 7890" maxlength="10">
                              </div>
                          </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-6 col-md-6 col-xs-6 mb-1">
                            <select class="form-control text-secondary" id="campus" required>
                                <option selected>Campus</option>
                            </select>
                        </div>
                        <div class="col-lg-6 col-md-6 col-xs-6 mb-1">
                            <select class="form-control text-secondary" id="college" required>
                                <option selected>College</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="second_form">
                    <h3>Password</h3>
                    <small class="form-text text-danger" id="passwordHelp">Password must be at least 8 characters
                    long.</small>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-xs-6 mb-1">
                            <input class="form-control" type="password" id="passwordInput" placeholder="Password" required>
                        </div>
                        <div class="col-lg-6 col-md-6 col-xs-6 mb-1">
                            <input class="form-control" type="password" id="confirmPasswordInput" placeholder="Confirm Password" required>
                            <div id="passwordMatchError" class="text-danger"></div>
                        </div>
                    </div>
                </div>
                <div class="third_form">
                <div class="container">

                <div class="mb-3 mt-4">
                    <p>Already have an account? <a href="index.php"> Sign in.</a></p>
                    <button type="submit" class="btn mb-4 next-step">Sign up</button>
                </div>
            </form>
        </div>


</main>

<script>
// POPULATE COLLEGE COMPONENTS DROPDOWN START

$(document).ready(function() {
    // Function to populate select element with options
    function populateSelect(selectElement, data) {
        selectElement.empty(); // Clear existing options

        // Add default option
        selectElement.append($("<option></option>").text('Select an option').attr("value", ""));

        $.each(data, function(key, value) {
            selectElement.append($("<option></option>").text(value).attr("value", value));
        });
    }

    // Fetch campuses and populate campus dropdown
    $.ajax({
        url: 'config/fetch-collegeComponents.php',
        type: 'GET',
        dataType: 'json',
        data: { action: 'fetch_campus' },
        success: function(response) {
            populateSelect($('#campus'), response);
        },
        error: function(xhr, status, error) {
            console.error('Error fetching campus:', error);
        }
    });

    // Fetch colleges based on selected campus
    $('#campus').change(function() {
        var selectedCampus = $(this).val();

        if (selectedCampus) {
            $.ajax({
                url: 'config/fetch-collegeComponents.php',
                type: 'GET',
                dataType: 'json',
                data: {
                    action: 'fetch_colleges',
                    campus: selectedCampus // Send selected campus as a parameter
                },
                success: function(response) {
                    populateSelect($('#college'), response);
                },
                error: function(xhr, status, error) {
                    console.error('Error fetching colleges:', error);
                }
            });
        } else {
            // Clear college dropdown if no campus is selected
            $('#college').empty().append($("<option></option>").text('Select College').attr("value", ""));
        }
    });
});

// POPULATE COLLEGE COMPONENTS DROPDOWN END

$(".next-step").click(function(event) {

event.preventDefault();

// Get all form field values
var fname = $('#fname').val();
var mname = $('#mname').val();
var lname = $('#lname').val();
var email = $('#email').val(); // Corrected variable name from phonenumber to email
var cnumber = $('#cnumber').val();
var campus = $('#campus').val();
var college = $('#college').val();
var passwordInput = $('#passwordInput').val();

// Check if the user already exists
$.ajax({
    url: 'checkUser.php', // PHP file to check if the user exists
    type: 'POST',
    data: {
        email: email
    },
    success: function(response) {
        if (response === 'exists') {
            // User already exists, show an error message or take appropriate action
            toastr.error("Email already exists!");
        } else {
            console.log(response);
            // User does not exist, proceed with registration

            // Prepare data to be sent to the registration script
            var formData = {
                fname: fname,
                mname: mname,
                lname: lname,
                email: email,
                cnumber: cnumber,
                campus: campus,
                college: college,
                password: passwordInput
            };

            // AJAX request to save the user data to the database
            $.ajax({
                url: 'signup.php', // PHP file to handle user registration
                type: 'POST',
                data: formData,
                success: function(response) {
                    if (response === 'success') {
                        toastr.success("Registration successful!");

                        // Add a 1-second timeout before redirecting
                        setTimeout(function() {
                            window.location.href = 'index.php';
                        }, 1000); // 1000 milliseconds = 1 second
                    } else {
                        toastr.error("Registration failed! Please try again.");
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error registering user:', error);
                }
            });
        }
    },
    error: function(xhr, status, error) {
        console.error('Error checking user:', error);
    }
});
});



</script>

<!-- LOCAL SCRIPTS -->
<script type="text/javascript" src="assets/bootstrap/js/popper.min.js"></script>
<script type="text/javascript" src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/js/register.js"></script>
</body>
</html>