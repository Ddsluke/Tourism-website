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

//login
header("Content-Type: text/html; charset=utf8");
    if(!isset($_POST["submit"])){
        exit("error ");
    }//check if we have "submit" action

    include('connect.php');//connect to database
    $name = $_POST['name'];//get user's name
    $passowrd = $_POST['password'];//get user's password

    if ($name && $passowrd){//if both name and passowrd are not null
             $sql = "select * from Users where username = '$name' and password='$password'";//to check with database
             $result = mysql_query($sql);//get result form sql
             $rows=mysql_num_rows($result);//return the number of row
             if($rows){//0 false 1 true
                   header("refresh:0;url=welcome.html");//如果成功跳转至welcome.html页面
                   exit;
             }else{
                echo "User name or password error";
                echo "
                    <script>
                            setTimeout(function(){window.location.href='login.html';},1000);
                    </script>

                ";//if error, jump to loggin web after 1 second;
             }
             

    }else{//if user name or passowrd is empty
                echo "The form is incomplete";
                echo "
                      <script>
                            setTimeout(function(){window.location.href='login.html';},1000);
                      </script>";

                        //if error, jump to loggin web after 1 second;
    }

    mysql_close();//close database
?>