<!DOCTYPE html>
<!--
Author: Code Apes.
-->
<html>
<head>
 <?php
session_start();
if (isset($_SESSION['login_tourist'])){
	$id = $_SESSION['login_tourist'];
	header("Location:PersonInfo.php");
}
if (isset($_SESSION['login_admin'])){
	$id = $_SESSION['login_admin'];
	header("Location:Admin.php");
}
?>
	<title>Sign In Your Account | ExploreHK</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
	<link type="text/css" rel="stylesheet" href="css/loginPage.css">
	<link type="text/css" rel="stylesheet" href="css/style.css">

<script>
	function change(){// also need to change php
		document.getElementById("loginLabel").innerHTML = "Administrator";
		document.getElementById("button").innerHTML = "For Tourist";
		document.getElementById("button").onclick = revert;
		document.getElementById("reg").innerHTML="";
		document.getElementById("form").action="php/login_Administrator.php";
	}
	function revert(){
		document.getElementById("loginLabel").innerHTML = "Tourist";
		document.getElementById("button").innerHTML = "For Admin";
		document.getElementById("button").onclick = change;
		document.getElementById("reg").innerHTML="<h4>Register Now!</h4>";
		document.getElementById("form").action="php/login_Tourists.php";
	}
</script>
</head>
<body>

<div class="wrapper">
<?php
require('topnav.php');
?>
</div>
<div class="input_container">
  <h1>Login as <label id="loginLabel">Tourist</label></h1>
  <button id="button" onclick='change()'>For Admin</button>
  <h4><a id="reg" href="Registration.php">Register Now!</a></h4>
  <form id="form" action="php/login_Tourists.php" method="post">
	<label for="uid">UserID</label>
	<input type="text" id="userid" name="userid" placeholder="Your username.." 
	maxlength="16" required="required">
	<br>
	<label for="psword">Password</label>
	<input type="password" id="password" name="password" placeholder="Your password.."
	maxlength="16" required="required">
	<br>
    <input type="submit" value="Confirm">
  </form>
</div>

<?php
require('footer.php');
?>

</body>

</html>
