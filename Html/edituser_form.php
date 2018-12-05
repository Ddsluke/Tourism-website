<!DOCTYPE html>
<!--
Author: Code Apes.
-->
<html>
<head>
<title>Edit Item | ExploreHK</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link type="text/css" rel="stylesheet" href="css/style.css">
<link type="text/css" rel="stylesheet" href="css/formStyle.css">
<script>
<!-- Space for javascript uses-->

function checkgender(){
    if (document.getElementById("gender").value == "default"){
        document.getElementById("gender_error").style.display='block';
        document.getElementById("confirm").disabled = true;
    }
    else{
        document.getElementById("gender_error").style.display='none';
        document.getElementById("confirm").disabled = false;
    }
}

function checkEmail() {
    var email = document.getElementById("email").value;
    atpos = email.indexOf("@");
    dotpos = email.lastIndexOf(".");
    if (atpos < 1 || ( dotpos - atpos < 2 ))
    {
        document.getElementById("email_error").style.display='block';
        document.getElementById("confirm").disabled = true;
    }
    else{
        document.getElementById("email_error").style.display='none';
        document.getElementById("confirm").disabled = false;
    }
}

</script>
</head>

<body>
<div class="wrapper">
<?php
    require('topnav.php');
    ?>
</div>

<div class="form_container">
<h1>Edit User Information</h1>
<form action="php/edit_user.php" method="post">
<ul class="form_input">

<li>
<label for="">ID</label>
<input type="text" id="id" name="TouristsID" placeholder="Tourists's ID.." title="No longer than 8 characters" maxlength="8" required="required">
</li>

<li>
<label for="">Name</label>
<input type="text" id="name" name="Username" placeholder="Username.." title="No longer than 50 characters" maxlength="50" required="required">
</li>

<li>
<label for="">Age</label>
<input type="number" id="age" name="Age" placeholder="User's age.." title="must be a valid number" maxlength="50" required="required">
</li>

<li>
<label for="">E-mail</label>
<input type="email" id="email" name="Email" placeholder="User's email.." title="must be a valid email" maxlength="50" required="required">
<div id="email_error" style="display:none;
font-family:Verdana, Geneva, sans-serif;    width: 100%;
padding: 12px 20px;    margin: 8px 0;
border: 1px solid #ccc;    border-radius: 4px;
box-sizing: border-box;    border-color: #8b0000;
background-color:#FA8072;">
You email is not valid.</div>
</li>

<li>
<label for="">Gender</label>
<select id="gender" name="Gender" onclick="checkgender()">
<option value="F">Female</option>
<option value="M">Male</option>
<option value="others">others</option>
</select>
<div id="gender_error" class="error">Please choose a gender.</div>
</li>

<div id="submit">
<input type="submit" value="Submit"/>
</div>

</ul>
</form>
</div>

</body>

</html>
