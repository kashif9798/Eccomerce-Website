<?php 
	if (isset($_GET["edit_p_cat"])) 
	{
		$edit_p_cat_id = $_GET["edit_p_cat"];

		$get_p_cat_query = "SELECT * FROM product_categories WHERE p_cat_id = '$edit_p_cat_id'";

		$run_edit = mysqli_query($con,$get_p_cat_query);

		$row_edit = mysqli_fetch_array($run_edit);

		$p_cat_id = $row_edit["p_cat_id"];

		$p_cat_title = $row_edit["p_cat_title"];		

		$p_cat_desc = $row_edit["p_cat_desc"];
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
				<i class="far fa-edit"></i> Edit Product Category
			</li>
		</ol>
	</div>
</div>

<div class="row mb-3">
	<div class="col-lg-12">

		<div class="card bg-light text-dark">


			<div class="card-header">
				<h4 class="card-title"> 
					<i class="far fa-edit"></i> Edit Product Category
				</h4>
			</div>

			<div class="card-body">

				<form method="post">

					<div class="form-group row"> 

						<label class="col-form-label col-md-3" for="productCatTitle">Product Category Title</label>

							<div class="col-md-6">
							   <input class="form-control" type="text" name="p_cat_title" id="productCatTitle" value="<?php echo($p_cat_title); ?>" required> 
							</div>
					
					</div>

					<div class="form-group row"> 

						<label class="col-form-label col-md-3" for="productCatDesc">Product Category Description</label>

							<div class="col-md-6">
							   <textarea class="form-control" name="p_cat_desc" id="productCatDesc" cols="30" rows="10">
							   	
							   	<?php echo($p_cat_desc); ?>

							   </textarea> 
							</div>
					
					</div>

					<div class="form-group mt-5 row"> 

							<div class="offset-md-3 col-md-6"> 
							  <input class="btn btn-success" style="width: 100%;" value="Submit" type="submit" name="update">
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

<?php

	if (isset($_POST["update"])) 
	{
		$p_cat_title = $_POST["p_cat_title"];

	 	$p_cat_desc = $_POST["p_cat_desc"];

	 	$update_p_cat = "UPDATE product_categories SET p_cat_title='$p_cat_title',p_cat_desc='$p_cat_desc' WHERE p_cat_id = '$edit_p_cat_id'";

	 	$run_p_cat = mysqli_query($con,$update_p_cat);

	 	if ($run_p_cat) 
	 	{
			echo "<script>alert('Product Category has been updated successfully')</script>";
			echo "<script>window.open('index.php?view_p_cats','_self');</script>";
		}
		else
		{
			echo "<script>alert('Product Category updation was not successful')</script>";
			echo "<script>window.open('index.php?view_p_cats','_self');</script>";
			
		}
	}
?>
