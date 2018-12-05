<!DOCTYPE html>
<!--
Author: Code Apes.
-->
<html>  
<head>
	<title>Advanced Search | ExploreHK</title>
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
  <h1>Advanced Search</h1>
  <form action="SearchID.php" method="post">
	<ul class="form_input">
	
		<li>
		<label for="">Type</label>
		<select id="type" name="types" onclick="checkType()">
			<option value="default">--Please choose--</option>
			<option value="Attraction" >Attractions</option>
			<option value="Hotel">Hotel</option>
			<option value="Restaurant">Restaurants</option>
		</select>
		<div id="type_error" class="error">Please choose a type you want to search.</div>
		</li>
	
		<li>
        <label for="">Name</label>
		<input type="text" id="name" name="name" placeholder="keyword..." title="No longer than 50 characters" maxlength="50">
		</li>

	    <div id="submit">
			<input type="submit" value="Search"/>
        </div>
	
</ul>
</form>
</div>

</body>

</html>
