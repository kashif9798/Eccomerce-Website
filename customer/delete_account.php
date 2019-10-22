<center>
	<h1> Do You Realy Want To Delete Your Account ? </h1>

	<form action="" class="mt-5" method="post">
		<input type="submit" name="yes" onclick="return confirm('Are you sure?')" value="Yes, I want to" class="btn btn-outline-danger mr-1">
		<input type="submit" name="no" value="No, I don't" class="btn btn-outline-success ml-1">
	</form>
</center>

<?php

	$c_email = $_SESSION["customer_email"];

	if (isset($_POST["yes"])) 
	{
		
		$delete_customer = "DELETE FROM customers WHERE customer_email = '$c_email'";

		$run_delete_customer = mysqli_query($con,$delete_customer);

		if ($run_delete_customer) 
		{
			session_destroy();

			echo 
			"
				<script>
					alert('Successfully delete your Account, feel sorry about this. Good Bye ');

					window.open('../index.php','_self');
				</script>
			";
		}
	
	}

	if (isset($_POST["no"]))
	{
		echo 
		"
			<script>window.open('my_account.php?my_orders','_self');</script>
		";	
	} 
?>