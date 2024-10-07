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
  <title>Message</title>
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
  <link rel="stylesheet" href="assets/css/message.css">
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
          <li class="menu-item">
            <a href="users.php" class="menu-link">
              <i class="menu-icon tf-icons bx bx-user"></i>
              <div class="text-truncate" data-i18n="Users">Users</div>
            </a>
          </li>
          <!-- Messages -->
          <li class="menu-item active open">
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
          <div class="chat-container">
        <div class="user-list">
        <input type="text" id="user-search" placeholder="Search users..." class="form-control mb-3" />
            <ul id="user-list">
                <!-- Users will be appended here -->
            </ul>
        </div>
        <div class="conversation">
            <div class="conversation-header">
                <h3 id="chat-partner-name">Select a user to chat</h3>
            </div>
            <div id="messages-container">
                <!-- Messages will be appended here -->
            </div>
            <div class="message-input-container">
                <input type="text" id="message-input" placeholder="Type a message..." />
                <button id="send-button">Send</button>
            </div>
        </div>
        </div>
            <!-- MY PROFILE MODAL START -->
            <div class="modal fade" id="userProfile" tabindex="-1" aria-labelledby="userProfileLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered">
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
      $(document).ready(function() {
    const senderId = <?php echo json_encode(value: $_SESSION['id']); ?>; // Set your sender ID appropriately

    fetchUsers();

    // User click event to select a user
    $(document).on('click', '.user-chat', function() {
    $('.user-chat').removeClass('selected'); // Remove selected class from all users
    $(this).addClass('selected'); // Add selected class to the clicked user
    $(this).find('.badge').remove(); // Remove badge

    const userInfo = $(this).text().trim(); // Get the full user info and trim whitespace
    const userLines = userInfo.split('\n'); // Split the text into lines
    const userName = userLines[0].trim(); // Get the first line (user name)

    if (userName) {
        $('#chat-partner-name').text(userName); // Display user's name in the header
    } else {
        console.warn('User name is empty.');
    }

    const receiverId = $(this).data('id'); // Get the selected user's ID
    if (receiverId) {
        loadMessages(receiverId); // Load messages for the selected user
    } else {
        console.error('Receiver ID is missing.');
    }
  });

    // Variable to store users fetched from the server
    let usersList = [];

    fetchUsers();

    function fetchUsers() {
        $.ajax({
            url: 'fetch_users.php',
            method: 'GET',
            success: function(users) {
                if (Array.isArray(users)) {
                    usersList = users; // Store the users in the variable
                    renderUserList(usersList); // Render the user list
                } else {
                    console.error("Expected an array but received:", users);
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.error("Error fetching users: ", textStatus, errorThrown);
            }
        });
    }

    function renderUserList(users) {
        $('#user-list').empty(); // Clear existing users
        users.forEach(user => {
            $('#user-list').append(`
                <li class="user-chat d-flex flex-column align-items-start" data-id="${user.id}">
                    <span>${user.fname} ${user.lname}</span>
                    <small class="text-muted">${user.email}</small>
                </li>
            `);
        });
    }

    // Search functionality
    $('#user-search').on('keyup', function() {
        const searchQuery = $(this).val().toLowerCase();
        console.log("Search Query:", searchQuery); // Log the current search query

        // Filter users based on the search query
        const filteredUsers = usersList.filter(user => 
            `${user.fname} ${user.lname}`.toLowerCase().includes(searchQuery)
        );

        // Render the filtered user list
        renderUserList(filteredUsers);
    });


    // Function to load messages
    function loadMessages(receiverId) {
        $.ajax({
            url: 'fetch_messages.php',
            method: 'POST',
            data: {
                sender_id: senderId,
                receiver_id: receiverId
            },
            dataType: 'json',
            success: function(messages) {
                if (Array.isArray(messages)) {
                    $('#messages-container').empty(); // Clear existing messages
                    messages.forEach(message => {
                        const messageClass = message.sender_id == senderId ? 'sent' : 'received'; // Determine class
                        $('#messages-container').append(`
                            <div class="message ${messageClass}">
                                <span>${message.message}</span>
                            </div>
                        `);
                    });
                    $('#messages-container').scrollTop($('#messages-container')[0].scrollHeight);
                } else {
                    console.error("Expected an array but received:", messages);
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.error("Error loading messages: ", textStatus, errorThrown);
            }
        });
    }

    // Send message
    $('#send-button').click(function() {
        const message = $('#message-input').val();
        const receiverId = $('#user-list li.selected').data('id'); // Ensure this gets the right receiver ID
        
        if (message && receiverId) {
            $.ajax({
                url: 'send_message.php',
                method: 'POST',
                data: {
                    sender_id: senderId,
                    receiver_id: receiverId,
                    message: message
                },
                success: function() {
                    $('#message-input').val(''); // Clear input after sending
                    loadMessages(receiverId); // Refresh messages
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.error("Error sending message: ", textStatus, errorThrown);
                }
            });
        } else {
            alert("Please enter a message and select a recipient.");
        }
    });
});
    </script>
</body>

</html>
<!-- beautify ignore:end -->