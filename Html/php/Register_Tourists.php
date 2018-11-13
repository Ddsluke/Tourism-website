<?php
//connection

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

//Registr Tourists
header("Content-Type: text/html; charset=utf8");
    if(!isset($_POST["submit"])){
        exit("error ");
    }//check if we have "submit" action

    include('connect.php');//connect to database
	$Id = $_POST['Id'];//get Tourists's Id
	$Departure = $_POST['Departure'];//get Tourists's departure
    $Name = $_POST['Name'];//get Tourists's name
    $Passowrd = $_POST['Password'];//get Tourists's password
	
	include('connect.php');//connect with database
    $in="insert into Tourists(id,Name,Password,Departure) values (‘$Id','$password','$Name','$Departure')";//insert
    $reslut=mysql_query($in,$con);//
    
    if (!$reslut){
        die('Error: ' );//error
    }else{
        echo "Registr successfully";//success
    }

    

    mysql_close($con);//close database


?>