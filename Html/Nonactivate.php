<?php
$servername = "mysql.comp.polyu.edu.hk";
$username = "16098537d";//need to change to xiajialu's
$password = "iqdobdiy";
$dbname="16098537d";
 
// CONNECT
$conn = new mysqli($servername, $username, $password,$dbname);
// Check connection
if ($conn->connect_error) {
    die("CAN'T CONNECT : " . $conn->connect_error);
} 
$date= date("Y-m-d");
$sql="update Arrange SET Activate=1 WHERE Arrange.LeaveDay>$date";
if($result = mysqli_query($conn, $sql))
echo "done";
else
    echo "No changes";
$conn->close();
?>

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

