<div class="sidebar">
	<h3>Attraction</h3>
	<a href="#">All</a>
	<a class="dropdown">By Theme<i class="fa fa-caret-down"></i></a>
		<div class="dropdown-container">
			<a href="#">Viewing</a>
			<a href="#">Entertainment</a>
			<a href="#">Shopping</a>
		 </div>
	<a class="dropdown">By Region<i class="fa fa-caret-down"></i></a>
		<div class="dropdown-container">
			<a href="#">Hong Kong Island</a>
			<a href="#">Kowloon</a>
			<a href="#">New Territories</a>
		</div>
</div>

<script type="text/javascript">
	/* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
	var dropdown = document.getElementsByClassName("dropdown");
	var i;

	for (i = 0; i < dropdown.length; i++) {
	  dropdown[i].addEventListener("click", function() {
		this.classList.toggle("active");
		var dropdownContent = this.nextElementSibling;
		if (dropdownContent.style.display === "block") {
		  dropdownContent.style.display = "none";
		} else {
		  dropdownContent.style.display = "block";
		}
	  });
	}
</script>