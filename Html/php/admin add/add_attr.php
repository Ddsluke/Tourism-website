<?php
    $con=mysqli_connect("mysql.comp.polyu.edu.hk","17083686d","fdtwjmfn","17083686d");
    // Check connection
    if (mysqli_connect_errno())
    {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    
    $AName=$_POST["AName"];
    $Area=$_POST["Area"];
    $AveragePrice=$_POST["AveragePrice"];
    
    mysqli_query($con," insert into Attraction (AName,Area,AveragePrice) values ('$AName','$Area','$AveragePrice')");
    
    // Print auto-generated id
    echo "New record has id: " . mysqli_insert_id($con);
    
    mysqli_close($con);
    ?>
