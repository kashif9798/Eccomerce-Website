<?php 
		$customer_email = $_SESSION["customer_email"];

		$customer_name = $_SESSION["customer_name"];

		$get_customer = "SELECT * FROM customers WHERE customer_email = '$customer_email'";

		$run_customer = mysqli_query($con,$get_customer);

		$row_customer = mysqli_fetch_array($run_customer);

		$customer_image = $row_customer["customer_image"];
?>
<div class="card bg-light text-dark">

	<img src="customer_images/<?php echo ($customer_image); ?>" class="img-fluid card-img-top" alt="My Account profile image">

	<div class="card-body">

		<h5 align="center" class="card-title"><?php echo($customer_name); ?></h5>

		<ul class="nav nav-pills flex-column">

			<li class="nav-item links_card <?php if (isset($_GET['my_orders'])) { echo "bg-primary"; } ?>">
				<a href="my_account.php?my_orders" class="nav-link nav-link-custom-account <?php if (isset($_GET['my_orders'])) { echo "text-white"; } ?>">
					<i class="fa fa-list"></i> My Orders 
				</a>
			</li>

			<li class="nav-item links_card mt-1 <?php if (isset($_GET['pay_offline'])) { echo "bg-primary"; } ?>">
				<a href="my_account.php?pay_offline" class="nav-link nav-link-custom-account <?php if (isset($_GET['pay_offline'])) { echo "text-white"; } ?>">
					<i class="fa fa-bolt"></i> Pay Offline 
				</a>
			</li>

			<li class="nav-item links_card mt-1 <?php if (isset($_GET['edit_account'])) { echo "bg-primary"; } ?>">
				<a href="my_account.php?edit_account" class="nav-link nav-link-custom-account <?php if (isset($_GET['edit_account'])) { echo "text-white"; } ?>">
					<i class="fas fa-pencil-alt"></i> Edit Account
				</a>
			</li>

			<li class="nav-item links_card mt-1 <?php if (isset($_GET['change_pass'])) { echo "bg-primary"; } ?>">
				<a href="my_account.php?change_pass" class="nav-link nav-link-custom-account <?php if (isset($_GET['change_pass'])) { echo "text-white"; } ?>">
					<i class="fa fa-user"></i> Change Password
				</a>
			</li>

			<li class="nav-item links_card mt-1 <?php if (isset($_GET['delete_account'])) { echo "bg-primary"; } ?>">
				<a href="my_account.php?delete_account" class="nav-link nav-link-custom-account <?php if (isset($_GET['delete_account'])) { echo "text-white"; } ?>">
					<i class="fas fa-trash"></i> Delete Account
				</a>
			</li>

         <li class="nav-item links_card mt-1">
            <a href="logout.php" class="nav-link nav-link-custom-account">
               <i class="fas fa-sign-out-alt"></i> Log Out
            </a>
         </li>

		</ul>
	</div>
</div>
