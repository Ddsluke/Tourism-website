<!DOCTYPE html>
<html>
<head>
<title>Home</title>

<!-- metadata -->
<meta charset="utf-8">
<meta name="description" content="#">
<meta name="keywords" content="#">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!-- External CSS Style -->
<link type="text/css" rel="stylesheet" href="css/style.css">
<link type="text/css" rel="stylesheet" href="css/imgGallery.css">
<link type="text/css" rel="stylesheet" href="css/home.css">

<!-- Internal CSS Style -->
<style>
<!--override the style of images gallery-->

</style>
</head>

<body>

<!-- topbar navigation menu -->
<?php
require('topnav.php');
?>
<!-- end topbar -->

<!-- image wrapper -->
<div class="wrapper img">

	<div id="intro" class="hoc clear">
		<article>
		  <h2>#Name here</h2>
		  <p>#Tagline1 here</p>
		  <p>#Tagline2 here</p>
		  <a class="btn-inverse" href="attractions.html" style="padding:10px 20px;"><u>Must-See</u></a></li><!--override css style for single spcial button-->
		</article>
	</div>
</div>	
</div>
<!-- end image wrapper -->

<div class="wrapper">
  <!-- main body-->
  <main>
	<div class="row">
		<div class="column">
			<a href="attractions.html"><img src="img/attraction/victoriapeak_attraction.jpg" alt="Attraction"></a>
			<div class="text"><a href="attraction.php">Attractions</a></div>
		</div>
		
		<div class="column">
			<a href="food.html"><img src="img/accommodation/iclubsheungwan_hotel.jpg" alt="Food"></a>
			<div class="text"><a href="restaurant.php">Restaurant</a></div>
		</div>
		
		<div class="column">
			<a href="accommodation.html"><img src="img/restaurant/yadlliepllate_restaurant.jpg" alt="Accommodation"></a>
			<div class="text"><a href="accommodation.php">Accommodation</a></div> 
		</div>

	</div>
	
  </main>
  <!-- end main body -->
</div>

<!-- footer -->
<?php
require('footer.php');
?>
<!-- end footer -->

</body>