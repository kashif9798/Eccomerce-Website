<div class="row mt-5">
	<div class="col-lg-12">

		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="index.php?dashboard" style="text-decoration: none; color: #0275d8;"><i class="fas fa-tachometer-alt"></i> Dashboard </a>
			</li>

			<li class="breadcrumb-item active">
				<i class="fas fa-book"></i> View Orders
			</li>
		</ol>

	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		
		<div class="card">
			
			<div class="card-header">
			
			<h3 class="card-title">
				
				<i class="fas fa-book"></i> View Orders

			</h3>	

			</div>

			<div class="card-body">
				
				<div class="table-responsive">
					
					<table class="table table-hover table-striped table-bordered" id="view_product_datatable">
						
						<thead>
							<tr>
								<th>No:</th>
								<th>Customer Email:</th>
								<th>Invoice No:</th>
								<th>Product Name:</th>
								<th>Product Qty:</th>
								<th>Product Size:</th>
								<th>Order Date:</th>
								<th>Total Amount:</th>
								<th>Status:</th>
								<th>Delete:</th>
							</tr>
						</thead>

						<tbody>
							<?php 
								$i=0;

								$get_orders = "SELECT * FROM pending_orders";

								$run_orders = mysqli_query($con,$get_orders);

								while ($row_orders = mysqli_fetch_array($run_orders)) 
								{
									$order_id = $row_orders["order_id"];

									$c_id = $row_orders["customer_id"];									

									$invoice_no = $row_orders["invoice_no"];

									$product_id = $row_orders["product_id"];

									$qty = $row_orders["qty"];

									$size = $row_orders["size"];

									$order_status = $row_orders["order_status"];



									$get_products = "SELECT * FROM products WHERE product_id='$product_id'";

									$run_products = mysqli_query($con,$get_products);

									$row_products = mysqli_fetch_array($run_products);

									$product_title = $row_products["product_title"];



									$get_customers = "SELECT * FROM customers WHERE customer_id='$c_id'";

									$run_customers = mysqli_query($con,$get_customers);

									$row_customers = mysqli_fetch_array($run_customers);

									$customer_email = $row_customers["customer_email"];

									if ($customer_email=="") 
                        			{
                          				$customer_email= "<span style='color:red; font-weight:620;'>Account Deleted</span>";
                        			}
                        			else
                        			{
                          				$customer_email= ($customer_email);
                        			}




                        			$get_c_order = "SELECT * FROM customer_orders WHERE order_id='$order_id'";

									$run_c_order = mysqli_query($con,$get_c_order);

									$row_c_order = mysqli_fetch_array($run_c_order);

									$order_date = $row_c_order["order_date"];

									$order_amount = $row_c_order["due_amount"];


									$i++;
							?>
							<tr>
								<td><?php echo ($i); ?></td>

								<td><?php echo ($customer_email); ?></td>

								<td><?php echo ($invoice_no); ?></td>

								<td><?php echo ($product_title); ?></td>

								<td><?php echo ($qty); ?></td>

								<td><?php echo ($size); ?></td>

								<td><?php echo ($order_date); ?></td>

								<td>$<?php echo ($order_amount); ?></td>

								<td><?php echo ($order_status); ?></td>																
								<td>
									<a onclick="return confirm('Are you sure?')" class="btn btn-danger btn-sm" href="index.php?delete_order=<?php echo ($order_id); ?>">

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