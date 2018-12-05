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
<div class="container" >
<table>
<?php
    $servername = "mysql.comp.polyu.edu.hk";
    $username = "16098537d";//need to change to xiajialu's
    $password = "iqdobdiy";
    $dbname="16098537d";
    // CONNECT
    $conn =mysql_connect($servername, $username, $password);
    // Check connection
    if (!$conn) {
        die("CAN'T CONNECT : " . mysql_error());
    }
    mysql_select_db($dbname,$conn);
    $type="1";
    $name="1";
    if(isset($_POST['types']))
    {
        $type=$_POST['types'];
    }
    if(isset($_POST['name']))
    $name=$_POST['name'];
    if($type!="1"&&$name!="1")
    {
        if($type=="Attraction"){
            $sql1="SELECT * FROM Attraction WHERE AName LIKE '%$name%'";
            $result1 = mysql_query($sql1,$conn);
            if(!$result1)
            {
                $type="1";
                $name="1";
                echo "No result";
                mysql_close($conn);
            }
            if(mysql_affected_rows($conn)==0){
                $type="1";
                $name="1";
                echo "No record";
                mysql_close($conn);
                exit;}
			?>
        <tr>
        <th>ID</th>
        <th>name</th>
        <th>price</th>
        <th>area</th>
        <th>typeid</th>
        <th>type</th>
        </tr>
			<?php
            while($row = mysql_fetch_array($result1)){
                ?>
        <tr>
        <td><?php echo $row[0]?></td>
        <td><?php echo $row[1]?></td>
        <td><?php echo $row[2]?></td>
        <td><?php echo $row[4]?></td>
             <?php
                $AID=$row[0];
                $sql2="SELECT ATID from Attractions_Type where AID='$AID'";
                $result2 =mysql_query($sql2,$conn);
                $row = mysql_fetch_array($result2);
                $ATID=$row[0];
                $sql3="SELECT * from AttractionsType where ATID='$ATID'";
                $result3 =mysql_query($sql3,$conn);
                while($row = mysql_fetch_array($result3)){
                    ?>
            <td><?php echo $row[0]?></td>
            <td><?php echo $row[1]?></td>
        </tr>
<?php
            }
        }
    }
        else if($type=="Hotel"){
            $sql1="SELECT * FROM Hotel WHERE HName LIKE '%$name%'";
            $result1 = mysql_query($sql1,$conn);
            if(!$result1)
            {
                $type="1";
                $name="1";
                echo "No result";
                mysql_close($conn);
            }
            if(mysql_affected_rows($conn)==0){
                $type="1";
                $name="1";
                echo "No record";
                mysql_close($conn);
                exit;
            }
            ?>
<tr>
<th>ID</th>
<th>name</th>
<th>area</th>
<th>level</th>
<th>roomtypeID</th>
<th>roomType</th>
<th>price</th>
</tr>
         <?php
            while($row = mysql_fetch_array($result1)){ ?>
            <tr>
                <td><?php echo $row[0]?> </td>
                <td><?php echo $row[1]?> </td>
                <td><?php echo $row[2]?> </td>
                <td><?php echo $row[3]?> </td>
<?php
                $HID=$row[0];
                $sql2="SELECT * from RoomInfor where Hotel_HID='$HID'";
                $result2 =mysql_query($sql2,$conn);
                $count=0;
                while($row = mysql_fetch_array($result2)){
                    $count++;
                    if($count>0){   ?>
                    <tr>
                    <td><?php echo " " ?> </td>
                    <td><?php echo " " ?> </td>
                    <td><?php echo " " ?> </td>
                    <td><?php echo " " ?> </td>
                    <?php }
                        ?>

                <td><?php echo $row[0]?> </td>
                <td><?php echo $row[1]?> </td>
                <td><?php echo $row[2]?> </td>
            </tr>
<?php
                }
            }
        }
        else if($type=="Restaurant"){
            $sql1="SELECT * FROM Restaurant WHERE RName LIKE '%$name%'";
            $result1 = mysql_query($sql1,$conn);
            if(!$result1)
            {
                $type="1";
                $name="1";
                echo "No result";
                mysql_close($conn);
            }
            if(mysql_affected_rows($conn)==0){
                $type="1";
                $name="1";
                echo "No record";
                mysql_close($conn);
                exit;
            }
            ?>
    <tr>
        <th>ID</th>
        <th>name</th>
        <th>price</th>
        <th>area</th>
        <th>foodtypeid</th>
        <th>foodType</th>
        </tr>
<?php
            while($row = mysql_fetch_array($result1)){
?>
<tr>
    <td><?php echo $row[0]?></td>
    <td><?php echo $row[1]?></td>
    <td><?php echo $row[2]?></td>
    <td><?php echo $row[3]?></td>
<?php
                $RID=$row[0];
                $sql2="SELECT FID from Restaurant_Foodtype where RID='$RID'";
                $result2 =mysql_query($sql2,$conn);
                $row = mysql_fetch_array($result2);
                $FID=$row[0];
                $sql3="SELECT * from FoodType where FID='$FID'";
                $result3 =mysql_query($sql3,$conn);
                $count=0;
                while($row = mysql_fetch_array($result3)){
                    $count++;
                    if($count>0){   ?>
                <tr>
                <td><?php echo " " ?> </td>
                <td><?php echo " " ?> </td>
                <td><?php echo " " ?> </td>
                <td><?php echo " " ?> </td>
            <?php }
                        ?>
    <td><?php echo $row[0]?></td>
    <td><?php echo $row[1]?></td>
    </tr>
<?php
                }
            }
        }
    }

    mysql_close($conn);
     ?>
</table>
</div>
</body>
</html>
