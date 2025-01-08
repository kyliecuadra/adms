<?php
    require ("../../config/db_connection.php");

    session_start();
    require ("../../config/session_timeout.php");

    if(!isset($_SESSION['id'])){
      header("location: ../../config/not_login-error.html");
    }
    else{
      if($_SESSION['role'] != "ido"){
        header("location: ../../config/user_level-error.html");
      }
      $campusName = isset($_GET['campus']) ? htmlspecialchars($_GET['campus']) : 'Campus';
      $collegeName = isset($_GET['college']) ? htmlspecialchars($_GET['college']) : 'College';
    }
    ?>
<!DOCTYPE html>
<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed layout-compact " dir="ltr"
    data-theme="theme-default" data-assets-path="../../assets/" data-template="vertical-menu-template">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport"
            content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
            <title>System Configuration - <?php echo htmlspecialchars($collegeName, ENT_QUOTES, 'UTF-8'); ?></title>

        <!-- Favicon -->
        <link rel="icon" type="image/x-icon" href="../../assets/img/icon.png" />
        <!-- Fonts -->
        <link
            href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
            rel="stylesheet">
        <link rel="stylesheet"
            href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200">
        <!-- Icons -->
        <link rel="stylesheet" href="../../assets/vendor/fonts/boxicons.css" />
        <link rel="stylesheet" href="../../assets/vendor/fonts/fontawesome.css" />
        <link rel="stylesheet" href="../../assets/vendor/fonts/flag-icons.css" />
        <!-- Core CSS -->
        <link rel="stylesheet" href="../../assets/vendor/css/rtl/core.css" class="template-customizer-core-css" />
        <link rel="stylesheet" href="../../assets/vendor/css/rtl/theme-default.css" class="template-customizer-theme-css" />
        <link rel="stylesheet" href="../../assets/css/demo.css" />
        <!-- Vendors CSS -->
        <link rel="stylesheet" href="../../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
        <link rel="stylesheet" href="../../assets/vendor/libs/typeahead-js/typeahead.css" />
        <!-- Include jQuery -->
        <script type="text/javascript" src="../../assets/js/jquery.min.js"></script>
        <!-- Include DataTables CSS and JS -->
        <link rel="stylesheet" type="text/css" href="../../assets/css/datatable.min.css">
        <script src="../../assets/js/datatable.min.js"></script>
        <!-- Helpers -->
        <script src="../../assets/vendor/js/helpers.js"></script>
        <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
        <script src="../../assets/js/config.js"></script>
        <script src="assets/js/register.js"></script>
        <script src="../../assets/js/toastr.min.js"></script>
        <link rel="stylesheet" href="../../assets/css/toastr.css" />
        <script type="text/javascript" src="../../config/toastr_config.js"></script>
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
                <img src="../../assets/img/logo.png" alt="" width="50">
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
                    <a href="../dashboard.php" class="menu-link">
                        <i class="menu-icon tf-icons bx bx-home-circle"></i>
                        <div class="text-truncate" data-i18n="Dashboard">Dashboard</div>
                    </a>
                </li>
                <!-- Documents -->
                <li class="menu-item">
                    <a href="../documents/campus.php" class="menu-link">
                        <i class="menu-icon tf-icons bx bx-file"></i>
                        <div class="text-truncate" data-i18n="Documents">Documents</div>
                    </a>
                </li>
                <!-- Request Docouments -->
                <li class="menu-item">
                    <a href="../request_documents/campus.php" class="menu-link">
                        <i class="menu-icon tf-icons bx bx-file-find"></i>
                        <div class="text-truncate" data-i18n="Requested Documents">Requested Documents</div>
                    </a>
                </li>
                <!-- Archived Documents -->
                <li class="menu-item">
                    <a href="../archived_documents/campus.php" class="menu-link">
                        <i class='menu-icon tf-icons bx bx-archive'></i>
                        <div class="text-truncate" data-i18n="Archived Documents">Archived Documents</div>
                    </a>
                </li>
                <!-- Account Management -->
                <li class="menu-item">
                    <a href="../users.php" class="menu-link">
                        <i class="menu-icon tf-icons bx bx-user"></i>
                        <div class="text-truncate" data-i18n="Users">Users</div>
                    </a>
                </li>
            <!-- Messages -->
            <li class="menu-item">
                  <a href="../message.php" class="menu-link">
                  <i class="menu-icon tf-icons bx bx-chat"></i>
                  <div class="text-truncate" data-i18n="Messages">Messages</div>
               </a>
            </li>
                <!-- Configuration -->
                <li class="menu-item active open">
                    <a href="campus.php" class="menu-link">
                        <i class='menu-icon tf-icons bx bx-wrench'></i>
                        <div class="text-truncate" data-i18n="System Configuration">System Configuration</div>
                    </a>
                </li>
                <!-- Logout -->
                <li class="menu-item">
                    <a href="../../logout.php?logout=true" class="menu-link">
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
                                    <img src="../../assets/img/profiles/default.png" alt
                                        class="w-px-40 h-auto rounded-circle">
                                </div>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <a class="dropdown-item">
                                        <div class="d-flex">
                                            <div class="flex-shrink-0 me-3">
                                                <div class="avatar avatar-online">
                                                    <img src="../../assets/img/profiles/default.png" alt
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
                                    <a class="dropdown-item text-muted" onclick="openUpdateModal(<?php echo $_SESSION['id']; ?>)" style="cursor: pointer;">
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
                    <div class="card px-4 py-4">
                        <div class="d-flex justify-content-between mb-3">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb fs-4">
                                    <li class="breadcrumb-item"><a href="campus.php"><?php echo $campusName; ?></a></li>
                                    <li class="breadcrumb-item"><a href="#" onclick="window.history.back(); return false;"><?php echo $collegeName; ?></a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Programs</li>
                                </ol>
                            </nav>
                            <button class="btn" data-bs-toggle="modal" data-bs-target="#addProgramModal">Add Program</button>
                        </div>
                        <table id="programTable" class="mr-2 table table-hover table-bordered table-responsive">
                        <thead>
                                <tr>
                                    <th><strong>Program Name</strong></th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- / Layout page -->
            </div>
            <!-- Overlay -->
            <div class="layout-overlay layout-menu-toggle"></div>
            <!-- Drag Target Area To SlideIn Menu On Small Screens -->
            <div class="drag-target"></div>
            <!-- ADD PROGRAM MODAL START -->
            <div class="modal fade" id="addProgramModal" tabindex="-1" aria-labelledby="addProgramModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addProgramModalLabel">Add Program</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="" class="form-label">Program Name</label>
                                <input type="hidden" id="campus" value="<?php echo $campusName; ?>">
                                <input type="hidden" id="college" value="<?php echo $collegeName; ?>">
                                <input type="text" class="form-control" name="program" id="program" aria-describedby="helpId" placeholder="Program Name" autofocus/>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" id="submitProgram" class="btn btn-primary">Add Program</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ADD PROGRAM MODAL END -->
            <!-- DELETE PROGRAM MODAL START -->
            <div class="modal fade" id="deleteProgramModal" tabindex="-1" aria-labelledby="deleteProgramModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="deleteProgramModalLabel">Confirm Delete</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Are you sure you want to delete this program?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="button" id="deleteProgram" class="btn btn-danger">Delete</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- DELETE PROGRAM MODAL END -->

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
                        </div><div class="col">
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
        <!-- / Layout wrapper -->
        <!-- Core JS -->
        <!-- build:js assets/vendor/js/core.js -->
        <script src="../../assets/bootstrap/js/popper.min.js"></script>
        <script src="../../assets/vendor/js/bootstrap.js"></script>
        <script src="../../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
        <script src="../../assets/vendor/libs/hammer/hammer.js"></script>
        <script src="../../assets/vendor/libs/i18n/i18n.js"></script>
        <script src="../../assets/vendor/libs/typeahead-js/typeahead.js"></script>
        <script src="../../assets/vendor/js/menu.js"></script>
        <!-- endbuild -->
        <!-- Main JS -->
        <script src="../../assets/js/main.js"></script>
        <!-- Page JS -->
        <script>
            var identifier = "program";
                var campusName = $('#campus').val();
                var collegeName = $('#college').val();
                // DISPLAY RECORDS START
                $(document).ready(function() {
    $('#programTable').DataTable({
        ajax: {
            url: 'get_structure.php',
            type: 'GET',
            data: {
                identifier: identifier, // Ensure these variables are defined
                campus: campusName,
                college: collegeName
            },
            dataSrc: 'data' // Ensure this matches the property name in your JSON response
        },
        columns: [
            {
                data: null, // 'null' because we're manually rendering content
                render: function(data, type, row) {
                    return `
                        <div class="d-flex justify-content-between align-items-center">
                            <span>${row.program}</span>
                            <a href="#" class="text-danger fs-3 bx bx-trash" data-id="${row.program}" onclick="deleteProgram('${row.program}'); return false;"></a>
                        </div>
                    `;
                }
            }
        ],
        order: [[0, 'asc']], // Adjust sorting if necessary
        paging: true,
        searching: true,
        ordering: true,
        responsive: true
    });
});


                // DISPLAY RECORD END

                // ADD PROGRAM START
                $(document).ready(function() {
                    $('#submitProgram').click(function() {
                        var programName = $('#program').val();
                        console.log(identifier);

                        // Simple validation
                        if (programName.trim() === '') {
                            toastr.error('Please enter a college name.');
                            return;
                        }

                        // AJAX request
                        $.ajax({
                            url: 'add_structure.php', // Replace with your server endpoint
                            type: 'POST',
                            data: {
                                identifier: identifier,
                                campus: campusName,
                                college: collegeName,
                                program: programName
                            },
                            success: function(response) {
                                if(response == "success"){
                                    // Handle success response
                                    $('#programTable').DataTable().ajax.reload();
                                    toastr.success('Program added successfully!');

                                    console.log(response);
                                    $('#program').val(''); // Clear input field
                                    $('#addProgramModal').modal('hide');
                                }
                                else {
                                    console.log(response);
                                    toastr.error('Program is already existing');
                                    $('#program').val(''); // Clear input field
                                }

                            },
                            error: function(xhr, status, error) {
                                // Handle error response
                                toastr.error('An error occurred: ' + error);
                            }
                        });
                    });
                });
                // ADD PROGRAM END

                // DELETE PROGRAM START
            // Define the function to show the delete modal and handle deletion
            function deleteProgram(program) {
                // Show the delete confirmation modal
                $('#deleteProgramModal').modal('show');
                console.log(college);
                // Clear any previous click handlers to avoid multiple bindings
                $('#deleteProgram').off('click').on('click', function(event) {
                    console.log(college);
                    // Perform the AJAX request to delete the college
                    $.ajax({
                        url: 'delete_structure.php', // Your server endpoint for deletion
                        type: 'POST',
                        data: {
                            identifier: identifier, // Assuming 'identifier' should be 'college'
                            campus: campusName,
                            college: collegeName,
                            program: program
                        },
                        success: function(response) {
                            if (response === "success") {
                                // Handle success response
                                toastr.success('Program deleted successfully!');
                                $('#programTable').DataTable().ajax.reload(); // Refresh DataTable
                            } else {
                                // Handle failure response
                                toastr.error('An error occurred: ' + response);
                            }

                            // Hide the modal after the operation
                            $('#deleteProgramModal').modal('hide');
                        },
                        error: function(xhr, status, error) {
                            // Handle error response
                            toastr.error('An error occurred: ' + error);
                            $('#deleteProgramModal').modal('hide'); // Hide modal even if there's an error
                        }
                    });
                });
            }
            // DELETE PROGRAM END

            // MY PROFILE START
