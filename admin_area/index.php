<?php 
	
	session_start();
	include("includes/db.php");
	if (!isset($_SESSION["admin_email"])) 
	{
		echo 
		"
			<script>window.open('login.php','_self');</script>
		";	
	}
	else
	{	
		$admin_session = $_SESSION["admin_email"];

		$get_admin = "SELECT * FROM admins WHERE admin_email = '$admin_session'";

		$run_admin = mysqli_query($con,$get_admin);

		$row_admin = mysqli_fetch_array($run_admin);

		$admin_id = $row_admin["admin_id"];

		$admin_name = $row_admin["admin_name"];

		$admin_email = $row_admin["admin_email"];

		$admin_image = $row_admin["admin_image"];

		$admin_country = $row_admin["admin_country"];

		$admin_about = $row_admin["admin_about"];

		$admin_contact = $row_admin["admin_contact"];

		$admin_job = $row_admin["admin_job"];



		$get_products = "SELECT * FROM products";

		$run_products = mysqli_query($con,$get_products);

		$count_products = mysqli_num_rows($run_products);


		$get_customers = "SELECT * FROM customers";

		$run_customers = mysqli_query($con,$get_customers);

		$count_customers = mysqli_num_rows($run_customers);


		$get_p_categories = "SELECT * FROM product_categories";

		$run_p_categories = mysqli_query($con,$get_p_categories);

		$count_p_categories = mysqli_num_rows($run_p_categories);


		$get_pending_orders = "SELECT * FROM pending_orders";

		$run_pending_orders = mysqli_query($con,$get_pending_orders);

		$count_pending_orders = mysqli_num_rows($run_pending_orders);

?>


<?php
	$active_arrow="";
	if (isset($_GET["dashboard"])) 
	{	
						
		$active_arrow="dashboard";
	}



	if (isset($_GET["insert_product"]) || isset($_GET["view_products"]) || isset($_GET["delete_product"]) || isset($_GET["edit_product"])) 
	{
		$active_arrow="product";
	}



	if ( isset($_GET["insert_p_cat"]) || isset($_GET["view_p_cats"]) || isset($_GET["delete_p_cat"]) || isset($_GET["edit_p_cat"]) )
	{
		$active_arrow="p_cat";
	}
	


	if ( isset($_GET["insert_cat"]) || isset($_GET["view_cats"]) || isset($_GET["delete_cat"]) || isset($_GET["edit_cat"]))
	{
		$active_arrow="cat";
	}

	if ( isset($_GET["insert_slide"]) || isset($_GET["view_slides"]) || isset($_GET["delete_slide"]) || isset($_GET["edit_slide"]))
	{
		$active_arrow="slide";
	}

	if (isset($_GET["view_customers"]))
	{
		$active_arrow="customer";
	}

	if (isset($_GET["view_orders"]))
	{
		$active_arrow="orders";
	}

	if (isset($_GET["view_payments"]))
	{
		$active_arrow="payments";
	}

	if (isset($_GET["view_users"]) || isset($_GET["insert_user"]) || isset($_GET["user_profile"]))
	{
		$active_arrow="user";
	}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Aphro - Admin Area</title>
	<link rel="icon" href="../images/ico.png" type="image/ico">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="font_awesome/fontawesome-free-5.9.0-web/css/all.css">
	<link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css"/>
	<script src="js/jquery-3.4.1.js"></script>
	<script src="js/bootstrap.js"></script>
	<script src="js/tinymce/tinymce.min.js"></script>
	<script type="text/javascript" src="DataTables/datatables.min.js"></script>


</head>

<body>
	<div id="wrapper">
		<div class="container-fluid ninja">
		<?php include("includes/sidebar.php"); ?>
		</div><br>
		<div id="page-wrapper">
			<div class="container-fluid">
				<?php

					if (isset($_GET["insert_product"])) 
					{
						include("insert_product.php");
					}

					elseif (isset($_GET["view_products"])) 
					{
						include("view_products.php");
					}

					elseif (isset($_GET["delete_product"])) 
					{
						include("delete_product.php");
					}

					elseif (isset($_GET["edit_product"])) 
					{
						include("edit_product.php");
					}



					elseif (isset($_GET["insert_p_cat"])) 
					{
						include("insert_p_cat.php");
					}

					elseif (isset($_GET["view_p_cats"]))
					{
						include("view_p_cats.php");
					}

					elseif (isset($_GET["delete_p_cat"]))
					{
						include("delete_p_cat.php");
					}

					elseif (isset($_GET["edit_p_cat"]))
					{
						include("edit_p_cat.php");
					}



					elseif (isset($_GET["insert_cat"]))
					{
						include("insert_cat.php");
					}

					elseif (isset($_GET["view_cats"]))
					{
						include("view_cats.php");
					}

					elseif (isset($_GET["delete_cat"]))
					{
						include("delete_cat.php");
					}

					elseif (isset($_GET["edit_cat"]))
					{
						include("edit_cat.php");
					}



					elseif (isset($_GET["insert_slide"]))
					{
						include("insert_slide.php");
					}

					elseif (isset($_GET["view_slides"]))
					{
						include("view_slides.php");
					}

					elseif (isset($_GET["delete_slide"]))
					{
						include("delete_slide.php");
					}

					elseif (isset($_GET["edit_slide"]))
					{
						include("edit_slide.php");
					}




					elseif (isset($_GET["view_customers"]))
					{
						include("view_customers.php");
					}

					elseif (isset($_GET["delete_customer"]))
					{
						include("delete_customer.php");
					}




					elseif (isset($_GET["view_orders"]))
					{
						include("view_orders.php");
					}

					elseif (isset($_GET["delete_order"]))
					{
						include("delete_order.php");
					}



					elseif (isset($_GET["view_payments"]))
					{
						include("view_payments.php");
					}

					elseif (isset($_GET["delete_payment"]))
					{
						include("delete_payment.php");
					}




					elseif (isset($_GET["view_users"]))
					{
						include("view_users.php");
					}

					elseif (isset($_GET["delete_user"]))
					{
						include("delete_user.php");
					}

					elseif (isset($_GET["insert_user"]))
					{
						include("insert_user.php");
					}

					elseif (isset($_GET["user_profile"]))
					{
						include("user_profile.php");
					}



					else
					{	
						
						include("dashboard.php");
					}


				?>
			</div>
		</div>
	</div>
</body>
</html>

<?php } ?>