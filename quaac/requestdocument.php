<!DOCTYPE html>
<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed layout-compact " dir="ltr"
  data-theme="theme-default" data-assets-path="../assets/" data-template="vertical-menu-template">

<head>
  <meta charset="utf-8" />
  <meta name="viewport"
    content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
  <title>QUAAC Request Document</title>
  <!-- Favicon -->
  <link rel="icon" type="image/x-icon" href="../assets/img/icon.png" />
  <!-- Fonts -->
  <link
    href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
    rel="stylesheet">
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
            <span class="app-brand-text menu-text fw-bold ms-2" style="font-size: 14px;">Accreditation Document<br>Management System</span>
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
            <a href="documents.php" class="menu-link">
              <i class="menu-icon tf-icons bx bx-file"></i>
              <div class="text-truncate" data-i18n="Documents">Documents</div>
            </a>
          </li>
          <!-- Request Docouments -->
          <li class="menu-item active open">
            <a href="#" class="menu-link">
              <i class="menu-icon tf-icons bx bx-file-find"></i>
              <div class="text-truncate" data-i18n="Requests">Requests</div>
            </a>
          </li>
          <!-- Account Management -->
          <li class="menu-item">
            <a href="taskforce.php" class="menu-link">
              <i class="menu-icon tf-icons bx bx-user"></i>
              <div class="text-truncate" data-i18n="Task Force Accounts">Task Force Accounts</div>
            </a>
          </li>
          <!-- Logout -->
          <li class="menu-item">
            <a href="forms.php" class="menu-link">
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
              <li class="nav-item dropdown-notifications navbar-dropdown dropdown me-3 me-xl-1" onclick="notificationUpdate()">
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
                    <img src="../assets/img/profiles/<?php echo $_SESSION['picture']; ?>" alt class="w-px-40 h-auto rounded-circle">
                  </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                  <li>
                    <a class="dropdown-item">
                      <div class="d-flex">
                        <div class="flex-shrink-0 me-3">
                          <div class="avatar avatar-online">
                            <img src="../assets/img/profiles/<?php echo $_SESSION['picture']; ?>" alt class="w-px-40 h-auto rounded-circle">
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
                  
                <div class="container d-flex justify-content-center align-items-center min-vh-80 mt-3">
                  <div class="row justify-content-center w-100">

                      <!-- Display Request Documents -->
                      <div class="col-lg-8 mt-3">
                      <div class="card">
                        <div class="card-body mt-1" style="padding: 15px;">
                          <h3 class="card-title text-dark">Request Documents</h3>
                          
                          <!-- Filter Buttons -->
                          <div class="mb-3">
                            <button id="approvedBtn" class="btn btn-success">Approved</button>
                            <button id="pendingBtn" class="btn btn-warning">Pending</button>
                            <button id="rejectedBtn" class="btn btn-danger">Rejected</button>
                            <button id="allBtn" class="btn btn-secondary">All</button> <!-- Show all rows -->
                          </div>
                          
                          <!-- Request New Document Button -->
                          <button id="requestNewDocumentBtn" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#requestModal">Request New Document</button>

                          <!-- Documents Table -->
                          <table id="documentsTable" class="table">
                            <thead>
                              <tr>
                                <th>Document Area</th>
                                <th>Parameter</th>
                                <th>Quality</th>
                                <th>Benchmark</th>
                                <th>Date Requested</th>
                                <th>Status</th> <!-- Status Column -->
                              </tr>
                            </thead>
                            <tbody>
                              <!-- Documents will be loaded here dynamically via AJAX -->
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>

                    <!-- Request Document Modal -->
                    <div class="modal fade" id="requestModal" tabindex="-1" aria-labelledby="requestModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="requestModalLabel">Request Document Form</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <form id="requestForm" action="upload_request_document.php" method="POST">
                              
                              <!-- Document Area -->
                              <div class="mb-3">
                                <label for="documentArea" class="form-label">Document Area</label>
                                <select class="form-select" id="documentArea" name="documentarea" required>
                                  <option selected disabled>Select Area</option>
                                  <option value="Area 1">Area 1</option>
                                  <option value="Area 2">Area 2</option>
                                  <option value="Area 3">Area 3</option>
                                  <option value="Area 4">Area 4</option>
                                  <option value="Area 5">Area 5</option>
                                  <option value="Area 6">Area 6</option>
                                  <option value="Area 7">Area 7</option>
                                  <option value="Area 8">Area 8</option>
                                  <option value="Area 9">Area 9</option>
                                  <option value="Area 10">Area 10</option>
                                </select>
                              </div>

                              <!-- Parameter -->
                              <div class="mb-3">
                                <label for="parameter" class="form-label">Parameter Area Selected</label>
                                <select class="form-select" id="parameter" name="parameter" required>
                                  <option selected disabled>Select Parameter</option>
                                  <option value="Parameter A">Parameter A</option>
                                  <option value="Parameter B">Parameter B</option>
                                  <option value="Parameter C">Parameter C</option>
                                  <option value="Parameter D">Parameter D</option>
                                  <option value="Parameter E">Parameter E</option>
                                </select>
                              </div>

                              <!-- Quality -->
                              <div class="mb-3">
                                <label for="quality" class="form-label">Quality</label>
                                <select class="form-select" id="quality" name="quality" required>
                                  <option value="" disabled selected>Select Quality</option>
                                  <option value="System- Input and Processes">System- Input and Processes</option>
                                  <option value="Implementation">Implementation</option>
                                  <option value="Outcome">Outcome</option>
                                </select>
                              </div>

                              <!-- Benchmark Statement -->
                              <div class="mb-3">
                                <label for="benchmark" class="form-label">Benchmark Statement</label>
                                <textarea class="form-control" id="benchmark" name="benchmark" rows="3" placeholder="Benchmark Statement" required></textarea>
                              </div>

                              <!-- Submit Button -->
                              <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Submit Request</button>
                              </div>

                            </form>
                          </div>
                        </div>
                      </div>
                    </div>

                  </div>
                </div>




            <!-- REQUEST DOCUMENT CONFIRMATION MODAL START -->Da
              <div class="modal fade" id="responseModal" tabindex="-1" aria-labelledby="responseModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="responseModalLabel">Submission Status</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" id="responseModalBody">
                      <!-- This is where the success/error message will appear -->
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
              </div>
             <!-- REQUEST DOCUMENT CONFIRMATION MODAL END -->



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
    <!-- Page JS -->
    <script>



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


      //REQUEST DOCUMENT START
      $(document).ready(function() {
    $('#requestForm').submit(function(e) {
        e.preventDefault(); // Prevent the form from submitting traditionally

        var formData = $(this).serialize(); // Serialize the form data

        $.ajax({
            url: 'upload_request_document.php', // PHP script to handle the request
            type: 'POST',
            data: formData,
            dataType: 'json',
            success: function(response) {
                // Show the modal with a success or error message
                if (response.success) {
                    $('#responseModalBody').html("<p style='color:green;'>" + response.message + "</p>");
                } else {
                    $('#responseModalBody').html("<p style='color:red;'>" + response.message + "</p>");
                }

            // Show the modal
            $('#responseModal').modal('show');
            },
            error: function(xhr, status, error) {
                // Show the modal with an error message in case of AJAX failure
                $('#responseModalBody').html("<p style='color:red;'>An error occurred: " + error + "</p>");
                $('#responseModal').modal('show');
            }
        });
    });

    // Reload the page when the modal is closed
    $('#responseModal').on('hidden.bs.modal', function () {
        location.reload(); // Reload the page
    });
});
      //REQUEST DOCUMENT END

      //GET REQUEST DOCUMENT START
      $(document).ready(function() {
    // Initialize DataTable with AJAX to fetch document data
    var table = $('#documentsTable').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": "get_request_document.php", // PHP script to fetch documents
            "type": "POST",
            "dataSrc": "" // Data is returned as an array
        },
        "columns": [
            { "data": "documentarea" },
            { "data": "parameter" },
            { "data": "quality" },
            { "data": "benchmark" },
            { "data": "daterequested" },
            { "data": "status" } // This is the status column we're filtering by
        ]
    });

    // Filter by 'Approved'
    $('#approvedBtn').on('click', function() {
        table.column(5).search('Approved').draw(); // Filters the table for 'Approved' status
    });

    // Filter by 'Pending'
    $('#pendingBtn').on('click', function() {
        table.column(5).search('Pending').draw(); // Filters the table for 'Pending' status
    });

    // Filter by 'Rejected'
    $('#rejectedBtn').on('click', function() {
        table.column(5).search('Rejected').draw(); // Filters the table for 'Rejected' status
    });

    // Show all records (clear any filters)
    $('#allBtn').on('click', function() {
        table.column(5).search('').draw(); // Clears the search, showing all records
    });
});
//GET REQUEST DOCUMENT END


document.getElementById('requestNewDocumentBtn').addEventListener('click', function () {
    document.getElementById('requestFormContainer').classList.remove('d-none');
    document.querySelector('.col-lg-7').classList.add('d-none');
  });

 // Filter function
 function filterTable(status) {
    $('#documentsTable tbody tr').each(function() {
      var rowStatus = $(this).find('.status').text().toLowerCase();
      
      if (status === 'all' || rowStatus === status.toLowerCase()) {
        $(this).show();  // Show rows matching the status or all rows
      } else {
        $(this).hide();  // Hide rows that don't match
      }
    });
  }

  // Event listeners for buttons
  $('#approvedBtn').on('click', function() {
    filterTable('approved');
  });

  $('#pendingBtn').on('click', function() {
    filterTable('pending');
  });

  $('#rejectedBtn').on('click', function() {
    filterTable('rejected');
  });

  $('#allBtn').on('click', function() {
    filterTable('all');
  });
    </script>
</body>

</html>
<!-- beautify ignore:end -->