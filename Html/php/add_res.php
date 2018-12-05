<?php
    //connection
    $servername = "mysql.comp.polyu.edu.hk";
    $username = "16098537d";
    $password = "iqdobdiy";
    // Create connection
    $link = mysqli_connect($servername, $username, $password);
    // Check connection
    if (!$link) {
        echo "Error: Unable to connect to MySQL." . PHP_EOL;
        echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
        echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
        mysqli_close($link);
        exit;
    }
    //Registr Tourists
    header("Content-Type: text/html; charset=utf8");
    mysqli_select_db($link,'16098537d');            //Select database
    
    $RName=$_POST['RName'];
    $Area=$_POST['Area'];
    $AveragePrice=$_POST['AveragePrice'];
    $FoodType=$_POST['FoodType'];
    
    $in1="insert into Restaurant (RName,Area,AveragePrice,RImage) values ('$RName','$Area','$AveragePrice','restaurant/labeat_restaurant.jpg')";      //insert
    $reslut=mysqli_query($link,$in1);
    
    if (!$reslut){
        echo 'Failed to insert restaurant: ', mysqli_error($link);
        mysqli_close($link);
        exit;
    }
    else if(mysqli_affected_rows($link)==0){
        echo 'please insert something', mysqli_error($link);
        mysqli_close($link);
        exit;
    }else{
        $RID = mysqli_insert_id($link);
        echo "insert successfully<br>";   //success
        echo "Restaurant ID is: " . $RID;       //success
    }
    $se="select FID from FoodType where FoodType='$FoodType'";
    
    $result=mysqli_query($link,$se);
    $row=mysqli_fetch_row($result);
    $FID=$row[0];
    
    $in2= "insert into Restaurant_Foodtype (RID, FID) values ('$RID', '$FID')";
    
    $result=mysqli_query($link,$in2);
    
    if (!$result){
        echo 'Failed to insert arrange: ', mysqli_error($link);
        mysqli_close($link);
        exit;
    }
    else{
        echo "<br>attraction name ". $RName;
        echo "<br>type ID is: " . $FID;   //success
        echo "<br>type name". $FoodType;
    }
    header("refresh:3;url=../addres_form.php");
    mysqli_close($link);      //close database
?>
