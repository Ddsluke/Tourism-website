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
if(isset($_POST['accname']))
    $name=$_POST['accname'];
else
    echo"no name";
#echo $name;
#$id=2;
#$USERID=$id;
$USERID=$_SESSION['login_tourist'];
$sql="SELECT ArrangeId FROM Arrange WHERE TouristsID='$USERID' and Activate=0";
 $result = mysqli_query($conn, $sql);
 $row = mysqli_fetch_assoc($result);
 $arrangeid=$row['ArrangeId'];
 $sql="SELECT * FROM Hotel WHERE HName='$name'";
 $result = mysqli_query($conn, $sql);
 $row = mysqli_fetch_assoc($result);
 $rid=$row['HID'];
# echo $rid;

if ($day == "") {
	echo "You need to select date! Please try again.";
	header("Refresh:1.5; url=accommodation.php#addToPlan");
}
else {
	$sql="INSERT INTO RecommandHotel (HDate,ArrangeId,HID)VALUES('$day',$arrangeid,$rid)";
	mysqli_query($conn, $sql);
	echo "Success!";
	header("Refresh:0.5; url=accommodation.php#addToPlan");
}

mysqli_close($conn);
}
else
    {
?>

<a href="Login.php">Please Login first</a>
<?php
	header("Refresh:1.5; url=Login.php");
}
?>