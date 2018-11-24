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

//Registr Administor
header("Content-Type: text/html; charset=utf8");
    if(!isset($_POST["submit"])){
        exit("error ");
    }//check if we have "submit" action

    include('connect.php');//connect to database
	$AdmID = $_POST['AdmID'];//get Administor's ID
	
    $Name = $_POST['Name'];//get Administor's name
    $Password = $_POST['Password'];//get Administor's password
	
	include('connect.php');//connect with database
    $in="insert into Administrator(AdmID,Name,Password) values ($AdmID,'$password','$Name')";//insert
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