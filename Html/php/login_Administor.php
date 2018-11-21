<?php
//connection

$servername = "mysql.comp.polyu.edu.hk";
$username = "17083686d"; //your student Id
$password = "fdtwjmfn";
// Create connection
$link = mysqli_connect($servername, $username, $password);
// Check connection
if (!$link) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
	mysqli_close($link);
    exit;
}
echo "<p>Connected successfully</p>";

//login Administor
header("Content-Type: text/html; charset=utf8");

//check if we have "submit" action
if(!isset($_POST["submit"])){
	http_response_code(400);
    exit("Bad Request: only support POST Method.");
}

    include('connect.php');//connect to database
    $AdmID=$_POST['AdmID'];//get Administor's ID
    $Passowrd = $_POST['Passowrd'];//get Administor's password

	

	//if missing name or passowrd 
    if (!($AdmID && $Passowrd)){
		?>
				 
				 Missing Admin ID or Password, Please 
				 <a href="login.html">
				 try again.
				 </a>.
				 
				 <?php
	}
	
	if ($stmt = mysqli_prepare($link, "select count(*) as count from Administrator where AdmID = ? and Password = ?;")) {

    /* bind parameters for markers */
    mysqli_stmt_bind_param($stmt, "is", $AdmID, $Passowrd);

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
		header("refresh:0;url=welcome.html");//jump to welcome.html
		die('login success');
	}
	
		?>
				 
				 Administor Id or password is wrong, Please 
				 <a href="login.html">
				 try again.
				 </a>.
				 
				 <?php
	
	}
?>