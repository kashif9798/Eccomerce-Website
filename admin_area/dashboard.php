<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header pl-3 display-4 pt-5">Dashboard</h1>

			<ul class="breadcrumb pl-5">
				<li class="breadcrumb-item active">
					<i class="fas fa-tachometer-alt"></i> Dashboard
				</li>
			</ul>
	</div>
</div>

<div class="row">

	<div class="col-md-6 col-lg-3 mt-4">

    	<div class="card">

     		<div class="card-body bg-primary text-light">
       				<div class="float-left">
       					<i class="fas fa-tags fa-4x"></i>
       				</div>
       				<div class="card-title text-right float-right">
       					<div class="huge">
       						<?php echo $count_products; ?>
                </div>
       					<div>Products</div>       					
       				</div>
      		</div>

      		<a href="index.php?view_products" class="btn-outline-primary">
      				<div class="card-footer">
      					<span class="float-left">
      						View Details
      					</span>

      					<span class="float-right">
      						<i class="fa fa-arrow-circle-right"></i>
      					</span>

      					<div class="clearfix"></div>
    				</div>
    		</a>

    	</div>

	</div>


	<div class="col-md-6 col-lg-3 mt-4">

    	<div class="card">

     		<div class="card-body bg-success text-light">
       				<div class="float-left">
       					<i class="fas fa-users fa-4x"></i>
       				</div>
       				<div class="card-title text-right float-right">
       					<div class="huge">
       						<?php echo $count_customers; ?>
                </div>
       					<div>Customers</div>       					
       				</div>
      		</div>

      		<a href="index.php?view_customers" class="btn-outline-success">
      				<div class="card-footer">
      					<span class="float-left">
      						View Details
      					</span>

      					<span class="float-right">
      						<i class="fa fa-arrow-circle-right"></i>
      					</span>

      					<div class="clearfix"></div>
    				</div>
    		</a>

    	</div>
    	
	</div>


	<div class="col-md-6 col-lg-3 mt-4">

    	<div class="card">

     		<div class="card-body  bg-danger text-light">
       				<div class="float-left">
       					<i class="fas fa-tshirt fa-4x"></i>
       				</div>
       				<div class="card-title text-right float-right">
       					<div class="huge">
       						<?php echo $count_p_categories; ?>
                </div>
       					<div>Product Categories</div>
       				</div>
      		</div>

      		<a href="index.php?view_p_cats" class="btn-outline-danger">
      				<div class="card-footer">
      					<span class="float-left">
      						View Details
      					</span>

      					<span class="float-right">
      						<i class="fa fa-arrow-circle-right"></i>
      					</span>

      					<div class="clearfix"></div>
    				</div>
    		</a>

    	</div>
    	
	</div>


	<div class="col-md-6 col-lg-3 mt-4">

    	<div class="card">

     		<div class="card-body bg-dark text-light">
       				<div class="float-left">
       					<i class="fas fa-book fa-4x"></i>
       				</div>
       				<div class="card-title text-right float-right">
       					<div class="huge">
       						<?php echo $count_pending_orders; ?>
                </div>
       					<div>Orders</div>       					
       				</div>
      		</div>

      		<a href="index.php?view_orders" class="btn-outline-dark">
      				<div class="card-footer">
      					<span class="float-left">
      						View Details
      					</span>

      					<span class="float-right">
      						<i class="fa fa-arrow-circle-right"></i>
      					</span>

      					<div class="clearfix"></div>
    				</div>
    		</a>

    	</div>
    	
	</div>

</div>

