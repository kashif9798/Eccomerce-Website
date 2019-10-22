<div class="row mt-5">
	<div class="col-lg-12">

		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="index.php?dashboard" style="text-decoration: none; color: #0275d8;"><i class="fas fa-tachometer-alt"></i> Dashboard </a>
			</li>

			<li class="breadcrumb-item active">
				<i class="fas fa-images"></i> View Slides
			</li>
		</ol>

	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		
		<div class="card">
			
			<div class="card-header">
			
			<h3 class="card-title">
				
				<i class="fas fa-images"></i> View Slides

			</h3>

			<p class="card-text lead">The total number of slides should be 4. No less, No more. so the Website flow is not disoriented.</p>	
			</div>

			<div class="card-body">
				
				<div class="table-responsive">
					
					<table class="table table-hover table-striped table-bordered" id="view_product_datatable">
						
						<thead>
							<tr>
								<th>Product ID:</th>
								<th>Product Name:</th>
								<th>Product Image:</th>
								<th>Product Delete:</th>
								<th>Product Edit:</th>
							</tr>
						</thead>

						<tbody>
							<?php 
								$i=0;

								$get_slides = "SELECT * FROM slider";

								$run_slides = mysqli_query($con,$get_slides);

								while ($row_slides = mysqli_fetch_array($run_slides)) 
								{
									$slide_id = $row_slides["slide_id"];

									$slide_name = $row_slides["slide_name"];

									$slide_image = $row_slides["slide_image"];

									$i++;
							?>
							<tr>
								<td><?php echo ($i); ?></td>

								<td id="title_admin_view_pro"><?php echo ($slide_name); ?></td>

								<td class="text-center"><img class="img_admin_view_slide" src="slides_images/<?php echo ($slide_image); ?>"></td>
					
								<td class="text-center">
									<a onclick="return confirm('Are you sure?')" class="btn btn-danger btn-sm" href="index.php?delete_slide=<?php echo ($slide_id); ?>">

										<i class="fas fa-trash"></i> Delete

									</a>
								</td>

								<td class="text-center">
									<a class="btn btn-info btn-sm" href="index.php?edit_slide=<?php echo ($slide_id); ?>">

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
