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
    
    $TouristsID=$_POST['TouristsID'];
    
    $se0="select ArrangeId from Arrange WHERE TouristsID='$TouristsID'";
    $result=mysqli_query($link,$se0);
    
    if (!$result){
        echo 'Failed to update user: ', mysqli_error($link);
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

    $row=mysqli_fetch_row($result);
    $ArrangeId=$row[0];
    
    $se1="SELECT * FROM RecommandRes WHERE ArrangeId='$ArrangeId'";
    mysqli_query($link,$se1);
    if(mysqli_affected_rows($link)>0){
        $de1="DELETE FROM RecommandRes WHERE ArrangeId='$ArrangeId'";
        $reslut=mysqli_query($link,$de1);
        if (!$reslut){
            echo 'Failed to update res: ', mysqli_error($link);
            mysqli_close($link);
            exit;
        }else{
            echo "delete res<br>";   //success
        }
    }
    else{
        echo '  ';
    }
    
    $se2="SELECT * FROM RecommandHotel WHERE ArrangeId='$ArrangeId'";
    mysqli_query($link,$se2);
    if(mysqli_affected_rows($link)>0){
        $de2="DELETE FROM RecommandHotel WHERE ArrangeId='$ArrangeId'";
        $reslut=mysqli_query($link,$de2);
        if (!$reslut){
            echo 'Failed to update hotel: ', mysqli_error($link);
            mysqli_close($link);
            exit;
        }else{
            echo "delete hotel<br>";   //success
        }
    }
    else{
        echo '  ';
    }
    
    $se3="SELECT * FROM RecommandAttraction WHERE ArrangeId='$ArrangeId'";
    mysqli_query($link,$se3);
    if(mysqli_affected_rows($link)>0){
        $de3="DELETE FROM RecommandAttraction WHERE ArrangeId='$ArrangeId'";
        $reslut=mysqli_query($link,$de3);
        if (!$reslut){
            echo 'Failed to update attr: ', mysqli_error($link);
            mysqli_close($link);
            exit;
        }else{
            echo "delete attr<br>";   //success
        }
    }
    else{
        echo '  ';
    }

    $de0="DELETE FROM Arrange WHERE TouristsID='$TouristsID'";
    $reslut=mysqli_query($link,$de0);
    if (!$reslut){
        echo 'Failed to update arrange: ', mysqli_error($link);
        mysqli_close($link);
        exit;
    }else{
        echo "delete arrange<br>";   //success
    }
    
    $de4="DELETE FROM Message WHERE TouristsID='$TouristsID'";
    $reslut=mysqli_query($link,$de4);
    if (!$reslut){
        echo 'Failed to update message: ', mysqli_error($link);
        mysqli_close($link);
        exit;
    }else{
        echo "message delete<br>";   //success
    }
    
    $de5="DELETE FROM Tourists WHERE TouristsID='$TouristsID'";
    $result=mysqli_query($link,$de5);
    if (!$result){
        echo 'Failed to update the tourists: ', mysqli_error($link);
        mysqli_close($link);
        exit;
    }
    else{
        echo "<br>DELETE ID is: " . $TouristsID;        //success
    }
    header("refresh:3;url=../deleteuser_form.php");
    mysqli_close($link);      //close database
    ?>
