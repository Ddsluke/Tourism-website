<?php
session_start();

//if( isset($_SESSION['login_tourist']))
//{
 $servername = "mysql.comp.polyu.edu.hk";
$username = "17083686d";//need to change to xiajialu's
$password = "fdtwjmfn";
$dbname="17083686d";
 
// CONNECT
$conn = new mysqli($servername, $username, $password,$dbname);
//$id = $_SESSION['login_tourist'];
// Check connection
if ($conn->connect_error) {
    die("CAN'T CONNECT : " . $conn->connect_error);
} 
//}
if(isset($_POST['date']))
{
    $day=$_POST['date'];
    echo $day;
}
else {
    
    echo"No date";
}
if(isset($_POST['accname']))
    $name=$_POST['accname'];
else
    echo"no name";
echo $name;
$id=2;
$USERID=$id;
$sql="SELECT ArrangeId FROM Arrange WHERE TouristsID='$USERID' and Activate=0";
 $result = mysqli_query($conn, $sql);
 $row = mysqli_fetch_assoc($result);
 $arrangeid=$row['ArrangeId'];
 $sql="SELECT * FROM Hotel WHERE HName='$name'";
 $result = mysqli_query($conn, $sql);
 $row = mysqli_fetch_assoc($result);
 $rid=$row['HID'];
 echo $rid;
$sql="INSERT INTO RecommandHotel (Date,ArrangeId,HID)VALUES('$day',$arrangeid,$rid)";
mysqli_query($conn, $sql);
echo "done";
?>
