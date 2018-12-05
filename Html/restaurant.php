<!DOCTYPE html>
<html>
<head>
	<title>Restaurant | ExploreHK</title>
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
	require('topbarres.php');
	?>
	<!-- end topbar -->
</div>
<div class="wrapper" id="top">
	<!-- main body -->
	<main class="container">
	
	<!-- sidebar navigation menu -->
	<div class="sidebar">
		<h3>Restaurant</h3>
                <a href="restaurant.php">All</a>
		<a class="dropdown">By Type<i class="fa fa-caret-down"></i></a>
			<div class="dropdown-container">
				<a href="restaurant.php?Type= 'Western-style '"> Western-style</a>
				<a href="restaurant.php?Type='Cantonese style'">Cantonese style</a>
				<a href="restaurant.php?Type='Korean style'">Korean style</a>
				<a href="restaurant.php?Type= 'Hong Kong style'">Hong Kong style</a>
                                <a href="restaurant.php?Type= 'Japanese style'">Japanese style</a>
                                <a href="restaurant.php?Type= 'German style'">German style</a>
                                <a href="restaurant.php?Type= 'Italian style'">Italian style</a>
                                <a href="restaurant.php?Type= 'Sichuan style'">Sichuan style</a>
                                <a href="restaurant.php?Type= 'American style'">American style</a>
                                <a href="restaurant.php?Type= 'Shanghai style'">Shanghai style</a>
			 </div>
		<a class="dropdown">By Region<i class="fa fa-caret-down"></i></a>
			<div class="dropdown-container">
				<a href="restaurant.php?Area='Hung Hom'">Hung Hom</a>
				<a href="restaurant.php?Area='Disneyland'">Disneyland</a>
				<a href="restaurant.php?Area='Homantin'">Homantin</a>
                                <a href="restaurant.php?Area='Mong Kok'">Mong Kok</a>
                                <a href="restaurant.php?Area='Ocean park'">Ocean Park</a>
                                <a href="restaurant.php?Area='Tsim Sha Tsui'">Tsim Sha Tsui</a>
                                <a href="restaurant.php?Area='Victoria Peak'">Victoria Peak</a>
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
    $attribute=" AND RName LIKE '%$key%'";
}
else
{
    $attribute="";
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
          {$sql = "select * from Restaurant join Restaurant_Foodtype join FoodType where Restaurant.RID=Restaurant_Foodtype.RID AND Restaurant_Foodtype.FID=FoodType.FID".$attribute;
     $title="ALL RESTAURANTS";
          } 
          else if($area=='all' && $Type!='all'){
              $title="SEARCH BY Type";
         
$sql = "select * from Restaurant join Restaurant_Foodtype join FoodType where Restaurant.RID=Restaurant_Foodtype.RID AND Restaurant_Foodtype.FID=FoodType.FID AND FoodType=$Type".$attribute;
             
 }
 else if($area!='all' && $Type=='all')
 {
     $title="SEARCH BY AREA";
    $sql = "select * from Restaurant join Restaurant_Foodtype join FoodType where Restaurant.RID=Restaurant_Foodtype.RID AND Restaurant_Foodtype.FID=FoodType.FID AND  Area=$area".$attribute;
     
 }
  ?>
  <h1><?php echo $title?></h1><hr>
  
  <a href="#addToPlan"><div class="button btn btn-small" style="margin-bottom:30px;">Add Restaurants To Plan</div></a><br>

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
					<img src=<?php echo "img/".$row['RImage']?> alt="#">
					<div class="right-block">
						<h2><?php echo $row['RName'] ?></h2>
                        <h3>Region: <?php echo $row['Area'] ?></h3>
                        <h3>Food Type: <?php echo $row['FoodType'] ?></h3>
					</div>
				</div>
     <?php
       $name[$i]=$row['RName'];
       $i=$i+1;
       ?>
	   
     <?php          
    }     
  } else
      echo "NO RESULT FOUND";
  ?>
  <h2 id="addToPlan">Add Restaurants to Your Plan</h2>

  <form action="insertres.php" method="post">
      Date: <input type="date" name="date" /><br>
      Time: <select id="type" name="time">
				<option value="MORN">Lunch</option>
				<option value="EVEN">Dinner</option>
			</select><br>
		   
	  Restaurant Name: <select id="type" name="recname" onclick="checkType()">
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

