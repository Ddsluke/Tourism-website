<!DOCTYPE html>
<!--
Author: Code Apes.
-->
<html>
<head>
	<title>add Item</title>
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
  <h1>Add attraction information</h1>
  <form action="/action_page.php" mothod="post">
	<ul class="form_input">
		<li>
        <label for="">Name</label>
		<input type="text" id="name" placeholder="Attraction's name.." title="No longer than 50 characters" maxlength="50">
		</li>
		
		<li>
		<label for="">Level</label>
		<select id="level" onclick="checkLevel()">
			<option value="default">--Please choose--</option>
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
		<select id="area" onclick="checkArea()">
			<option value="default">--Please choose--</option>
			<option value="male">Hong Kong Island</option>
			<option value="female">Kowloon</option>
			<option value="other">New Territories</option>
		</select>
		<div id="area_error" class="error">Please choose a region.</div>
		</li>
		
		<li>
		<!--
        <label for="" onclick="checkPrice()">Price</label>
		<input type="text" id="price" placeholder="Attraction's price (e.g. 100.00).." title="No longer than 50 characters" maxlength="50">
		-->
		<label>Average Price HK$</label>
		<input name="price" type="number" onlick="checkPrice()" placeholder="0" required name="price" min="0" value="0" step="0.01" title="Currency" pattern="^\d+(?:\.\d{1,2})?$">
		</li>

	    <div id="submit">
			<input type="submit" value="Submit"/>
        </div>
	
	</ul>
  </form>
</div>

</body>

</html>
