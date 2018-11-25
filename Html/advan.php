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
	//require('topbar.php');
	?>
	<!-- end topbar -->
</div>
    <?PHP
    $servername = "mysql.comp.polyu.edu.hk";
    $username = "17083686d";//need to change to xiajialu's
$password = "fdtwjmfn";
$dbname="17083686d";
 
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
    $sprice=$_POST['price'];
    $sprice2=$sprice-300;
}
$sql=array(";",";",";",";",";",";",";",";",";");
if($stype=="male")
{
    
    if($sprice!="901"){
       if(isset($_POST['area']))
{
    
    $area=$_POST['area'];
    $sarea="";
    for($i=0;$i<count($area);$i++)
    {
        $sarea=$area[$i];
    $sql[$i]="SELECT * FROM Attraction WHERE AName LIKE '%$sname%' AND Price<$sprice AND Price>='$sprice2' AND Area LIKE '%$sarea%'";
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
    $sql[$i]="SELECT * FROM Attraction WHERE AName LIKE '%$sname%' AND Price>=$sprice  AND Area LIKE '%$sarea%'";
    }
}
        }
        for($i=0;$i<count($area);$i++)
        {
               $result = mysqli_query($conn, $sql[$i]);
 if(!$result)
 {
     
 }
 
   
  elseif (mysqli_num_rows($result) > 0)
  {
      while($row = mysqli_fetch_assoc($result))
  {
   echo"
       <table align='center'>
       <tr>
       <td>
           <h2 align='center'>{$row['AName']}</h2>
               Area:<p align='center'>{$row['Area']}</p>
             <p align='center'>{$row['Price']}</p>
        </td>
      </tr>
            </table>
            <a  href='insert.php'><button align='center'> 
        Add to plan
        </button></a>";
            
 
   $src=$row['AImage'];
           echo '<img src=$src,alt="#">'; 
                    
    }     
  } 
        }
}
elseif ($stype="female") {
     if($sprice!="901"){
       if(isset($_POST['area']))
{
    
    $area=$_POST['area'];
    $sarea="";
    for($i=0;$i<count($area);$i++)
    {
        $sarea=$area[$i];
    $sql[$i]="SELECT * FROM Hotel WHERE HName LIKE '%$sname%' AND Price<$sprice AND Price>='$sprice2' AND Area LIKE '%$sarea%'";
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
    $sql[$i]="SELECT * FROM Hotel WHERE HName LIKE '%$sname%' AND Price>=$sprice  AND Area LIKE '%$sarea%'";
    }
}
        }
        for($i=0;$i<count($area);$i++)
        {
               $result = mysqli_query($conn, $sql[$i]);
 if(!$result)
 {
     
 }
 
   
  elseif (mysqli_num_rows($result) > 0)
  {
      while($row = mysqli_fetch_assoc($result))
  {
   echo"
       <table align='center'>
       <tr>
       <td>
           <h2 align='center'>{$row['HName']}</h2>
               <p align='center'>{$row['Area']}</p>
             <p align='center'>{$row['Price']}</p>
        </td>
      </tr>
            </table>
            <a  href='insert.php'><button align='center'> 
        Add to plan
        </button></a>";
            
 
   $src=$row['HImage'];
           echo '<img src=$src,alt="#">'; 
                    
    }     
  } 
        }

}
elseif($stype="other")
{
      if($sprice!="901"){
       if(isset($_POST['area']))
{
    
    $area=$_POST['area'];
    $sarea="";
    for($i=0;$i<count($area);$i++)
    {
        $sarea=$area[$i];
    $sql[$i]="SELECT * FROM Restuarant WHERE RName LIKE '%$sname%' AND AveragePrice<$sprice AND AveragePrice>='$sprice2' AND Area LIKE '%$sarea%'";
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
    $sql[$i]="SELECT * FROM Restaurant WHERE RName LIKE '%$sname%' AND AveragePrice>=$sprice  AND Area LIKE '%$sarea%'";
    }
}
        }
        for($i=0;$i<count($area);$i++)
        {
               $result = mysqli_query($conn, $sql[$i]);
 if(!$result)
 {
     
 }
 
   
  elseif (mysqli_num_rows($result) > 0)
  {
      while($row = mysqli_fetch_assoc($result))
  {
   echo"
       <table align='center'>
       <tr>
       <td>
           <h2 align='center'>{$row['RName']}</h2>
               <p align='center'>{$row['Area']}</p>
             <p align='center'>{$row['Price']}</p>
        </td>
      </tr>
            </table>
            <a  href='insert.php'><button align='center'> 
        Add to plan
        </button></a>";
            
 
   $src=$row['RImage'];
           echo '<img src=$src,alt="#">'; 
                    
    }     
  } 
        }
}

      
$conn->close();
?>
