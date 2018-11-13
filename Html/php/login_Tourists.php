<?php
//connection

$servername = "mysql.comp.polyu.edu.hk";
$username = "17083686d"; //your student Id
$password = "fdtwjmfn";
// Create connection
$conn = mysql_connect($servername, $username, $password);
// Check connection
if (!$conn) {
die("Connection failed: " . mysql_error());
}
echo "Connected successfully";

//login Tourists
header("Content-Type: text/html; charset=utf8");
    if(!isset($_POST["submit"])){
        exit("error ");
    }//check if we have "submit" action

    include('connect.php');//connect to database
    $Id = $_POST['Id'];//get user's name
    $Passowrd = $_POST['Password'];//get user's password

	

    if ($Id && $passowrd){//if both name and passowrd are not null
             $sql = "select * from Tourists where Id = '$Id' and Password='$Passowrd'";//to check with database
             $result = mysql_query($sql);//get result form sql
             $rows=mysql_num_rows($result);//return the number of row
             if($rows){//0 false 1 true
                   header("refresh:0;url=welcome.html");//jump to welcome.html
                   die('login success');exit;
             }else{
				 
				 ?>
				 
				 Tourists Id or password is wrong, Please 
				 <a href="login.html">
				 try again.
				 </a>.
				 
				 <?php
				 
                /*echo "User name or password error";
                echo "
                    <script>
                            setTimeout(function(){window.location.href='login.html';},1000);
                    </script>

                ";//if error, jump to loggin web after 1 second;*/
             }
             

    }else{//if Tourists Id or passowrd is empty
				?>
				 
				 The form is incomplete, Please 
				 <a href="login.html">
				 try again.
				 </a>.
				 
				 <?php
				 
                /*echo "The form is incomplete";
                echo "
                      <script>
                            setTimeout(function(){window.location.href='login.html';},1000);
                      </script>";

                        //if error, jump to loggin web after 1 second;*/
    }

    mysql_close();//close database
?>