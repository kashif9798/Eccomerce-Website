<center>
	<h1> My Orders </h1>

	<p class="lead">Your orders at one place</p>

	<p class="text-muted">If you have any questions feel free to <a id="contact_order" href="../contact.php">Contact Us</a>. Our Customer Service works <strong>24/7</strong>.</p>

</center>

<hr>

<div class="table-responsive">
	<table class="table table-bordered table-hover">
		<thead>
			<tr>
				<th>ON: </th>
				<th>Due Amount: </th>
				<th>Invoice No: </th>
				<th>Qty: </th>
				<th>Size: </th>
				<th>Order Date: </th>
				<th>Paid / Unpaid: </th>
				<th>Status: </th>
			</tr>
		</thead>

		<tbody>

			<?php 
				$customer_email = $_SESSION["customer_email"];

				$customer_name = $_SESSION["customer_name"];

				$get_customer = "SELECT * FROM customers WHERE customer_email = '$customer_email'";

				$run_customer = mysqli_query($con,$get_customer);

				$row_customer = mysqli_fetch_array($run_customer);

				$customer_id  = $row_customer["customer_id"];

				$get_orders = "SELECT * FROM customer_orders WHERE customer_id='$customer_id'";

				$run_orders = mysqli_query($con,$get_orders);

				$i = 0;

				while ($row_orders = mysqli_fetch_array($run_orders)) 
				{	
					$order_id = $row_orders["order_id"];

					$due_amount = $row_orders["due_amount"];

					$invoice_no = $row_orders["invoice_no"];

					$qty = $row_orders["qty"];

					$size = $row_orders["size"];

					$order_date = substr($row_orders["order_date"],0,11);					

					$order_status = $row_orders["order_status"];					

					$i++;

					if ($order_status=="Pending") 
					{
						$order_status = "Unpaid";
					}
					else
					{
						$order_status = "Paid";
					}
			?>

			<tr>
				<th><?php echo($i); ?></th>

				<td>$<?php echo($due_amount); ?></td>
				<td><?php echo($invoice_no); ?></td>
				<td><?php echo($qty); ?></td>
				<td><?php echo($size); ?></td>
				<td><?php echo($order_date); ?></td>
				<td><?php echo($order_status); ?></td>

				<td>
					<?php if ($order_status=="Unpaid"){ ?>

					<a href="confirm.php?order_id=<?php echo($order_id); ?>" target="_blank" class="btn btn-sm btn-outline-primary">Confirm Paid</a>

					<?php } else { ?>

						<a class="btn btn-sm btn-success text-light">Confirmed</a>

					<?php } ?>
				</td>
			</tr>

			<?php } ?>


		</tbody>
	</table>
</div>
