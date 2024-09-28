<?php
require("../config/db_connection.php");

session_start();
require("../config/session_timeout.php");

if (!isset($_SESSION['id'])) {
  header("location: ../config/not_login-error.html");
} else {
  if ($_SESSION['role'] != "ido") {
    header("location: ../config/user_level-error.html");
  }
}
?>
<!DOCTYPE html>
<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed layout-compact " dir="ltr" data-theme="theme-default" data-assets-path="../assets/" data-template="vertical-menu-template">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
  <title>IDO Dashboard</title>
  <!-- Favicon -->
  <link rel="icon" type="image/x-icon" href="../assets/img/icon.png" />
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200">
  <!-- Icons -->
  <link rel="stylesheet" href="../assets/vendor/fonts/boxicons.css" />
  <link rel="stylesheet" href="../assets/vendor/fonts/fontawesome.css" />
  <link rel="stylesheet" href="../assets/vendor/fonts/flag-icons.css" />
  <!-- Core CSS -->
  <link rel="stylesheet" href="../assets/vendor/css/rtl/core.css" class="template-customizer-core-css" />
  <link rel="stylesheet" href="../assets/vendor/css/rtl/theme-default.css" class="template-customizer-theme-css" />
  <link rel="stylesheet" href="../assets/css/demo.css" />
  <!-- Vendors CSS -->
  <link rel="stylesheet" href="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
  <link rel="stylesheet" href="../assets/vendor/libs/typeahead-js/typeahead.css" />
  <!-- Include jQuery -->
  <script type="text/javascript" src="../assets/js/jquery.min.js"></script>
  <!-- Include DataTables CSS and JS -->
  <link rel="stylesheet" type="text/css" href="../assets/css/datatable.min.css">
  <script src="../assets/js/datatable.min.js"></script>
  <!-- Helpers -->
  <script src="../assets/vendor/js/helpers.js"></script>
  <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
  <script src="../assets/js/config.js"></script>
  <script src="assets/js/register.js"></script>
  <script src="../assets/js/toastr.min.js"></script>
  <link rel="stylesheet" href="../assets/css/toastr.css" />
  <script type="text/javascript" src="../config/toastr_config.js"></script>
  <!-- FullCalendar CSS -->
  <link href="assets/css/fullcalendar.css" rel="stylesheet">
</head>
<style>
  #event-list {
    padding-left: 0;
    /* Remove left padding */
    list-style-type: none;
    /* Optional: removes bullet points */
    margin: 0;
    /* Reset margins */
  }

  .event-detail {
    border: 1px solid #ccc;
    border-radius: 5px;
    padding: 10px;
    /* You can adjust this padding as needed */
    margin-bottom: 10px;
  }

  .event-detail h5 {
    margin: 0 0 5px;
    font-size: 1.2em;
  }

  .event-detail p {
    margin: 0;
    font-size: 0.9em;
  }
</style>

