<?php 

	
	if (isset($_GET["delete_p_cat"])) 
	{
		$delete_p_cat_id = $_GET["delete_p_cat"];

		$delete_p_cat= "DELETE FROM product_categories WHERE p_cat_id = '$delete_p_cat_id'";

		$run_delete = mysqli_query($con,$delete_p_cat);

		if ($run_delete) 
		{
			echo "<script>alert('One of your product categories has been deleted');</script>";

			echo "<script>window.open('index.php?view_p_cats','_self');</script>";

		}
	}

?>