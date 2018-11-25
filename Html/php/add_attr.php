<?php
    $con=mysqli_connect("mysql.comp.polyu.edu.hk","17083686d","fdtwjmfn","17083686d");
    // Check connection
    if (mysqli_connect_errno())
    {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    
    $AName=$_POST['AName'];
    $Area=$_POST['Area'];
    $Price=$_POST['Price'];
    
    mysqli_query($con," insert into Attraction (AName,Area,Price) values ('$AName','$Area','$Price')");
    
    // Print auto-generated id
	echo "New item inserted!";
    echo "New record has id: " . mysqli_insert_id($con);
    
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