<?php 
	if (isset($_GET["edit_cat"])) 
	{
		$edit_cat_id = $_GET["edit_cat"];

		$get_cat_query = "SELECT * FROM categories WHERE cat_id = '$edit_cat_id'";

		$run_edit = mysqli_query($con,$get_cat_query);

		$row_edit = mysqli_fetch_array($run_edit);

		$cat_id = $row_edit["cat_id"];

		$cat_title = $row_edit["cat_title"];		

		$cat_desc = $row_edit["cat_desc"];
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
				<i class="far fa-edit"></i> Edit Category
			</li>
		</ol>
	</div>
</div>

<div class="row mb-3">
	<div class="col-lg-12">

		<div class="card bg-light text-dark">


			<div class="card-header">
				<h4 class="card-title"> 
					<i class="far fa-edit"></i> Edit Category
				</h4>
			</div>

			<div class="card-body">

				<form method="post">

					<div class="form-group row"> 

						<label class="col-form-label col-md-3" for="productCatTitle">Category Title</label>

							<div class="col-md-6">
							   <input class="form-control" type="text" name="cat_title" id="productCatTitle" value="<?php echo($cat_title); ?>" required> 
							</div>
					
					</div>

					<div class="form-group row"> 

						<label class="col-form-label col-md-3" for="productCatDesc">Category Description</label>

							<div class="col-md-6">
							   <textarea class="form-control" name="cat_desc" id="productCatDesc" cols="30" rows="10">
							   	
							   	<?php echo($cat_desc); ?>

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
		$cat_title = $_POST["cat_title"];

	 	$cat_desc = $_POST["cat_desc"];

	 	$update_cat = "UPDATE categories SET cat_title='$cat_title',cat_desc='$cat_desc' WHERE cat_id = '$cat_id'";

	 	$run_p_cat = mysqli_query($con,$update_cat);

	 	if ($run_p_cat) 
	 	{
			echo "<script>alert('Category has been updated successfully')</script>";
			echo "<script>window.open('index.php?view_cats','_self');</script>";
		}
		else
		{
			echo "<script>alert('Category updation was not successful')</script>";
			echo "<script>window.open('index.php?view_cats','_self');</script>";
		}
	}
?>
