 <?php
require('php/connect.php');
session_start();
if (!(isset($_SESSION['login_tourist']) || isset($_SESSION['login_admin']))){
	header("Location:Login.php");
}
?>
<?php
	if(isset($_POST['unameInput'])){
		$uname = $_POST['unameInput'];
		$result = mysqli_query($link, "UPDATE Tourists SET Username='$uname' where TouristsID='$ID'");	
	}
	if(isset($_POST['fnameInput'])){
		$fname = $_POST['fnameInput'];
		$result = mysqli_query($link, "UPDATE Tourists SET Name='$fname' where TouristsID='$ID'");
	}
	if(isset($_POST['genderInput'])){
		$gender = $_POST['genderInput'];
		$result = mysqli_query($link, "UPDATE Tourists SET Gender='$gender' where TouristsID='$ID'");
	}
	if(isset($_POST['ageInput'])){
		$age = $_POST['ageInput'];
		$result = mysqli_query($link, "UPDATE Tourists SET Age='$age' where TouristsID = '$ID'");
	}
?>


<!DOCTYPE html>
<!--
Author: Code Apes.
-->
<html>
<head>
	<title>Account Information</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
	<link type="text/css" rel="stylesheet" href="css/style.css">
	<style>
	
	input[type=text], input[type=password], select {
	font-family:Verdana, Geneva, sans-serif;
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}
</style>
	<script>
	function EditUname(){
		var content = document.getElementById("uname").innerHTML;
		document.getElementById("unameSub").type="submit";
		document.getElementById("uname").style="display:none";
		document.getElementById("unameInput").value=content;
		document.getElementById("unameInput").type="text";
	}
	

	function EditFname(){
		var content = document.getElementById("fname").innerHTML;
		document.getElementById("fnameSub").type = "submit";
		document.getElementById("fname").style ="display:none"; 
		document.getElementById("fnameInput").value=content;
		document.getElementById("fnameInput").type="text";
	}
	
	function EditGender(){
		document.getElementById("genderSub").type="submit";
		document.getElementById("gender").style = "display:none";
		document.getElementById("genderInput").style="display:default";
	}
	
	function EditAge(){
		document.getElementById("ageSub").type="submit";		
		document.getElementById("age").style = "display:none";
		document.getElementById("ageInput").style="display:default";
	}
	</script>
