<?php
session_start();
// remove all session variables
session_destroy();
echo "Log out successfully!";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- refresh after 2 second -->
    <meta http-equiv="refresh" content="2;url=../Login.php">
    <title>Logout successfully...</title>
</head>