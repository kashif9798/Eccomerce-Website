<?php 
	
	if (isset($_GET["edit_product"])) 
	{
		$edit_id = $_GET["edit_product"];

		$get_p = "SELECT * FROM products WHERE product_id = '$edit_id'";

		$run_edit = mysqli_query($con,$get_p);

		$row_edit = mysqli_fetch_array($run_edit);

		$p_id = $row_edit["product_id"];

		$p_title = $row_edit["product_title"];		

		$p_cat = $row_edit["p_cat_id"];

		$cat = $row_edit["cat_id"];

		$p_image1 = $row_edit["product_img1"];

		$p_image2 = $row_edit["product_img2"];

		$p_image3 = $row_edit["product_img3"];

		$p_price = $row_edit["product_price"];

		$p_keywords = $row_edit["product_keywords"];

		$p_desc = $row_edit["product_desc"];

	}

	$get_p_cat = "SELECT * FROM product_categories WHERE p_cat_id = '$p_cat'";

	$run_p_cat = mysqli_query($con,$get_p_cat);

	$row_p_cat = mysqli_fetch_array($run_p_cat);

	$p_cat_title = $row_p_cat["p_cat_title"];


	$get_cat = "SELECT * FROM categories WHERE cat_id = '$cat'";

	$run_cat = mysqli_query($con,$get_cat);

	$row_cat = mysqli_fetch_array($run_cat);

	$cat_title = $row_cat["cat_title"];

?>


