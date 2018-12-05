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
    $Username=$_POST['Username'];
    $Age=$_POST['Age'];
    $Email=$_POST['Email'];
    $Gender=$_POST['Gender'];
    
    $in1="UPDATE Tourists SET Username='$Username', Age='$Age', Gender='$Gender' ,Email= '$Email' WHERE TouristsID='$TouristsID'";
    $reslut=mysqli_query($link,$in1);
    
    if (!$reslut){
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
        echo "id exists <br> update successfully";
    }
    
    header("refresh:3;url=../edituser_form.php");
    mysqli_close($link);      //close database
?>
