<?php
session_start();
if (!isset($_SESSION['login_tourist'])){
	echo "Only login users can schedule travel plan. Please login first!";
	header("Refresh:2; url=Login.php");
} else {
#	require('php/connect.php');
	$id = $_SESSION['login_tourist'];
?>

<!DOCTYPE html>
<html>
<head>
	<title>Add New Plan | ExploreHK</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link type="text/css" rel="stylesheet" href="css/style.css">
	<link type="text/css" rel="stylesheet" href="css/itemDisplay.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">	
</head>

<body>
<div class="wrapper" >
	<?php
	require('topnav.php');
	?>
</div>
<div class="wrapper" id="top">
	<!-- main body -->
	<main class="hoc container clear">
		<div class="sidebar">
			<h3>Plan</h3>
			<a href="addNewPlan.php">Add New Plan</a>
			<a href="plan.php">My Plan</a>
		</div>
		
	    <div class="content">
			<form action="addNewPlan.php" method="post"> 
			  Arrival Date: <input type="date" name="arrivedate" /><br>
			  Departure Date: <input type="date" name="leavedate" /><br>
			  <input type="submit" value="Add"/>
			</form>



<?php
#$id=5;
$arriveday="all";
$leaveday="all";
if(isset($_POST['arrivedate']))
{
    $arriveday=$_POST['arrivedate'];
}

if(isset($_POST['leavedate']))
{
    $leaveday=$_POST['leavedate'];
}
if($arriveday!="all"&&$leaveday!="all")
{
$sql="INSERT INTO Arrange (ArriveDay,LeaveDay,Activate,TouristsID) VALUES ('$arriveday','$leaveday',0,'$id')";
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
$result=mysqli_query($conn, $sql);
$message = "INSERT INTO Message(Message, AdmID,TouristsID) values ('A new plan has been successfully added.', '6','$id')";
mysqli_query($conn,$message);
        echo "Success!";	
#if($result)
#    echo "Success";
$conn->close();
}
}
?>
		</div>
	</main> 
	<!-- end main body -->
</div>

