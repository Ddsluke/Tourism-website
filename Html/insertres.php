<?php
session_start();

if( isset($_SESSION['login_tourist']))
{
 $servername = "mysql.comp.polyu.edu.hk";
$username = "16098537d";//need to change to xiajialu's
$password = "iqdobdiy";
$dbname="16098537d";
 
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
#    echo $day;
}
else {
    
    echo"No date";
}
if(isset($_POST['recname']))
    $name=$_POST['recname'];
else
    echo"no name";
#echo $name;
if(isset($_POST['time']))
    $time=$_POST['time'];
else
    echo"no time";
$USERID=$_SESSION['login_tourist'];
$sql="SELECT ArrangeId FROM Arrange WHERE TouristsID='$USERID' and Activate=0";
 $result = mysqli_query($conn, $sql);
 $row = mysqli_fetch_assoc($result);
 $arrangeid=$row['ArrangeId'];
 $sql="SELECT * FROM Restaurant WHERE RName='$name'";
 $result = mysqli_query($conn, $sql);
 $row = mysqli_fetch_assoc($result);
 $rid=$row['RID'];
# echo $rid;
if ($day == "") {
	echo "You need to select date! Please try again.";
	header("Refresh:1.5; url=restaurant.php#addToPlan");
}
else {
	$sql="INSERT INTO RecommandRes (RDate,RTime,ArrangeId,RID)VALUES('$day','$time',$arrangeid,$rid)";
	mysqli_query($conn, $sql);
	echo "Success!";
	header("Refresh:0.5; url=restaurant.php#addToPlan");
}
$conn->close();
}
else
    {
?>

<a href="Login.php">Please Login first</a>
<?php
	header("Refresh:1.5; url=Login.php");
}
?>