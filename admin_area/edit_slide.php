<?php 
	
	if (isset($_GET["edit_slide"])) 
	{
		$edit_id = $_GET["edit_slide"];

		$get_slide = "SELECT * FROM slider WHERE slide_id = '$edit_id'";

		$run_edit = mysqli_query($con,$get_slide);

		$row_edit = mysqli_fetch_array($run_edit);

		$slide_id = $row_edit["slide_id"];

		$slide_name = $row_edit["slide_name"];		

		$slide_image = $row_edit["slide_image"];

	}

?>


<?php 
	include("includes/db.php");

	if (isset($_POST["update"])) {
	 	$slide_name = $_POST["slide_name"];

	 	$slide_image = $_FILES["slide_image"]["name"];

	 	$temp_name = $_FILES["slide_image"]["tmp_name"];

	 	move_uploaded_file($temp_name, "slides_images/$slide_image");


	 	$update_slide = "UPDATE slider SET slide_name='$slide_name',slide_image='$slide_image' WHERE slide_id='$slide_id'";

	 	$run_slide = mysqli_query($con,$update_slide);

	 	if ($run_slide) {
			echo "<script>alert('Slide has been updated')</script>";
			echo "<script>window.open('index.php?view_slides','_self');</script>";
		}else{
			echo "<script>alert('Slide updation was not successful')</script>";
			echo "<script>window.open('index.php?view_slides','_self');</script>";

		}
	 } 
?>


		<div class="row mt-5">
			<div class="col-lg-12">
				<ol class="breadcrumb">
					<li class="breadcrumb-item">
						<a href="index.php?dashboard" style="text-decoration: none;color: #0275d8;"><i class="fas fa-tachometer-alt"></i> Dashboard </a>
					</li>

					<li class="breadcrumb-item active">
						<i class="far fa-edit"></i> Edit Slide
					</li>
				</ol>
			</div>
		</div>

		<div class="row mb-3">
			<div class="col-lg-12">

				<div class="card bg-light text-dark">
					<div class="card-header">
						<h4 class="card-title"> <i class="far fa-edit"></i> Edit Slide</h4>
					</div>
					<div class="card-body">
						<form method="post" enctype="multipart/form-data">

							<div class="form-group row"> 

								<label class="col-form-label col-md-3" for="productTitle">Slide Name</label> 

							    <div class="col-md-6">
							    	<input class="form-control" type="text" name="slide_name" id="productTitle" value="<?php echo($slide_name) ?>" required> 
							    </div>

							</div>

							


							<div class="form-group row"> 
								<label class="col-form-label col-md-3" for="productImage1">Slide Image</label>

							    <div class="col-md-6">

							    	<input class="form-control-file" type="file" name="slide_image" id="productImage1" required>

							    	<br>

							    	<img id="img_admin_view_pro_slide" src="slides_images/<?php echo($slide_image); ?>">

							    </div>
							</div>




							<div class="form-group mt-5 row">

								<label class="col-form-label col-md-3 d-none d-md-block" for="SubmitInsert"></label>

							    <div class="col-md-6">

							    	<input class="btn btn-lg btn-outline-success" style="width: 100%;" value="Update Slide" id="SubmitInsert" type="submit" name="update">

							    </div>

							</div>

						</form>
					</div>
				</div>

			</div>
		</div>

