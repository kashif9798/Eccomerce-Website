<?php

	if (isset($_POST["submit"])) 
	{
		$slide_name = $_POST["slide_name"];

	 	$slide_image = $_FILES["slide_image"]["name"];

	 	$temp_name = $_FILES["slide_image"]["tmp_name"];

	 	$view_slides = "SELECT * FROM slider";

	 	$view_run_slide	= mysqli_query($con,$view_slides);

	 	$count = mysqli_num_rows($view_run_slide);

	 	if ($count<4) 
	 	{	
	 		move_uploaded_file($temp_name,"slides_images/$slide_image");	 	

	 		$insert_slide = "INSERT INTO slider (slide_name,slide_image) VALUES ('$slide_name','$slide_image')";

	 		$run_slide = mysqli_query($con,$insert_slide);

	 		if ($run_slide) 
	 		{
				echo "<script>alert('Slide has been inserted successfully')</script>";
				echo "<script>window.open('index.php?view_slides','_self');</script>";
			}
			else
			{
				echo "<script>alert('Slide Insertion was not successful')</script>";
				echo "<script>window.open('index.php?insert_slide','_self');</script>";
			}
		}

		else
		{
			echo "<script>alert('You have already inserted 4 slides')</script>";
			echo "<script>window.open('index.php?view_slides','_self');</script>";		
		}
	}

?>

<div class="row mt-5">
	<div class="col-lg-12">
		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="index.php?dashboard" style="text-decoration: none;color: #0275d8;">
					<i class="fas fa-tachometer-alt"></i> Dashboard 
				</a>
			</li>

			<li class="breadcrumb-item active">
				<i class="far fa-plus-square"></i> Insert Slide
			</li>
		</ol>
	</div>
</div>

<div class="row mb-3">
	<div class="col-lg-12">

		<div class="card bg-light text-dark">


			<div class="card-header">
				<h4 class="card-title"> 
					<i class="far fa-plus-square"></i> Insert Slide
				</h4>
			</div>

			<div class="card-body">

				<form method="post" enctype="multipart/form-data">

					<div class="form-group row"> 

						<label class="col-form-label col-md-3" for="Title">Slide Name</label>

							<div class="col-md-6">
							   <input class="form-control" type="text" name="slide_name" id="Title" required> 
							</div>
					
					</div>

					<div class="form-group row"> 

						<label class="col-form-label col-md-3" for="slide-image">Slide Image</label>

							<div class="col-md-6">
							   <input class="form-control-file" type="file" name="slide_image" id="slide-image">
							</div>
					
					</div>

					<div class="form-group mt-5 row"> 

							<div class="offset-md-3 col-md-6"> 
							  <input class="btn btn-success" style="width: 100%;" value="Submit" type="submit" name="submit">
							</div>
					
					</div>

				</form>

			</div>


		</div>

	</div>
</div>