function openUpdateModal(userId) {
        fetch(`../../config/get_user.php?id=${userId}`).then(response => response.json()).then(data => {
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
                    url: '../update_password.php', // Your server endpoint for updating password
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
      $(document).ready(function() {
        // Initial load of notification count
        updateNotificationCount();

        // Event listener for the notification icon
        $('.nav-item.dropdown-notifications').on('click', function() {
          notificationUpdate();
        });

        // Delegate the click event to dynamically added notifications
        $('#notification').on('click', '.notification-item', function() {
          const notificationId = $(this).data('id');

          // Extract the email from the notification (assuming it's stored in a <strong> tag)
          var email = $(this).find('strong').text();
          console.log('Notification clicked, email:', email); // Debugging line

          // Extract the full text of the notification
          var notificationText = $(this).text();
          console.log('Notification clicked, text:', notificationText); // Debugging line

          // Check if the notification text contains the word 'approval' or 'registered'
          if (notificationText.includes('approval') || notificationText.includes('registered')) {
            window.location.href = `users.php`;
          } else {
            console.log('The notification does not contain the word "approval".');

            // If not, perform the AJAX request
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
                  window.location.href = `../request_documents/documents.php?campus=${encodeURIComponent(result.campus)}&college=${encodeURIComponent(result.college)}`;
                  // Optionally, update the UI with this information
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

          // Optionally, call your notificationDetailUpdate function, if needed
          notificationDetailUpdate(notificationId);
        });

      });

      // Update the notification count
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

      // Fetch and display notifications
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
                        <li class="list-group-item text-dark notification-item" data-id="${notification.id}" style="cursor:pointer;">
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

      //Update the status of a specific notification when clicked (mark as read, for example)
      function notificationDetailUpdate(notificationId) {
        $.ajax({
          url: '../config/mark_notification_read.php', // PHP file to mark notification as read
          type: 'POST',
          data: {
            id: notificationId
          },
          success: function(response) {
            if (response.success) {
              // Optionally, you can update the UI here, e.g., mark the notification as read
              // For example, add a "read" class or modify the notification appearance
              $(`[data-id="${notificationId}"]`).addClass('read'); // Assuming "read" class has specific styling
              console.log("Notification marked as read");
            } else {
              console.error("Error marking notification as read");
            }
          },
          error: function() {
            console.error("Error marking notification as read");
          }
        });
      }
      // NOTIFICATION END
        </script>
    </body>
</html>
<!-- beautify ignore:end -->