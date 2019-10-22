<?php

	if (isset($_POST["submit"])) 
	{
		$p_cat_title = $_POST["p_cat_title"];

	 	$p_cat_desc = $_POST["p_cat_desc"];

	 	$insert_p_cat = "INSERT INTO product_categories (p_cat_title,p_cat_desc) VALUES ('$p_cat_title','$p_cat_desc')";

	 	$run_p_cat = mysqli_query($con,$insert_p_cat);

	 	if ($run_p_cat) 
	 	{
			echo "<script>alert('Product Category has been inserted successfully')</script>";
			echo "<script>window.open('index.php?view_p_cats','_self');</script>";
		}
		else
		{
			echo "<script>alert('Product Category Insertion was not successful')</script>";
			echo "<script>window.open('index.php?insert_p_cats','_self');</script>";
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
				<i class="far fa-plus-square"></i> Insert Product Category
			</li>
		</ol>
	</div>
</div>

<div class="row mb-3">
	<div class="col-lg-12">

		<div class="card bg-light text-dark">


			<div class="card-header">
				<h4 class="card-title"> 
					<i class="far fa-plus-square"></i> Insert Product Category
				</h4>
			</div>

			<div class="card-body">

				<form method="post">

					<div class="form-group row"> 

						<label class="col-form-label col-md-3" for="productCatTitle">Product Category Title</label>

							<div class="col-md-6">
							   <input class="form-control" type="text" name="p_cat_title" id="productCatTitle" required> 
							</div>
					
					</div>

					<div class="form-group row"> 

						<label class="col-form-label col-md-3" for="productCatDesc">Product Category Title</label>

							<div class="col-md-6">
							   <textarea class="form-control" name="p_cat_desc" id="productCatDesc" cols="30" rows="10"></textarea> 
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
<script>
	tinymce.init({
    	selector: '#productCatDesc'
	});
</script>