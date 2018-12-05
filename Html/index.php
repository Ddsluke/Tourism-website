<!DOCTYPE html>
<html>
<head>
<title>Home | ExploreHK</title>

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
		  <h2>ExploreHK</h2>
		  <p>Hong Kong</p>
		  <p>- Best Places to Visit</p>
		  <a class="btn" href="attraction.php" style="padding:10px 20px;"><u>Must-See</u></a></li><!--override css style for single spcial button-->
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
			<a href="attraction.php"><img src="img/attraction/victoriapeak_attraction.jpg" alt="Attraction"></a>
			<div class="text"><a href="attraction.php">Attractions</a></div>
		</div>
		
		<div class="column">
			<a href="restaurant.php"><img src="img/restaurant/labeat_restaurant.jpg" alt="Restaurant"></a>
			<div class="text"><a href="restaurant.php">Restaurants</a></div>
		</div>
		
		<div class="column">
			<a href="accommodation.php"><img src="img/hotel/iclubsheungwan_hotel.jpg" alt="Accommodation"></a>
			<div class="text"><a href="accommodation.php">Accommodations</a></div> 
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