<?php 
	include("includes/db.php");

	if (isset($_POST["update"])) {
	 	$product_title = $_POST["product_title"];
	 	$product_cat = $_POST["product_cat"];
	 	$cat = $_POST["cat"];
	 	$product_price = $_POST["product_price"];
	 	$product_keywords = $_POST["product_keywords"];
	 	$product_desc = $_POST["product_desc"];

	 	$product_img1 = $_FILES["product_img1"]["name"];
	 	$product_img2 = $_FILES["product_img2"]["name"];
	 	$product_img3 = $_FILES["product_img3"]["name"];

	 	$temp_name1 = $_FILES["product_img1"]["tmp_name"];
	 	$temp_name2 = $_FILES["product_img2"]["tmp_name"];
	 	$temp_name3 = $_FILES["product_img3"]["tmp_name"];

	 	move_uploaded_file($temp_name1, "product_images/$product_img1");
	 	move_uploaded_file($temp_name2, "product_images/$product_img2");
	 	move_uploaded_file($temp_name3, "product_images/$product_img3");

	 	$update_product = "UPDATE products SET p_cat_id='$product_cat',cat_id='$cat',date=NOW(),product_title='$product_title',product_img1='$product_img1',product_img2='$product_img2',product_img3='$product_img3',product_price='$product_price',product_keywords='$product_keywords',product_desc='$product_desc' WHERE product_id='$p_id'";

	 	$run_product = mysqli_query($con,$update_product);

	 	if ($run_product) {
			echo "<script>alert('Product has been updated')</script>";
			echo "<script>window.open('index.php?view_products','_self');</script>";
		}else{
			echo "<script>alert('Product updation was not successful')</script>";
			echo "<script>window.open('index.php?view_products','_self');</script>";

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
						<i class="far fa-edit"></i> Edit Product
					</li>
				</ol>
			</div>
		</div>

		<div class="row mb-3">
			<div class="col-lg-12">

				<div class="card bg-light text-dark">
					<div class="card-header">
						<h4 class="card-title"> <i class="far fa-edit"></i> Edit Product</h4>
					</div>
					<div class="card-body">
						<form method="post" enctype="multipart/form-data">
							<div class="form-group row"> 
								<label class="col-form-label col-md-3" for="productTitle">Product Title</label> 
							    <div class="col-md-6">
							    	<input class="form-control" type="text" name="product_title" id="productTitle" value="<?php echo($p_title) ?>" required> 
							    </div>
							</div>

							<div class="form-group row"> 
								<label class="col-form-label col-md-3" for="productCategory">Product Category</label> 
							    <div class="col-md-6">
							    	<select class="form-control" name="product_cat" id="productCategory">

							    		<option value="<?php echo($p_cat) ?>"> <?php echo($p_cat_title) ?> </option>
							    		<?php 

							    		$get_p_cat = "SELECT * FROM product_categories";

							    		$run_p_cat = mysqli_query($con,$get_p_cat);

							    		while ($row_p_cat=mysqli_fetch_array($run_p_cat)) {

							    			$p_cat_id = $row_p_cat["p_cat_id"];
							    			$p_cat_title = $row_p_cat["p_cat_title"];

							    			echo "

							    				<option value='$p_cat_id'> $p_cat_title </option>


							    			";

							    		}

							    		?>
							    	</select> 
							    </div>
							</div>

							<div class="form-group row"> 
								<label class="col-form-label col-md-3" for="Category">Category</label> 
							    <div class="col-md-6">
							    	<select class="form-control" name="cat" id="Category">
							    		<option value="<?php echo($cat) ?>"> <?php echo($cat_title) ?> </option>
							    		<?php 

							    		$get_cat = "SELECT * FROM categories";

							    		$run_cat = mysqli_query($con,$get_cat);

							    		while ($row_cat=mysqli_fetch_array($run_cat)) {

							    			$cat_id = $row_cat["cat_id"];
							    			$cat_title = $row_cat["cat_title"];

							    			echo "

							    				<option value='$cat_id'> $cat_title </option>


							    			";

							    		}

							    		?>
							    	</select> 
							    </div>
							</div>

							<div class="form-group row"> 
								<label class="col-form-label col-md-3" for="productImage1">Product Image 1</label> 
							    <div class="col-md-6">
							    	<input class="form-control-file" type="file" name="product_img1" id="productImage1" required>
							    	<br>
							    	<img id="img_admin_view_pro_edit" src="product_images/<?php echo($p_image1); ?>"> 
							    </div>
							</div>

							<div class="form-group row"> 
								<label class="col-form-label col-md-3" for="productImage2">Product Image 2</label> 
							    <div class="col-md-6">
							    	<input class="form-control-file" type="file" name="product_img2" id="productImage2" required> 
							    	<br>
							    	<img id="img_admin_view_pro_edit" src="product_images/<?php echo($p_image2); ?>"> 
							    </div>
							</div>

							<div class="form-group row"> 
								<label class="col-form-label col-md-3" for="productImage3">Product Image 3</label> 
							    <div class="col-md-6">
							    	<input class="form-control-file" type="file" name="product_img3" id="productImage3" required>
							    	<br>
							    	<img id="img_admin_view_pro_edit" src="product_images/<?php echo($p_image3); ?>">  
							    </div>
							</div>

							<div class="form-group row"> 
								<label class="col-form-label col-md-3" for="productPrice">Product Price</label> 
							    <div class="col-md-6">
							    	<input class="form-control" type="text" name="product_price" id="productPrice" value="<?php echo($p_price) ?>" required> 
							    </div>
							</div>

							<div class="form-group row"> 
								<label class="col-form-label col-md-3" for="productKeywords">Product Keywords</label> 
							    <div class="col-md-6">
							    	<input class="form-control" type="text" name="product_keywords" id="productKeywords" value="<?php echo($p_keywords) ?>" required> 
							    </div>
							</div>

							<div class="form-group row"> 
								<label class="col-form-label col-md-3" for="productDesc">Product Description</label> 
							    <div class="col-md-6">
							    	<textarea class="form-control" name="product_desc" id="productDesc" cols="19" rows="6">
							    		<?php echo($p_desc) ?>
							    	</textarea> 
							    </div>
							</div>

							<div class="form-group mt-5 row">
								<label class="col-form-label col-md-3 d-none d-md-block" for="SubmitInsert"></label>   
							    <div class="col-md-6">
							    	<input class="btn btn-lg btn-outline-success" style="width: 100%;" value="Update Product" id="SubmitInsert" type="submit" name="update"> 
							    </div>
							</div>

						</form>
					</div>
				</div>

			</div>
		</div>


<script>
	tinymce.init({
    	selector: '#productDesc'
	});
 </script>
