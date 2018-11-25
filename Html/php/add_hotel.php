
<?php
    $con=mysqli_connect("mysql.comp.polyu.edu.hk","17083686d","fdtwjmfn","17083686d");
    // Check connection
    if (mysqli_connect_errno())
    {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    $HName=$_POST['HName'];
    $Area=$_POST['Area'];
    $Level=$_POST['Level'];
    
    mysqli_query($con," insert into Hotel (HName,Area,Level) values ('$HName','$Area','$Level')");
                 
                 // Print auto-generated id
	echo "New item inserted!";
    echo "New record has id: " . mysqli_insert_id($con);
                 
    mysqli_close($con);
    ?>
<script type='text/javascript'>
     self.close();
</script>
