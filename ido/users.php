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
  <title>Users</title>
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
</head>

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
          <li class="menu-item">
            <a href="dashboard.php" class="menu-link">
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
          <li class="menu-item  active open">
            <a href="" class="menu-link">
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
                    <img src="../assets/img/profiles/default.png" alt
                      class="w-px-40 h-auto rounded-circle">
                  </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                  <li>
                    <a class="dropdown-item">
                      <div class="d-flex">
                        <div class="flex-shrink-0 me-3">
                          <div class="avatar avatar-online">
                            <img src="../assets/img/profiles/default.png" alt
                              class="w-px-40 h-auto rounded-circle">
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
                    <a class="dropdown-item text-muted" onclick="openUpdateModal(<?php echo $_SESSION['id']; ?>)""
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
            <!--  USERS PAGE TABLE START -->
            <div class="card px-4 py-4">
              <div class="d-flex justify-content-between">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                  <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="users-tab" data-bs-toggle="tab" data-bs-target="#users" type="button" role="tab" aria-controls="users" aria-selected="true">Users</button>
                  </li>
                  <li class="nav-item" role="presentation">
                    <button class="nav-link" id="quaac-tab" data-bs-toggle="tab" data-bs-target="#quaac" type="button" role="tab" aria-controls="quaac" aria-selected="false">Quality Area Coordinator</button>
                  </li>
                  <li class="nav-item" role="presentation">
                    <button class="nav-link" id="area-tab" data-bs-toggle="tab" data-bs-target="#area" type="button" role="tab" aria-controls="area" aria-selected="false">Area Coordinator</button>
                  </li>
              </div>

              <div class="tab-content" id="myTabContent">
                <!-- IDO TAB START -->
                <div class="tab-pane fade show active" id="users" role="tabpanel" aria-labelledby="users-tab">
                  <table id="usersTable" class="mr-2 table table-hover table-bordered table-responsive">
                    <thead>
                      <tr>
                        <th><strong>Name</strong></th>
                        <th><strong>Campus</strong></th>
                        <th><strong>College</strong></th>
                        <th><strong>Phone Number</strong></th>
                        <th><strong>Email</strong></th>
                        <th><strong>Password</strong></th>
                        <th><strong>Role</strong></th>
                        <th><strong>Status</strong></th>
                    </thead>
                    <tbody>

                    </tbody>

                  </table>
                </div>
                <!-- IDO TAB END -->
                 <!-- QUALITY AREA COORDINATOR TAB START -->

                <div class="tab-pane fade" id="quaac" role="tabpanel" aria-labelledby="quaac-tab">
                  <table id="quaacTable" class="mr-2 table table-hover table-bordered table-responsive w-100">
                    <thead>
                      <tr>
                      <th><strong>Name</strong></th>
                        <th><strong>Campus</strong></th>
                        <th><strong>College</strong></th>
                        <th><strong>Phone Number</strong></th>
                        <th><strong>Email</strong></th>
                        <th><strong>Password</strong></th>
                        <th><strong>Status</strong></th>
                        <th><strong>Action</strong></th>
                    </thead>
                    <tbody>
                    </tbody>

                  </table>
                </div>
                <!-- QUALITY AREA COORDINATOR TAB END -->
                <!-- AREA COORDINATOR TAB START -->
                <div class="tab-pane fade" id="area" role="tabpanel" aria-labelledby="area-tab">
                  <table id="areaTable" class="mr-2 table table-hover table-bordered table-responsive w-100">
                  <thead>
                      <tr>
                      <th><strong>Name</strong></th>
                        <th><strong>Campus</strong></th>
                        <th><strong>College</strong></th>
                        <th><strong>Phone Number</strong></th>
                        <th><strong>Email</strong></th>
                        <th><strong>Password</strong></th>
                        <th><strong>Status</strong></th>
                    </thead>
                    <tbody>
                    </tbody>

                  </table>
                </div>
                <!-- AREA COORDINATOR TAB END -->

              <!-- UPDATE QUAAC STATUS MODAL START -->
              <div class="modal fade" id="setStatusModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content" id="setStatus">

                  </div>
                </div>
              </div>
              <!-- UPDATE QUAAC STATUS MODAL END -->

              <!-- MY PROFILE MODAL START -->
            <div class="modal fade" id="userProfile" tabindex="-1" aria-labelledby="userProfileLabel" aria-hidden="true">
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
                          <i class='bx bx-edit-alt text-success' data-bs-toggle="modal" data-bs-target="#passwordModal" style="cursor:pointer;"></i>
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
                          <input type="text" class="form-control" name="profileCampus" id="profileCampus" required readonly>
                        </div>
                        <div class="col">
                          <label for="profileCollege" class="form-label">College</label>
                          <input type="text" class="form-control" name="profileCollege" id="profileCollege" required readonly>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <!-- MY PROFILE MODAL END -->

            <!-- UPDATING PASSWORD MODAL -->
            <div class="modal fade" id="passwordModal" tabindex="-1" aria-labelledby="passwordModalLabel" aria-hidden="true">
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

              </div>
            </div>
            <!-- USERS PAGE TABLE END -->
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
  <!-- Page JS -->
  <script>
