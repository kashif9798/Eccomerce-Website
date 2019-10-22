<div class="row mt-5">
	<div class="col-lg-12">

		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="index.php?dashboard" style="text-decoration: none; color: #0275d8;"><i class="fas fa-tachometer-alt"></i> Dashboard </a>
			</li>

			<li class="breadcrumb-item active">
				<i class="fas fa-tshirt"></i> View Product Categories
			</li>
		</ol>

	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		
		<div class="card">
			
			<div class="card-header">
			
			<h3 class="card-title">
				 
				<i class="fas fa-tshirt"></i> View Product Categories

			</h3>	

			</div>

			<div class="card-body">
				
				<div class="table-responsive">
					
					<table class="table table-hover table-striped table-bordered" id="view_product_datatable">
						
						<thead>
							<tr>
								<th>Product Category ID:</th>
								<th>Product Category Title:</th>
								<th>Product Category Desc:</th>
								<th>Delete Product Category:</th>
								<th>Edit Product Category:</th>
							</tr>
						</thead>

						<tbody>
							<?php 
								$i=0;

								$get_p_cats = "SELECT * FROM product_categories";

								$run_p_cats = mysqli_query($con,$get_p_cats);

								while ($row_p_cats = mysqli_fetch_array($run_p_cats)) 
								{
									$p_cat_id = $row_p_cats["p_cat_id"];

									$p_cat_title = $row_p_cats["p_cat_title"];

									$p_cat_desc = $row_p_cats["p_cat_desc"];

									$i++;
							?>
							<tr>

								<td><?php echo ($p_cat_id); ?></td>

								<td><?php echo ($p_cat_title); ?></td>

								<td><?php echo ($p_cat_desc); ?></td>								

								<td>
									<a onclick="return confirm('Are you sure?')" class="btn btn-danger btn-sm" href="index.php?delete_p_cat=<?php echo ($p_cat_id); ?>">

										<i class="fas fa-trash"></i> Delete

									</a>
								</td>

								<td>
									<a class="btn btn-info btn-sm" href="index.php?edit_p_cat=<?php echo ($p_cat_id); ?>">

										<i class="far fa-edit"></i> Edit

									</a>
								</td>

							</tr>

							<?php } ?>
						</tbody>

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