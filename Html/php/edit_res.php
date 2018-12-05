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
        exit;}

    //Registr Tourists
    header("Content-Type: text/html; charset=utf8");
    mysqli_select_db($link,'16098537d');            //Select database
    
    $RID=$_POST['RID'];
    $RName=$_POST['RName'];
    $Area=$_POST['Area'];
    $AveragePrice=$_POST['AveragePrice'];
    $FoodType=$_POST['FoodType'];
    
    $in1="UPDATE Restaurant SET RName='$RName', Area='$Area', AveragePrice='$AveragePrice' WHERE RID='$RID'";
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
    
    $se2="select FID from FoodType where Foodtype='$FoodType'";
    
    $result=mysqli_query($link,$se2);
    $row=mysqli_fetch_row($result);
    $FID=$row[0];
    
    $in2= "UPDATE Restaurant_Foodtype SET FID='$FID' where RID='$RID'";
    
    $result=mysqli_query($link,$in2);
    
    if (!$result){
        echo 'Failed to update the type: ', mysqli_error($link);
        mysqli_close($link);
        exit;
    }
    else{
        echo "<br>restaurant name ". $RName;
        echo "<br>type ID is: " . $FID;   //success
        echo "<br>type name: ". $FoodType;
    }
    header("refresh:3;url=../editres_form.php");
    mysqli_close($link);      //close database
?>
