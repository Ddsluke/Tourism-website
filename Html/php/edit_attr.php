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
    $ATID=$_POST["ATID"];
    
    mysqli_autocommit($con,FALSE);
    
    mysqli_query($con,"UPDATE Attraction SET AName='$AName' Area='$Area' AveragePrice='$AveragePrice' where AID='$AID'");
    mysqli_query($con,"UPDATE Attraction_Type SET ATID='$ATID' where AID='$AID'");
    
    echo "Record edited successfully";
    
    mysqli_commit($con);
    
    mysqli_close($con);
    ?>
<script type='text/javascript'>
     self.close();
</script>