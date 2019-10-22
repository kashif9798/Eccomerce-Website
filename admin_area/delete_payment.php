<?php 

	
	if (isset($_GET["delete_payment"])) 
	{
		$delete_cat_id = $_GET["delete_payment"];

		$delete_payment= "DELETE FROM payments WHERE payment_id = '$delete_cat_id'";

		$run_delete = mysqli_query($con,$delete_payment);

		if ($run_delete) 
		{
			echo "<script>alert('One of the Payments has been deleted');</script>";

			echo "<script>window.open('index.php?view_payments','_self');</script>";

		}
	}

?>