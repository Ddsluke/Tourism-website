<?php
    $servername = "mysql.comp.polyu.edu.hk";
	$username = "17083686d"; //your student Id
	$password = "fdtwjmfn";

   // Create connection
	$conn = mysql_connect($servername, $username, $password);
	// Check connection
	if (!$conn) {
	die("Connection failed: " . mysql_error());
	}
	echo "Connected successfully";

    mysql_select_db('17083686d',$con);//Select database
?>