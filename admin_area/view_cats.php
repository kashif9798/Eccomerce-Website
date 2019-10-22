<div class="row mt-5">
	<div class="col-lg-12">

		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="index.php?dashboard" style="text-decoration: none; color: #0275d8;"><i class="fas fa-tachometer-alt"></i> Dashboard </a>
			</li>

			<li class="breadcrumb-item active">
				<i class="fas fa-venus-mars"></i> View Categories
			</li>
		</ol>

	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		
		<div class="card">
			
			<div class="card-header">
			
			<h3 class="card-title">
				 
				<i class="fas fa-venus-mars"></i> View Categories

			</h3>	

			</div>

			<div class="card-body">
				
				<div class="table-responsive">
					
					<table class="table table-hover table-striped table-bordered" id="view_product_datatable">
						
						<thead>
							<tr>
								<th>Category ID:</th>
								<th>Category Title:</th>
								<th>Category Desc:</th>
								<th>Delete Category:</th>
								<th>Edit Category:</th>
							</tr>
						</thead>

						<tbody>
							<?php 
								$i=0;

								$get_cats = "SELECT * FROM categories";

								$run_cats = mysqli_query($con,$get_cats);

								while ($row_cats = mysqli_fetch_array($run_cats)) 
								{
									$cat_id = $row_cats["cat_id"];

									$cat_title = $row_cats["cat_title"];

									$cat_desc = $row_cats["cat_desc"];

									$i++;
							?>
							<tr>

								<td><?php echo ($cat_id); ?></td>

								<td><?php echo ($cat_title); ?></td>

								<td><?php echo ($cat_desc); ?></td>								

								<td>
									<a onclick="return confirm('Are you sure?')" class="btn btn-danger btn-sm" href="index.php?delete_cat=<?php echo ($cat_id); ?>">

										<i class="fas fa-trash"></i> Delete

									</a>
								</td>

								<td>
									<a class="btn btn-info btn-sm" href="index.php?edit_cat=<?php echo ($cat_id); ?>">

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