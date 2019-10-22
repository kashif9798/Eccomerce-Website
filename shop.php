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
							<a href="index.php">Home</a>
						</li>
						<li class="breadcrumb-item active">
							Shop
						</li>
					</ul>
				</div>
			</div>
		</div><!-- breadcrumb container Finish -->

		<div class="container-fluid"><!-- Products Categories, Genders and shop heading Start -->
			<div class="row flex_shop_categories">
				<div class="col-12 col-sm-4 col-md-3 col-lg-3 col-xl-3 flex_shop_categories_products"><!-- Product Categories sidebar start -->
					<div class="card bg-light text-dark sidebar-menu">
						<div class="card-header">
							<h4 class="card-title sidebar-title">Products Categories</h4>
						</div>
						<div class="card-body">
							<ul class="nav nav-pills flex-column category-menu">

								<?php getPCats(); ?>

							</ul>
						</div>
					</div>
				</div><!-- Product Categories sidebar Finish -->

				<div class="col-12 col-sm-4 col-md-6 col-lg-6 col-xl-6 flex_shop_categories_shop"><!-- Shop text box start -->
					
					<?php getshop(); ?>

				</div><!-- Shop text box start -->

				<div class="col-12 col-sm-4 col-md-3 col-lg-3 col-xl-3 flex_shop_categories_categories"><!-- Categories sidebar start -->
					<div class="card bg-light text-dark sidebar-menu">
						<div class="card-header">
							<h4 class="card-title sidebar-title">Categories</h4>
						</div>
						<div class="card-body">
							<ul class="nav nav-pills flex-column category-menu">
								
								<?php getCats(); ?>

							</ul>
						</div>
					</div>
				</div><!-- Categories sidebar Finish -->
			</div> 
		</div><!-- Products Categories, Genders and shop heading Finish --> 

		<div class="container-fluid"> <!-- Products Begin -->
			<div class="row">
				<?php  
					if (!isset($_GET["p_cat"]) && !isset($_GET["cat"]) ) 
					{
						$per_page=8;

						if (isset($_GET["page"])) 
						{
							$page = $_GET["page"];
						}
						else
						{
							$page=1;
						}

						$start_from = ($page-1) * $per_page;

						$get_products = "SELECT * FROM products ORDER BY 1 DESC LIMIT $start_from,$per_page";

						$run_products = mysqli_query($con,$get_products);

						while ($row_products=mysqli_fetch_array($run_products)) 
						{
							$pro_id = $row_products["product_id"];
							$pro_title = $row_products["product_title"];
							$pro_price = $row_products["product_price"];
							$pro_img1 = $row_products["product_img1"];

							echo 
							"
								<div class='col-10 col-sm-6 col-md-5 col-lg-4 col-xl-3 offset-1 offset-sm-0 offset-md-1 offset-lg-0 offset-xl-0 single_card'>

									<div class='card card_custom'>
										<a href='details.php?pro_id=$pro_id'>
											<img src='admin_area/product_images/$pro_img1' class='img_custom_shop' alt='Front Page product Card 1 Image'>
										</a>
										<div class='card-body single_card_body'>

												<h4 class='card-title'>
													<a href='details.php?pro_id=$pro_id'>$pro_title</a>
												</h4>

											<p class='card-text'><strong>Price: </strong>$$pro_price</p>

											<a class='btn btn-secondary btn-sm text-light card_btns1_shop' href='details.php?pro_id=$pro_id'>

												View Details
											</a>
											
											<a class='btn btn-primary btn-sm text-light card_btns2_shop' href='details.php?pro_id=$pro_id'>

												<i class='fa fa-shopping-cart'></i> Add to Cart
											</a>

										</div>

									</div>

								</div>
							";
							
						}
						
				?>
			</div>
		</div><!-- Products finish -->
		
		<ul class="pagination justify-content-center mt-5"><!-- Pagination Begin -->
			<?php  
				
				$query = "SELECT * FROM products";

				$result = mysqli_query($con,$query);

				$total_records = mysqli_num_rows($result);

				$total_pages = ceil($total_records / $per_page);

				echo 
				"
					<li class='page-item ml-1'><a class='page-link rounded_page' href='shop.php?page=1'>".'First Page'."</a></li>

				";

				for ($i=1; $i<=$total_pages; $i++) 
				{ 
				 	if ($page == $i) 
				 	{
				 		echo 
						"
							<li class='page-item ml-1 active'><a class='page-link rounded_page' href='shop.php?page=".$i."'>".$i."</a></li>

						";
				 	}
					else
					{
						echo 
						"
							<li class='page-item ml-1'><a class='page-link rounded_page' href='shop.php?page=".$i."'>".$i."</a></li>

						";
					}

				 } 

				echo 
				"
					<li class='page-item ml-1'><a class='page-link rounded_page' href='shop.php?page=$total_pages'>".'Last Page'."</a></li>

				";

				}
			?>
		</ul><!-- Pagination Finish -->

		<div class="container-fluid">
			<div class="row">
			
			<?php 

				getpcatpro();

				getcatpro();
			 ?>

			</div>
		</div>

	</div>
	
	<br>
	<?php 
		include("includes/footer.php") 
	?>
</body>
</html>
	