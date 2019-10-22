<div class="row mt-5">
	<div class="col-lg-12">

		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="index.php?dashboard" style="text-decoration: none; color: #0275d8;"><i class="fas fa-tachometer-alt"></i> Dashboard </a>
			</li>

			<li class="breadcrumb-item active">
				<i class="fas fa-money-check-alt"></i> View Payments
			</li>
		</ol>

	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		
		<div class="card">
			
			<div class="card-header">
			
			<h3 class="card-title">
				
				<i class="fas fa-money-check-alt"></i> View Payments

			</h3>	

			</div>

			<div class="card-body">
				
				<div class="table-responsive">
					
					<table class="table table-hover table-striped table-bordered" id="view_product_datatable">
						
						<thead>
							<tr>
								<th>No:</th>
								<th>Invoice No:</th>
								<th>Amount Paid:</th>
								<th>Method:</th>
								<th>Reference No:</th>
								<th>Payment Code:</th>
								<th>Payment Date:</th>
								<th>Delete:</th>
							</tr>
						</thead>

						<tbody>
							<?php 
								$i=0;

								$get_payments = "SELECT * FROM payments";

								$run_payments = mysqli_query($con,$get_payments);

								while ($row_payments = mysqli_fetch_array($run_payments)) 
								{
									$payment_id = $row_payments["payment_id"];

									$invoice_no = $row_payments["invoice_no"];									

									$amount = $row_payments["amount"];

									$payment_mode = $row_payments["payment_mode"];

									$ref_no = $row_payments["ref_no"];

									$code = $row_payments["code"];

									$payment_date = $row_payments["payment_date"];


									$i++;
							?>
							<tr>
								<td><?php echo ($i); ?></td>

								<td><?php echo ($invoice_no); ?></td>

								<td>$<?php echo ($amount); ?></td>

								<td><?php echo ($payment_mode); ?></td>

								<td><?php echo ($ref_no); ?></td>

								<td><?php echo ($code); ?></td>

								<td><?php echo ($payment_date); ?></td>
															
								<td>
									<a onclick="return confirm('Are you sure?')" class="btn btn-danger btn-sm" href="index.php?delete_payment=<?php echo ($payment_id); ?>">

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