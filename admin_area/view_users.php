<div class="row mt-5">
	<div class="col-lg-12">

		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="index.php?dashboard" style="text-decoration: none; color: #0275d8;"><i class="fas fa-tachometer-alt"></i> Dashboard </a>
			</li>

			<li class="breadcrumb-item active">
				<i class="fas fa-users-cog"></i> View Users
			</li>
		</ol>

	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		
		<div class="card">
			
			<div class="card-header">
			
			<h3 class="card-title">
				
				<i class="fas fa-users-cog"></i> View Users

			</h3>	

			<p class="lead">At least one Admin should remain in the table</p>

			</div>

			<div class="card-body">
				
				<div class="table-responsive">
					
					<table class="table table-hover table-striped table-bordered" id="view_product_datatable">
						
						<thead>
							<tr>
								<th>No:</th>
								<th>User Name:</th>
								<th>User Image:</th>
								<th>User Email:</th>
								<th>User Country:</th>
								<th>User Job:</th>
								<th>User Contact:</th>
								<th>Delete:</th>
								<th>Edit:</th>
							</tr>
						</thead>

						<tbody>
							<?php 
								$i=0;

								$get_Users = "SELECT * FROM admins";

								$run_Users = mysqli_query($con,$get_Users);

								$count_Users = mysqli_num_rows($run_Users);

								while ($row_Users = mysqli_fetch_array($run_Users))  
								{
									$User_id = $row_Users["admin_id"];

									$User_name = $row_Users["admin_name"];

									$User_img = $row_Users["admin_image"];

									$User_email = $row_Users["admin_email"];

									$User_country = $row_Users["admin_country"];

									$User_job = $row_Users["admin_job"];

									$User_contact = $row_Users["admin_contact"];


									$i++;
							?>
							<tr>
								<td><?php echo ($i); ?></td>

								<td id="title_admin_view_pro"><?php echo ($User_name); ?></td>

								<td><img class="img_admin_view_pro" src="admin_images/<?php echo ($User_img); ?>"></td>

								<td><?php echo ($User_email); ?></td>

								<td><?php echo ($User_country); ?></td>

								<td><?php echo ($User_job); ?></td>

								<td><?php echo ($User_contact); ?></td>								

								<td>
									<?php Disable_delete_1_user(); ?>
								</td>

								<td>
									<a class="btn btn-info btn-sm" href="index.php?user_profile=<?php echo ($User_id); ?>">

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
<?php 
	function Disable_delete_1_user()
	{	
		global $count_Users;
		global $User_id;

		if ($count_Users=='1') 
		{
			echo "

				<a class='btn btn-danger btn-sm disabled' >

					<i class='fas fa-trash'></i> Delete

				</a>


			";
		}
		else
		{

			echo "

				<a href='index.php?delete_user=$User_id' onclick=\"return confirm('Are you sure?')\" class='btn btn-danger btn-sm' >

					<i class='fas fa-trash'></i> Delete

				</a>


			";
		}
	}
?>