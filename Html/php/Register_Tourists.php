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
    /*if(!isset($_POST["submit"])){
        exit("Error");
    }//check if we have "submit" action*/

    include('connect.php');//connect to database
	$TouriID = $_POST['TouriID'];//get Tourists's Id
	$Username = $_POST['username'];//get Tourists's Username
    $Name = $_POST['fullname'];//get Tourists's name
    $Passowrd = $_POST['password'];//get Tourists's password
	$Email = $_POST['email'];//get Tourists's Email
	$Age=$_POST['age'];//get Tourists's Age
	$Gender=$_POST['gender'];//get Tourists's Age
	
	include('connect.php');//connect with database
    $in="insert into Tourists(TouriID,Email,Passowrd,Gender,Age,Name,Username) values ('$TouristsID','$Email','$password','$Gender','$Age''$Name','$Username')";//insert
    $reslut=mysqli_query($link,$in);//
    
    if (!$reslut){
        echo "Error: " . mysqli_error($link);//error
    }else{
        echo "Register successfully";//success
    }

    

    mysqli_close($link);//close database


?>