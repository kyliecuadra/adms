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
<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed layout-compact " dir="ltr"
  data-theme="theme-default" data-assets-path="../assets/" data-template="vertical-menu-template">

<head>
  <meta charset="utf-8" />
  <meta name="viewport"
    content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
  <title>IDO Dashboard</title>
  <!-- Favicon -->
  <link rel="icon" type="image/x-icon" href="../assets/img/icon.png" />
  <!-- Fonts -->
  <link
    href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
    rel="stylesheet">
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200">
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
            <span class="app-brand-text menu-text fw-bold ms-2" style="font-size: 14px;">Accreditation
              Document<br>Management System</span>
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
          <!-- Messages -->
          <li class="menu-item">
            <a href="message.php" class="menu-link">
              <i class="menu-icon tf-icons bx bx-chat"></i>
              <div class="text-truncate" data-i18n="Messages">Messages</div>
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
        <nav
          class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
          id="layout-navbar">
          <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0   d-xl-none ">
            <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
              <i class="bx bx-menu bx-sm"></i>
            </a>
          </div>
          <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
            <ul class="navbar-nav flex-row align-items-center ms-auto">
              <!-- Notification -->
              <li class="nav-item dropdown-notifications navbar-dropdown dropdown me-3 me-xl-1"
                onclick="notificationUpdate()">
                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown"
                  data-bs-auto-close="outside" aria-expanded="false">
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
                          <span class="fw-medium d-block"><?php echo $_SESSION['name']; ?></span>
                          <small class="text-muted">Institutional Development Office</small>
                        </div>
                      </div>
                    </a>
                  </li>
                  <li>
                    <div class="dropdown-divider"></div>
                  </li>
                  <li>
                    <a class="dropdown-item text-muted" onclick="openUpdateModal(<?php echo $_SESSION['id']; ?>)"
                      style="cursor: pointer;">
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
                  <div class="d-flex align-items-end row" style="height: 152px;">
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
                  <div class="d-flex align-items-end row" style="height: 152px;">
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
                  <div class="d-flex align-items-end row" style="height: 152px;">
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
                <a href="message.php" class="card card-hover text-decoration-none">
                  <div class="d-flex align-items-end row" style="height: 152px;">
                    <div class="card-body" style="padding: 15px;">
                      <div class="row d-flex px-4">
                        <div class="col d-flex justify-content-center align-items-end">
                          <i class="bx bx-message-dots" style="font-size: 75px;"></i> <!-- Icon for Messages -->
                        </div>
                        <div class="col h2 d-flex flex-column justify-content-center align-items-center">
                          <span id="messages-count">0</span> <!-- Placeholder for message count -->
                          <span class="label">Unread Messages</span> <!-- Label for the card -->
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
                    <button class="btn w-50 btn-danger float-end mx-4 text-white" type="button" data-bs-toggle="modal"
                      data-bs-target="#addNewAccreditationModal">Add Accreditation Schedule</button>
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
                    <h3 class="card-title text-dark" id="event-title">Accreditation Details</h3>
                    <ul class="event-list" id="event-list">
                      <!-- Event details will be populated here -->
                    </ul>
                  </div>
                </div>
              </div>
              <!-- ACCREDITATION LIST END -->
            </div>
            <!-- MY PROFILE MODAL START -->
            <div class="modal fade" id="userProfile" tabindex="-1" aria-labelledby="userProfileLabel"
              aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="userProfileLabel">My Profile</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <form id="updateUserForm">
                      <input type="hidden" name="id" id="userId">
                      <div class="row mb-3">
                        <div class="col">
                          <label for="fname" class="form-label">First Name</label>
                          <input type="text" class="form-control" name="fname" id="fname" required readonly>
                        </div>
                        <div class="col">
                          <label for="mname" class="form-label">Middle Name</label>
                          <input type="text" class="form-control" name="mname" id="mname" readonly>
                        </div>
                        <div class="col">
                          <label for="lname" class="form-label">Last Name</label>
                          <input type="text" class="form-control" name="lname" id="lname" required readonly>
                        </div>
                      </div>
                      <div class="row mb-3">
                        <div class="col">
                          <label for="email" class="form-label">Email</label>
                          <input type="email" class="form-control" name="email" id="email" required readonly>
                        </div>
                        <div class="col">
                          <label for="password" class="form-label">Password</label>
                          <i class='bx bx-edit-alt text-success' data-bs-toggle="modal" data-bs-target="#passwordModal"
                            style="cursor:pointer;"></i>
                          <input type="text" class="form-control" name="password" id="password" required readonly>
                        </div>
                        <div class="col">
                          <label for="phonenumber" class="form-label">Phone Number</label>
                          <input type="text" class="form-control" name="phonenumber" id="phonenumber" required readonly>
                        </div>
                      </div>
                      <div class="row mb-3">
                        <div class="col">
                          <label for="role" class="form-label">Role</label>
                          <input type="text" class="form-control" name="role" id="role" required readonly>
                        </div>
                        <div class="col">
                          <label for="profileCampus" class="form-label">Campus</label>
                          <input type="text" class="form-control" name="profileCampus" id="profileCampus" required
                            readonly>
                        </div>
                        <div class="col">
                          <label for="profileCollege" class="form-label">College</label>
                          <input type="text" class="form-control" name="profileCollege" id="profileCollege" required
                            readonly>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <!-- MY PROFILE MODAL END -->
            <!-- ADD NEW ACCREDITATION MODAL START -->
            <div class="modal fade" id="addNewAccreditationModal" tabindex="-1"
              aria-labelledby="addNewAccreditationModalLabel" aria-hidden="true">
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
                        <input type="text" class="form-control" id="eventTitle" placeholder="Enter the event title"
                          required>
                      </div>
                      <div class="mb-3">
                        <label for="eventDescription" class="form-label">Description</label>
                        <textarea class="form-control" id="eventDescription" rows="3"
                          placeholder="Enter a brief description" required></textarea>
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
            <div class="modal fade" id="eventDetailsModal" tabindex="-1" aria-labelledby="eventDetailsLabel"
              aria-hidden="true">
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

            <!-- UPDATING PASSWORD MODAL -->
            <div class="modal fade" id="passwordModal" tabindex="-1" aria-labelledby="passwordModalLabel"
              aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="passwordModalLabel">Update Password</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <form id="updatePasswordForm">
                      <div class="mb-3">
                        <label for="newPassword" class="form-label">New Password</label>
                        <input type="password" class="form-control" id="newPassword" required>
                      </div>
                      <div class="mb-3">
                        <label for="confirmPassword" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" id="confirmPassword" required>
                      </div>
                    </form>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="savePasswordBtn">Save changes</button>
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
            $('#messages-count').text(data.messages);
          },
          error: function(xhr, status, error) {
            console.error('Error fetching counts:', error);
          }
        });
        // DASHBOARD CARD COUNTS END
      });

      // MY PROFILE START
      function openUpdateModal(userId) {
        fetch(`../config/get_user.php?id=${userId}`).then(response => response.json()).then(data => {
          if (data.success) {
            const user = data.user;
            // Populate modal fields
            document.getElementById('userId').value = user.id;
            document.getElementById('fname').value = user.fname;
            document.getElementById('mname').value = user.mname;
            document.getElementById('lname').value = user.lname;
            document.getElementById('email').value = user.email;
            document.getElementById('password').value = user.password;
            document.getElementById('phonenumber').value = user.phonenumber;
            document.getElementById('role').value = user.role;
            // Set selected options for dropdowns
            document.getElementById('profileCampus').value = user.campus || '';
            document.getElementById('profileCollege').value = user.college || '';
            // Show the modal
            var modal = new bootstrap.Modal(document.getElementById('userProfile'));
            modal.show();
          } else {
            alert('Failed to load user data: ' + data.message);
          }
        }).catch(error => {
          console.error('Error:', error);
          alert('An error occurred while fetching user data.');
        });
      }
      // MY PROFILE END

      // NOTIFICATION START
      $(document).ready(function() {
        // Initial load of notification count
        updateNotificationCount();
        // Event listener for the notification icon
        $('.nav-item.dropdown-notifications').on('click', function() {
          notificationUpdate();
        });
      });

      function updateNotificationCount() {
        $.ajax({
          url: '../config/get_notification_count.php', // PHP file to get notification count
          type: 'GET',
          success: function(count) {
            $('#notification-count').text(count);
          },
          error: function() {
            console.error("Error fetching notification count");
          }
        });
      }

      function notificationUpdate() {
        $.ajax({
          url: '../config/fetch_notifications.php', // PHP file to fetch notifications
          type: 'GET',
          dataType: 'json',
          success: function(data) {
            $('#notification').empty(); // Clear existing notifications
            if (data.length > 0) {
              data.forEach(function(notification) {
                // Format the created_at date
                const date = new Date(notification.timestamp);
                const options = {
                  year: 'numeric',
                  month: 'long',
                  day: 'numeric',
                  hour: '2-digit',
                  minute: '2-digit'
                };
                const formattedDate = date.toLocaleString('en-US', options);
                $('#notification').append(`
                        <li class="list-group-item text-dark" style="cursor:pointer;">
                            ${notification.description} <br>
                            <small class="text-success">${formattedDate}</small>
                        </li>
                    `);
              });
            } else {
              $('#notification').append('<li class="list-group-item">No new notifications.</li>');
            }
            // Update the notification count after displaying the notifications
            updateNotificationCount();
          },
          error: function() {
            console.error("Error fetching notifications");
          }
        });
      }
      // NOTIFICATION END

      // REQUEST DOCUMENT NOTIFICATION START
      // Use event delegation to handle click events
      $(document).on('click', '#notification .list-group-item', function() {
        var email = $(this).find('strong').text(); // Extract the email from the <strong> tag
        console.log('Notification clicked, email:', email); // Debugging line

        // Assuming this refers to the notification element that was clicked
        var notificationText = $(this).text(); // Extract the full text of the notification
        console.log('Notification clicked, text:', notificationText); // Debugging line

        // Check if the notification text contains the word 'approval'
        if (notificationText.includes('approval')) {
          window.location.href = `users.php`;
        } else {
          console.log('The notification does not contain the word "approval".');


          $.ajax({
            url: 'redirect_notification.php', // Replace with the actual path to your PHP script
            type: 'POST',
            data: {
              email: email
            },
            success: function(response) {
              var result = JSON.parse(response);
              if (result.status === 'success') {
                console.log('Campus:', result.campus);
                console.log('College:', result.college);
                window.location.href = `request_documents/documents.php?campus=${encodeURIComponent(result.campus)}&college=${encodeURIComponent(result.college)}`;
                // You can update the UI to show this information
              } else {
                console.error(result.message);
                // Optionally show an error message to the user
              }
            },
            error: function(xhr, status, error) {
              console.error('AJAX error:', status, error);
            }
          });
        }
      });
      // REQUEST DOCUMENT NOTIFICATION END

      // CALENDAR START
      $(document).ready(function() {
        const monthNames = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
        const currentMonthName = monthNames[new Date().getMonth()];
        $('#event-title').html("Accreditations for " + currentMonthName);
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
              today: date
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

      // UPDATING PASSWORD START
      $('#savePasswordBtn').on('click', function() {
        const newPassword = $('#newPassword').val();
        const confirmPassword = $('#confirmPassword').val();
        const id = $('#userId').val();

        if (newPassword === confirmPassword) {
          // AJAX request to update the password
          $.ajax({
            url: 'update_password.php', // Your server endpoint for updating password
            type: 'POST',
            data: {
              password: newPassword,
              userId: id
            },
            success: function(response) {
              // Assuming response contains a success message
              if (response.success) {
                $('#password').val(newPassword);
                toastr.success('Password updated successfully!');

                // Close the modal
                const modal = bootstrap.Modal.getInstance($('#passwordModal')[0]);
                modal.hide();

                // Optionally reset the form
                $('#updatePasswordForm')[0].reset();
              } else {
                toastr.error('Error updating password: ' + response.message);
              }
            },
            error: function(xhr, status, error) {
              toastr.error('An error occurred: ' + error);
            }
          });
        } else {
          toastr.warning("Passwords do not match!");
        }
      });
      // UPDATING PASSWORD END
    </script>
</body>

</html>
<!-- beautify ignore:end -->