<div class="box">
	<div class="box-header">

		<center>

			<h1>Login</h1>
			<p class="lead">Welcome Back <i class="far fa-smile text-primary"></i></p>
			<p class="text-muted">
				Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
				cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
				proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
			</p>
			<hr>

		</center>

	</div>

	<form method="post" action="checkout.php" class="mt-4">

		<div class="form-group">
			<label for="c_email">Your Email</label>
			<input type="email" class="form-control" name="c_email" required>
		</div>

		<div class="form-group">
			<label for="c_pass">Your Password</label>
			<input type="password" class="form-control" name="c_pass" required>
		</div>

		<div class="text-center mt-5">
			<button type="submit" class="btn btn-outline-success" name="login" value="Login">
				<i class="fas fa-sign-in-alt"></i> Login
			</button>	
		</div>

		
		<a href="customer_register.php" id="register_here" class="mt-4 float-right">
			<h6>Don't have an account...? Register here</h6>
		</a>
		<br><br>
	</form>
</div>

<?php 
	if (isset($_POST["login"])) 
	{
		$customer_email = $_POST["c_email"];

		$customer_pass = $_POST["c_pass"];

		$select_customer = "SELECT * FROM customers WHERE customer_email='$customer_email' AND customer_pass='$customer_pass'";

		$run_customer = mysqli_query($con,$select_customer);

		$row_customer = mysqli_fetch_array($run_customer);

		$customer_name = $row_customer["customer_name"];

		$get_ip = getRealIpUser();

		$check_customer = mysqli_num_rows($run_customer);

		$select_cart = "SELECT * FROM cart WHERE ip_add='$get_ip'";

		$run_cart = mysqli_query($con,$select_cart);

		$check_cart = mysqli_num_rows($run_cart);

		if ($check_customer==0) 
		{
			echo 
			"
				<script>alert('Your Email or Password wrong');</script>
			";
			
			exit();
		}
		if ($check_customer==1 AND $check_cart==0) 
		{
			$_SESSION["customer_email"] = $customer_email;
			$_SESSION["customer_name"] = $customer_name;

			echo 
			"	
				<script>alert('You are Logged in');</script>
				<script>window.open('customer/my_account.php?my_orders','_self');</script>
			";	
		}
		if ($check_customer==1 AND $check_cart>0)
		{
			$_SESSION["customer_email"] = $customer_email;
			$_SESSION["customer_name"] = $customer_name;

			echo 
			"	
				<script>alert('You are Logged in');</script>
				<script>window.open('checkout.php','_self');</script>
			";		
		}
	}
?>