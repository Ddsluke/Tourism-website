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
    
    $HID=$_POST['HID'];
    $HName=$_POST['HName'];
    $Area=$_POST['Area'];
    $Level=$_POST['Level'];
    $Price=$_POST['Price'];
    $RoomType=$_POST['RoomType'];
    
    $in1="UPDATE Hotel SET HName='$HName', Area='$Area', Level='$Level' WHERE HID='$HID'";
    $reslut=mysqli_query($link,$in1);
    
    if (!$reslut){
        echo 'Failed to update attraction: ', mysqli_error($link);
        mysqli_close($link);
        exit;
    }else{
        echo "<br>";   //success
    }
    
    if(mysqli_affected_rows($link)==0){
        echo 'no such id exists, please check', mysqli_error($link);
        mysqli_close($link);
        exit;
    }else{
        echo "id exists <br>";
    }
    
    $in2= "UPDATE RoomInfor SET RoomType='$RoomType', Price='$Price' where Hotel_HID='$HID'";
    
    $result=mysqli_query($link,$in2);
    
    if (!$result){
        echo 'Failed to update the type: ', mysqli_error($link);
        mysqli_close($link);
        exit;
    }
    else{
        echo "<br>restaurant name ". $HName;
        echo "<br>type ID is: " . $HID;        //success
        echo "<br>type name: ". $RoomType;
    }
    header("refresh:3;url=../edithotel_form.php");
    mysqli_close($link);      //close database
?>
