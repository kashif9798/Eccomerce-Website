<?php
	$active="Shopping";
	$activeTop="Cart"; 
	include("includes/header.php");
?>
	<div id="content">
		<div class="container"> <!-- breadcrumb container Begin -->
			<div class="row">
				<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
					<ul class="breadcrumb">
						<li class="breadcrumb-item">
							<a href="index.php">Home</a>
						</li>
						<li class="breadcrumb-item active">
							Cart
						</li>
					</ul>
				</div>
			</div>
		</div><!-- breadcrumb container Finish -->
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-9" id="cart"> <!-- col-md-9 of cart begin -->

					<div class="box"> <!-- Box Div Started -->
						<form action="cart.php" method="post" enctype="multipart/form-data">

							<h1>Shopping Cart</h1>

							<p class="text-muted">You currently have <?php echo countItemsInCart(); ?> Item(s) in your cart</p>

							<div class="table-responsive">
								<table class="table table-hover">
									<thead>
										<tr>
											<th colspan="2">Product</th>
											<th>Quantity</th>
											<th>Unit Price</th>
											<th>Size</th>
											<th colspan="1">Delete</th>
											<th colspan="2">Sub-Total</th>
										</tr>
									</thead>
									<tbody>

										<?php

											$total = 0;

											$ip_add = getRealIpUser();

											$select_cart = "SELECT * FROM cart WHERE ip_add = '$ip_add'";

											$run_cart = mysqli_query($con,$select_cart);										

											while ($row_cart = mysqli_fetch_array($run_cart)) 
											{
												$pro_id = $row_cart["p_id"];

												$pro_size = $row_cart["size"];

												$pro_qty = $row_cart["qty"];

												$get_products = "SELECT * FROM products WHERE product_id = '$pro_id'";

												$run_products = mysqli_query($con,$get_products);

												while ($row_products = mysqli_fetch_array($run_products)) {

													$product_title = $row_products["product_title"];

													$product_img1 = $row_products["product_img1"];

													$only_price = $row_products["product_price"];

													$sub_total = $row_products["product_price"]*$pro_qty;

													$total += $sub_total;




										?>

										<tr>
											<td> 
												
												<a href="details.php?pro_id=<?php echo($pro_id); ?>">

													<center>
														<img src="admin_area/product_images/<?php echo($product_img1); ?>" class="img_cart" alt="Product LG G8 a">
													</center>
												</a>

											</td>

											<td>
												<a href="details.php?pro_id=<?php echo($pro_id); ?>" class="cart_Product_name">
													<?php echo($product_title); ?>
												</a>	
											</td>

											<td>
												<?php echo($pro_qty); ?>
											</td>
										
											<td>
												$<?php echo($only_price); ?>
											</td>

											<td>
												<?php echo($pro_size); ?>
											</td>

											<td>
												<div class="checkbox">
	  												<input type="checkbox" name="remove[]" value="<?php echo($pro_id) ?>">
												</div>
											</td>

											<td>
												$<?php echo($sub_total); ?>												
											</td>
										</tr>

										<?php } } ?>
									</tbody>

									<tfoot>
										<tr>
											<td colspan="5">Total</td>
											<td colspan="2">$<?php echo($total); ?></td>
										</tr>
									</tfoot>
								</table>

								<div class="box-footer">
									<div class="float-left">
										<a href="index.php" class="btn btn-outline-info mb-2">
											<i class="fa fa-chevron-left"></i> Continue Shopping
										</a>
									</div>
									<div class="float-right">
										<button type="submit" name="update" value="Update Cart" class="btn btn-outline-info mb-2 mr-1">
											<i class="fas fa-sync-alt"></i> Update Cart
										</button>
										<a href="checkout.php" class="btn btn-outline-success mb-2 mr-1">
											Proceed Checkout <i class="fa fa-chevron-right"></i>
										</a>
									</div>
								</div>
							</div>		
						</form>
					</div> <!-- Box Div Finished -->

					<?php 
						function update_cart()
						{	
							global $con;

							if (isset($_POST["update"])) 
							{
								foreach ($_POST["remove"] as $remove_id) 
								{
									$delete_product = "DELETE FROM cart WHERE p_id='$remove_id'";

									$run_delete = mysqli_query($con,$delete_product);

									if ($run_delete) 
									{
										echo("<script>window.open('cart.php','_self')</script>");
									}
								}
							} 
						}

						echo @$up_cart = update_cart();

					?>



				</div> <!-- col-md-9 of cart Finish -->

				<div class="col-md-3">
					<div id="order-summary" class="box">
						<div class="box-header">
							<h3>Order Summary</h3>
						</div>
						
						<p class="text-muted">Shipping and additional costs are calculated based on value you have entered.</p>

						<div class="table-responsive">
							<table class="table">
								<tbody>

									<tr>
										<td>Order All Sub-Total</td>
										<th>$<?php echo($total); ?></th>
									</tr>

									<tr>
										<td>Shipping And Handling</td>
										<th>$0</th>
									</tr>

									<tr>
										<td>Tax</td>
										<th>$0</th>
									</tr>

									<tr class="total">
										<td>Total</td>
										<th>$<?php echo($total); ?></th>
									</tr>

								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-md-9">
					<div id="row same-height-row"><!-- Products you may like Start-->
						<div class="row mt-3">
							<div class="col-12 col-sm-12 col-md-12 col-lg-3 col-xl-3">
								<div class="box same-height headline">
									<h4 class="text-center">Products You May Like</h4>
								</div>
							</div>

							<?php ProYouMayLike(); ?>

						</div>
					</div><!-- Products you may like Finish-->
				</div>
			</div>
		</div>
	</div>
	
	<br>
	<?php 
		include("includes/footer.php") 
	?>
</body>
</html>




