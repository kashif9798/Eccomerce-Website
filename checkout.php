<?php
	$active="";
	$activeTop="log";
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
							Register
						</li>
					</ul>
				</div>
			</div>
		</div><!-- breadcrumb container Finish -->

		<div class="container-fluid">
			<div class="row">

				<div class="col-md-3"><!-- Products Categories, Genders and Start -->
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


				<div class="col-md-9">
					<?php 
						if (!isset($_SESSION["customer_name"])) 
						{
							include("customer/customer_login.php");
						}
						else
						{
							include("payment_options.php");							
						}
					?>
				</div>
			</div> 
		</div><!-- Products Categories, Genders and Finish --> 
	</div>
	
	<br>
	<?php 
		include("includes/footer.php") 
	?>
</body>
</html>

