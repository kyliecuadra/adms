<?php
require("../../config/db_connection.php");

session_start();
require("../../config/session_timeout.php");

if (!isset($_SESSION['id'])) {
    header("location: ../../config/not_login-error.html");
} else {
    if ($_SESSION['role'] != "ido") {
        header("location: ../../config/user_level-error.html");
    }

    $campusName = isset($_GET['campus']) ? htmlspecialchars($_GET['campus']) : 'Campus';
    $collegeName = isset($_GET['college']) ? htmlspecialchars($_GET['college']) : 'College';
    $programName = isset($_GET['program']) ? htmlspecialchars($_GET['program']) : 'Programs';
}
?>
<!DOCTYPE html>
<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed layout-compact " dir="ltr"
    data-theme="theme-default" data-assets-path="../../assets/" data-template="vertical-menu-template">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <title>Requested Documents - <?php echo htmlspecialchars($collegeName, ENT_QUOTES, 'UTF-8'); ?></title>
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
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
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
<style>
    /* Ensure autocomplete suggestions appear above other elements */
    .ui-autocomplete {
        z-index: 10000;
        /* Adjust as needed */
        max-height: 200px;
        /* Set a maximum height for the autocomplete dropdown */
        overflow-y: auto;
        /* Enable vertical scrolling */
        overflow-x: hidden;
        /* Hide horizontal overflow, if any */
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
                    <li class="menu-item active open">
                        <a href="campus.php" class="menu-link">
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
                    <li class="menu-item">
                        <a href="../configuration/campus.php" class="menu-link">
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
                <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
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
                                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);"
                                    data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                                    <i class="bx bx-bell bx-sm"></i>
                                    <span class="badge bg-success rounded-pill badge-notifications"
                                        id="notification-count">0</span>
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
                                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);"
                                    data-bs-toggle="dropdown">
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
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb fs-4">
                                    <li class="breadcrumb-item"><a href="programs.php"><?php echo $campusName; ?></a></li>
                                    <li class="breadcrumb-item">
                                        <a href="colleges.php?campus=<?php echo urlencode($campusName); ?>">
                                            <?php echo $collegeName; ?>
                                        </a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        <a href="#" onclick="window.history.back(); return false;"><?php echo $programName; ?></a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Documents</li>
                                </ol>
                            </nav>
                            <div class="d-flex flex-column">
                                <div class="d-flex flex-row align-items-end mb-3">
                                    <div class="row mb-0 flex-grow-1">
                                        <div class="col-3">
                                            <select id="filterArea" name="filterArea" class="form-control"></select>
                                        </div>
                                        <div class="col-3">
                                            <select id="filterParameter" name="filterParameter"
                                                class="form-control"></select>
                                        </div>
                                        <div class="col-3">
                                            <select class="form-control" name="filterQuality" id="filterQuality">
                                                <option>Select Quality</option>
                                                <option value="System - Inputs and Processes">System - Inputs and Processes
                                                </option>
                                                <option value="Implementation">Implementation</option>
                                                <option value="Output">Output</option>
                                            </select>
                                        </div>
                                        <div class="col-3">
                                            <select class="form-control" name="filterStatus" id="filterStatus">
                                                <option>Select Status</option>
                                                <option value="Pending">Pending
                                                </option>
                                                <option value="Approved">Approved</option>
                                                <option value="Rejected">Rejected</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <table id="documentTable" class="mr-2 table table-hover table-bordered table-responsive">
                                <thead>
                                    <tr>
                                        <th><strong>Requestor</strong></th>
                                        <th><strong>Area</strong></th>
                                        <th><strong>Parameter</strong></th>
                                        <th><strong>Quality of Measurement</strong></th>
                                        <th><strong>Benchmark</strong></th>
                                        <th><strong>Date Requested</strong></th>
                                        <th><strong>Priority</strong></th>
                                        <th><strong>Date Processed</strong></th>
                                        <th><strong>Action</strong></th>
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
            </div>
            <!-- Approve Modal -->
            <!-- Approve Modal Structure -->
            <div class="modal fade" id="approveModal" tabindex="-1" aria-labelledby="approveModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="approveModalLabel">Approve Document</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="approveForm" enctype="multipart/form-data">
                                <div class="mb-3">
                                    <label for="modalArea" class="form-label">
                                        <i class="bx bx-layer"></i> Area
                                    </label>
                                    <input type="text" class="form-control" id="modalArea" disabled>
                                </div>
                                <div class="mb-3">
                                    <label for="modalParameter" class="form-label">
                                        <i class="bx bx-cog"></i> Parameter
                                    </label>
                                    <input type="text" class="form-control" id="modalParameter" disabled>
                                </div>
                                <div class="mb-3">
                                    <label for="modalQuality" class="form-label">
                                        <i class="bx bx-check-circle"></i> Quality
                                    </label>
                                    <input type="text" class="form-control" id="modalQuality" disabled>
                                </div>
                                <div class="mb-3">
                                    <label for="modalCampus" class="form-label">
                                        <i class="bx bx-buildings"></i> Campus
                                    </label>
                                    <input type="text" class="form-control" id="modalCampus" disabled>
                                </div>
                                <div class="mb-3">
                                    <label for="modalCollege" class="form-label">
                                        <i class="bx bx-book"></i> College
                                    </label>
                                    <input type="text" class="form-control" id="modalCollege" disabled>
                                </div>
                                <div class="mb-3">
                                    <label for="modalProgram" class="form-label">
                                        <i class="bx bx-briefcase"></i> Program
                                    </label>
                                    <input type="text" class="form-control" id="modalProgram" disabled>
                                </div>
                                <div class="mb-3">
                                    <label for="modalProgram" class="form-label">
                                        <i class='bx bx-menu'></i> Benchmark
                                    </label>
                                    <input type="text" class="form-control" id="modalBenchmark" disabled>
                                </div>
                                <div class="mb-3">
                                    <label for="uploadFile" class="form-label">
                                        <i class='bx bx-upload'></i> Upload File
                                    </label>
                                    <input type="file" class="form-control" id="uploadFile" name="file" accept=".pdf, image/*" required>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="button" class="btn btn-success" id="confirmApprove">Approve</button>
                        </div>
                    </div>
                </div>
            </div>




            <!-- Reject Modal -->
            <div class="modal fade" id="rejectModal" tabindex="-1" aria-labelledby="rejectModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="rejectModalLabel">Reject Document</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Are you sure you want to reject this document?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="button" class="btn btn-danger" id="confirmReject">Reject</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- / Layout wrapper -->

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
            <script src="../../config/areaSelection.js"></script>
            <script src="../../config/parameterSelection.js"></script>
            <script src="../../config/generateFilter.js"></script>
            <!-- Page JS -->
            <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
            <script>
                var campusName = <?php echo json_encode($campusName); ?>;
                var collegeName = <?php echo json_encode($collegeName); ?>;
                var programName = <?php echo json_encode($programName); ?>;