</head>
<body>
<div class="wrapper">
<?php
require('topnav.php');
?>
</div>
<div class="wrapper">
	<!-- main body -->
	<main class="hoc container clear">
	  <div class="sidebar">
	  <h3>Personal Account</h3>
            <a href="PersonInfo.php">Personal Information</a>
            <a href="PersonInfo.php">Read News</a>
	  </div>
		<div class="content" style="text-align:center;">
		<h1>Account Information</h1><hr>
		<table>
		<tr>
		  <td><h3>User ID:</h3></td>
		  <td><h3 id="uid"><?php 
		  $ID = $_SESSION['login_tourist'];
		  echo "$ID";
		  ?></h3></td><!-- User ID cannot be changed-->
		  <td></td>
		</tr>
		<?php 
		$sql=" select * from Tourists where TouristsID = $ID";
		$result = mysqli_query($link,$sql);
		$row = mysqli_fetch_assoc($result);
		?>
		<tr>
		<form method="post" action="testing.php">
		  <td>
		  	<h3>Username:</h3>
		  </td>
		  <td>
		  	<h3 id="uname"><?php echo $row['Username']?></h3>
			<input type="hidden" id="unameInput" name="unameInput" maxlength="16" placeholder="Your username.." >
		  </td>
		  <td>
		  	<div class="button btn btn-small" onclick="EditUname()" id="unameEdit">Edit</div>
			<input type='hidden' value='Confirm' id='unameSub'>
		  </td>
		  <td id="unameimg"></td>
		</form>
		</tr>
		<tr>
		  <form method="post" action="PersonInfo.php">
		  <td><h3>Full name:</h3></td>
		  <td>
		  	<h3 id="fname"><?php echo $row['Name']?></h3>
			<input type="hidden" id="fnameInput" name="fnameInput" maxlength="16" placeholder="Your full name.." >
		  </td>
		  <td>
			<div class="button btn btn-small" onclick="EditFname()" id="fnameEdit">Edit</div>
			<input type='hidden' value='Confirm' id='fnameSub'>
		  </td>
		  <td id="fnameimg"></td>
		  </form>
		</tr>
		<tr>
		  <form method="post" action="PersonInfo.php">
		  <td>
		    <h3>Gender:</h3>
		  </td>
		  <td>
		    <h3 id="gender"><?php echo $row['Gender']?></h3>
			<select id="genderInput" name="genderInput" style="display:none">
				<option value="Male">Male</option>
				<option value="Female">Female</option>
				<option value="Other">Other</option>
			</select>
		  </td>
		  <td>
			<div class="button btn btn-small" onclick="EditGender()" id="genderEdit">Edit</div>
			<input type='hidden' value='Confirm' id='genderSub'>
		  </td>
		  <td id="genderimg"></td>
		  </form>
		</tr>
		<tr>
		  <form method="post" action="PersonInfo.php">
		  <td>
		  	<h3>Age:</h3>
		  </td>
		  <td>
		  	<h3 id="age"><?php echo $row['Age']?></h3>
			  <select id="ageInput" name="ageInput" style="display:none">
		 		<option value="0">0</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option><option value="31">31</option><option value="32">32</option><option value="33">33</option><option value="34">34</option><option value="35">35</option><option value="36">36</option><option value="37">37</option><option value="38">38</option><option value="39">39</option><option value="40">40</option><option value="41">41</option><option value="42">42</option><option value="43">43</option><option value="44">44</option><option value="45">45</option><option value="46">46</option><option value="47">47</option><option value="48">48</option><option value="49">49</option><option value="50">50</option><option value="51">51</option><option value="52">52</option><option value="53">53</option><option value="54">54</option><option value="55">55</option><option value="56">56</option><option value="57">57</option><option value="58">58</option><option value="59">59</option><option value="60">60</option><option value="61">61</option><option value="62">62</option><option value="63">63</option><option value="64">64</option><option value="65">65</option><option value="66">66</option><option value="67">67</option><option value="68">68</option><option value="69">69</option><option value="70">70</option><option value="71">71</option><option value="72">72</option><option value="73">73</option><option value="74">74</option><option value="75">75</option><option value="76">76</option><option value="77">77</option><option value="78">78</option><option value="79">79</option><option value="80">80</option><option value="81">81</option><option value="82">82</option><option value="83">83</option><option value="84">84</option><option value="85">85</option><option value="86">86</option><option value="87">87</option><option value="88">88</option><option value="89">89</option><option value="90">90</option><option value="91">91</option><option value="92">92</option><option value="93">93</option><option value="94">94</option><option value="95">95</option><option value="96">96</option><option value="97">97</option><option value="98">98</option><option value="99">99</option><option value="100">100</option>
			  </select>
		  </td>
		  <td>
			<div class="button btn btn-small" onclick="EditAge()" id="ageEdit">Edit</div>
			<input type='hidden' value='Confirm' id='ageSub'>
		  </td>
		  <td id="ageimg"></td>
		  </form>
		</tr>
		<tr>
		  <td><h3>My Plan</h3></td>
		  <td><h5><a href="plan.php">(Click here to view and edit)</a><h5></td>
		  <td> </td>
		</tr>
		</table><br>
		<a href="php/logout.php"><div class="button btn btn-small">Log out</div></a><br>
		</div>
	</main>
</div>

<?php
    $servername = "mysql.comp.polyu.edu.hk";
    $username = "16098537d";//need to change to xiajialu's
    $password = "iqdobdiy";
    $dbname="16098537d";

    // CONNECT
    $conn = new mysqli($servername, $username, $password,$dbname);
    $key = $_SESSION['login_tourist'];

    // Check connection
    if ($conn->connect_error) {
        die("CAN'T CONNECT : " . $conn->connect_error);
    } 
    $sql=" select * from Message WHERE TouristsID = $key ORDER BY creat_time";
?>

<div class="content" style="text-align:center;">
<h1 id = "Read News">Notice Board</h1><hr>
</div>

<?php
    $result = mysqli_query($conn, $sql);
    if(!$result)
    {
        echo "No result";
    }
    elseif ($num=mysqli_num_rows($result) > 0)
    {
        $name=array($num);
        $i=0;
        while($row = mysqli_fetch_assoc($result))
        {
          ?>
          
          <div class="content">
               <h2><?php echo $row['Message'] ?></h2>	
          </div>        			
     <?php
       $name[$i]=$row['Message'];
       $i=$i+1;
       ?>
     <?php        
     
    }     
  } else
      echo "NO RESULT FOUND";
    ?>
		
	
<?php
require('footer.php');
?>
</body>
</html>
