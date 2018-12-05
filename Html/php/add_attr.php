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

    $AName=$_POST['AName'];
    $Area=$_POST['Area'];
    $Price=$_POST['Price'];
    $Type=$_POST['Type'];
    
    
    $in1="insert into Attraction (AName,Area,Price,AImage) values ('$AName','$Area','$Price','attraction/victoriaharbour_attraction.jpg')";                //insert
    $reslut=mysqli_query($link,$in1);
    
    if (!$reslut){
        echo 'Failed to insert tourist: ', mysqli_error($link);
        mysqli_close($link);
        exit;
    }
    else{
        $AID = mysqli_insert_id($link);
        echo "insert successfully<br>";   //success
        echo "Attraction ID is: " . $AID;   //success
    }
    $se="select ATID from AttractionsType where Type='$Type'";
    
    $result=mysqli_query($link,$se);
    $row=mysqli_fetch_row($result);
    $ATID=$row[0];
    
    $in2= "insert into Attractions_Type (AID, ATID) values ('$AID', '$ATID')";
    
    $result=mysqli_query($link,$in2);
    
    if (!$result){
        echo 'Failed to insert arrange: ', mysqli_error($link);
        mysqli_close($link);
        exit;
    }
    else{
         echo "<br>attraction name ". $AName;
         echo "<br>type ID is: " . $ATID;   //success
         echo "<br>type name". $Type;
    }
    header("refresh:3;url=../addattr_form.php");
    mysqli_close($link);      //close database
?>

