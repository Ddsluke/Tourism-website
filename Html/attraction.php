<!DOCTYPE html>
<html>
<head>
	<title>Attraction | ExploreHK</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link type="text/css" rel="stylesheet" href="css/style.css">
	<link type="text/css" rel="stylesheet" href="css/itemDisplay.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">	
	<style>
		a:hover { color:#BB4348; }
	</style>
</head>

<body>
<div class="wrapper">
	<!-- topbar navigation menu -->
	<?php
	require('topbaratt.php');
	?>
	<!-- end topbar -->
</div>
<div class="wrapper" id="top">
	<!-- main body -->
	<main class="container">
	
	<!-- sidebar navigation menu -->
	<div class="sidebar">
		<h3>Attraction</h3>
		<a href="attraction.php">All</a>
		<a class="dropdown">By Theme<i class="fa fa-caret-down"></i></a>
			<div class="dropdown-container">
							<a href="attraction.php?Type='viewing'">Viewing</a>
							<a href="attraction.php?Type='entertainment'">Entertainment</a>
							<a href="attraction.php?Type='shopping'">Shopping</a>
			 </div>
		<a class="dropdown">By Region<i class="fa fa-caret-down"></i></a>
			<div class="dropdown-container">
							<a href="attraction.php?Area='Hung Hom'">Hung Hom</a>
				<a href="attraction.php?Area='Disneyland'">Disneyland</a>
				<a href="attraction.php?Area='Homantin'">Homantin</a>
								<a href="attraction.php?Area='Mong Kok'">Mong Kok</a>
								<a href="attraction.php?Area='Ocean Park'">Ocean Park</a>
								<a href="attraction.php?Area='Tsim Sha Tsui'">Tsim Sha Tsui</a>
								<a href="attraction.php?Area='Victoria Peak'">Victoria Peak</a>
			</div>
	</div>
	<!-- end sidebar -->
		<div class="content">
	
  <?php
$servername = "mysql.comp.polyu.edu.hk";
$username = "16098537d";//need to change to xiajialu's
$password = "iqdobdiy";
$dbname="16098537d";
 
// CONNECT
$conn = new mysqli($servername, $username, $password,$dbname);
// Check connection
if ($conn->connect_error) {
	die("CAN'T CONNECT : " . $conn->connect_error);
} 
if(isset($_GET['search']))
{
 
	$key=$_GET['search'];
	$attribute=" AND AName LIKE '%$key%'";
}
else
{
	$attribute="";
}
  if(!isset($_GET['Type'])){
	  $type = 'all';
	   
  }
  else
  {
	  $type=$_GET['Type'];
  }
if(!isset($_GET['Area']))
{
	$area='all';
}
	else {$area=$_GET['Area'];}
	
	
  if($type == 'all'&& $area=='all')
		  {$sql = "select AName,Area,AImage from Attraction join Attractions_Type where Attraction.AID=Attractions_Type.AID".$attribute;
	 $title="ALL ATTRACTIONS";
		  } 
		  else if($area=='all' && $type!='all'){
		 $title="search by type";
$sql = "select AName,Area,AImage from Attraction join AttractionsType join Attractions_Type where Type= $type and Attraction.AID=Attractions_Type.AID and Attractions_Type.ATID=AttractionsType.ATID".$attribute;
			 
 }
 else if($area!='all' && $type=='all')
 {$title="search by area";
	 $sql = "select AName,Area,Type,AImage from Attraction join AttractionsType join Attractions_Type where Area=$area and Attraction.AID=Attractions_Type.AID and Attractions_Type.ATID=AttractionsType.ATID".$attribute;
	 
 }
 ?>
  <h1><?php echo $title?></h1><hr>

  <a href="#addToPlan"><div class="button btn btn-small" style="margin-bottom:30px;">Add Attractions To Plan</div></a><br>
  
 <?php
 $result = mysqli_query($conn, $sql);
 if(!$result)
 {
	 echo "No result";
 }
 
   
   elseif ($num=mysqli_num_rows($result) > 0)
  {
	   $name=array($num);
	   $i=0;
	  while($row = mysqli_fetch_assoc($result))
  {
		  ?>
		  <div class="item">
				<img src=<?php echo "img/".$row['AImage']?> alt="#">
				<div class="right-block">
					<h2><?php echo $row['AName'] ?></h2>
						<h3>Region: <?php echo $row['Area'] ?></h3>
					
				</div>
		  </div>
	 <?php
	   $name[$i]=$row['AName'];
	   $i=$i+1;
	   ?>
	 <?php        
	 
	}     
  } else
	  echo "NO RESULT FOUND";
	?>

  <h2 id="addToPlan">Add Attractions to Your Plan</h2>

  <form action="insertatr.php" method="post">
	  Date: <input type="date" name="date" /><br>
	  Time: <select id="type" name="time">
			  <option value="MORN">Morning</option>
			  <option value="EVEN">Afternoon</option>
			</select><br>
	  Attraction Name: <select id="type" name="atrname" onclick="checkType()">
			   <?php 
			   for($i=0;$i<count($name);$i++)
			   {
			   echo"<option value='$name[$i]'>--$name[$i]--</option>";
			   }
			   ?>
			   </select><br>
			   
		<input type="submit" value="Add"/>

  </form>    
			
<?php        
$conn->close();
?>
</div>
</main>
<!-- footer -->
<?php
require('footer.php');
?>
<!-- end footer -->

<script src="js/dropdown.js"></script>

</body>
</html>