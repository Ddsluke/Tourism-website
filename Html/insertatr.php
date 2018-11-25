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
if(isset($_POST['atrname']))
    $name=$_POST['atrname'];
else
    echo"no name";
echo $name;
if(isset($_POST['time']))
    $time=$_POST['time'];
else
    echo"no time";
$id=2;
$USERID=$id;
$sql="SELECT ArrangeId FROM Arrange WHERE TouristsID='$USERID' and Activate=0";
 $result = mysqli_query($conn, $sql);
 $row = mysqli_fetch_assoc($result);
 $arrangeid=$row['ArrangeId'];
 $sql="SELECT * FROM Attraction  WHERE AName='$name'";
 $result = mysqli_query($conn, $sql);
 $row = mysqli_fetch_assoc($result);
 $aid=$row['AID'];
 echo $aid;
$sql="INSERT INTO RecommandAttraction (Date,Time,ArrangeId,AID)VALUES('$day','$time',$arrangeid,$aid)";
mysqli_query($conn, $sql);
echo "done";
?>


