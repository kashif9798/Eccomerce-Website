<?php 

	
	if (isset($_GET["delete_order"])) 
	{
		$delete_id = $_GET["delete_order"];

		$delete_pending_order = "DELETE FROM pending_orders WHERE order_id = '$delete_id'";

		$run_pending_delete = mysqli_query($con,$delete_pending_order);


		$delete_customer_order = "DELETE FROM customer_orders WHERE order_id = '$delete_id'";

		$run_customer_delete = mysqli_query($con,$delete_customer_order);


		if ($run_pending_delete && $run_customer_delete) 
		{
			echo "<script>alert('The order has been deleted');</script>";

			echo "<script>window.open('index.php?view_orders','_self');</script>";

		}
	}

?>