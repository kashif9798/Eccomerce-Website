<?php 

	session_start();

	include("includes/db.php");
	include("functions/functions.php"); 
?>


<?php 
	if (isset($_GET["pro_id"])) 
	{
		$product_id = $_GET["pro_id"];

		$get_product = "SELECT * FROM products WHERE product_id='$product_id'";

		$run_product = mysqli_query($con,$get_product);

		$row_product = mysqli_fetch_array($run_product);

		$p_cat_id = $row_product["p_cat_id"];

		$pro_title = $row_product["product_title"];

		$pro_price = $row_product["product_price"];

		$pro_desc = $row_product["product_desc"];

		$pro_img1 = $row_product["product_img1"];

		$pro_img2 = $row_product["product_img2"];

		$pro_img3 = $row_product["product_img3"];

		$get_p_cat = "SELECT * FROM product_categories WHERE p_cat_id='$p_cat_id'";

		$run_p_cat = mysqli_query($con,$get_p_cat);

		$row_p_cat = mysqli_fetch_array($run_p_cat);

		$p_cat_title = $row_p_cat["p_cat_title"];
	}
?>


<?php 
	
	if (isset($_POST["search_submit"])) 
	{
		$user_query = $_POST["user_query"];
		echo "<script>window.open('results.php?result_query=$user_query','_self');</script>";
	}

?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Aphro Store</title>
	<link rel="icon" href="images/ico.png" type="image/ico">
	<link rel="stylesheet" type="text/css" href="styles/style.css">
	<link rel="stylesheet" type="text/css" href="styles/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="font_awesome/fontawesome-free-5.9.0-web/css/all.css">
	<script src="js/jquery-3.4.1.js"></script>
	<script src="js/bootstrap.js"></script>
	<script type="text/javascript" src="script.js"></script>
	
</head>
<body>
	<div id="top"> <!-- Welcome top Begin -->
		<div class="container"><!-- container Begin -->
			<div class="row"><!-- row Begin -->
				<div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6 offer"> <!-- col-6 offer Begin -->
					<button class="btn btn-success btn-sm">
						<?php 
							if (isset($_SESSION["customer_name"])) 
							{
								echo 
								"
									Welcome : " . $_SESSION["customer_name"] . "
								";
							}
							else
							{
								echo
								"
									Welcome " . ": Guest
								";
							}
						?>
					</button>
					<a href="cart.php">
						
						&nbsp<?php echo countItemsInCart(); ?> Items in your cart| Total Price: <?php TotalItemsInCartPrice(); ?>
						
					</a>
				</div><!-- col-6 offer Finish -->
				<div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6"> <!-- col-6 Begin -->
					<ul class="menu"><!-- menu Begin -->
						<li>
							<a <?php RegisterHref(); ?> <?php if ($activeTop=="Register") { echo " id='top_active' "; } ?> >Register</a>
						</li>
						<li id="topSecond">
							<a <?php AccountHref(); ?> <?php if ($activeTop=="Account") { echo " id='top_active' "; } ?> >My Account</a>
						</li>
						<li class="topLastTwo">
							<a href="cart.php"<?php if ($activeTop=="Cart") { echo " id='top_active' "; } ?> >Go to Cart</a>
						</li>
						<li class="topLastTwo">
							
							<?php 
							if (isset($_SESSION["customer_name"])) 
							{
								echo 
								"
									<a href='logout.php'>Log Out</a>
								";
							}
							else
							{
								echo
								"
									<a href='checkout.php'". ($activeTop=='log' ? 'id=top_active' : '' ) . ">Login</a>
								";
							}

						?>
						</li>
					</ul><!-- menu Finish -->
				</div><!-- col-6 Finish -->
			</div><!-- row Finish -->
		</div><!-- container Finish -->
	</div><!-- Welcome top Finish -->

	<div class="container-fluid"><!-- container Navbar Begin -->
		<div class="row">
			<div class="col-12 col-sm-12  col-md-12  col-lg-12  col-xl-12">
				<nav id="navbar" class="navbar navbar-expand-xl"> <!-- navbar Begin -->
					<a class="navbar-brand home" href="index.php">
						<img src="images/logo.png" alt="Logo" class="d-none d-sm-none d-md-none d-lg-none d-xl-block" id="nav_logo_ex_xs_sm">
						<img src="images/logo.png" alt="Logo Mobile" class="d-block d-sm-block d-md-block d-lg-block d-xl-none" id="nav_logo_xs_sm">
					</a>

					<button type="button" class="navbar-toggler btn btn-outline-primary" id="navbar_search_toggle" data-toggle="collapse" data-target="#search">
						<span class="sr-only">Toggle Search</span>
						<i class="fa fa-search"></i>
					</button>
					<button type="button" class="navbar-toggler btn btn-outline-primary" data-toggle="collapse" data-target="#navigation">
						<span class="sr-only">Toggle Navigation</span>
						<i class="fa fa-align-justify"></i>
					</button> 
					<!-- Collapsible menu start here -->
					<div class="collapse navbar-collapse" id="navigation">
						<ul class="navbar-nav"> <!-- main Navigation Begin -->
							<li class="nav-item">
								<a href="index.php" class="nav-link"<?php if ($active=="Home") { echo " id='active' "; } ?> >Home</a>
							</li>
							<li class="nav-item">
								<a href="shop.php" class="nav-link nav-link-custom"<?php if ($active=="Shop") { echo " id='active' "; } ?> >Shop</a>
							</li>
							<li class="nav-item">
								<a <?php AccountHref(); ?>class="nav-link nav-link-custom"<?php if ($active=="Account") { echo " id='active' "; } ?> >My Account</a>
							</li>
							<li class="nav-item">
								<a href="cart.php" class="nav-link nav-link-custom"<?php if ($active=="Shopping") { echo " id='active' "; } ?> >Shopping Cart</a>
							</li>
							<li class="nav-item">
								<a href="contact.php" class="nav-link nav-link-custom"<?php if ($active=="Contact") { echo " id='active' "; } ?> >Contact Us</a>
							</li>
						</ul><!-- main Navigation Finish -->
					</div><!-- Collapsible menu end here -->
					<div class="cart-primary-btn">
						
						<a href="cart.php" class="btn btn-outline-primary">
							<i class="fa fa-shopping-cart"></i>
							<span><?php echo countItemsInCart(); ?> Items in cart</span>
						</a>
					</div>
					<div class="collapse clearfix" id="search"><!-- search collapse begin -->
						<form method="post" class="form-inline navbar-form">

							<div class="input-group">

								<input type="text" name="user_query" class="form-control search_input" placeholder="Search" required>

								<div class="input-group-append">
									<button type="submit" name="search_submit" class="btn btn-outline-success">
										<i class="fa fa-search"></i>
									</button>
								</div>

							</div>

						</form>
					</div><!-- search collapse ends -->	
					<div class="navbar navbar-collapse">
						<button class="btn btn-outline-primary d-none d-sm-none d-md-none d-lg-none d-xl-block" id="only_lg_dev_appear_search" type="button" data-toggle="collapse" data-target="#search">
							<span class="sr-only">Toggle Search</span>
							Search
						</button>
					</div>
				</nav><!-- navbar Finish -->
			</div>
		</div>
	</div><!-- container Navbar Finish -->