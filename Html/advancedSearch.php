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
  <form action="advan.php" method="post">
	<ul class="form_input">
	
		<li>
		<label for="">Type</label>
		<select id="type" name="type" onclick="checkType()">
			<option value="default">--Please choose--</option>
			<option value="male" >Attractions</option>
			<option value="other">Restaurants</option>
			<option value="female">Accommodations</option>
		</select>
		<div id="type_error" class="error">Please choose a type you want to search.</div>
		</li>
	
		<li>
        <label for="">Name</label>
		<input type="text" id="name" name="name" placeholder="keyword..." title="No longer than 50 characters" maxlength="50">
		</li>
	
		<li>
		<label for="">Region</label>
		<input type="checkbox" name="area[]" value="Hung Hom">Hung Hom<br>
		<input type="checkbox" name="area[]" value="Disnyland">Disnyland<br>
                <input type="checkbox" name="area[]" value="Mong Kok">Mong Kok<br>
                <input type="checkbox" name="area[]" value="Ocean Park">Ocean Park<br>
                <input type="checkbox" name="area[]" value="Tsim Sha Tsui">Tsim Sha Tsui<br>
                <input type="checkbox" name="area[]" value="Victoria Peak">Victoria Peak<br>
		<input type="checkbox" name="area[]" value="Homantin">Homantin
		</li>
		
		<li>
		<label for="">Price Range</label>
		<input type="checkbox" name="price[]" value="0">0~300 
		<input type="checkbox" name="price[]" value="300">300~600 <br>
		<input type="checkbox" name="price[]" value="600">600~900 
		<input type="checkbox" name="price[]" value="901">>1000 
		</li>

	    <div id="submit">
			<input type="submit" value="Search"/>
        </div>
	
	</ul>
  </form>
</div>
        <?PHP
        ?>

</body>

</html>
