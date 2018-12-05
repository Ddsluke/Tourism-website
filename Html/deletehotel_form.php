<!DOCTYPE html>
<!--
Author: Code Apes.
-->
<html>
<head>
<title>Delete Item | ExploreHK</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link type="text/css" rel="stylesheet" href="css/style.css">
<link type="text/css" rel="stylesheet" href="css/formStyle.css">
<script>
<!-- Space for javascript uses-->


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
<input type="text" id="id" name="HID" placeholder="Hotel's ID.." title="No longer than 8 characters" maxlength="8" required="required">
</li>


<div id="submit">
<input type="submit" value="Submit"/>
</div>

</ul>
</form>
</div>

</body>

</html>
