<!DOCTYPE html>
<!--
Author: Code Apes.
-->
<html>
<head>
<title>Add Item | ExploreHK</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link type="text/css" rel="stylesheet" href="css/style.css">
<link type="text/css" rel="stylesheet" href="css/formStyle.css">
<script>
<!-- Space for javascript uses-->
function checkType(){
    if (document.getElementById("type").value == "default"){
        document.getElementById("type_error").style.display='block';
        document.getElementById("confirm").disabled = true;
    }
    else{
        document.getElementById("type_error").style.display='none';
        document.getElementById("confirm").disabled = false;
    }
}
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
<h1>Add Hotel Information</h1>
<form action="php/add_hotel.php" method="post">
<ul class="form_input">
<li>
<label for="">Name</label>
<input type="text" id="name" name="HName" placeholder="Hotel's name.." title="No longer than 50 characters" maxlength="50" required="required">
</li>

<li>
<label for="">Level</label>
<select id="level" name="Level" onclick="checkLevel()">
<option value="1">Level 1</option>
<option value="2">Level 2</option>
<option value="3">Level 3</option>
<option value="4">Level 4</option>
<option value="5">Level 5</option>
</select>
<div id="level_error" class="error">Please choose a level.</div>
</li>

<li>
<label for="">Region</label>
<select id="area" name="Area" onclick="checkArea()">
<option value="other">other</option>
<option value="Hung Hom">Hung Hom</option>
<option value="Homantin">Homantin</option>
<option value="Mong Kok">Mong Kok</option>
<option value="Causeway Bay">Causeway Bay</option>
</select>
<div id="area_error" class="error">Please choose a region.</div>
</li>

<li>
<label for="">RoomType</label>
<select id="type" name="RoomType" onclick="checkroomtype()">
<option value="other">other</option>
<option value="Double room">Double room</option>
<option value="Single room">Single room</option>
</select>
<div id="type_error" class="error">Please choose a roomtype.</div>
</li>

<li>
<!--
<label for="" onclick="checkPrice()">Price</label>
<input type="text" id="price" name="Price" placeholder="restaurant's price (e.g. 100.00).." title="No longer than 50 characters" maxlength="50" required="required">
-->
<label>Price HK$</label>
<input id="price" type="number" name="Price" onlick="checkPrice()" placeholder="0" required name="price" min="0" value="0" step="0.01" title="Currency" pattern="^\d+(?:\.\d{1,2})?$" required="required">
</li>

<div id="submit">
<input type="submit" value="Submit"/>
</div>

</ul>
</form>
</div>

</body>

</html>