programName
                // DISPLAY RECORDS START
                $(document).ready(function() {
                    let selectedDocumentId; // Store the selected document ID

                    // Initialize DataTable
                    var table = $('#documentTable').DataTable({
                        ajax: {
                            url: 'get_structure.php',
                            type: 'GET',
                            data: {
                                identifier: "documents",
                                campus: campusName,
                                college: collegeName,
                                program: programName
                            },
                            dataSrc: 'data'
                        },
                        columns: [{
                                data: 'requestor'
                            },
                            {
                                data: 'area'
                            },
                            {
                                data: 'parameter'
                            },
                            {
                                data: 'quality'
                            },
                            {
                                data: 'benchmark'
                            },
                            {
                                data: 'requested_date'
                            },
                            {
                                data: 'priority',
                                render: function(data, type, row) {
                                    // Get today's date
                                    var today = new Date();

                                    // Parse the priority date
                                    var priorityDate = new Date(data);

                                    // Calculate the difference in days
                                    var diffDays = Math.ceil((priorityDate - today) / (1000 * 3600 * 24));

                                    // Check if the priority date is less than 5 days
                                    if (diffDays <= 5) {
                                        return 'High'; // Show "High" if less than 5 days
                                    } else if (diffDays <= 10) {
                                        return 'Medium'; // Show "Medium" if less than 10 days
                                    }
                                    return 'Low'; // Otherwise, show "Low"
                                }
                            },
                            {
                                data: 'processed_date',
                                render: function(data, type, row) {
                                    return data && data.trim() !== '' ? data : '<span class="badge bg-warning text-white fs-5">Pending</span>';
                                }
                            },
                            {
                                data: null,
                                render: function(data, type, row) {
                                    if (row.status === "Pending") {
                                        return `
                                        <div style="display: flex; gap: 5px;">
                                            <button class="btn btn-primary text-white approve-btn"
                                                data-bs-toggle="modal"
                                                data-bs-target="#approveModal"
                                                data-id="${row.id}"
                                                data-area="${row.area}"
                                                data-parameter="${row.parameter}"
                                                data-quality="${row.quality}"
                                                data-campus="${row.campus}"
                                                data-college="${row.college}"
                                                data-benchmark="${row.benchmark}"
                                                data-program="${row.program}">Approve</button>
                                            <button class="btn btn-danger text-white"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#rejectModal"
                                                    data-id="${row.id}"
                                                    style="background-color: #DC3545 !important; border-color: #ff3e1d !important;">Reject</button>
                                        </div>
                                        `;
                                    } else if (row.status === "Approved" ) {
                                        return `<span class="badge bg-success text-white fs-5">Approved</span>`;
                                    } else if (row.status === "Rejected") {
                                        return `<span class="badge bg-danger text-white fs-5">Rejected</span>`;
                                    }

                                },
                                orderable: false,
                                searchable: true
                            }
                        ],
                        paging: true,
                        searching: true,
                        responsive: true,
                        createdRow: function(row, data, dataIndex) {
                            // Get today's date
                            var today = new Date();

                            // Parse the priority date from the row
                            var priorityDate = new Date(data.priority);
                            console.log(data.status);

                            // Calculate the difference in days
                            var diffDays = Math.ceil((priorityDate - today) / (1000 * 3600 * 24));

                            // Check the number of days and apply the appropriate background color
                            if (diffDays <= 5 && data.status === "Pending") {
                                $(row).css('background-color', '#FF6F61'); // High priority
                            } else if (diffDays <= 10 && data.status === "Pending") {
                                $(row).css('background-color', '#FDFD96'); // Medium priority
                            } else {
                                if(data.status === "Pending")
                                $(row).css('background-color', '#77DD77'); // Low priority
                            }
                        }
                    });

                    // Function to apply filters
                    function applyFilters() {
                        var areaValue = $('#filterArea').val().trim();
                        var parameterValue = $('#filterParameter').val().trim();
                        var qualityValue = $('#filterQuality').val().trim();
                        var statusValue = $('#filterStatus').val().trim();
                        let columnIndex; // Default column to search for quality (Pending)

                        // Decide column index based on the selected status
                        if (statusValue === 'Approved' || statusValue === 'Rejected') {
                            columnIndex = 7; // Search in column 7 if Approved or Rejected is selected
                        } else {
                            columnIndex = 6; // Default to column 6 for Pending
                        }
                        // Reset all columns search before applying new filters
                        table.columns().search('');
                        // Apply new filters
                        table
                            .column(1).search(areaValue === 'Select Area' ? '' : areaValue)
                            .column(2).search(parameterValue === 'Select Parameter' ? '' : parameterValue)
                            .column(3).search(qualityValue === 'Select Quality' ? '' : qualityValue)
                            .column(columnIndex).search(statusValue === 'Select Status' ? '' : statusValue)
                            .draw(); // Redraw the table with the applied filters
                        // Reset DataTable if all filters are at their default values
                        if ((areaValue === 'Select Area' || areaValue === '') &&
                            (parameterValue === 'Select Parameter' || parameterValue === '') &&
                            (qualityValue === 'Select Quality' || qualityValue === '') &&
                            (statusValue === 'Select Status' || statusValue === '')) {
                            console.log("Resetting table because all filters are default.");
                            table.ajax.reload(); // Refresh DataTable if all filters are default
                        }
                    }

                    // Real-time filtering: apply filters on input change
                    $('#filterArea, #filterParameter, #filterQuality, #filterStatus').on('change keyup', function() {
                        applyFilters(); // Apply filters whenever any of the inputs are changed
                    });


                    // Handle button clicks for approve and reject
                    $('#documentTable tbody').on('click', '.btn-primary, .btn-danger', function() {
                        selectedDocumentId = $(this).data('id');
                    });

                    // Handle the Approve button click to populate the modal
                    $(document).on('click', '.approve-btn', function() {
                        // Get data from the clicked button
                        var area = $(this).data('area');
                        var parameter = $(this).data('parameter');
                        var quality = $(this).data('quality');
                        var campus = $(this).data('campus');
                        var college = $(this).data('college');
                        var program = $(this).data('program');
                        var benchmark = $(this).data('benchmark');
                        var documentId = $(this).data('id');
                        // Populate the modal with the data
                        $('#modalArea').val(area); // Set disabled inputs
                        $('#modalParameter').val(parameter);
                        $('#modalQuality').val(quality);
                        $('#modalCampus').val(campus);
                        $('#modalCollege').val(college);
                        $('#modalProgram').val(program);
                        $('#modalBenchmark').val(benchmark);
                        // Store the document ID in the "Approve" button in case you need it on confirmation
                        $('#confirmApprove').data('id', documentId);
                    });

                    $('#confirmApprove').on('click', function() {
                        // Get the document ID stored in the "Approve" button
                        var documentId = $(this).data('id');

                        // Prepare the form data, including the file
                        var formData = new FormData();
                        formData.append('id', documentId); // Add document ID
                        formData.append('area', $('#modalArea').val()); // Add the modal data values
                        formData.append('parameter', $('#modalParameter').val());
                        formData.append('quality', $('#modalQuality').val());
                        formData.append('campus', $('#modalCampus').val());
                        formData.append('college', $('#modalCollege').val());
                        formData.append('program', $('#modalProgram').val());
                        formData.append('benchmark', $('#modalBenchmark').val());
                        // Get the file from the file input
                        var fileInput = $('#uploadFile')[0].files[0];
                        if (fileInput) {
                            formData.append('fileInput', fileInput); // Add the file to the form data
                        }

                        // Perform the AJAX request
                        $.ajax({
                            url: 'upload.php',
                            type: 'POST',
                            data: formData,
                            processData: false, // Important: Prevent jQuery from converting the data
                            contentType: false, // Important: Let the browser set the content type
                            success: function(response) {
                                if (response.status === "success") {
                                    toastr.success('Document approved successfully!');
                                } else {
                                    toastr.error('An error occurred: ' + response);
                                }
                                $('#approveModal').modal('hide');
                                table.ajax.reload(); // Reload the table to reflect the changes
                            },
                            error: function(xhr, status, error) {
                                toastr.error('An error occurred: ' + error);
                                $('#approveModal').modal('hide');
                            }
                        });
                    });

                    // Confirm reject action
                    $('#confirmReject').on('click', function() {
                        $.ajax({
                            url: 'reject_request.php',
                            type: 'POST',
                            data: {
                                id: selectedDocumentId
                            },
                            success: function(response) {
                                if (response === "success") {
                                    toastr.success('Document rejected successfully!');
                                } else {
                                    toastr.error('An error occurred: ' + response);
                                }
                                $('#rejectModal').modal('hide');
                                table.ajax.reload();
                            },
                            error: function(xhr, status, error) {
                                toastr.error('An error occurred: ' + error);
                                $('#rejectModal').modal('hide');
                            }
                        });
                    });
                });

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
                            window.location.href = `../users.php`;
                        } else {
                            console.log('The notification does not contain the word "approval".');

                            // If not, perform the AJAX request
                            $.ajax({
                                url: '../redirect_notification.php', // Replace with the actual path to your PHP script
                                type: 'POST',
                                data: {
                                    email: email
                                },
                                success: function(response) {
                                    var result = JSON.parse(response);
                                    if (result.status === 'success') {
                                        console.log('Campus:', result.campus);
                                        console.log('College:', result.college);
                                        window.location.href = `../request_documents/programs.php?campus=${encodeURIComponent(result.campus)}&college=${encodeURIComponent(result.college)}`;
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
                        url: '../../config/get_notification_count.php', // PHP file to get notification count
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
                        url: '../../config/fetch_notifications.php', // PHP file to fetch notifications
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
                        url: '../../config/mark_notification_read.php', // PHP file to mark notification as read
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