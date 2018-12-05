<?php
//Register Tourists
	session_start();
	header("Content-Type: text/html; charset=utf8");
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
		$USERID = mysqli_insert_id($link);
        echo "Register successfully<br>";//success
		echo "Your UserId for Login is: " . $USERID;//success
		$_SESSION['login_tourist'] = $USERID;
		$message = "insert into Message(Message,AdmID,TouristsID) values ('You have successfully created an account.', '6',$USERID)";
                mysqli_query($link,$message);
                echo "\nSuccess!";
    }
	$result=mysqli_query($link,"insert into Arrange(ArriveDay,LeaveDay,Activate,TouristsID) values (2018-11-24,2018-12-05,0,$USERID)");
	if (!$result){
		echo 'Failed to insert arrange: ', mysqli_error($link);
		mysqli_close($link);
		exit;
    }
    mysqli_close($link);//close database
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- refresh after 1 second -->
    <meta http-equiv="refresh" content="1;url=../Login.php">
    <title>Logging in...</title>
</head>
