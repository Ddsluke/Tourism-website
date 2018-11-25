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
		<h3>Restaurant</h3>
                <a href="food.php">All</a>
		<a class="dropdown">By Type<i class="fa fa-caret-down"></i></a>
			<div class="dropdown-container">
				<a href="food.php?Type= 'Western-style '"> Western-style</a>
				<a href="food.php?Type='Cantonese style'">Cantonese style</a>
				<a href="food.php?Type='Korean style'">Korean style</a>
				<a href="food.php?Type= 'Hong Kong style'">Hong Kong style</a>
                                <a href="food.php?Type= 'Japanese style'">Japanese style</a>
                                <a href="food.php?Type= 'German style'">German style</a>
                                <a href="food.php?Type= 'Italian style'">Italian style</a>
                                <a href="food.php?Type= 'Sichuan style'">Sichuan style</a>
                                <a href="food.php?Type= 'American style'">American style</a>
                                <a href="food.php?Type= 'Shanghai style'">Shanghai style</a>
			 </div>
		<a class="dropdown">By Region<i class="fa fa-caret-down"></i></a>
			<div class="dropdown-container">
				<a href="food.php?Area='Hung Hom'">Hung Hom</a>
				<a href="food.php?Area='Disneyland'">Disnyland</a>
				<a href="food.php?Area='Homantin'">Homantin</a>
                                <a href="food.php?Area='Mong Kok'">Mong Kok</a>
                                <a href="food.php?Area='Ocean park'">Ocean Park</a>
                                <a href="food.php?Area='Tsim Sha Tsui'">Tsim Sha Tsui</a>
                                <a href="food.php?Area='Victoria Peak'">Victoria Peak</a>
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
  if(!isset($_GET['Type'])){
	  $Type = 'all';
       
  }
  else
  {
      $Type=$_GET['Type'];
  }
if(!isset($_GET['Area']))
{
    $area='all';
}
    else {$area=$_GET['Area'];}
    
    
  if($Type == 'all'&& $area=='all')
          {$sql = "select * from Restaurant join Restaurant_Foodtype join FoodType where Restaurant.RID=Restaurant_Foodtype.RID AND Restaurant_Foodtype.FID=FoodType.FID;";
     $title="ALL RESTAURANT";
          } 
          else if($area=='all' && $Type!='all'){
              $title="SEARCH BY Type";
         
$sql = "select * from Restaurant join Restaurant_Foodtype join FoodType where Restaurant.RID=Restaurant_Foodtype.RID AND Restaurant_Foodtype.FID=FoodType.FID AND FoodType=$Type;";
             
 }
 else if($area!='all' && $Type=='all')
 {
     $title="SEARCH BY AREA";
    $sql = "select * from Restaurant join Restaurant_Foodtype join FoodType where Restaurant.RID=Restaurant_Foodtype.RID AND Restaurant_Foodtype.FID=FoodType.FID AND  Area=$area;";
     
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
					<img src=<?php "img/".$row['RImage']?> alt="#">
					<div class="right-block">
						<h2><?php echo $row['RName'] ?></h2>
                                                <h3>Region: <?php echo $row['Area'] ?></h3>
                                                <h3>FOODTYPE: <?php echo $row['FoodType'] ?></h3>
						<div class="button"><a href="selectDate.html" class="btn btn-small">+ Add to Plan</a></div> 
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
require('footer.php');
?>
<!-- end footer -->

<script src="js/dropdown.js"></script>

</body>
</html>

