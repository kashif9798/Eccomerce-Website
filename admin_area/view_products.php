<div class="row mt-5">
	<div class="col-lg-12">

		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="index.php?dashboard" style="text-decoration: none; color: #0275d8;"><i class="fas fa-tachometer-alt"></i> Dashboard </a>
			</li>

			<li class="breadcrumb-item active">
				<i class="fas fa-tags"></i> View Products
			</li>
		</ol>

	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		
		<div class="card">
			
			<div class="card-header">
			
			<h3 class="card-title">
				
				<i class="fas fa-tags"></i> View Products

			</h3>	

			</div>

			<div class="card-body">
				
				<div class="table-responsive">
					
					<table class="table table-hover table-striped table-bordered" id="view_product_datatable">
						
						<thead>
							<tr>
								<th>Product ID:</th>
								<th>Product Title:</th>
								<th>Product Image:</th>
								<th>Product Price</th>
								<th>Product Sold:</th>
								<th>Product Keywords:</th>
								<th>Product Date:</th>
								<th>Product Delete:</th>
								<th>Product Edit:</th>
							</tr>
						</thead>

						<tbody>
							<?php 
								$i=0;

								$get_pro = "SELECT * FROM products";

								$run_pro = mysqli_query($con,$get_pro);

								while ($row_pro = mysqli_fetch_array($run_pro)) 
								{
									$pro_id = $row_pro["product_id"];

									$pro_title = $row_pro["product_title"];

									$pro_img1 = $row_pro["product_img1"];

									$pro_price = $row_pro["product_price"];

									$pro_keywords = $row_pro["product_keywords"];

									$pro_date = $row_pro["date"];

									$i++;
							?>
							<tr>
								<td><?php echo ($i); ?></td>

								<td id="title_admin_view_pro"><?php echo ($pro_title); ?></td>

								<td><img class="img_admin_view_pro" src="product_images/<?php echo ($pro_img1); ?>"></td>

								<td>$<?php echo ($pro_price); ?></td>

								<td>
									
									<?php 

										$get_sold = "SELECT * FROM pending_orders WHERE product_id = '$pro_id '";

										$run_sold = mysqli_query($con,$get_sold);

										$count = mysqli_num_rows($run_sold);

										echo ($count);
									?>

								</td>

								<td><?php echo ($pro_keywords); ?></td>

								<td><?php echo ($pro_date); ?></td>

								<td>
									<a onclick="return confirm('Are you sure?')" class="btn btn-danger btn-sm" href="index.php?delete_product=<?php echo ($pro_id); ?>">

										<i class="fas fa-trash"></i> Delete

									</a>
								</td>

								<td>
									<a class="btn btn-info btn-sm" href="index.php?edit_product=<?php echo ($pro_id); ?>">

										<i class="far fa-edit"></i> Edit

									</a>
								</td>

							</tr>

							<?php } ?>
						</tbody>
					</table>
				</div>

			</div>

		</div>

	</div>
</div>
<script>
	$(document).ready(function(){
		$("#view_product_datatable").DataTable();
	});
</script>