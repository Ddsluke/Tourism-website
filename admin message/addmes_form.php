<!DOCTYPE html>
<!--
Author: Code Apes.
-->
<html>
<head>
<title>Add message</title>
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
<h1>Add hotel information</h1>
<form action="add_mes.php" method="post">
<ul class="form_input">

<li>
<label for="">ADmID</label>
<input type="text" id="id" name="AdmID" placeholder="Admin's ID.." title="No longer than 8 characters" maxlength="8">
</li>

<li>
<label for="">Message</label>
<input type="text" id="name" name="Message" placeholder="what you want to say.." title="No longer than 500 characters" maxlength="50">
</li>


<div id="submit">
<input type="submit" value="Submit"/>
</div>

</ul>
</form>
</div>

</body>

</html>
