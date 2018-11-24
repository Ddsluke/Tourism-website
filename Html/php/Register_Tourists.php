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

//Registr Tourists
header("Content-Type: text/html; charset=utf8");
    include('connect.php');//connect to database
	//get Tourists's Id
	$Username = $_POST['username'];//get Tourists's Username
    $Name =$_POST['fullname'];//get Tourists's name
    $Password = $_POST['password'];//get Tourists's password
	$Email =$_POST['email'];//get Tourists's Email
	$Age=$_POST['age'];//get Tourists's Age
	$Gender=$_POST['gender'];//get Tourists's Gender
	

	include_once('connect.php');//connect with database
    $in="insert into Tourists(Email,Password,Gender,Age,Name,Username) values ('$Email','$Password','$Gender',$Age,'$Name','$Username')";//insert
    $reslut=mysqli_query($link,$in);//
	if (!$reslut){
		echo 'Failed to insert tourist: ', mysqli_error($link);
		mysqli_close($link);
		exit;
    }else{
        echo "Register successfully";//success
    }
    mysqli_close($link);//close database
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- refresh after 2 second -->
    <meta http-equiv="refresh" content="2;url=../Login.php">
    <title>Jumping...</title>
</head>