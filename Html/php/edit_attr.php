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
    
    $AID=$_POST['AID'];
    $AName=$_POST['AName'];
    $Area=$_POST['Area'];
    $Price=$_POST['Price'];
    $Type=$_POST['Type'];

    $in1="UPDATE Attraction SET AName='$AName', Area='$Area', Price='$Price' WHERE AID='$AID'";
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

    $se2="select ATID from AttractionsType where Type='$Type'";
    
    $result=mysqli_query($link,$se2);
    $row=mysqli_fetch_row($result);
    $ATID=$row[0];
    
    $in2= "UPDATE Attractions_Type SET ATID='$ATID' where AID='$AID'";
    
    $result=mysqli_query($link,$in2);
    
    if (!$result){
        echo 'Failed to update the type: ', mysqli_error($link);
        mysqli_close($link);
        exit;
    }
    else{
        echo "<br>attraction name ". $AName;
        echo "<br>type ID is: " . $ATID;   //success
        echo "<br>type name: ". $Type;
    }
    header("refresh:3;url=../editattr_form.php");
    mysqli_close($link);      //close database
    ?>
