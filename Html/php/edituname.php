<?php 
	session_start();
	$ID = $_SESSION['login_tourist'];
	if (isset($_POST['uname'])){
		$uname = $_POST['uname'];
		
		require('connect.php');
		mysqli_query(&link, "UPDATE Tourists SET Username='$uname' where TouristsID='$ID'");
		
		echo "Success!";
		mysqli_commit($con);
		mysqli_close($con);
	}
?>
<script type='text/javascript'>
     self.close();
</script>