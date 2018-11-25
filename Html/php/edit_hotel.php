
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
    
    mysqli_query($con,"UPDATE Hotel SET HName='$HName' Area='$Area' Level='$Level' where HID='$HID');
                 
    if (mysqli_connect_errno()){
         echo "Failed to connect to MySQL: " . mysqli_connect_error();}
    else{
         echo "New record has been created successfuly";}
                 
    mysqli_close($con);
    ?>
