<?php
session_start();
if (!(isset($_SESSION['login_tourist']) || isset($_SESSION['login_admin']))){
	header("Location:Login.php");
}
?>

<!DOCTYPE html>
<!--
Author: Code Apes.
-->
<html>
<head>
	<title>Administration</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
	<link type="text/css" rel="stylesheet" href="css/style.css">
	<style>
	h3{font-weight:normal;}
	h2{font-size:130%;}
	</style>
</head>

<body>
<div class="wrapper">
		<nav class="topnav">
			<div id="logo" class="fl_left">
				<a href="index.php"><img src="img/logo.jpg" alt="Homepage"></a>
			</div>
			<div class="topmenu">
				<li><a href="index.php">Home</a></li>
				<a href="attraction.html">Attraction</a></li>
				<li><a href="accommodation.html">Accommodation</a></li>
				<li><a href="food.html">Food</a></li>
				<li><a href="plan.html">Plan</a></li>
				<li><a href="about.html">About</a></li>
				<div id="account" class="fl_right">
					<li><a href="Login.php"><img src="img/account_icon.png" alt="account"></a></li>
				</div>
			</div>
		</nav>
</div>
<div class="wrapper">
  <main class="container">
	  <div class="sidebar">
	    <h3 style="font-weight:bolder;">Administration</h3><!-- To be added later-->
	  </div>
    <div class="content" style="overflow-x:hidden">
			<h1>Admin ID: <?php 
			$ID = $_SESSION['login_admin'];
			echo "$ID"?></h1>
			<a href="php/logout.php"><div class="button btn btn-small">Log out</div></a>
			<h1>User</h1><hr>
			<div class="searchbar">  
				<div class="search-container">
				<form action="/action_page#.php">
					<input type="text" placeholder="Keyword..." name="search">
					<button type="submit">Search</button>
				</form>
				</div>
			</div>
			<table>
			  <tr>
				<td><h2>UserID</h2></td>
				<td><h2>Username</h2></td>
				<td><h2>Email</h2></td>
				<td><h2>Name</h2></td>
				<td><h2>Gender</h2></td>
				<td><h2>Age</h2></td>
				<td></td><td></td>
			  </tr>
			  <tr>
				<td><h3>#UserID</h3></td>
				<td><h3>#Username</h3></td>
				<td><h3>#Email</h3></td>
				<td><h3>#Name</h3></td>
				<td><h3>#Gender</h3></td>
				<td><h3>#Age</h3></td>
				<td id="Edit1"><div class="button btn btn-small">Edit</div></td>
				<td id="Delete1"><div class="button btn btn-small">Delete</div></td>
			  </tr>
			  <tr>
			    <td><h3>#UserID</h3></td>
				<td><h3>#Username</h3></td>
				<td><h3>#Email</h3></td>
				<td><h3>#Name</h3></td>
				<td><h3>#Gender</h3></td>
				<td><h3>#Age</h3></td>
				<td id="Edit1"><div class="button btn btn-small">Edit</div></td>
				<td id="Delete1"><div class="button btn btn-small">Delete</div></td>
			  </tr>
			</table><br>
			<h1>Data</h1><hr>
			<h2>Attraction<a href="attraction.php">(Click here for reference)</a></h2>
			<div class="searchbar">  
				<div class="search-container">
				<form action="/action_page#.php">
					<input type="text" placeholder="Keyword..." name="search">
					<button type="submit">Search</button>
				</form>
				</div>
			</div>
			<table>
			  <tr>
				<td><div class="button"><a href="addattr_form.php" target="_blank" class="btn btn-small">Add</a></div></td><td></td>
				<td><a href="editattr_form.php" target="_blank"><div class="button btn btn-small">Edit</div></a></td>
				<td><a href="deleteattr_form.php" target="_blank"><div class="button btn btn-small">Delete</div></a></td>
			  </tr>
			</table>
			<h2>Restaurant<a href="restaurant.php">(Click here for reference)</a></h2>
			<div class="searchbar">
				<div class="search-container">
				<form action="/action_page#.php">
					<input type="text" placeholder="Keyword..." name="search">
					<button type="submit">Search</button>
				</form>
				</div>
			</div>
			<table>
			  <tr>
				<td><div class="button"><a href="addres_form.php" target="_blank" class="btn btn-small">Add</a></div></td><td></td>
				<td><a href="editres_form.php" target="_blank"><div class="button btn btn-small">Edit</div></a></td>
				<td><a href="deleteres_form.php" target="_blank"><div class="button btn btn-small">Delete</div></a></td>
			  </tr>
			</table>
			<h2>Accommodation<a href="accommodation.php">(Click here for reference)</a></h2>
			<div class="searchbar">  
				<div class="search-container">
				<form action="/action_page#.php">
					<input type="text" placeholder="Keyword..." name="search">
					<button type="submit">Search</button>
				</form>
				</div>
			</div> 
			<table>
			  <tr>
				<td><div class="button"><a href="addhotel_form.php" target="_blank" class="btn btn-small">Add</a></div></td><td></td>
				<td><a href="edithotel_form.php" target="_blank"><div class="button btn btn-small">Edit</div></a></td>
				<td><a href="deletehotel_form.php" target="_blank"><div class="button btn btn-small">Delete</div></a></td>
			  </tr>
			</table>
	</div>
  </main>
</div>
</body>
</html>