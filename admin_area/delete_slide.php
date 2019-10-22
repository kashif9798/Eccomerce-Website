<?php 

	
	if (isset($_GET["delete_slide"])) 
	{
		$delete_id = $_GET["delete_slide"];

		$delete_slide = "DELETE FROM slider WHERE slide_id = '$delete_id'";

		$run_delete = mysqli_query($con,$delete_slide);

		if ($run_delete) 
		{
			echo "<script>alert('One of your slide has been deleted');</script>";

			echo "<script>window.open('index.php?view_slides','_self');</script>";

		}
	}

?>