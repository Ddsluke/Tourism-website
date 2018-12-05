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
<h1>Add Attraction Information</h1>
<form action="php/add_attr.php" method="post">
<ul class="form_input">
<li>
<label for="">Name</label>
<input type="text" id="name" name="AName" placeholder="attraction's name.." title="No longer than 50 characters" maxlength="50" required="required">
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
<label for="">Type</label>
<select id="type" name="Type" onclick="checkType()">
<option value="Entertainment">Entertainment</option>
<option value="Viewing">Viewing</option>
<option value="Shopping">Shopping</option>
</select>
<div id="type_error" class="error">Please choose a type.</div>
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
