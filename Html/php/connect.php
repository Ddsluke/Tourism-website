<?php
    $servername = "mysql.comp.polyu.edu.hk";
    $username = "16098537d";//need to change to xiajialu's
	$password = "iqdobdiy";


   // Create connection
	$link = mysqli_connect($servername, $username, $password);
	// Check connection
	if (!$link) {
		echo "Error: Unable to connect to MySQL." . PHP_EOL;
		echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
		echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
		exit;
	}
/*echo "<p>Connected successfully</p>";*/

	mysqli_select_db($link,'16098537d');//Select database
?>