<div class="row">
	
	<div class="col-lg-8 mt-5">
		
		<div class="card">
			
			<div class="card-header bg-primary text-white">
				
				<h3 class="card-title">
					
					<i class="fas fa-money-check-alt"></i> New Orders

				</h3>

			</div>


			<div class="table-responsive">
					
					<table class="table table-hover table-striped table-bordered">
						
						<thead>
							<tr>
								<th>Order No:</th>
								<th>Customer Email:</th>
								<th>Inovice No:</th>
								<th>Product ID:</th>
								<th>Product Qty:</th>
								<th>Product Size:</th>
								<th>Status:</th>
							</tr>
						</thead>

						<tbody>

              <?php 
                $i  = 0;

                $get_order = "SELECT * FROM pending_orders ORDER BY 1 DESC LIMIT 0,8";

                $run_order = mysqli_query($con,$get_order);

                while ($row_order=mysqli_fetch_array($run_order)) 
                {
                  $order_id = $row_order["order_id"];

                  $c_id = $row_order["customer_id"];

                  $invoice_no = $row_order["invoice_no"];

                  $product_id = $row_order["product_id"];

                  $qty = $row_order["qty"];

                  $size = $row_order["size"];

                  $order_status = $row_order["order_status"];

                  $i++;
              ?>

						      <tr>
								    <td><?php echo $order_id; ?></td>
								    <td>

                      <?php 
                        $get_customer = "SELECT * FROM customers WHERE customer_id = '$c_id'";

                        $run_customer = mysqli_query($con,$get_customer);

                        $row_customer = mysqli_fetch_array($run_customer);

                        $customer_email = $row_customer["customer_email"];

                        if ($customer_email=="") 
                        {
                          echo "<span style='color:red; font-weight:620;'>Account Deleted</span>";
                        }
                        else
                        {
                          echo ($customer_email);
                        }
                      ?>

                    </td>
								    <td><?php echo $invoice_no; ?></td>
								    <td><?php echo $product_id; ?></td>
								    <td><?php echo $qty; ?></td>
								    <td><?php echo $size; ?></td>
								    <td><?php echo $order_status; ?></td>
						      </tr>

              <?php } ?>

						</tbody>

					</table>

			</div>

			<a class="btn-outline-primary" href="index.php?view_orders">

				<div class="card-footer">

					<span class="float-left">
      						<i class="fas fa-book"></i> View All Orders
      				</span>

      				<span class="float-right">
      					<i class="fa fa-arrow-circle-right"></i>
      				</span>

      				<div class="clearfix"></div>

				</div>

			</a>

		</div>

	</div>

	<div class="col-lg-4 mt-5">

		<div class="card">
			<div class="card-header">
    		<img class="card-img-top rounded-circle img-fluid" src="admin_images/<?php echo $admin_image; ?>" alt="Card image"></div>

    		<div class="card-body">

      			<h4 class="card-title text-center"><?php echo $admin_name; ?></h4>

     			<p class="card-text text-center"><?php echo $admin_job; ?></p>

    		</div>

    		<div class="card-footer">

    			<div class="mb-md">
    				
    				<div class="widget-content-expanded">
    					
    					<i class="fas fa-envelope text-primary pr-1"></i> <span class="pr-4">Email:</span> <?php echo $admin_email; ?><br>

    					<i class="fas fa-globe-asia text-primary pr-1"></i> <span class="pr-2">Country:</span> <?php echo $admin_country; ?><br>

    					<i class="fas fa-phone-alt text-primary pr-1"></i> <span class="pr-2">Contact:</span> <?php echo $admin_contact; ?><br>

    				</div>

    				<hr style="margin-top: 10px;" class="dotted short">

    				<h5 class="text-muted text-center">About Me</h5>

    				<p class="text-left"><?php echo $admin_about; ?></p>

    			</div>

    		</div>

    		<a class="btn-outline-primary" href="index.php?user_profile=<?php echo $admin_id; ?>">

    			<div class="card-footer">
    				
      				<span class="float-left">
      					Profile : <?php echo $admin_name; ?>
      				</span>

      				<span class="float-right">
      					<i class="fa fa-arrow-circle-right"></i>
      				</span>

      				<div class="clearfix"></div>

    			</div>

    		</a>

		</div>

	</div>

</div>

<br><br><br>