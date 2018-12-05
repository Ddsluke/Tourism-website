<?php
    //connection
    $servername = "mysql.comp.polyu.edu.hk";
    $username = "16098537d";
    $password = "iqdobdiy";
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
    
    $HName=$_POST['HName'];
    $Area=$_POST['Area'];
    $Level=$_POST['Level'];
    $Price=$_POST['Price'];
    $RoomType=$_POST['RoomType'];
    
    $in1="insert into Hotel (HName,Area,Level,HImage) values ('$HName','$Area','$Level','hotel/rosedale_hotel.jpg')";      //insert
    $reslut=mysqli_query($link,$in1);
    
    if (!$reslut){
        echo 'Failed to insert HOTEL: ', mysqli_error($link);
        mysqli_close($link);
        exit;
    }
    else if(mysqli_affected_rows($link)==0){
        echo 'please insert something', mysqli_error($link);
        mysqli_close($link);
        exit;
    }else{
        $Hotel_HID = mysqli_insert_id($link);
        echo "insert successfully<br>";      //success
        echo "hotel ID is: " . $Hotel_HID;   //success
    }
    
    $in2= "insert into RoomInfor (RoomType, Price, Hotel_HID) values ('$RoomType','$Price','$Hotel_HID') ";
    
    $result=mysqli_query($link,$in2);
    
    if (!$result){
        echo 'Failed to insert roominfor: ', mysqli_error($link);
        mysqli_close($link);
        exit;
    }
    else{
        echo "<br>hotel name ". $HName;
        echo "<br>Room type ID is: " . mysqli_insert_id($link);   //success
        echo "<br>type name". $RoomType;
    }
    header("refresh:3;url=../addhotel_form.php");
    mysqli_close($link);      //close database
    ?>
