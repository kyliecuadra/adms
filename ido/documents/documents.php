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
    $programName = isset($_GET['program']) ? htmlspecialchars($_GET['program']) : 'Program';
    $areaName = isset($_GET['area']) ? htmlspecialchars($_GET['area']) : 'Areas';
    $parameterName = isset($_GET['parameter']) ? htmlspecialchars($_GET['parameter']) : 'Parameters';
    $qualityName = isset($_GET['quality']) ? htmlspecialchars($_GET['quality']) : 'Quality';
}
?>
<!DOCTYPE html>
<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed layout-compact " dir="ltr"
    data-theme="theme-default" data-assets-path="../../assets/" data-template="vertical-menu-template">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <title>Documents - <?php echo htmlspecialchars($collegeName, ENT_QUOTES, 'UTF-8'); ?></title>
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
                    <li class="menu-item active open">
                        <a href="campus.php" class="menu-link">
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
                                                        <img src="../../assets/img/profiles/default.png"
                                                            alt class="w-px-40 h-auto rounded-circle">
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
                                        <a href="programs.php?campus=<?php echo urlencode($campusName); ?>&college=<?php echo urlencode($collegeName); ?>">
                                            <?php echo $programName; ?></a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        <a href="areas.php?campus=<?php echo urlencode($campusName); ?>&college=<?php echo urlencode($collegeName); ?>&program=<?php echo urlencode($programName); ?>">
                                            <?php echo $areaName; ?></a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        <a href="parameters.php?campus=<?php echo urlencode($campusName); ?>&college=<?php echo urlencode($collegeName); ?>&program=<?php echo urlencode($programName); ?>&area=<?php echo urlencode($areaName); ?>">
                                            <?php echo $parameterName; ?></a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page"><a href="#" onclick="window.history.back(); return false;"><?php echo $qualityName; ?></a></li>
                                </ol>
                            </nav>
                            <div class="d-flex flex-column">
                                <div class="d-flex ms-auto align-items-end mb-3">
                                    <button class="btn" data-bs-toggle="modal"
                                        data-bs-target="#addDocumentModal">Add Document</button>
                                </div>
                            </div>
                            <table id="documentTable" class="accordion mr-2 table table-hover table-bordered table-responsive">
                                <thead>
                                    <tr>
                                        <th width="60%"><strong>Benchmark</strong></th>
                                        <th width="20%"><strong>Date Uploaded</strong></th>
                                        <th width="15%"><strong>Action</strong></th>
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

            <!-- ADD DOCUMENT MODAL START -->
            <div class="modal fade" id="addDocumentModal" tabindex="-1" aria-labelledby="addDocumentLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addDocumentLabel">Add Document</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <hr>
                        <div class="modal-body">
                            <form id="uploadForm">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="campus" class="form-label">Campus</label>
                                        <input class="form-control" type="text" name="campus" id="campus" value="<?php echo $campusName; ?>" disabled>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="college" class="form-label">College</label>
                                        <input class="form-control" type="text" name="college" id="college" value="<?php echo $collegeName; ?>" disabled>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="program" class="form-label">Program</label>
                                        <textarea class="form-control" name="program" id="program" rows="3" disabled><?php echo $programName; ?></textarea>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="area" class="form-label">Area</label>
                                        <input class="form-control" type="text" name="area" id="area" value="<?php echo $areaName; ?>" disabled>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="parameter" class="form-label">Parameter</label>
                                        <input class="form-control" type="text" name="parameter" id="parameter" value="<?php echo $parameterName; ?>" disabled>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="quality" class="form-label">Quality of Measurement</label>
                                        <input class="form-control" type="text" name="quality" id="quality" value="<?php echo $qualityName; ?>" disabled>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="benchmark" class="form-label">Benchmark</label>
                                    <input type="text" class="form-control" name="benchmark" id="benchmark">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Upload Document</label>
                                    <input class="form-control" id="fileInput" name="fileInput[]" type="file" accept=".pdf, image/*" multiple>
                                    <small id="fileName" class="form-text text-muted">No file chosen</small>
                                </div>
                            </form>
                        </div>
                        <hr>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" id="uploadButton">Upload Document</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ADD DOCUMENT MODAL END -->
            <!-- UPDATE DOCUMENT MODAL START -->
            <div class="modal fade" id="updateDocumentModal" tabindex="-1" aria-labelledby="updateDocumentModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="updateDocumentModalLabel">Update Document</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <hr>
                        <div class="modal-body">
                            <form id="updateForm">
                                <input type="hidden" name="currentId" id="currentId">
                                <input type="hidden" name="campus" value="<?php echo $campusName; ?>">
                                <input type="hidden" name="college" value="<?php echo $collegeName; ?>">
                                <input type="hidden" name="program" value="<?php echo $programName; ?>">
                                <div class="mb-3">
                                    <label for="area" class="form-label">Area</label>
                                    <select id="currentArea" name="currentArea" class="form-control"></select>
                                </div>
                                <div class="mb-3">
                                    <label for="parameter" class="form-label">Parameter</label>
                                    <select id="currentParameter" name="currentParameter" class="form-control"></select>
                                </div>
                                <div class="mb-3">
                                    <label for="quality" class="form-label">Quality of Measurement</label>
                                    <select class="form-control" name="currentQuality" id="currentQuality" required>
                                        <option disabled selected>Select an option</option>
                                        <option value="System - Inputs and Processes">System - Inputs and Processes</option>
                                        <option value="Implementation">Implementation</option>
                                        <option value="Outcome/s">Outcome/s</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="currentBenchmark" class="form-label">Benchmark</label>
                                    <input type="text" class="form-control" name="currentBenchmark" id="currentBenchmark">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Upload Document</label>
                                    <input class="form-control" id="currentFileInput" name="fileInput" type="file"
                                        accept=".pdf, image/*">
                                    <small id="currentFileName" class="form-text text-muted">No file chosen</small>
                                </div>
                        </div>
                        <hr>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" id="updateButton">Update Document</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- UPDATE DOCUMENT MODAL END -->

            <!-- ADD SUB DOCUMENT MODAL START -->
            <div class="modal fade" id="addSubDocumentModal" tabindex="-1" aria-labelledby="addSubDocumentModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addSubDocumentModalLabel">Add Sub Document</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <hr>
                        <div class="modal-body">
                            <form id="addSubDocumentForm">
                                <input type="hidden" name="parentId" id="parentId">
                                <input type="hidden" name="subCampus" value="<?php echo $campusName; ?>">
                                <input type="hidden" name="subCollege" value="<?php echo $collegeName; ?>">
                                <input type="hidden" name="subProgram" value="<?php echo $programName; ?>">
                                <input type="hidden" name="subArea" value="<?php echo $areaName; ?>">
                                <input type="hidden" name="subParameter" value="<?php echo $parameterName; ?>">
                                <input type="hidden" name="subQuality" value="<?php echo $qualityName; ?>">
                                <div class="mb-3">
                                    <label for="subBenchmark" class="form-label">Benchmark</label>
                                    <input type="text" class="form-control" name="subBenchmark" id="subBenchmark">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Upload Document</label>
                                    <input class="form-control" id="subFile" name="subFile[]" type="file"
                                        accept=".pdf, image/*">
                                    <small id="subFilename" class="form-text text-muted">No file chosen</small>
                                </div>
                        </div>
                        <hr>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" id="addSubDocument">Add Sub Document</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- ADD SUB DOCUMENT MODAL END -->

            <!-- VIEW DOCUMENT MODAL START -->
            <!-- Modal HTML -->
            <!-- Modal HTML -->
            <div id="viewDocumentModal" class="modal fade" tabindex="-1" aria-labelledby="viewDocumentModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="viewDocumentModalLabel"></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <!-- Iframe for displaying the PDF -->
                            <iframe id="pdfViewer" src="" width="100%" height="600px" frameBorder="0"></iframe>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- VIEW DOCUMENT MODAL END -->
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
            <script src="areaParameter.js"></script>
            <!-- Page JS -->
            <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
            <script>
                var campusName = <?php echo json_encode($campusName); ?>;
                var collegeName = <?php echo json_encode($collegeName); ?>;
                var programName = <?php echo json_encode($programName); ?>;
                var areaName = <?php echo json_encode($areaName); ?>;
                var parameterName = <?php echo json_encode($parameterName); ?>;
                var qualityName = <?php echo json_encode($qualityName); ?>;

                // DISPLAY RECORDS START
                $(document).ready(function() {
                    var table = $('#documentTable').DataTable({
                        ajax: {
                            url: 'get_structure.php',
                            type: 'GET',
                            data: {
                                identifier: "documents",
                                campus: campusName,
                                college: collegeName,
                                program: programName,
                                area: areaName,
                                parameter: parameterName,
                                quality: qualityName
                            }
                        },
                        columns: [{
                                data: 'benchmark',
                                render: function(data, type, row) {
                                    if (row.parent_benchmark === "0") {
                                        return `<span>${data}</span>`;
                                    } else {
                                        return '';
                                    }
                                }
                            },
                            {
                                data: 'upload_date',
                                render: function(data) {
                                    return data ? `<span>${data}</span>` : '-';
                                }
                            },
                            {
                                data: null,
                                render: function(data, type, row) {
                                    return `
                        <button class="btn btn-info btn-sm" title="View" onclick="viewDocument('${row.filename}', '${row.benchmark}')">
                            <i class="fas fa-eye"></i>
                        </button>
                        <button class="btn btn-primary btn-sm" title="Update" onclick="updateDocument('${row.area}', '${row.parameter}', '${row.quality}', '${row.filename}', '${row.benchmark}', '${row.id}')">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button class="btn btn-primary btn-sm" title="Add Sub-Document" onclick="addSubDocument('${row.id}')">
                            <i class="fa-solid fa-plus"></i>
                        </button>`;
                                },
                                orderable: false,
                                searchable: false
                            }
                        ],
                        paging: true,
                        searching: true,
                        ordering: false,
                        responsive: true
                    });

                    function hasChild(parentId) {
                        var rows = table.rows().data().toArray();
                        return rows.some(function(row) {
                            return row.parent_benchmark === parentId;
                        });
                    }

                    function createSubRowHtml(parentRow, level = 1, processedRows = new Set()) {
                        var rows = table.rows().data().toArray();
                        var subRowsHtml = '';

                        rows.forEach(function(subRow) {
                            if (subRow.parent_benchmark === parentRow.id && !processedRows.has(subRow.id)) {
                                processedRows.add(subRow.id);
                                var padding = 20 * level;
                                subRowsHtml += `
                    <tr class="accordion-collapse collapse sub-row" id="collapse-${parentRow.id}">
                        <td style="padding-left: ${padding}px;">
                            ${hasChild(subRow.id) ? `
                                <div class="accordion-button collapsed" 
                                     data-bs-toggle="collapse" 
                                     data-bs-target="#collapse-${subRow.id}" 
                                     aria-expanded="false" 
                                     aria-controls="collapse-${subRow.id}">
                                    <strong>${subRow.benchmark}</strong>
                                </div>
                            ` : `<strong>${subRow.benchmark}</strong>`}
                        </td>
                        <td><span>${subRow.upload_date || '-'}</span></td>
                        <td>
                            <button class="btn btn-info btn-sm" title="View" onclick="viewDocument('${subRow.filename}', '${subRow.benchmark}')">
                                <i class="fas fa-eye"></i>
                            </button>
                            <button class="btn btn-primary btn-sm" title="Update" onclick="updateDocument('${subRow.area}', '${subRow.parameter}', '${subRow.quality}', '${subRow.filename}', '${subRow.benchmark}', '${subRow.id}')">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button class="btn btn-primary btn-sm" title="Add Sub-Document" onclick="addSubDocument('${subRow.id}')">
                                <i class="fa-solid fa-plus"></i>
                            </button>
                        </td>
                    </tr>`;
                                subRowsHtml += createSubRowHtml(subRow, level + 1, processedRows); // Recursively create sub-rows
                            }
                        });

                        return subRowsHtml;
                    }

                    table.on('draw', function() {
                        var rows = table.rows().data().toArray();
                        var processedRows = new Set(); // Track processed rows to avoid duplicates

                        $('#documentTable tbody tr').each(function() {
                            var row = table.row(this).data();
                            var benchmarkCell = $(this).find('td').eq(0);

                            if (row.parent_benchmark === "0" && hasChild(row.id)) {
                                // This row is a parent with children
                                benchmarkCell.html(`
                    <div class="accordion-button collapsed" 
                         data-bs-toggle="collapse" 
                         data-bs-target="#collapse-${row.id}" 
                         aria-expanded="false" 
                         aria-controls="collapse-${row.id}">
                        <strong>${row.benchmark}</strong>
                    </div>
                `);

                                if (!processedRows.has(row.id)) {
                                    processedRows.add(row.id);
                                    var subRowsHtml = createSubRowHtml(row, 1, processedRows);
                                    if (subRowsHtml) {
                                        $(this).after(subRowsHtml);
                                        new bootstrap.Collapse(document.querySelector(`#collapse-${row.id}`), {
                                            toggle: false
                                        });
                                    }
                                }
                            } else if (row.parent_benchmark === "0" && !hasChild(row.id)) {
                                // This row is a simple row without children
                                benchmarkCell.html(`${row.benchmark}`);
                            } else {
                                $(this).hide();
                            }
                        });
                    });
                });

                // DISPLAY RECORD END
                // FILE UPLAOD START
                $(function() {
                    // Handle file input change event
                    $('#fileInput').on('change', function() {
                        var files = $(this).prop('files');
                        var fileNames = Array.from(files).map(file => file.name).join(', ');
                        $('#fileName').text(fileNames || 'No file chosen');
                    });

                    // Handle file upload on button click
                    $('#uploadButton').on('click', function() {
                        var formData = new FormData($('#uploadForm')[0]);
                        var files = $('#fileInput')[0].files;

                        // Manually append disabled fields to the FormData
                        $('#uploadForm').find('input:disabled, textarea:disabled').each(function() {
                            formData.append(this.name, this.value);
                        });

                        $.ajax({
                            url: 'upload.php',
                            type: 'POST',
                            data: formData,
                            contentType: false,
                            processData: false,
                            success: function(response) {
                                console.log('Success:', response);

                                // Check the response for various status messages
                                if (Array.isArray(response) && response.length > 0) {
                                    response.forEach(function(item) {
                                        if (item.status === 'success') {
                                            toastr.success(item.message);
                                        } else {
                                            toastr.warning(item.message || "An error occurred.");
                                        }
                                    });

                                    // Reset form if there are no errors
                                    if (response.every(item => item.status === 'success')) {
                                        $('#uploadForm')[0].reset();
                                        $('#fileName').text('No file chosen');
                                        $('#documentTable').DataTable().ajax.reload();
                                        $('#addDocumentModal').modal('hide');
                                    }
                                } else {
                                    toastr.warning("Unexpected response format!");
                                }
                            },
                            error: function(xhr, status, error) {
                                toastr.error("Upload failed!");
                                console.error('Error uploading files:', error);
                            }
                        });
                    });
                });

                // FILE UPLOAD END

                // VIEW DOCUMENT START
                function viewDocument(filename, program) {
                    // Construct the URL for the PDF file
                    var pdfUrl = '../../assets/documents/' + filename; // Adjust the path to your PDFs
                    $('#viewDocumentModalLabel').text(filename);
                    $('#programLabel').text(program);
                    // Set the URL of the PDF in the iframe
                    $('#pdfViewer').attr('src', pdfUrl + "#toolbar=0");

                    // Show the modal
                    $('#viewDocumentModal').modal('show');
                }
                // VIEW DOCUMENT END

                // UPDATE DOCUMENT START
                function updateDocument(area, parameter, quality, filename, benchmark, id) {
                    $('#currentId').val(id);
                    $('#currentArea').val(area);
                    $('#currentParameter').val(parameter);
                    $('#currentQuality').val(quality);
                    $('#currentBenchmark').val(benchmark);

                    // Display the current file name (if any) in a readable format
                    $('#currentFileName').text(filename ? filename : 'No file chosen');

                    $('#updateDocumentModal').modal('show');
                }

                // Handle form submission
                $('#updateButton').on('click', function() {
                    var formData = new FormData($('#updateForm')[0]);
                    // Log form data to console
                    formData.forEach(function(value, key) {
                        console.log(key + ': ' + value);
                    });

                    $.ajax({
                        url: 'update_document_process.php', // Server-side script to handle the update
                        type: 'POST',
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function(response) {
                            if (response == '1') {
                                toastr.success('Document updated successfully!');
                                $('#documentTable').DataTable().ajax.reload();
                                var modal = bootstrap.Modal.getInstance(document.getElementById(
                                    'updateDocumentModal'));
                                modal.hide();
                            } else if (response == '0') {
                                toastr.success('No changes detected. Data remains unchanged!');
                                $('#documentTable').DataTable().ajax.reload();
                                var modal = bootstrap.Modal.getInstance(document.getElementById(
                                    'updateDocumentModal'));
                                modal.hide();
                            } else {
                                toastr.error(response);
                                $('#documentTable').DataTable().ajax.reload();
                                var modal = bootstrap.Modal.getInstance(document.getElementById(
                                    'updateDocumentModal'));
                                modal.hide();
                            }
                            // Optionally, reload the table or update UI
                        },
                        error: function(xhr, status, error) {
                            alert('An error occurred: ' + error);
                        }
                    });
                });
                // UPDATE DOCUMENT END

                // ADD SUB DOCUMENT START
                function addSubDocument(id) {
                    // Handle file input change event
                    $('#subFile').off('change').on('change', function() {
                        var files = $(this).prop('files');
                        var fileNames = Array.from(files).map(file => file.name).join(', ');
                        $('#subFilename').text(fileNames || 'No file chosen');
                    });

                    // Set the parent ID in the hidden input
                    $('#parentId').val(id);

                    // Show the modal
                    $('#addSubDocumentModal').modal('show');

                    // Unbind any previous click events and bind a new one
                    $('#addSubDocument').off('click').on('click', function() {
                        var formData = new FormData($('#addSubDocumentForm')[0]);
                        var files = $('#subFile')[0].files;

                        $.ajax({
                            url: 'add_sub_document.php',
                            type: 'POST',
                            data: formData,
                            contentType: false,
                            processData: false,
                            success: function(response) {
                                console.log('Success:', response);

                                // Check the response for various status messages
                                if (Array.isArray(response) && response.length > 0) {
                                    response.forEach(function(item) {
                                        if (item.status === 'success') {
                                            toastr.success(item.message);
                                        } else {
                                            toastr.warning(item.message || "An error occurred.");
                                        }
                                    });

                                    // Reset form if there are no errors
                                    if (response.every(item => item.status === 'success')) {
                                        $('#addSubDocumentForm')[0].reset();
                                        $('#subFilename').text('No file chosen');
                                        $('#documentTable').DataTable().ajax.reload();
                                        $('#addSubDocumentModal').modal('hide');
                                    }
                                } else {
                                    toastr.warning("Unexpected response format!");
                                }
                            },
                            error: function(xhr, status, error) {
                                toastr.error("Upload failed!");
                                console.error('Error uploading files:', error);
                            }
                        });
                    });
                }

                // ADD SUB DOCUMENT END

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