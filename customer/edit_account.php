<?php 
	$customer_email = $_SESSION["customer_email"];
	
	$get_customer = "SELECT * FROM customers WHERE customer_email = '$customer_email'";

	$run_customer = mysqli_query($con,$get_customer);

	$row_customer = mysqli_fetch_array($run_customer);

	$customer_id = $row_customer["customer_id"];

	$customer_name = $row_customer["customer_name"];

	$customer_email = $row_customer["customer_email"];

	$customer_country = $row_customer["customer_country"];

	$customer_city = $row_customer["customer_city"];

	$customer_contact = $row_customer["customer_contact"];

	$customer_address = $row_customer["customer_address"];

	$customer_image = $row_customer["customer_image"];

?>


<h1 align="center"> Edit Your Account </h1>
<form action="" method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label>Costumer Name:</label>
		<input type="text" class="form-control" name="c_name" value="<?php echo($customer_name); ?>" required></input>
	</div>

	<div class="form-group">
		<label>Costumer Email:</label>
		<input type="email" class="form-control" name="c_email" value="<?php echo($customer_email); ?>" required></input>
	</div>

	<div class="form-group">
		<label>Costumer Country:</label>
		<input type="text" class="form-control" name="c_country" value="<?php echo($customer_country); ?>" required></input>
	</div>

	<div class="form-group">
		<label>Costumer City:</label>
		<input type="text" class="form-control" name="c_city" value="<?php echo($customer_city); ?>" required></input>
	</div>

	<div class="form-group">
		<label>Costumer Contact:</label>
		<input type="text" class="form-control" name="c_contact" value="<?php echo($customer_contact); ?>" required></input>
	</div>

	<div class="form-group">
		<label>Costumer Adddress:</label>
		<input type="text" class="form-control" name="c_address" value="<?php echo($customer_address); ?>" required></input>
	</div>

	<div class="form-group">
		<label>Costumer Image:</label>
		<input type="file" class="form-control-file" name="c_images" required></input>
		<img class="img-fluid" id="img_pay_offline" src="customer_images/<?php echo($customer_image); ?>" alt="Customer Image">
	</div>

	<div class="text-center">
		<button type="submit" name="update" class="btn btn-outline-success">
			<i class="fas fa-sync-alt"></i> Update Now
		</button>
	</div>

</form>

<?php  
	if (isset($_POST["update"])) 
	{
		$update_id = $customer_id;

		$c_name = $_POST["c_name"];

		$c_email = $_POST["c_email"];

		$c_country = $_POST["c_country"];

		$c_city = $_POST["c_city"];

		$c_contact = $_POST["c_contact"];

		$c_address = $_POST["c_address"];

		$c_images = $_FILES["c_images"]["name"];

		$c_images_tmp = $_FILES["c_images"]["tmp_name"];

		move_uploaded_file($c_images_tmp,"customer_images/$c_images");

		$update_customer = "UPDATE customers SET customer_name='$c_name',customer_email='$c_email',customer_country='$c_country',customer_city='$c_city',customer_contact='$c_contact',customer_address='$c_address',customer_image='$c_images' WHERE customer_id = '$update_id'";

		$run_customer = mysqli_query($con,$update_customer);

		if ($run_customer) 
		{
			echo 
			"
				<script>alert('Your account has been edited,to complete the process, Please Relogin');</script>
			";

			echo 
			"
				<script>window.open('logout.php','_self')</script>
			";
		}

		


	}
?>