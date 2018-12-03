<?php 
	require('connect.php');
	session_start();
	$ID = $_SESSION['login_tourist'];
	if (isset($_POST['uname'])){
		$uname = $_POST['uname'];		
		try{
			mysqli_query(&link, "UPDATE Tourists SET Username='$uname' where TouristsID='$ID'");
			echo "Success!";			
		}
		catch(Exception $e){
			echo "Error!";
		}
		mysqli_commit($con);
		mysqli_close($con);
	}
?>