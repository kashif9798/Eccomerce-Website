<div class="row mt-5">
	<div class="col-lg-12">

		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="index.php?dashboard" style="text-decoration: none; color: #0275d8;"><i class="fas fa-tachometer-alt"></i> Dashboard </a>
			</li>

			<li class="breadcrumb-item active">
				<i class="fas fa-users"></i> View Customers
			</li>
		</ol>

	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		
		<div class="card">
			
			<div class="card-header">
			
			<h3 class="card-title">
				
				<i class="fas fa-users"></i> View Customers

			</h3>	

			</div>

			<div class="card-body">
				
				<div class="table-responsive">
					
					<table class="table table-hover table-striped table-bordered" id="view_product_datatable">
						
						<thead>
							<tr>
								<th>No:</th>
								<th>Name:</th>
								<th>Image:</th>
								<th>Email:</th>
								<th>Country:</th>
								<th>City:</th>
								<th>Address:</th>
								<th>Contact:</th>
								<th>Delete:</th>
							</tr>
						</thead>

						<tbody>
							<?php 
								$i=0;

								$get_c = "SELECT * FROM customers";

								$run_c = mysqli_query($con,$get_c);

								while ($row_c = mysqli_fetch_array($run_c)) 
								{
									$c_id = $row_c["customer_id"];

									$c_name = $row_c["customer_name"];

									$c_img = $row_c["customer_image"];

									$c_email = $row_c["customer_email"];

									$c_country = $row_c["customer_country"];

									$c_city = $row_c["customer_city"];

									$c_address = $row_c["customer_address"];

									$c_contact = $row_c["customer_contact"];


									$i++;
							?>
							<tr>
								<td><?php echo ($i); ?></td>

								<td id="title_admin_view_pro"><?php echo ($c_name); ?></td>

								<td><img class="img_admin_view_pro" src="../customer/customer_images/<?php echo ($c_img); ?>"></td>

								<td><?php echo ($c_email); ?></td>

								<td><?php echo ($c_country); ?></td>

								<td><?php echo ($c_city); ?></td>

								<td><?php echo ($c_address); ?></td>

								<td><?php echo ($c_contact); ?></td>								

								<td>
									<a onclick="return confirm('Are you sure?')" class="btn btn-danger btn-sm" href="index.php?delete_customer=<?php echo ($c_id); ?>">

										<i class="fas fa-trash"></i> Delete

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