<body>
  <!-- Layout wrapper -->
  <div class="layout-wrapper layout-content-navbar  ">
    <div class="layout-container">
      <!-- Menu -->
      <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
        <div class="app-brand demo ">
          <a href="dashboard.html" class="app-brand-link">
            <span class="app-brand-logo demo">
              <img src="../assets/img/logo.png" alt="" width="50">
            </span>
            <span class="app-brand-text menu-text fw-bold ms-2" style="font-size: 14px;">Accreditation Document<br>Management System</span>
          </a>
          <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
          </a>
        </div>
        <div class="menu-inner-shadow"></div>
        <ul class="menu-inner py-1">
          <!-- Dashboard -->
          <li class="menu-item active open">
            <a href="#" class="menu-link">
              <i class="menu-icon tf-icons bx bx-home-circle"></i>
              <div class="text-truncate" data-i18n="Dashboard">Dashboard</div>
            </a>
          </li>
          <!-- Documents -->
          <li class="menu-item">
            <a href="documents/campus.php" class="menu-link">
              <i class="menu-icon tf-icons bx bx-file"></i>
              <div class="text-truncate" data-i18n="Documents">Documents</div>
            </a>
          </li>
          <!-- Request Docouments -->
          <li class="menu-item">
            <a href="request_documents/campus.php" class="menu-link">
              <i class="menu-icon tf-icons bx bx-file-find"></i>
              <div class="text-truncate" data-i18n="Requested Documents">Requested Documents</div>
            </a>
          </li>
          <!-- Archived Documents -->
          <li class="menu-item">
            <a href="archived_documents/campus.php" class="menu-link">
              <i class='menu-icon tf-icons bx bx-archive'></i>
              <div class="text-truncate" data-i18n="Archived Documents">Archived Documents</div>
            </a>
          </li>
          <!-- Account Management -->
          <li class="menu-item">
            <a href="users.php" class="menu-link">
              <i class="menu-icon tf-icons bx bx-user"></i>
              <div class="text-truncate" data-i18n="Users">Users</div>
            </a>
          </li>
          <!-- Configuration -->
          <li class="menu-item">
            <a href="configuration/campus.php" class="menu-link">
              <i class='menu-icon tf-icons bx bx-wrench'></i>
              <div class="text-truncate" data-i18n="System Configuration">System Configuration</div>
            </a>
          </li>
          <!-- Logout -->
          <li class="menu-item">
            <a href="../logout.php?logout=true" class="menu-link">
              <i class='menu-icon tf-icons bx bx-log-out'></i>
              <div class="text-truncate" data-i18n="Logout">Logout</div>
            </a>
          </li>
        </ul>
      </aside>
      <!-- / Menu -->
      <!-- Layout container -->
      <div class="layout-page">
        <!-- Navbar -->
        <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">
          <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0   d-xl-none ">
            <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
              <i class="bx bx-menu bx-sm"></i>
            </a>
          </div>
          <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
            <ul class="navbar-nav flex-row align-items-center ms-auto">
              <!-- Notification -->
              <li class="nav-item dropdown-notifications navbar-dropdown dropdown me-3 me-xl-1" onclick="notificationUpdate()">
                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                  <i class="bx bx-bell bx-sm"></i>
                  <span class="badge bg-success rounded-pill badge-notifications" id="notification-count">0</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-end py-0">
                  <li class="dropdown-menu-header border-bottom">
                    <div class="dropdown-header d-flex align-items-center py-3">
                      <h5 class="text-body mb-0 me-auto">Notification</h5>
                    </div>
                  </li>
                  <li class="dropdown-notifications-list scrollable-container">
                    <ul class="list-group list-group-flush" id="notification">
                    </ul>
                  </li>
                </ul>
              </li>
              <!--/ Notification -->
              <!-- User -->
              <li class="nav-item navbar-dropdown dropdown-user dropdown">
                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                  <div class="avatar avatar-online">
                    <img src="../assets/img/profiles/default.png" alt class="w-px-40 h-auto rounded-circle">
                  </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                  <li>
                    <a class="dropdown-item">
                      <div class="d-flex">
                        <div class="flex-shrink-0 me-3">
                          <div class="avatar avatar-online">
                            <img src="../assets/img/profiles/default.png" alt class="w-px-40 h-auto rounded-circle">
                          </div>
                        </div>
                        <div class="flex-grow-1">
                          <span class="fw-medium d-block"><?php echo $_SESSION['fname']; ?></span>
                          <small class="text-muted">Institutional Development Office</small>
                        </div>
                      </div>
                    </a>
                  </li>
                  <li>
                    <div class="dropdown-divider"></div>
                  </li>
                  <li>
                    <a class="dropdown-item text-muted" onclick="editUser(<?php echo $_SESSION['id'] ?>)" style="cursor: pointer;">
                      <i class="bx bx-user me-2"></i>
                      <span class="align-middle">My Profile</span>
                    </a>
                  </li>
              </li>
            </ul>
            </li>
            <!--/ User -->
            </ul>
          </div>
        </nav>
        <!-- / Navbar -->
        <!-- Content wrapper -->
        <div class="content-wrapper">
          <!-- Content -->
          <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row">
              <div class="col-lg-3 mb-4 order-0">
                <!-- Card for Documents -->
                <a href="documents/campus.php" class="card card-hover text-decoration-none">
                  <div class="row">
                    <div class="card-body" style="padding: 15px;">
                      <div class="row d-flex px-4">
                        <div class="col">
                          <i class="bx bx-file" style="font-size: 75px;"></i> <!-- Icon for Documents -->
                        </div>
                        <div class="col h2 d-flex flex-column justify-content-center align-items-center">
                          <span id="documents-count">0</span> <!-- Placeholder for document count -->
                          <span class="label">Documents</span> <!-- Label for the card -->
                        </div>
                      </div>
                    </div>
                  </div>
                </a>
              </div>
              <div class="col-lg-3 mb-4 order-0">
                <!-- Card for Requests -->
                <a href="request_documents/campus.php" class="card card-hover text-decoration-none">
                  <div class="d-flex align-items-end row">
                    <div class="card-body" style="padding: 15px;">
                      <div class="row d-flex px-4">
                        <div class="col">
                          <i class="bx bx-file-find" style="font-size: 75px;"></i> <!-- Icon for Requests -->
                        </div>
                        <div class="col h2 d-flex flex-column justify-content-center align-items-center">
                          <span id="requests-count">0</span> <!-- Placeholder for request count -->
                          <span class="label">Requests</span> <!-- Label for the card -->
                        </div>
                      </div>
                    </div>
                  </div>
                </a>
              </div>
              <div class="col-lg-3 mb-4 order-0">
                <!-- Card for Users -->
                <a href="users.php" class="card card-hover text-decoration-none">
                  <div class="d-flex align-items-end row">
                    <div class="card-body" style="padding: 15px;">
                      <div class="row d-flex px-4">
                        <div class="col">
                          <i class="bx bx-user" style="font-size: 75px;"></i> <!-- Icon for Users -->
                        </div>
                        <div class="col h2 d-flex flex-column justify-content-center align-items-center">
                          <span id="users-count">0</span> <!-- Placeholder for user count -->
                          <span class="label">Users</span> <!-- Label for the card -->
                        </div>
                      </div>
                    </div>
                  </div>
                </a>
              </div>
              <div class="col-lg-3 mb-4 order-0">
                <!-- Card for Messages -->
                <a href="" class="card card-hover text-decoration-none">
                  <div class="d-flex align-items-end row">
                    <div class="card-body" style="padding: 15px;">
                      <div class="row d-flex px-4">
                        <div class="col">
                          <i class="bx bx-message-dots" style="font-size: 75px;"></i> <!-- Icon for Messages -->
                        </div>
                        <div class="col h2 d-flex flex-column justify-content-center align-items-center">
                          <span id="count">0</span> <!-- Placeholder for message count -->
                          <span class="label">Messages</span> <!-- Label for the card -->
                        </div>
                      </div>
                    </div>
                  </div>
                </a>
              </div>
              <!-- CALENDAR START -->
              <div class="col-lg-6 mb-4 order-0">
                <div class="card">
                  <div class="card-body d-flex flex-column" style="padding: 15px;">
                    <button class="btn w-50 btn-danger float-end mx-4 text-white" type="button" data-bs-toggle="modal" data-bs-target="#addNewAccreditationModal">Add Accreditation Schedule</button>
                    <div id="calendar" class="calendar"></div>
                  </div>
                </div>
              </div>
              <!-- CALENDAR END -->
              <!-- ACCREDITATION LIST START -->
              <div class="col-lg-6 mb-4 h-100">
                <div class="card event-viewer-card h-100">
                  <!-- Add h-100 class here -->
                  <div class="card-body d-flex flex-column">
                    <!-- Add d-flex and flex-column classes -->
                    <h3 class="card-title text-dark">Accreditation Details</h3>
                    <ul class="event-list" id="event-list">
                      <!-- Event details will be populated here -->
                    </ul>
                  </div>
                </div>
              </div>
              <!-- ACCREDITATION LIST END -->
            </div>
            <!-- MY PROFILE MODAL START -->
            <div class="modal fade" id="my-profile" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-header">
                    <h3 class="modal-title" id="staticBackdropLabel">My Profile</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <form action="" method="POST" class="signin" enctyp="multipart/form-data">
                      <div class="first_form">
                        <h4>Personal Information</h4>
                        <div class="mb-4 row">
                          <div class="col-lg-12 col-md-12 col-xs-12 mb-1">
                            <input class="form-control capitalize" type="text" id="user_name" placeholder="Name" required>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-4 col-md-4 col-xs-4 mb-1">
                            <input class="form-control" type="number" id="user_enumber" placeholder="Employee Number" required>
                          </div>
                          <div class="col-lg-4 col-md-4 col-xs-4 mb-1">
                            <select class="form-control text-secondary" id="user_designation" required>
                              <option selected>Designation</option>
                            </select>
                          </div>
                          <div class="col-lg-4 col-md-4 col-xs-4 mb-1">
                            <select class="form-control text-secondary" id="user_department" required>
                              <option selected>Department</option>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <h4>Contact Information</h4>
                        <div class="col-lg-6 col-md-6 col-xs-6 mb-1">
                          <input class="form-control" type="email" id="user_email" placeholder="Email Address" required>
                          <div style="color: red; font-size: 12px;" id="email_validation"></div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-xs-6 mb-1">
                          <div class="input-group flex-nowrap">
                            <span class="input-group-text bg-secondary text-white">+63</span>
                            <input type="tel" class="form-control" id="user_cnumber" placeholder="123 456 7890" maxlength="12">
                          </div>
                        </div>
                      </div>
                      <div class="second_form">
                        <h4>Password</h4>
                        <div class="row">
                          <div class="col-lg-12 col-md-12 col-xs-12 mb-1">
                            <input class="form-control" type="password" id="user_passwordInput" placeholder="Password" required>
                          </div>
                        </div>
                      </div>
                      <div class="third_form">
                        <h4>Profile Picture</h4>
                        <div class="row">
                          <div class="col-lg-12 col-md-12 col-xs-12">
                            <input class="form-control" type="file" id="user_profilepicture" accept="image/*" id="imageFile" required>
                            <div id="img_validation" class="text-danger"></div>
                          </div>
                        </div>
                      </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="editUserDetail()">Update</button>
                    <input type="hidden" name="" id="hidden_userid">
                  </div>
                  </form>
                </div>
              </div>
            </div>
            <!-- MY PROFILE MODAL END -->
            <!-- ADD NEW ACCREDITATION MODAL START -->
            <!-- Add Accreditation Schedule Modal -->
            <div class="modal fade" id="addNewAccreditationModal" tabindex="-1" aria-labelledby="addNewAccreditationModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="addNewAccreditationModalLabel">Add Accreditation Schedule</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <form id="addEventForm">
                      <div class="mb-3">
                        <label for="campus" class="form-label">Select Campus</label>
                        <select class="form-control text-secondary" id="eventCampus" required>
                          <option value="" disabled selected>Select Campus</option>
                        </select>
                      </div>
                      <div class="mb-3">
                        <label for="college" class="form-label">Select College</label>
                        <select class="form-control text-secondary" id="eventCollege" required>
                          <option value="" disabled selected>Select College</option>
                        </select>
                      </div>
                      <div class="mb-3">
                        <label for="program" class="form-label">Select Program</label>
                        <select class="form-control text-secondary" id="eventProgram" required>
                          <option value="" disabled selected>Select Program</option>
                        </select>
                      </div>
                      <div class="mb-3">
                        <label for="eventTitle" class="form-label">Event Title</label>
                        <input type="text" class="form-control" id="eventTitle" placeholder="Enter the event title" required>
                      </div>
                      <div class="mb-3">
                        <label for="eventDescription" class="form-label">Description</label>
                        <textarea class="form-control" id="eventDescription" rows="3" placeholder="Enter a brief description" required></textarea>
                      </div>
                      <div class="mb-3">
                        <label for="eventDateStart" class="form-label">Start Date & Time</label>
                        <input type="datetime-local" class="form-control" id="eventDateStart" required>
                      </div>
                      <div class="mb-3">
                        <label for="eventDateEnd" class="form-label">End Date & Time</label>
                        <input type="datetime-local" class="form-control" id="eventDateEnd" required>
                      </div>
                      <button type="submit" class="btn btn-primary w-100">Add Schedule</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <!-- ADD NEW ACCREDITATION MODAL END -->
            <!-- Event Details Modal -->
            <div class="modal fade" id="eventDetailsModal" tabindex="-1" aria-labelledby="eventDetailsLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="eventDetailsLabel">Accreditation Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <hr>
                  <div class="modal-body" id="modal-event-details">
                    <!-- Event details will be populated here -->
                  </div>
                  <hr>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  </div>
                </div>
              </div>
            </div>
            <!-- / Content -->
            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>
      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
      <!-- Drag Target Area To SlideIn Menu On Small Screens -->
      <div class="drag-target"></div>
    </div>
    <!-- / Layout wrapper -->
    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="../assets/bootstrap/js/popper.min.js"></script>
    <script src="../assets/vendor/js/bootstrap.js"></script>
    <script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="../assets/vendor/libs/hammer/hammer.js"></script>
    <script src="../assets/vendor/libs/i18n/i18n.js"></script>
    <script src="../assets/vendor/libs/typeahead-js/typeahead.js"></script>
    <script src="../assets/vendor/js/menu.js"></script>
    <!-- endbuild -->
    <!-- Main JS -->
    <script src="../assets/js/main.js"></script>
    <!-- FullCalendar JS -->
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.3.2/main.min.js"></script>
    <!-- Page JS -->
    <script>
      // POPULATE COLLEGE COMPONENTS DROPDOWN START
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
          url: '../config/fetch-collegeComponents.php',
          type: 'GET',
          dataType: 'json',
          data: {
            action: 'fetch_campus'
          },
          success: function(response) {
            populateSelect($('#eventCampus'), response);
          },
          error: function(xhr, status, error) {
            console.error('Error fetching campus:', error);
          }
        });
        // Fetch colleges based on selected campus
        $('#eventCampus').change(function() {
          var selectedCampus = $(this).val();
          if (selectedCampus) {
            $.ajax({
              url: '../config/fetch-collegeComponents.php',
              type: 'GET',
              dataType: 'json',
              data: {
                action: 'fetch_colleges',
                campus: selectedCampus // Send selected campus as a parameter
              },
              success: function(response) {
                populateSelect($('#eventCollege'), response);
                $('#eventProgram').empty().append($("<option></option>").text('Select Program').attr("value", "")); // Clear programs when campus changes
              },
              error: function(xhr, status, error) {
                console.error('Error fetching colleges:', error);
              }
            });
          } else {
            // Clear college dropdown if no campus is selected
            $('#eventCollege').empty().append($("<option></option>").text('Select College').attr("value", ""));
            $('#eventProgram').empty().append($("<option></option>").text('Select Program').attr("value", "")); // Clear programs as well
          }
        });
        // Fetch programs based on selected college
        $('#eventCollege').change(function() {
          var selectedCampus = $('#eventCampus').val();
          var selectedCollege = $(this).val(); // Use the current college dropdown value
          if (selectedCollege) {
            $.ajax({
              url: '../config/fetch-collegeComponents.php',
              type: 'GET',
              dataType: 'json',
              data: {
                action: 'fetch_programs',
                campus: selectedCampus,
                college: selectedCollege // Send selected college as a parameter
              },
              success: function(response) {
                populateSelect($('#eventProgram'), response);
              },
              error: function(xhr, status, error) {
                console.error('Error fetching programs:', error);
              }
            });
          } else {
            // Clear program dropdown if no college is selected
            $('#eventProgram').empty().append($("<option></option>").text('Select Program').attr("value", ""));
          }
        });
        // POPULATE COLLEGE COMPONENTS DROPDOWN END
        // DASHBOARD CARD COUNTS START
        $.ajax({
          url: 'get_counts.php', // Path to your PHP file
          type: 'GET',
          dataType: 'json',
          success: function(data) {
            // Update the counts in the HTML
            $('#documents-count').text(data.documents);
            $('#requests-count').text(data.requests);
            $('#users-count').text(data.users);
            //$('#messages-count').text(data.messages);
          },
          error: function(xhr, status, error) {
            console.error('Error fetching counts:', error);
          }
        });
        // DASHBOARD CARD COUNTS END
      });
      // EDIT PROFILE START
      function editUser(id) {
        $('#hidden_userid').val(id);
        $.post("my-profile.php", {
          id: id
        }, function(data, status) {
          var user = JSON.parse(data);
          $('#user_enumber').val(user.user_id);
          $('#user_name').val(user.name);
          $('#user_designation').val(user.designation);
          $('#user_department').val(user.department);
          $('#user_cnumber').val(user.contactNumber);
          $('#user_email').val(user.email);
          $('#user_passwordInput').val(user.password);
          $('#user_profilepicture').val(user.password);
        });
        $('#my-profile').modal("show");
      }

      function editUserDetail() {
        var enumber = $('#user_enumber').val();
        var name = $('#user_name').val();
        var designation = $('#user_designation').val();
        var department = $('#user_department').val();
        var cnumber = $('#user_cnumber').val();
        var email = $('#user_email').val();
        var password = $('#user_passwordInput').val();
        var picture = $('#user_profilepicture')[0].files[0]; // Get the file object
        var hidden_userid = $('#hidden_userid').val();
        var formData = new FormData();
        formData.append('hidden_userid', hidden_userid);
        formData.append('enumber', enumber);
        formData.append('name', name);
        formData.append('designation', designation);
        formData.append('department', department);
        formData.append('cnumber', cnumber);
        formData.append('email', email);
        formData.append('password', password);
        formData.append('picture', picture);
        $.ajax({
          url: 'my-profile.php',
          type: 'POST',
          data: formData,
          processData: false, // Important: prevent jQuery from processing the data
          contentType: false, // Important: set contentType to false
          success: function(data) {
            $('#my-profile').modal("hide");
            console.log(data);
            toastr.success("User Updated!");
            setTimeout(function() {
              location.reload();
            }, 1000);
          },
          error: function(xhr, status, error) {
            console.error('Error updating user:', error);
            toastr.error("Error updating user. Please try again.");
          }
        });
      }
      // EDIT PROFILE END
      // NOTIFICATION START
      function notificationUpdate() {
        // Your AJAX code here
        var notification = 'notification';
        $.ajax({
          url: "notification.php",
          type: "POST",
          data: {
            notification: notification,
          },
          success: function(data, status) {
            console.log(data);
          }
        });
      }
      $(document).ready(function() {
        $.ajax({
          url: 'notification-count.php', // URL to your server-side script that generates the notification
          type: 'GET',
          success: function(response) {
            // Display the notification to the user
            $("#notification-count").html(response);
            if (response === '0' || response.trim() === '') {
              $('#notification-count').css('display', 'none');
            } else {
              $('#notification-count').css('display', 'inline-block');
            }
          },
          error: function(xhr, status, error) {
            console.error('Error:', error);
          }
        });
        $.ajax({
          url: 'notification.php', // URL to your server-side script that generates the notification
          type: 'GET',
          success: function(response) {
            // Display the notification to the user
            $("#notification").html(response); // You can use any notification library or custom HTML/CSS here
          },
          error: function(xhr, status, error) {
            console.error('Error:', error);
          }
        });
      });
      // NOTIFICATION END
      // CALENDAR START
      $(document).ready(function() {
        // Call fetchEvents with the current date when the calendar is rendered
        const currentDate = new Date().toISOString().split('T')[0]; // Get current date in YYYY-MM-DD format
        fetchEvents(currentDate); // Fetch events for today's date
        // Initialize calendar
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
          initialView: 'dayGridMonth',
          dateClick: function(info) {
            fetchEvents(info.dateStr);
          },
          events: function(fetchInfo, successCallback, failureCallback) {
            $.ajax({
              url: 'get-events.php', // Fetch events from this script
              type: 'GET',
              success: function(data) {
                const events = data.map(event => ({
                  id: event.id,
                  title: event.title, // Use title here for the calendar
                  start: event.datestart,
                  end: event.dateend
                }));
                successCallback(events);
              },
              error: function() {
                console.error('Failed to fetch events.');
                failureCallback();
              }
            });
          },
          editable: true,
          selectable: true,
          eventClick: function(info) {
            displayEventDetails(info.event.id); // Fetch details on click
          }
        });
        calendar.render();
        // Fetch events based on selected date
        function fetchEvents(date) {
          $.ajax({
            url: 'get-event-details.php',
            type: 'GET',
            data: {
              date: date
            },
            success: function(response) {
              if (Array.isArray(response) && response.length > 0) {
                const eventListHtml = response.map(event => {
                  const start = new Date(event.datestart);
                  const end = new Date(event.dateend);
                  const options = {
                    year: 'numeric',
                    month: 'long',
                    day: '2-digit',
                    hour: 'numeric',
                    minute: '2-digit',
                    hour12: true
                  };
                  return `<div class="event-detail">
                                    <h5 class="text-dark">${event.title}</h5>
                                    <p><strong>Date Start:</strong> ${start.toLocaleString('en-US', options).replace(/:\d{2}$/, '')}</p>
                                    <p><strong>Date End:</strong> ${end.toLocaleString('en-US', options).replace(/:\d{2}$/, '')}</p>
                                </div>`;
                }).join('');
                $('#event-list').html(eventListHtml);
              } else {
                $('#event-list').html('<li>No events found for this date.</li>');
              }
            },
            error: function(xhr) {
              console.error(xhr.responseText);
              $('#event-list').html('<li>Error loading event details.</li>');
            }
          });
        }
        // Display event details in a modal
        function displayEventDetails(eventId) {
          $.ajax({
            url: 'get-event-details.php',
            type: 'GET',
            data: {
              id: eventId
            },
            success: function(event) {
              if (event && event.description) {
                const start = new Date(event.datestart);
                const end = new Date(event.dateend);
                const options = {
                  year: 'numeric',
                  month: 'long',
                  day: '2-digit',
                  hour: 'numeric',
                  minute: '2-digit',
                  hour12: true
                };
                const detailsHtml = `
                        <p>${event.description}</p>
                        <p><strong>Date Start:</strong> ${start.toLocaleString('en-US', options).replace(/:\d{2}$/, '')}</p>
                        <p><strong>Date End:</strong> ${end.toLocaleString('en-US', options).replace(/:\d{2}$/, '')}</p>
                    `;
                $('#modal-event-details').html(detailsHtml);
                $('#eventDetailsLabel').text(event.title);
                $('#eventDetailsModal').modal('show'); // Show the modal
              } else {
                $('#modal-event-details').html('<p>No details found.</p>');
              }
            },
            error: function(xhr) {
              console.error(xhr.responseText);
              $('#modal-event-details').html('<p>Error loading event details.</p>');
            }
          });
        }
        // Add new event
        $('#addEventForm').on('submit', function(event) {
          event.preventDefault();
          var description = $('#eventDescription').val();
          var title = $('#eventTitle').val(); // Added title field
          var campus = $('#eventCampus').val();
          var college = $('#eventCollege').val();
          var program = $('#eventProgram').val();
          var datestart = $('#eventDateStart').val();
          var dateend = $('#eventDateEnd').val();
          $.ajax({
            url: 'add-event.php',
            type: 'POST',
            data: {
              title: title, // Send title to server
              description: description,
              campus: campus,
              college: college,
              program: program,
              datestart: datestart,
              dateend: dateend
            },
            success: function() {
              toastr.success("Accreditation is scheduled!");
              $('#addNewAccreditationModal').modal('hide');
              calendar.refetchEvents(); // Refetch events to update the calendar
            },
            error: function(xhr) {
              console.error(xhr.responseText);
            }
          });
        });
      });
      // CALENDAR END
    </script>
</body>

</html>
<!-- beautify ignore:end -->