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
	<title>Administration | ExploreHK</title>
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
<?php
require('topnav.php');
?>
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
			<table>
			  <tr>
				<td><a href="deleteuser_form.php"><div class="button btn btn-small">Delete</div></a></td>
				<td><a href="edituser_form.php"><div class="button btn btn-small">Edit</div></a></td>
				<td><a href="Nonactivate.php"><div class="button btn btn-small">Deactivate</div></a></td>
			  </tr>
			<table>
			  <tr>
				<td><h2>UserID</h2></td>
				<td><h2>Username</h2></td>
				<td><h2>Email</h2></td>
				<td><h2>Name</h2></td>
				<td><h2>Gender</h2></td>
				<td><h2>Age</h2></td>
			  </tr>
			  <?php 
			  require('php/connect.php');
			  $sql="select * from Tourists";
			  $result = mysqli_query($link, $sql);
			  while($row = mysqli_fetch_assoc($result)){
				  
				  $UserID = $row['TouristsID'];
				  $Username = $row['Username'];
				  $Email = $row['Email'];
				  $Name = $row['Name'];
				  $Gender = $row['Gender'];
				  $Age = $row['Age'];
			  echo "
			  <tr>
				<td><h3>$UserID</h3></td>
				<td><h3>$Username</h3></td>
				<td><h3>$Email</h3></td>
				<td><h3>$Name</h3></td>
				<td><h3>$Gender</h3></td>
				<td><h3>$Age</h3></td>
			  </tr>";
			  }
			  ?>
			</table><br>
                        <h1>Summary</h1>
                        <h1>Total No of Users:</h1><?php 
                         $sql="SELECT count(DISTINCT TouristsID)as User FROM Tourists";
                          $result = mysqli_query($link, $sql);
                        $row = mysqli_fetch_assoc($result);
                        echo $row['User'];    
                        ?>
                        <br>
                        <h1>No of Users Currently in HK:</h1><?php 
                        $sql="SELECT count(DISTINCT TouristsID)as AUser FROM Arrange where Activate=0";
                        $result = mysqli_query($link, $sql);
                        $row = mysqli_fetch_assoc($result);
                        echo $row['AUser'];     
                        ?>
                        <br>
                         <h1>No of Users with Plans:</h1><?php 
                        $sql="SELECT Arrange.TouristsID as I,Username,count(ArrangeID) as c FROM Arrange join Tourists WHERE Arrange.TouristsID=Tourists.TouristsID GROUP BY Arrange.TouristsID order by c limit 3";
                        $result = mysqli_query($link, $sql);
												echo "<table>";
                        while($row = mysqli_fetch_assoc($result)){
														$uid=$row['I'];
                            $uname=$row['Username'];
														$times=$row['c'];
														
                         echo "
			  <tr>
				<td><h3>$uid</h3></td>
				<td><h3>$uname</h3></td>
        <td><h3>Times: $times</h3></td>
			  </tr>";
				}
				echo "</table>";
                        ?>
                        <br>
                        <h1>Hot choices:</h1><?php 
                         $sql="SELECT AName,count(RecommandAttraction.AID) AS A FROM RecommandAttraction JOIN Attraction where RecommandAttraction.AID=Attraction.AID order by A limit 1";
                          $result = mysqli_query($link, $sql);
                        $row = mysqli_fetch_assoc($result);
                        echo "Attraction: ".$row['AName'];    
                        ?>
                        <br>
                        <?php 
                         $sql="SELECT HName,count(RecommandHotel.HID) AS A FROM RecommandHotel JOIN Hotel where RecommandHotel.HID=Hotel.HID order by A limit 1";
                          $result = mysqli_query($link, $sql);
                        $row = mysqli_fetch_assoc($result);
                        echo "Hotel: ".$row['HName'];
                        ?>
                        <br>
                        <?php 
                         $sql="SELECT RName,count(RecommandRes.RID) AS A FROM RecommandRes JOIN Restaurant where RecommandRes.RID=Restaurant.RID order by A limit 1";
                          $result = mysqli_query($link, $sql);
                        $row = mysqli_fetch_assoc($result);
                        echo "Restaurant: ".$row['RName'];   
						
						mysqli_close($link);					
                        ?>
                        <br>
                        <h1>Data <a href="SearchID_form.php">(Search for data)</a></h1><hr>
			<h2>Attraction<a href="attraction.php">(Click here for reference)</a></h2>
			<table>
			  <tr>
				<td><div class="button"><a href="addattr_form.php" target="_blank" class="btn btn-small">Add</a></div></td><td></td>
				<td><a href="editattr_form.php" target="_blank"><div class="button btn btn-small">Edit</div></a></td>
				<td><a href="deleteattr_form.php" target="_blank"><div class="button btn btn-small">Delete</div></a></td>
			  </tr>
			</table>
			<h2>Restaurant<a href="restaurant.php">(Click here for reference)</a></h2>
			<table>
			  <tr>
				<td><div class="button"><a href="addres_form.php" target="_blank" class="btn btn-small">Add</a></div></td><td></td>
				<td><a href="editres_form.php" target="_blank"><div class="button btn btn-small">Edit</div></a></td>
				<td><a href="deleteres_form.php" target="_blank"><div class="button btn btn-small">Delete</div></a></td>
			  </tr>
			</table>
			<h2>Accommodation<a href="accommodation.php">(Click here for reference)</a></h2>
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