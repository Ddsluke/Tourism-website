<?php
// 2 hours in seconds
$inactive = 7200; 
ini_set('session.gc_maxlifetime', $inactive); // set the session max lifetime to 2 hours

session_start();
echo isset($_SESSION['login']);
if(isset($_SESSION['login'])) {
  header('LOCATION:admin.php'); die();
} // change LOCATION the page after login

if (isset($_SESSION['testing']) && (time() - $_SESSION['testing'] > $inactive)) {
    // last request was more than 2 hours ago
    session_unset();     // unset $_SESSION variable for this page
    session_destroy();   // destroy session data
}
$_SESSION['testing'] = time(); // Update session
?>