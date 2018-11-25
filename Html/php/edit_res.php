
<?php
    $con=mysqli_connect("mysql.comp.polyu.edu.hk","17083686d","fdtwjmfn","17083686d");
    // Check connection
    if (mysqli_connect_errno())
    {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    
    $RID=$_POST["RID"];
    $RName=$_POST["RName"];
    $Area=$_POST["Area"];
    $AveragePrice=$_POST["AveragePrice"];
    $FID=$_POST["FID"];
    
    mysqli_autocommit($con,FALSE);
    
    mysqli_query($con,"UPDATE Restaurant SET RName='$RName' Area='$Area' AveragePrice='$AveragePrice' where RID='$RID'");
    mysqli_query($con,"UPDATE Restaurant_Foodtype SET FID='$FID' where RID='$RID'");
    
    echo "Record edited successfully";
    
    mysqli_commit($con);
    
    mysqli_close($con);
    ?>
<script type='text/javascript'>
     self.close();
</script>