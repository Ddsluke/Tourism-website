<!DOCTYPE html>
<html>
<head>
<title>#title_here</title>

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
			<a href="attractions.html"><img src="img/attractions/baicheng.jpg" alt="Travel"></a>
			<div class="text"><a href="travel-attractions.html">Attractions</a></div>
		</div>
		<div class="column">
			<a href="accommodation.html"><img src="img/accommodations/hotel4.jpg" alt="Accommodation"></a>
			<div class="text"><a href="accommodation.html">Accommodation</a></div> 
		</div>
		<div class="column">
			<a href="food.html"><img src="img/food/seafood.jpg" alt="Food"></a>
			<div class="text"><a href="food.html">Food</a></div>
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