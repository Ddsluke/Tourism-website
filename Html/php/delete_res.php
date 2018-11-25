<?php
    $con=mysqli_connect("mysql.comp.polyu.edu.hk","17083686d","fdtwjmfn","17083686d");
    // Check connection
    if (mysqli_connect_errno())
    {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    
    $RID=$_POST['RID'];
    
    mysqli_query($con,"DELETE FROM Restaurant WHERE RID='$RID'");
    
    echo "Record deleted successfully";
    
    mysqli_close($con);
    ?>
<script type="text/javascript">
 function closeWindow() {
    setTimeout(function() {
    window.close();
    }, 2000);
    }

    window.onload = closeWindow();
    </script>