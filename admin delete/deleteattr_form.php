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


</script>
</head>

<body>
<div class="wrapper">
<?php
    require('topnav.php');
    ?>
</div>

<div class="form_container">
<h1>delete Attraction information</h1>
<form action="delete_attr.php" method="post">
<ul class="form_input">

<li>
<label for="">ID</label>
<input type="text" id="id" name="AID" placeholder="Attraction's ID.." title="No longer than 8 characters" maxlength="8">
</li>


<div id="submit">
<input type="submit" value="Submit"/>
</div>

</ul>
</form>
</div>

</body>

</html>
