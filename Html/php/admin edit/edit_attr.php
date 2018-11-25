<?php
    $con=mysqli_connect("mysql.comp.polyu.edu.hk","17083686d","fdtwjmfn","17083686d");
    // Check connection
    if (mysqli_connect_errno())
    {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    
    $AID=$_POST["AID"];
    $AName=$_POST["AName"];
    $Area=$_POST["Area"];
    $AveragePrice=$_POST["AveragePrice"];
    
    mysqli_query($con,"UPDATE Attraction SET AName='$AName' Area='$Area' AveragePrice='$AveragePrice' where AID='$AID');
                 
                 if (mysqli_connect_errno()){
                 echo "Failed to connect to MySQL: " . mysqli_connect_error();}
                 else{
                 echo "New record has been created successfuly";}
    
    mysqli_close($con);
    ?>
