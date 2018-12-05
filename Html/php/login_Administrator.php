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
    exit;
}

//login Administor
header("Content-Type: text/html; charset=utf8");

    include('connect.php');//connect to database
    $AdmID=$_POST['userid'];//get Administrator's ID
    $Password = $_POST['password'];//get Administrator's password

	

	//if missing name or passowrd 
    if (!($AdmID && $Password)){
		?>
				 
				 Missing Admin ID or Password, Please 
				 <a href="login.php">
				 try again.
				 </a>.
				 
				 <?php
	}
	
	if ($stmt = mysqli_prepare($link, "select count(*) as count from Administrator where AdmID = ? and Password = ?;")) {

    /* bind parameters for markers */
    mysqli_stmt_bind_param($stmt, "is", $AdmID, $Password);

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
		$_SESSION['login_admin'] = $AdmID;
		header("refresh:0;url=../Admin.php");//jump to Admin.php
		die('Jumping..');
	}
	
		?>
				 
				 Administor Id or password is wrong, Please 
				 <a href="../Login.php">
				 try again.
				 </a>.
				 
				 <?php
	
	}
?>