
<?php
    $con=mysqli_connect("mysql.comp.polyu.edu.hk","17083686d","fdtwjmfn","17083686d");
    // Check connection
    if (mysqli_connect_errno())
    {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    $HID=$_POST["HID"];
    $HName=$_POST["HName"];
    $Area=$_POST["Area"];
    $Level=$_POST["Level"];
    $RoomType=$_POST["RoomType"];
    
    mysqli_autocommit($con,FALSE);
    
    mysqli_query($con,"UPDATE Hotel SET HName='$HName' Area='$Area' Level='$Level' where HID='$HID'");
    mysqli_query($con,"UPDATE RoomInfor SET RoomType='$RoomType' where HID='$HID'");
    

    echo "Record edited successfully";
    
    mysqli_commit($con);
    
    mysqli_close($con);
    ?>
