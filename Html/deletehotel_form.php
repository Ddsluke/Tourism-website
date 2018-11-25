<!DOCTYPE html>
<!--
Author: Code Apes.
-->
<html>
<head>
<title>Delete Item</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link type="text/css" rel="stylesheet" href="css/style.css">
<link type="text/css" rel="stylesheet" href="css/formStyle.css">
<script>
<!-- Space for javascript uses-->
function checkLevel(){
    if (document.getElementById("type").value == "default"){
        document.getElementById("type_error").style.display='block';
        document.getElementById("confirm").disabled = true;
    }
    else{
        document.getElementById("type_error").style.display='none';
        document.getElementById("confirm").disabled = false;
    }
}
function checkArea(){
    if (document.getElementById("area").value == "default"){
        document.getElementById("area_error").style.display='block';
        document.getElementById("confirm").disabled = true;
    }
    else{
        document.getElementById("area_error").style.display='none';
        document.getElementById("confirm").disabled = false;
    }
}
function checkPrice() {
    var n = document.getElementById("price").value;
    if (!isNaN(parseFloat(n)) && isFinite(n)) {
        document.getElementById("price_error").style.display='block';
        document.getElementById("confirm").disabled = true;
    }
    else {
        document.getElementById("price_error").style.display='none';
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
<h1>Delete Hotel Information</h1>
<form action="php/delete_hotel.php" method="post">
<ul class="form_input">

<li>
<label for="">ID</label>
<input type="text" id="id" name="HID" placeholder="Hotel's ID.." title="No longer than 8 characters" maxlength="8">
</li>


<div id="submit">
<input type="submit" value="Submit"/>
</div>

</ul>
</form>
</div>

</body>

</html>