$(document).ready(function() {
    var users = "users";
    var quaac = "quaac";
    var taskforce = "taskforce";
// FOR USERS TABLE
    $('#usersTable').DataTable({
        ajax: {
            url: 'get_users.php',
            type: 'GET', // Use GET or POST based on your preference
            data: { identifier: users }, // Send userId to PHP script
            dataSrc: 'data'
        },
        columns: [
            { data: 'name' },
            { data: 'campus' },
            { data: 'college' },
            { data: 'phoneNumber' },
            { data: 'email' },
            { data: 'password' },
            { data: 'role' },
            { data: 'status' },
        ],
        order: [[0, 'desc']],
        paging: true,
        searching: true,
        ordering: true,
        responsive: true
    });

    // FOR QUAAC TABLE
    $('#quaacTable').DataTable({
    ajax: {
        url: 'get_users.php',
        type: 'GET', // Use GET or POST based on your preference
        data: { identifier: 'quaac' }, // Send identifier to PHP script
        dataSrc: 'data'
    },
    columns: [
        { data: 'name' },
        { data: 'campus' },
        { data: 'college' },
        { data: 'phoneNumber' },
        { data: 'email' },
        { data: 'password' },
        { data: 'status' },
        {
            // Add a new column for the button
            data: 'status',
            render: function(data, type, row) {
                // Check status and return appropriate button HTML
                if (data === 'INACTIVE') {
                    return '<button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#setStatusModal" onclick="getQuaacInfo(\'setRole\', '+row.id+')">Set Role</button>';
                } else if (data === 'ACTIVE') {
                    return '<button class="btn btn-danger remove-role" style="background-color: #ff3e1d !important; border-color: #ff3e1d !important;" data-bs-toggle="modal" data-bs-target="#setStatusModal" onclick="getQuaacInfo(\'removeRole\', '+row.id+')">Remove Role</button>';
                } else {
                    return ''; // Return an empty string if status is neither 'active' nor 'inactive'
                }
            }
        }
    ],
    order: [[0, 'desc']],
    paging: true,
    searching: true,
    ordering: true,
    responsive: true
});


    // FOR TASKFORCE TABLE
    $('#areaTable').DataTable({
        ajax: {
            url: 'get_users.php',
            type: 'GET', // Use GET or POST based on your preference
            data: { identifier: taskforce }, // Send userId to PHP script
            dataSrc: 'data'
        },
        columns: [
            { data: 'name' },
            { data: 'campus' },
            { data: 'college' },
            { data: 'phoneNumber' },
            { data: 'email' },
            { data: 'password' },
            { data: 'status' },
        ],
        order: [[0, 'desc']],
        paging: true,
        searching: true,
        ordering: true,
        responsive: true
    });
});


// SETTING QUAAC ROLE SCRIPT START
function getQuaacInfo(status, id){
    $.ajax({
      url: "setQuaacStatus.php",
      type: "POST",
      data: {
        txt: 'getInfo',
        status: status,
        id:id
      },
      success: function (data, status) {
        $('#setStatus').html(data);
      }
    });
  }

  function setQuaacStatus(status, id){
    $.ajax({
      url: "setQuaacStatus.php",
      type: "POST",
      data: {
        txt: 'setStatus',
        status: status,
        id:id,
      },
      success: function (response) {
        if(response == 'success'){
          toastr.success("Status Updated!");
          $('#quaacTable').DataTable().ajax.reload();
        } else {
          toastr.error("Error updating status!");
        }
      }
    });
  }
// SETTING QUAAC ROLE SCRIPT END

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

      // NOTIFICATION START
      $(document).ready(function () {
        // Initial load of notification count
        updateNotificationCount();
        // Event listener for the notification icon
        $('.nav-item.dropdown-notifications').on('click', function () {
          notificationUpdate();
        });
      });

      function updateNotificationCount() {
        $.ajax({
          url: '../config/get_notification_count.php', // PHP file to get notification count
          type: 'GET',
          success: function (count) {
            $('#notification-count').text(count);
          },
          error: function () {
            console.error("Error fetching notification count");
          }
        });
      }

      function notificationUpdate() {
        $.ajax({
          url: '../config/fetch_notifications.php', // PHP file to fetch notifications
          type: 'GET',
          dataType: 'json',
          success: function (data) {
            $('#notification').empty(); // Clear existing notifications
            if (data.length > 0) {
              data.forEach(function (notification) {
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
          error: function () {
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

        // Check if the notification text contains the word 'registered'
        if (notificationText.includes('registered')) {
          window.location.href = `users.php`;
          // Additional logic can go here, e.g., redirecting or displaying a message
        } else {
          console.log('The notification does not contain the word "registered".');


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
  </script>
</body>

</html>
<!-- beautify ignore:end -->