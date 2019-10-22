<div class="box">
	
		<?php 
			$session_name = $_SESSION["customer_name"];

			$session_email = $_SESSION["customer_email"];

			$select_customer = "SELECT * FROM customers WHERE customer_email = '$session_email' ";

			$run_customer = mysqli_query($con,$select_customer);

			$row_customer = mysqli_fetch_array($run_customer);

			$customer_id = $row_customer["customer_id"];
		 ?>

	<h1 class="text-center">Payment Options For You</h1>

	<p class="lead text-center mt-5">

		<a href="order.php?c_id=<?php echo $customer_id ?>" id="register_here" >Offline Payment</a>

	</p>

	<p class="lead text-center">

		<a href="#" id="register_here" >

			PayPal Payment

			<i class="fab fa-cc-paypal"></i>

		</a>

	</p>

</div>