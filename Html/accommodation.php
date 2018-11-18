<!DOCTYPE html>
<html>
<head>
	<title>Attractions#</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link type="text/css" rel="stylesheet" href="css/style.css">
	<link type="text/css" rel="stylesheet" href="css/imgGallery.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
<div class="wrapper">
	<!-- topbar navigation menu -->
	<?php
	require('topbar.php');
	?>
	<!-- end topbar -->
</div>
<div class="wrapper" id="top">
	<!-- main body -->
	<main class="container">
	
	<!-- sidebar navigation menu -->
	<div class="sidebar">
		<h3>Accommodation</h3>
		<a href="#">All</a>
		<a class="dropdown">By Level<i class="fa fa-caret-down"></i></a>
			<div class="dropdown-container">
				<a href="#">Level 2</a>
				<a href="#">Level 3</a>
				<a href="#">Level 4</a>
				<a href="#">Level 5</a>
			 </div>
		<a class="dropdown">By Region<i class="fa fa-caret-down"></i></a>
			<div class="dropdown-container">
				<a href="#">Hong Kong Island</a>
				<a href="#">Kowloon</a>
				<a href="#">New Territories</a>
			</div>
	</div>
	<!-- end sidebar -->
  
		<div class="content">
			<h1>All Accommodations</h1><hr><br>
			<div class="card-deck">
				<div class="row">
					<div class="column">
						<img src="img/attractions/baicheng.jpg" alt="#">
						<div class="text"><a href="#">#attraction name</a></div>
						<div class="button"><a href="#" class="btn btn-small">+ Add to Plan</a></div> 
					</div>
					<div class="column">
						<img src="img/attractions/baicheng.jpg" alt="#">
						<div class="text"><a href="#">#attraction name</a></div>
						<div class="button"><a href="#" class="btn btn-small">+ Add to Plan</a></div> 
					</div>
				</div>
				<div class="row">
					<div class="column">
						<img src="img/attractions/baicheng.jpg" alt="#">
						<div class="text"><a href="#">#attraction name</a></div>
						<div class="button"><a href="#" class="btn btn-small">+ Add to Plan</a></div> 			
					</div>
					<div class="column">
						<img src="img/attractions/baicheng.jpg" alt="#">
						<div class="text"><a href="#">#attraction name</a></div> 
						<div class="button"><a href="#" class="btn btn-small">+ Add to Plan</a></div> 
					</div>
				</div>
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

<script src="js/dropdown.js"></script>

</body>
</html>