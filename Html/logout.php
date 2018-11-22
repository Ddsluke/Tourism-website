<?php
// remove all session variables
session_unset();

// destroy the session
session_destroy();

echo "Log out successfully!"

 
header("location: login.php"); 
exit; 


?>