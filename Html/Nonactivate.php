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
$sql="update Arrange SET Activate=1 WHERE Arrange.LeaveDay<$date";
if($result = mysqli_query($conn, $sql)){
    echo "Success!";
}
else
    echo "No changes";
$conn->close();
header("refresh:1;url=Admin.php");
?>



