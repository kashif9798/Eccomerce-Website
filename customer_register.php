<?php
	$active="";
	$activeTop="Register";
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
					<div class="boxReg margin-top-side-menu">
						<div class="box-header">
							
							<center>
								<h2>Register a new account</h2>
							</center>

							<form action="customer_register.php" class="mt-5" method="post" enctype="multipart/form-data">
								<div class="form-group">
									<label for="c_name">Your Name</label>
									<input type="text" class="form-control" name="c_name" required>
								</div>

								<div class="form-group">
									<label for="c_email">Your Email</label>
									<input type="email" class="form-control" name="c_email" required>
								</div>

								<div class="form-group">
									<label for="c_pass">Your Password</label>
									<input type="password" class="form-control" name="c_pass" required>
								</div>

								<div class="form-group">
									<label for="c_country">Your Country</label>
									<input type="text" class="form-control" name="c_country" required>
								</div>

								<div class="form-group">
									<label for="c_city">Your City</label>
									<input type="text" class="form-control" name="c_city" required>
								</div>

								<div class="form-group">
									<label for="c_contact">Your Contact</label>
									<input type="text" class="form-control" name="c_contact" required>
								</div>

								<div class="form-group">
									<label for="c_address">Your Address</label>
									<input type="text" class="form-control" name="c_address" required>
								</div>

								<div class="form-group">
									<label for="c_image">Your Profile Picture</label>
									<input type="file" class="form-control-file" name="c_image" required>
								</div>

								<div class="text-center">
									<button type="submit" name="register" class="btn btn-outline-success">
										<i class="fas fa-user-plus"></i> Register
									</button>
								</div>
							</form>

						</div>
					</div>
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
<?php 
	if (isset($_POST["register"])) 
	{
		$c_name = $_POST["c_name"];

		$c_email = $_POST["c_email"];

		$c_pass = $_POST["c_pass"];

		$c_country = $_POST["c_country"];

		$c_city = $_POST["c_city"];

		$c_contact = $_POST["c_contact"];

		$c_address = $_POST["c_address"];

		$c_image = $_FILES["c_image"]["name"];

		$c_image_tmp = $_FILES["c_image"]["tmp_name"];

		$c_ip = getRealIpUser();

		move_uploaded_file($c_image_tmp,"customer/customer_images/$c_image");

		$insert_customer = "INSERT INTO customers (customer_name,customer_email,customer_pass,customer_country,customer_city,customer_contact,customer_address,customer_image,customer_ip) VALUES ('$c_name','$c_email','$c_pass','$c_country','$c_city','$c_contact','$c_address','$c_image','$c_ip')";

		$run_customer = mysqli_query($con,$insert_customer);

		$sel_cart = "SELECT * FROM cart WHERE ip_add = '$c_ip'";

		$run_cart = mysqli_query($con,$sel_cart);

		$check_cart = mysqli_num_rows($run_cart);

		if ($check_cart > 0) 
		{
			// if register when there are items in cart

			$_SESSION["customer_email"] = $c_email;

			$_SESSION["customer_name"] = $c_name;

			echo
			"
				<script>
					alert('You have been Registered Successfully');
					window.open('checkout.php','_self');
				</script>
			";
		}
		else
		{
			// if register when there are NO items in cart

			$_SESSION["customer_email"] = $c_email;

			$_SESSION["customer_name"] = $c_name;


			echo
			"
				<script>
					alert('You have been Registered Successfully');
					window.open('index.php','_self');
				</script>
			";
		}
	}
?>
