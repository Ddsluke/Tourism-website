<?php
// remove all session variables
session_unset();
// destroy the session
session_destroy();

echo "Log out successfully!";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- refresh after 2 second -->
    <meta http-equiv="refresh" content="2;url=login.php">
    <title>Logout successfully...</title>
</head>