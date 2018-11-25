
<?php
    $con=mysqli_connect("mysql.comp.polyu.edu.hk","17083686d","fdtwjmfn","17083686d");
    // Check connection
    if (mysqli_connect_errno())
    {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    $AdmID=$_POST["AdmID"];
    $Message=$_POST["Message"];
    
    mysqli_query($con," insert into Message (AdmID,Message) values ('$AdmID','$Message')");
                 
     // Print auto-generated id
    echo "New record has id: " . mysqli_insert_id($con);
                 
    mysqli_close($con);
    ?>
