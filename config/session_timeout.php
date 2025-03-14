<?php 
// Set the session timeout value to 10 minutes
$session_timeout = 6000; 

// Track user activity
if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity'] > $session_timeout)) {
    // User has been inactive for too long, log them out
    session_unset();     // unset $_SESSION variable for the run-time 
    session_destroy();   // destroy session data in storage
    header("location: ../config/logout.php");
    exit();
}

// Update last activity time
$_SESSION['last_activity'] = time();
?>