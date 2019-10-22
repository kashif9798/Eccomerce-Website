<?php
	$active="Home";
	$activeTop="";
	include("includes/header.php");
?>

	<div class="container-fluid" id="slider" keyboard="true"> <!-- slider container Begin -->
		<div class="row">
			<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
				<div class="carousel slide" id="mycarousel" data-ride="carousel">
					<ul class="carousel-indicators">
						<li data-target="#mycarousel" data-slide-to="0" class="active"></li>
						<li data-target="#mycarousel" data-slide-to="1"></li>
						<li data-target="#mycarousel" data-slide-to="2"></li>
						<li data-target="#mycarousel" data-slide-to="3"></li>
					</ul>
					<div class="carousel-inner" role="listbox">

						<?php 
							$get_slides = "SELECT * FROM slider LIMIT 0,1";
							$run_slides =mysqli_query($con,$get_slides);
							while ($row_slides=mysqli_fetch_array($run_slides)) {
							 	$slide_name = $row_slides["slide_name"];
							 	$slide_image = $row_slides["slide_image"];
							 	echo 
							 	"
							 		<div class='carousel-item active'>
									<img src='admin_area/slides_images/$slide_image' alt='$slide_name' style='width: 100%; height: 35vw'>
									</div>
							 	";
							 }

							$get_slides = "SELECT * FROM slider LIMIT 1,3";
							$run_slides =mysqli_query($con,$get_slides);
							while ($row_slides=mysqli_fetch_array($run_slides)) {
							 	$slide_name = $row_slides["slide_name"];
							 	$slide_image = $row_slides["slide_image"];
							 	echo 
							 	"
							 		<div class='carousel-item'>
									<img src='admin_area/slides_images/$slide_image' alt='$slide_name' style='width: 100%; height: 35vw'>
									</div>
							 	";
							 } 
						?>

					</div>

					<a href="#mycarousel" class="carousel-control-prev" data-slide="prev">
						<span class="carousel-control-prev-icon" role="button"></span>
						<span class="sr-only">Previous</span>
					</a>
					<a href="#mycarousel" class="carousel-control-next" data-slide="next">
						<span class="carousel-control-next-icon" role="button"></span>
						<span class="sr-only">Next</span>
					</a>
				</div>
			</div>
		</div>
	</div><!-- slider container Finish -->

	<div id="advantages"><!-- advantages container Begin -->
		<div class="container-fluid">
			<div class="same-height-row">
				<div class="row">
					<div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4">
						<div class="box_2">
							<div class="box same-height">
								<div class="icon">
									<i class="fa fa-heart"></i>
								</div>
								<h3><a href="" class="text-primary">Best Offer</a></h3>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
							</div>
						</div>
					</div>
					<div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4">
						<div class="box_2">	
							<div class="box same-height">
								<div class="icon">
									<i class="fa fa-tag"></i>
								</div>
								<h3><a href="" class="text-primary">Best Prices</a></h3>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
							</div>
						</div>
					</div>
					<div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4">
						<div class="box_2">		
							<div class="box same-height">
								<div class="icon">
									<i class="fa fa-thumbs-up"></i>
								</div>
								<h3><a href="" class="text-primary">100% Original</a></h3>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div><!-- advantages container Finish -->

	<div id="hot">
		<div class="box">
			<div class="container-fluid">
				<div class="row">
					<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
						<h2 class="text-primary">Our Latest Products</h2>
					</div>
				</div>
			</div>
		</div><!-- Latest Products heading Begin -->
	</div><!-- Latest Products heading Finish -->

	<div class="container-fluid" id="content"><!-- Front Page Products Begin -->
		<div class="row">

			<?php 
				getPro();
			?>
			
		</div>
	</div><!-- Front Page Products Finish -->
	<br>
	<?php 
		include("includes/footer.php") 
	?>
</body>
</html>

