<!DOCTYPE html>
<html>
<head>
	<title>Attractions#</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link type="text/css" rel="stylesheet" href="css/style.css">
	<link type="text/css" rel="stylesheet" href="css/itemDisplay.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
<div class="wrapper">
	<!-- topbar navigation menu -->
	<?php
	require('topbar.php');
	?>
	<!-- end topbar -->
</div>
<div class="wrapper" id="top">
	<!-- main body -->
	<main class="container">
	
	<!-- sidebar navigation menu -->
	<div class="sidebar">
		<h3>Accommodation</h3>
                <a href="accommodation.php">All</a>
		<a class="dropdown">By Level<i class="fa fa-caret-down"></i></a>
			<div class="dropdown-container">
				<a href="accommodation.php?Level=2">Level 2</a>
				<a href="accommodation.php?Level=3">Level 3</a>
				<a href="accommodation.php?Level=4">Level 4</a>
				<a href="accommodation.php?Level=5">Level 5</a>
			 </div>
		<a class="dropdown">By Region<i class="fa fa-caret-down"></i></a>
			<div class="dropdown-container">
				<a href="accommodation.php?Area='Hung Hom'">Hung Hom</a>
				<a href="accommodation.php?Area='Disneyland'">Disnyland</a>
				<a href="accommodation.php?Area='Homantin'">Homantin</a>
                                <a href="accommodation.php?Area='Mong Kok'">Mong Kok</a>
                                <a href="accommodation.php?Area='Ocean park'">Ocean Park</a>
                                <a href="accommodation.php?Area='Tsim Sha Tsui'">Tsim Sha Tsui</a>
                                <a href="accommodation.php?Area='Victoria Peak'">Victoria Peak</a>
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
  if(!isset($_GET['Level'])){
	  $Level = 'all';
       
  }
  else
  {
      $Level=$_GET['Level'];
  }
if(!isset($_GET['Area']))
{
    $area='all';
}
    else {$area=$_GET['Area'];}
    
    
  if($Level == 'all'&& $area=='all')
          {$sql = "select HName,Area,Level,HImage from Hotel;";
     $title="ALL HOTEL";
          } 
          else if($area=='all' && $Level!='all'){
              $title="SEARCH BY LEVEL";
         
$sql = "select HName,Area,HImage,Level from Hotel WHERE Level=$Level;";
             
 }
 else if($area!='all' && $Level=='all')
 {
     $title="SEARCH BY AREA";
     $sql = "select HName,Area,HImage,Level from  Hotel where Area=$area;";
     
 }
  ?>
  <h1><?php echo $title?></h1><hr><br>
 <?php
 $result = mysqli_query($conn, $sql);
 if(!$result)
 {
     echo "No result";
 }
 
   
   elseif (mysqli_num_rows($result) > 0)
  {
      while($row = mysqli_fetch_assoc($result))
  {
   ?>
          <div class="item">
					<img src=<?php echo "img/".$row['HImage']?> alt="#">
					<div class="right-block">
						<h2><?php echo $row['HName'] ?></h2>
                                                <h3>Region: <?php echo $row['Area'] ?></h3>
						<div class="button"><a href="#" class="btn btn-small">+ Add to Plan</a></div> 
					</div>
				</div>
     <?php               
                    
    }     
  } else
      echo "NO RESULT FOUND";
      
$conn->close();
  ?>
  
<!-- footer -->
<?php
#require('footer.php');
?>
<!-- end footer -->

<script src="js/dropdown.js"></script>

</body>
</html>