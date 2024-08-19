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
          <!-- Calendar -->
          <li class="menu-item">
            <a href="calendar.php" class="menu-link">
              <i class='menu-icon tf-icons bx bx-calendar'></i>
              <div class="text-truncate" data-i18n="Calendar">Calendar</div>
            </a>
          </li>
          <!-- Documents -->
          <li class="menu-item">
            <a href="documents/campus.php" class="menu-link">
              <i class="menu-icon tf-icons bx bx-user"></i>
              <div class="text-truncate" data-i18n="Documents">Documents</div>
            </a>
          </li>
          <!-- Request Docouments -->
          <li class="menu-item">
            <a href="request-document.php" class="menu-link">
              <i class="menu-icon tf-icons bx bx-file-find"></i>
              <div class="text-truncate" data-i18n="Requests">Requests</div>
            </a>
          </li>
          <!-- Archived Documents -->
          <li class="menu-item">
            <a href="archive.php" class="menu-link">
              <i class='menu-icon tf-icons bx bx-archive'></i>
              <div class="text-truncate" data-i18n="Archived Documents">Archived Documents</div>
            </a>
          </li>
          <!-- Account Management -->
          <li class="menu-item  active open">
            <a href="" class="menu-link">
              <i class="menu-icon tf-icons bx bx-file"></i>
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
            <!--  USERS PAGE TABLE START -->

            <div class="card px-4 py-4">
              <div class="d-flex justify-content-between">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                  <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="ido-tab" data-bs-toggle="tab" data-bs-target="#ido" type="button" role="tab" aria-controls="ido" aria-selected="true">Users</button>
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
                <div class="tab-pane fade show active" id="ido" role="tabpanel" aria-labelledby="ido-tab">
                  <table id="idoTable" class="mr-2 table table-hover table-bordered table-responsive">
                    <thead>
                      <tr>
                        <th><strong>Name</strong></th>
                        <th><strong>Email</strong></th>
                        <th><strong>Password</strong></th>
                        <th><strong>Status</strong></th>
                        <th><strong>Role</strong></th>
                    </thead>
                    <tbody>
                      <tr>
                        <td>Alice Johnson</td>
                        <td>alice.johnson@email.com</td>
                        <td>**hashed_password_1**</td>
                        <td>Active</td>
                        <td>QUAAC</td>
                      </tr>
                      <tr>
                        <td>Bob Smith</td>
                        <td>bob.smith@email.com</td>
                        <td>**hashed_password_2**</td>
                        <td>Inactive</td>
                        <td>Area Coordinator</td>
                      </tr>
                      <tr>
                        <td>Charlie Brown</td>
                        <td>charlie.brown@email.com</td>
                        <td>**hashed_password_3**</td>
                        <td>Active</td>
                        <td>QUAAC</td>
                      </tr>
                      <tr>
                        <td>Dana White</td>
                        <td>dana.white@email.com</td>
                        <td>**hashed_password_4**</td>
                        <td>Suspended</td>
                        <td>Area Coordinator</td>
                      </tr>
                      <tr>
                        <td>Eve Black</td>
                        <td>eve.black@email.com</td>
                        <td>**hashed_password_5**</td>
                        <td>Active</td>
                        <td>Area Coordinator</td>
                      </tr>

                    </tbody>

                  </table>
                </div>
                <!-- IDO TAB END -->
                <!-- AREA COORDINATOR TAB START -->
                <div class="tab-pane fade" id="quaac" role="tabpanel" aria-labelledby="quaac-tab">
                  <table id="quaacTable" class="mr-2 table table-hover table-bordered table-responsive">
                    <thead>
                      <tr>
                        <th><strong>Name</strong></th>
                        <th><strong>Email</strong></th>
                        <th><strong>Password</strong></th>
                        <th><strong>Status</strong></th>
                        <th><strong>Action</strong></th>
                    </thead>
                    <tbody>
                      <tr>
                        <td>John Doe</td>
                        <td>john.doe@admin.com</td>
                        <td>**hashed_password_6**</td>
                        <td>Active</td>
                        <td><button class="btn">Set Role</button></td>
                      </tr>
                      <tr>
                        <td>Jane Smith</td>
                        <td>jane.smith@admin.com</td>
                        <td>**hashed_password_7**</td>
                        <td>Active</td>
                        <td><button class="btn" style="background-color: #ff3e1d !important; color: #fff !important;">Remove Role</button></td>
                      </tr>
                      <tr>
                        <td>Michael Jordan</td>
                        <td>michael.jordan@admin.com</td>
                        <td>**hashed_password_8**</td>
                        <td>Inactive</td>
                        <td><button class="btn">Set Role</button></td>
                      </tr>
                      <tr>
                        <td>Sarah Connor</td>
                        <td>sarah.connor@admin.com</td>
                        <td>**hashed_password_9**</td>
                        <td>Active</td>
                        <td><button class="btn" style="background-color: #ff3e1d !important; color: #fff !important;">Remove Role</button></td>
                      </tr>
                      <tr>
                        <td>Peter Parker</td>
                        <td>peter.parker@admin.com</td>
                        <td>**hashed_password_10**</td>
                        <td>Suspended</td>
                        <td><button class="btn" style="background-color: #ff3e1d !important; color: #fff !important;">Remove Role</button></td>
                      </tr>

                    </tbody>

                  </table>
                </div>
                <!-- AREA COORDINATOR TAB END -->
                <!-- QUALITY AREA COORDINATOR TAB START -->
                <div class="tab-pane fade" id="area" role="tabpanel" aria-labelledby="area-tab">
                  <table id="areaTable" class="mr-2 table table-hover table-bordered table-responsive">
                    <thead>
                      <tr>
                        <th><strong>Name</strong></th>
                        <th><strong>Email</strong></th>
                        <th><strong>Password</strong></th>
                        <th><strong>Status</strong></th>
                    </thead>
                    <tbody>
                      <tr>
                        <td>Tom Hanks</td>
                        <td>tom.hanks@guest.com</td>
                        <td>**hashed_password_11**</td>
                        <td>Active</td>
                      </tr>
                      <tr>
                        <td>Emma Watson</td>
                        <td>emma.watson@guest.com</td>
                        <td>**hashed_password_12**</td>
                        <td>Active</td>
                      </tr>
                      <tr>
                        <td>Robert Downey</td>
                        <td>robert.downey@guest.com</td>
                        <td>**hashed_password_13**</td>
                        <td>Inactive</td>
                      </tr>
                      <tr>
                        <td>Natalie Portman</td>
                        <td>natalie.portman@guest.com</td>
                        <td>**hashed_password_14**</td>
                        <td>Suspended</td>
                      </tr>
                      <tr>
                        <td>Chris Hemsworth</td>
                        <td>chris.hemsworth@guest.com</td>
                        <td>**hashed_password_15**</td>
                        <td>Active</td>
                      </tr>

                    </tbody>

                  </table>
                </div>
                <!-- QUALITY AREA COORDINATOR TAB END -->
                <!-- CAMPUS TAB START -->
                <div class="tab-pane fade" id="campus" role="tabpanel" aria-labelledby="campus-tab">
                  <button class="btn mb-3 float-end" data-bs-toggle="modal" data-bs-target="#addCampusModal">Add Campus</button>
                  <table id="campusTable" class="mr-2 table table-hover table-bordered table-responsive">
                    <thead>
                      <tr>
                        <th><strong>Name</strong></th>
                        <th><strong>Address</strong></th>
                        <th><strong>Action</strong></th>
                    </thead>
                    <tbody>
                      <tr>
                        <td>Don Severino</td>
                        <td>Indang, Cavite</td>
                        <td class="d-flex justify-content-around"><button class="btn btn-secondary">Update</button><button class="btn" style="background-color: #ff3e1d !important; border-color: #ff3e1d !important;">Delete</button></td>
                      </tr>
                      <tr>
                        <td>Naic</td>
                        <td>Naic, Cavite</td>
                        <td class="d-flex justify-content-around"><button class="btn btn-secondary">Update</button><button class="btn" style="background-color: #ff3e1d !important; border-color: #ff3e1d !important;">Delete</button></td>
                      </tr>
                      <tr>
                        <td>Silang</td>
                        <td>Silang, Cavite</td>
                        <td class="d-flex justify-content-around"><button class="btn btn-secondary">Update</button><button class="btn" style="background-color: #ff3e1d !important; border-color: #ff3e1d !important;">Delete</button></td>
                      </tr>
                    </tbody>

                  </table>
                </div>
                <!-- CAMPUS TAB END -->
                <!-- COLLEGES TAB START -->
                <div class="tab-pane fade" id="college" role="tabpanel" aria-labelledby="college-tab">
                  <button class="btn mb-3 float-end" data-bs-toggle="modal" data-bs-target="#addCollegeModal">Add College</button>
                  <table id="collegeTable" class="mr-2 table table-hover table-bordered table-responsive">
                    <thead>
                      <tr>
                        <th><strong>Name</strong></th>
                        <th><strong>Action</strong></th>
                    </thead>
                    <tbody>
                      <tr>
                        <td>College of Engineering and Information Technology</td>
                        <td class="d-flex justify-content-around"><button class="btn btn-secondary">Update</button><button class="btn" style="background-color: #ff3e1d !important; border-color: #ff3e1d !important;">Delete</button></td>
                      </tr>
                      <tr>
                        <td>College of Nursing</td>
                        <td class="d-flex justify-content-around"><button class="btn btn-secondary">Update</button><button class="btn" style="background-color: #ff3e1d !important; border-color: #ff3e1d !important;">Delete</button></td>
                      </tr>
                      <tr>
                        <td>College of Arts and Science</td>
                        <td class="d-flex justify-content-around"><button class="btn btn-secondary">Update</button><button class="btn" style="background-color: #ff3e1d !important; border-color: #ff3e1d !important;">Delete</button></td>
                      </tr>
                    </tbody>

                  </table>
                </div>
                <!-- COLLEGE TAB END -->

              </div>
            </div>
            <!-- USERS PAGE TABLE END -->
          </div>
          <!-- Content wrapper -->
        </div>

        <!-- ADD CAMPUS MODAL START -->
        <div class="modal fade" id="addCampusModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered"">
    <div class=" modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Add Campus</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <label for="end-date">Campus</label>
              <input class="form-control" type="text" id="campusName" placeholder="Campus Name" required>
              <label for="end-date">Location</label>
              <input class="form-control" type="text" id="campusLocation" placeholder="Campus Location" required>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Add Campus</button>
            </div>
          </div>
        </div>
      </div>
      <!-- ADD CAMPUS MODAL END -->

      <!-- ADD COLLEGE MODAL START -->
      <div class="modal fade" id="addCollegeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered"">
    <div class=" modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add College</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <label for="end-date">College</label>
            <input class="form-control" type="text" id="collegeName" placeholder="College Name" required>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Add College</button>
          </div>
        </div>
      </div>
    </div>
    <!-- ADD COLLEGE MODAL END -->

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
      $('#idoTable, #areaTable, #quaacTable').DataTable({
        "paging": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "pageLength": 10 // Number of rows to show per page
      });
    });
  </script>
</body>

</html>
<!-- beautify ignore:end -->