<?php
    $servername = "mysql.comp.polyu.edu.hk";
    $username = "16098537d";//need to change to xiajialu's
$password = "iqdobdiy";
$dbname = "16098537d";


   // Create connection
	$link = mysqli_connect($servername, $username, $password, $dbname);
	// Check connection
	if (!$link) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
	mysqli_close($link);
    exit;
}
/*echo "<p>Connected successfully</p>";*/

    mysqli_select_db($link,'17083686d');//Select database
?>