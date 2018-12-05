<!DOCTYPE html>
<html>
<head>
	<title>Result | ExploreHK</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link type="text/css" rel="stylesheet" href="css/style.css">
	<link type="text/css" rel="stylesheet" href="css/itemDisplay.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">	
</head>

<body>
<div class="wrapper">
	<?php
	require('topnav.php');
	?>
</div>
<div class="container">
    <?PHP
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
if(isset($_POST["type"]))
{
    $stype=$_POST["type"];
   
}
if(isset($_POST["name"]))
{
    $sname=$_POST["name"];
    
}


if(isset($_POST['price']))
{
    $pricerange=$_POST['price'];
    $sprice=$pricerange[0];
    $upper=$sprice+300;
    $sprice2=$pricerange[count($pricerange)-1];
    $upper2=$sprice2+300;
    
}
$sql=array(";",";",";",";",";",";",";",";",";");
$flag=0;
if($stype=="male")
{
    
    if($sprice2!="901"){
       if(isset($_POST['area']))
{
    
    $area=$_POST['area'];
    $sarea="";
    for($i=0;$i<count($area);$i++)
    {
        $sarea=$area[$i];
    $sql[$i]="SELECT * FROM Attraction JOIN Attractions_Type WHERE Attraction.AID=Attractions_Type.AID AND AName LIKE '%$sname%' AND ((Price>=$sprice AND Price<$upper) or( Price >=$sprice2 AND Price <$upper2)) AND Area LIKE '%$sarea%'";
    }
}
   
        }
        else
        {
        
              if(isset($_POST['area']))
{
    
    $area=$_POST['area'];
    $sarea="";
    for($i=0;$i<count($area);$i++)
    {
        $sarea=$area[$i];
    $sql[$i]="SELECT * FROM Attraction WHERE AName LIKE '%$sname%' AND ((Price>=$sprice AND Price<=$upper) or Price>=$sprice2)  AND Area LIKE '%$sarea%'";
    }
}
        }
        for($i=0;$i<count($area);$i++)
        {
               $result = mysqli_query($conn, $sql[$i]);
 if(!$result)
 {
     echo "no result found ";
 }
 
   
  elseif (mysqli_num_rows($result) > 0)
  {
      $flag=1;
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
    }     
  } 
        }
}
elseif ($stype=="female") {
     if($sprice2!="901"){
       if(isset($_POST['area']))
{
    
    $area=$_POST['area'];
    $sarea="";
    for($i=0;$i<count($area);$i++)
    {
        $sarea=$area[$i];
    $sql[$i]="SELECT * FROM Hotel join RoomInfor WHERE Hotel.HID=RoomInfor.Hotel_HID AND HName LIKE '%$sname%' AND ((Price>=$sprice AND Price<$upper) or (Price>=$sprice2 AND Price<$upper2)) AND Area LIKE '%$sarea%'";
    
    }
}
   
        }
        else
        {
        
              if(isset($_POST['area']))
{
    
    $area=$_POST['area'];
    $sarea="";
    for($i=0;$i<count($area);$i++)
    {
        $sarea=$area[$i];
    $sql[$i]="SELECT * FROM Hotel join RoomInfor WHERE Hotel.HID=RoomInfor.Hotel_HID AND HName LIKE '%$sname%'AND ((Price>=$sprice AND Price<=$upper) or Price>=$sprice2)  AND Area LIKE '%$sarea%'";
    }
}
        }
        for($i=0;$i<count($area);$i++)
        {
               $result = mysqli_query($conn, $sql[$i]);
 if(!$result)
 {
     echo "no result found";
 }
 
   
  elseif (mysqli_num_rows($result) > 0)
  {$flag=1;
      while($row = mysqli_fetch_assoc($result))
  {
          ?>
   <div class="item">
					<img src=<?php "img/".$row['HImage']?> alt="#">
					<div class="right-block">
						<h2><?php echo $row['HName'] ?></h2>
                                                <h3>Region: <?php echo $row['Area'] ?></h3>
                                                <h3>RoomType: <?php echo $row['RoomType'] ?></h3>
					</div>
				</div>
         <?php         
    }     
  } 
        }

}
elseif($stype=="other")
{
      if($sprice2!="901"){
       if(isset($_POST['area']))
{
    
    $area=$_POST['area'];
    $sarea="";
    for($i=0;$i<count($area);$i++)
    {
        $sarea=$area[$i];
    $sql[$i]="SELECT * FROM Restaurant WHERE RName LIKE '%$sname%' AND ((AveragePrice>=$sprice AND AveragePrice<$upper) or (AveragePrice>=$sprice2 AND AveragePrice<$upper2)) AND Area LIKE '%$sarea%'";
    }
    
}
   
        }
        else
        {
        
              if(isset($_POST['area']))
{
    
    $area=$_POST['area'];
    $sarea="";
    for($i=0;$i<count($area);$i++)
    {
        $sarea=$area[$i];
    $sql[$i]="SELECT * FROM Restaurant WHERE RName LIKE '%$sname%' AND ((AveragePrice>=$sprice AND AveragePrice<=$upper) or AveragePrice>=$sprice2)  AND Area LIKE '%$sarea%'";
    }
}
        }
        for($i=0;$i<count($area);$i++)
        {
               $result = mysqli_query($conn, $sql[$i]);
 if(!$result)
 {
     echo" no result found";
 }
 
   
  elseif (mysqli_num_rows($result) > 0)
  {
      $flag=1;
      while($row = mysqli_fetch_assoc($result))
  {
          ?>
   <div class="item">
					<img src=<?php "img/".$row['RImage']?> alt="#">
					<div class="right-block">
						<h2><?php echo $row['RName'] ?></h2>
                                                <h3>Region: <?php echo $row['Area'] ?></h3>
					
					</div>
				</div>
      <?php              
    }     
  } 
        }
}
if($flag==0)
    echo"no result found";
      
$conn->close();
?>
</div>
</body>
</html>