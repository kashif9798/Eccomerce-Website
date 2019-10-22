<?php 

	
	if (isset($_GET["delete_cat"])) 
	{
		$delete_cat_id = $_GET["delete_cat"];

		$delete_cat= "DELETE FROM categories WHERE cat_id = '$delete_cat_id'";

		$run_delete = mysqli_query($con,$delete_cat);

		if ($run_delete) 
		{
			echo "<script>alert('One of your categories has been deleted');</script>";

			echo "<script>window.open('index.php?view_cats','_self');</script>";

		}
	}

?>