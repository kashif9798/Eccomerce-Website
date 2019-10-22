<?php 

	
	if (isset($_GET["delete_product"])) 
	{
		$delete_id = $_GET["delete_product"];

		$delete_pro = "DELETE FROM products WHERE product_id = '$delete_id'";

		$run_delete = mysqli_query($con,$delete_pro);

		if ($run_delete) 
		{
			echo "<script>alert('One of your product has been deleted');</script>";

			echo "<script>window.open('index.php?view_products','_self');</script>";

		}
	}

?>