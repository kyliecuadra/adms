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
          <li class="menu-item active open">
            <a href="#" class="menu-link">
              <i class="menu-icon tf-icons bx bx-file"></i>
              <div class="text-truncate" data-i18n="Documents">Documents</div>
            </a>
          </li>
          <!-- Request Docouments -->
          <li class="menu-item ">
            <a href="requestdocument.php" class="menu-link">
              <i class="menu-icon tf-icons bx bx-file-find"></i>
              <div class="text-truncate" data-i18n="Requests">Requests</div>
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
                    <img src="../assets/img/profiles/<?php echo $_SESSION['picture']; ?>" alt
                      class="w-px-40 h-auto rounded-circle">
                  </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                  <li>
                    <a class="dropdown-item">
                      <div class="d-flex">
                        <div class="flex-shrink-0 me-3">
                          <div class="avatar avatar-online">
                            <img src="../assets/img/profiles/<?php echo $_SESSION['picture']; ?>" alt
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
                    <a class="dropdown-item text-muted" onclick="editUser(<?php echo $_SESSION['id'] ?>)"
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


              <!-- Content wrapper -->
              <div class="content-wrapper">
                <!-- Content -->
                <div class="container-xxl flex-grow-1 container-p-y">
                  <!-- DISPLAY FACULTY MEMBERS -->
                  <div class="card p-4">
                    <div class="mb-4">
                    </div>
                    <div class="d-flex flex-wrap">
                      <h3>List of Programs</h3>
                      <p class="w-100">Name of College</p>
                    </div>
                    <table id="departments" class="mr-2 table table-hover table-bordered table-responsive">
                      <thead>
                        <tr>
                          <th class="text-center"><strong>Programs</strong></th>
                          <th class="text-center"><strong>Areas</strong></th>
                        </tr>
                      </thead>
                      <tbody id="faculty-table-body">
                        <tr>
                          <td>Department of Information Technology</td>
                          <td class="text-center d-flex justify-content-center align-items-center">
                            <a class="btn btn-success" href="" role="button">Show</a>
                          </td>
                        </tr>
                        <tr>
                          <td>Department of Computer Science</td>
                          <td class="text-center d-flex justify-content-center align-items-center">
                            <a class="btn btn-success" href="#" role="button">Show</a>
                          </td>
                        </tr>
                        <tr>
                          <td>Department of Industrial Technology</td>
                          <td class="text-center d-flex justify-content-center align-items-center">
                            <a class="btn btn-success" href="#" role="button">Show</a>
                          </td>
                        </tr>
                        <tr>
                          <td>Department of Civil Engineering</td>
                          <td class="text-center d-flex justify-content-center align-items-center">
                            <a class="btn btn-success" href="#" role="button">Show</a>
                          </td>
                        </tr>
                        <tr>
                          <td>Department of Electrical Engineering</td>
                          <td class="text-center d-flex justify-content-center align-items-center">
                            <a class="btn btn-success" href="#" role="button">Show</a>
                          </td>
                        </tr>
                      </tbody>
                    </table>

                  </div>
                  <!-- DOCUMENTS TABLE END -->
                </div>
                <!-- Content wrapper -->
              </div>



              <!-- MY PROFILE MODAL START -->
              <div class="modal fade" id="my-profile" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
                              <input class="form-control capitalize" type="text" id="user_name" placeholder="Name"
                                required>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-lg-4 col-md-4 col-xs-4 mb-1">
                              <input class="form-control" type="number" id="user_enumber" placeholder="Employee Number"
                                required>
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
                            <input class="form-control" type="email" id="user_email" placeholder="Email Address"
                              required>
                            <div style="color: red; font-size: 12px;" id="email_validation"></div>
                          </div>
                          <div class="col-lg-6 col-md-6 col-xs-6 mb-1">
                            <div class="input-group flex-nowrap">
                              <span class="input-group-text bg-secondary text-white">+63</span>
                              <input type="tel" class="form-control" id="user_cnumber" placeholder="123 456 7890"
                                maxlength="12">
                            </div>
                          </div>
                        </div>
                        <div class="second_form">
                          <h4>Password</h4>
                          <div class="row">
                            <div class="col-lg-12 col-md-12 col-xs-12 mb-1">
                              <input class="form-control" type="password" id="user_passwordInput" placeholder="Password"
                                required>
                            </div>
                          </div>
                        </div>
                        <div class="third_form">
                          <h4>Profile Picture</h4>
                          <div class="row">
                            <div class="col-lg-12 col-md-12 col-xs-12">
                              <input class="form-control" type="file" id="user_profilepicture" accept="image/*"
                                id="imageFile" required>
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
        //DATA TABLE
        $(document).ready(function () {
          $('#departments').DataTable({
            "paging": true,
            "searching": true,
            "ordering": true,
            "info": true
          });
        });
      </script>
</body>

</html>
<!-- beautify ignore:end -->