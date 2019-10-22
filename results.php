<?php
	$active="Home";
	$activeTop="";
	include("includes/header.php");
?>
<?php 
	if (isset($_GET["result_query"])) 
	{
		$result_query = $_GET["result_query"];
	}
?>



	<div class="container"> <!-- breadcrumb container Begin -->
			<div class="row">
				<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
					<ul class="breadcrumb">
						<li class="breadcrumb-item">
							<a href="index.php">Home</a>
						</li>
						<li class="breadcrumb-item active">
							Result
						</li>
					</ul>
				</div>
			</div>
		</div><!-- breadcrumb container Finish -->
	</div>


	<div class="container"> <!-- breadcrumb container Begin -->
		<div class="row">
			<h3 class="d-inline">Search Results of: <span style="font-weight: 400;color: #0275d8;"><?php echo ($result_query); ?></span></h3>
			<div class="mt-3 table-responsive">
					
					<table class="table table-hover table-striped table-bordered" id="view_product_datatable">
						
						<thead>
							<tr>
								<th>Product Title:</th>
								<th>Product Image:</th>
								<th>Detail:</th>
							</tr>
						</thead>

						<tbody>
							<?php 

								$get_pro = "SELECT product_id,product_title,product_img1,product_keywords FROM products WHERE product_title LIKE '%$result_query%' || product_keywords LIKE '%$result_query%'";

								$run_pro = mysqli_query($con,$get_pro);

								while ($row_pro = mysqli_fetch_array($run_pro)) 
								{
									$pro_id = $row_pro["product_id"];

									$pro_title = $row_pro["product_title"];

									$pro_img1 = $row_pro["product_img1"];

							?>
							
							<tr>

								<td id="title_admin_view_pro">

									<a href="details.php?pro_id=<?php echo ($pro_id); ?>" id="result_title">

										<?php echo ($pro_title); ?>

									</a>

								</td>

								<td>
									<a href="details.php?pro_id=<?php echo ($pro_id); ?>">

										<img class="img_admin_view_pro" src="admin_area/product_images/<?php echo ($pro_img1); ?>">

									</a>
								</td>

								<td>
									<a class="btn btn-primary btn-sm" href="details.php?pro_id=<?php echo ($pro_id); ?>">

										View Details

									</a>
								</td>
								
							</tr>
							

							<?php } ?>
						</tbody>
					</table>
			</div>
		</div>
	</div>





	<br>
	<?php 
		include("includes/footer.php") 
	?>
</body>
</html>

