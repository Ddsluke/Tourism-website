<?php
session_start();
//connection

    $servername = "mysql.comp.polyu.edu.hk";
    $username = "16098537d";//need to change to xiajialu's
$password = "iqdobdiy";
$dbname="16098537d";

// Create connection
$link = mysqli_connect($servername, $username, $password,$dbname);
// Check connection
if (!$link) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
	mysqli_close($link);
    exit;
}

//login Tourists
header("Content-Type: text/html; charset=utf8");

 #   include('connect.php');//connect to database
   $TouristsID = $_POST['userid'];//get user's ID
    $Password = $_POST['password'];//get user's password
	/*$Username = $_POST['username'];//get user's Username*/


	

	//if missing name or password 
    if (!($TouristsID && $Password)){
		?>
				 
				 Missing Tourists ID or Password or Username, Please 
				 <a href="../login_Tourists.php">try again</a> .
				 
				 <?php
		exit;
	}
	
	if (!($stmt = mysqli_prepare($link, "select count(*) as count from Tourists where TouristsID = ? and Password = ?;"))) {
		echo "Failed to query: ".mysqli_error($link);
		mysqli_close($link);
		exit;
	}

    /* bind parameters for markers */
    mysqli_stmt_bind_param($stmt, "is", $TouristsID, $Password);

    /* execute query */
    mysqli_stmt_execute($stmt);

    /* bind result variables */
    mysqli_stmt_bind_result($stmt, $count);

    /* fetch value */
    mysqli_stmt_fetch($stmt);

    /* close statement */
	mysqli_stmt_close($stmt);
	
	/* close connect */
	mysqli_close($link);
	
	if($count == 1) {
		$_SESSION['login_tourist'] = $TouristsID;
		header("refresh:0;url=../PersonInfo.php");//jump to PersonInfo.php
		die('Jumping..');
	}
	
		?>
				 
				 Tourists ID or password is wrong, Please 
				 <a href="../Login.php">
				 try again.
				 </a>.
				 
				 <?php
	
	
?>