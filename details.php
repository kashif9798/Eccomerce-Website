<?php
	$active="Shop";
	$activeTop="";
	include("includes/header.php");
?>

	<div id="content">
		<div class="container"> <!-- breadcrumb container Begin -->
			<div class="row">
				<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
					<ul class="breadcrumb">
						<li class="breadcrumb-item">
							<a href="index.php">Shop</a>
						</li>

						<li class="breadcrumb-item">
							<a href="shop.php?p_cat=<?php echo $p_cat_id; ?>"><?php echo $p_cat_title; ?></a>					
						</li>

						<li class="breadcrumb-item active">
							<a><?php echo $pro_title; ?></a>					
						</li>
					</ul>
				</div>
			</div>
		</div><!-- breadcrumb container Finish -->

		<div class="container-fluid">
			<div class="row">
				<div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3"><!-- Products Categories, Genders and Start -->
					<div class="card bg-light text-dark sidebar-menu products_categories_details1">
						<div class="card-header">
							<h4 class="card-title sidebar-title">Products Categories</h4>
						</div>
						<div class="card-body">
							<ul class="nav nav-pills flex-column category-menu">

								<?php getPCats(); ?>
								
							</ul>
						</div>
					</div>
					<br>
					<div class="card bg-light text-dark sidebar-menu products_categories_details2">
						<div class="card-header">
							<h4 class="card-title sidebar-title">Categories</h4>
						</div>
						<div class="card-body">
							<ul class="nav nav-pills flex-column category-menu">
								
								<?php getCats(); ?>

							</ul>
						</div>
					</div>
				</div><!-- Products Categories, Genders and Finish -->

				<div class="col-12 col-sm-12 col-md-9 col-lg-9 col-xl-9 carouselAndBox"> <!-- details carousel and box of sizes and colors start -->
					<div id="productMain" class="row">

						<div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 mt-4"><!-- Details Carousel Begin -->
							<div id="mainImage">
								<div id="detail_carousel" class="carousel slide" data-ride="carousel">

								  <ul class="carousel-indicators">
								    <li data-target="#detail_carousel" data-slide-to="0" class="active"></li>
								    <li data-target="#detail_carousel" data-slide-to="1"></li>
								    <li data-target="#detail_carousel" data-slide-to="2"></li>
								  </ul>
								  
								  <div class="carousel-inner">
								    <div class="carousel-item active">
								      <img src="admin_area/product_images/<?php echo ($pro_img1); ?>" class="img_custom_details_carousel" alt="Product LG G8 a">
								    </div>
								    <div class="carousel-item">
								      <img src="admin_area/product_images/<?php echo ($pro_img2); ?>" class="img_custom_details_carousel" alt="Product LG G8 b">
								    </div>
								    <div class="carousel-item">
								      <img src="admin_area/product_images/<?php echo ($pro_img3); ?>" class="img_custom_details_carousel" alt="Product LG G8 c">
								    </div>
								  </div>
								  
								  <a class="carousel-control-prev" href="#detail_carousel" data-slide="prev">
								    <span class="carousel-control-prev-icon"></span>
								    <span class="sr-only">Previous</span>
								  </a>
								  <a class="carousel-control-next" href="#detail_carousel" data-slide="next">
								    <span class="carousel-control-next-icon"></span>
								    <span class="sr-only">Next</span>
								  </a>
								</div>															
							</div>

							<div class="row mt-3" id="thumb"><!-- Details carousel small images below start -->
								<div class="col-4">
									<a data-target="#detail_carousel" data-slide-to="0" href="" class="thumb">
										<img src="admin_area/product_images/<?php echo ($pro_img1); ?>" alt="Product 1">
									</a>
								</div>
								<div class="col-4">
									<a data-target="#detail_carousel" data-slide-to="1" href="" class="thumb">
										<img src="admin_area/product_images/<?php echo ($pro_img2); ?>" alt="Product 2">
									</a>
								</div>
								<div class="col-4">
									<a data-target="#detail_carousel" data-slide-to="2" href="" class="thumb">
										<img src="admin_area/product_images/<?php echo ($pro_img3); ?>" alt="Product 3">
									</a>
								</div>
							</div> <!-- Details carousel small images below Finish -->
						</div><!-- Details Carousel Finish -->

						<div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 mt-4"> <!-- Box beside carousel start -->
							<div class="box">
								<h1 class="text-center"><?php echo ($pro_title); ?></h1>
								
								<form method="post" class="pt-4" action="details.php?add_cart=<?php echo ($product_id); ?>">

									<?php add_cart(); ?>

									<div class="form-group row">
										<label for="" class="col-form-label col-md-4">Product Quantity</label>
										<div class="col-md-8 col-lg-7 col-xl-6">
											<select name="product_qty" id="" class="form-control">
												<option>1</option>
												<option>2</option>
												<option>3</option>
												<option>4</option>
												<option>5</option>
											</select>
										</div>
									</div>

									<div class="form-group row">
										<label class="col-form-label col-md-4">Product Color</label>
										<div class="col-md-8 col-lg-7 col-xl-6">
											<select name="product_size" class="form-control" required oninput="setCustomValidity('')" oninvalid="setCustomValidity('Must pick one size for the product to be added to cart')">

												<option disabled selected value="">Select Size</option>
												<option>Small</option>
												<option>Medium</option>
												<option>Large</option>

											</select>
										</div>
									</div>

									<p class="text-center carousel_price mt-4">$<?php  echo "$pro_price"; ?> &nbsp &nbsp<button type="submit" class="btn btn-outline-primary"><i class="fa fa-shopping-cart"></i> Add to Cart</button></p>
								</form>
							</div>
							
							<?php if(isset($_GET['msg'])) { ?>
							<div class="row" id="ProductAlreadyAlert" style="display: none; margin-left: 1%; margin-right: 1%;">

								<div class="alert alert-warning alert-dismissible fade show" role="alert">

									<center>
										<strong>Product Not Added To Cart</strong>
										<br>
										<?php echo $_GET['msg']; ?>
									</center>

									<button type="button" class="close" data-dismiss="alert" aria-label="Close">

								    	<span aria-hidden="true">&times;</span>

									</button>

								</div>
							</div>
							
							<?php } ?>
						</div><!-- Box beside carousel Finish -->
					</div>

					<div class="row">
						<div class="box mt-4" id="details"><!-- Product details and edition begin -->
							<h2>Product Details</h2>
							<p><?php  echo $pro_desc; ?></p>
							<h4>Sizes:</h4>
							<ul>
								<li>Large</li>
								<li>Medium</li>
								<li>Small</li>
							</ul>
							<hr>							
						</div><!-- Product details and edition Finish -->
					</div>

						
					<div id="row same-height-row"><!-- Products you may like Start-->
						<div class="row mt-3">
							<div class="col-12 col-sm-12 col-md-12 col-lg-3 col-xl-3">
								<div class="box same-height headline">
									<h4 class="text-center">Products You May Like</h4>
								</div>
							</div>

							<?php ProYouMayLike(); ?>
														
						</div>
					</div><!-- Products you may like Finish-->
				</div><!-- details carousel and box of sizes and colors Finish -->
			</div> 
		</div><!-- Products Categories, Genders and Finish --> 
	</div>


	<br>
	<?php 
		include("includes/footer.php") 
	?>
</body>
</html>
<script>
	
	$(document).ready(function(){
		$('#ProductAlreadyAlert').slideDown();
	});
</script>

