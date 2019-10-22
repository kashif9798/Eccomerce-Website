<nav class="navbar navbar-expand-lg bg-dark navbar-dark fixed-top">
<div class="row">
	<div class="navbar-header">

		<button type="button" class="navbar-toggler" data-toggle="collapse" data-target=".navbar-exl-collapse">

			<span class="sr-only">Toggle Navigation</span>

			<span class="navbar-toggler-icon"></span>

		</button>

		<a href="index.php?dashboard" class="navbar-brand ml-3">Admin Area</a>

	</div>



	<ul class="nav navbar-nav" id="top_admin_name">
		
		<li class="dropdown">
			<a href="#" id="admin_dropdown" class="dropdown-toggle" data-toggle="dropdown">
				<i class="fas fa-user-cog"></i> <?php echo "$admin_name"; ?> <b class="caret"></b>	
			</a>
		

			<ul class="dropdown-menu mt-2 bg-dark">

				<li class="dropdown-link-parent-li">

					<a class="dropdown-item" id="admin_dropdown_link" href="index.php?user_profile=<?php echo $admin_id; ?>">

						<i class="fas fa-user admin_dropdown_ico"></i> Profile
					
					</a>

				</li>


				<li class="dropdown-link-parent-li">

					<a class="dropdown-item" id="admin_dropdown_link" href="index.php?view_products"> 

						<i class="fas fa-tags admin_dropdown_ico"></i> Products

						<span class="badge admin_dropdown_badge"><?php echo $count_products; ?></span>
					
					</a>

				</li>


				<li class="dropdown-link-parent-li">

					<a class="dropdown-item" id="admin_dropdown_link" href="index.php?view_customers"> 

						<i class="fas fa-users admin_dropdown_ico"></i> Customers

						<span class="badge admin_dropdown_badge"><?php echo $count_customers; ?></span>
					
					</a>

				</li>

				<li class="dropdown-link-parent-li">

					<a class="dropdown-item" id="admin_dropdown_link" href="index.php?view_p_cats"> 

						<i class="fas fa-tshirt admin_dropdown_ico"></i> P-Categories

						<span class="badge admin_dropdown_badge"><?php echo $count_p_categories; ?></span>
					
					</a>

				</li>

				<li class="dropdown-divider"></li>

				<li class="dropdown-link-parent-li">

					<a class="dropdown-item" id="admin_dropdown_link" href="logout.php"> 

						<i class="fas fa-power-off admin_dropdown_ico"></i> Logout
					
					</a>

				</li>

			</ul>
		</li>

	</ul>

</div>


	<div class="collapse navbar-collapse navbar-exl-collapse">

			<ul class="navbar-nav side-nav bg-dark border-sidebar flex-column">

				<li class="nav-item">
					<a class="nav-link" href="index.php?dashboard">
						<i class="fas fa-tachometer-alt"></i> Dashboard

						<?php if ($active_arrow=="dashboard" || $active_arrow=="") 
						{
							arrow_ico();
						} ?>

					</a>
				</li>

				<li class="nav-item">

					<a class="nav-link side-bar-link" href="#" data-toggle="collapse" data-target="#products">
						<i class="fas fa-tags"></i> Products
						<i class="fas fa-caret-down"></i>

						<?php if ($active_arrow=="product") 
						{
							arrow_ico();
						} ?>

					</a>

					<ul id="products" class="collapse admin_top_nav_li" style="margin-left: -55px;">
						<li>

							<a href="index.php?insert_product" id="admin_dropdown_link" class="dropdown-item">Insert Products</a>
							
						</li>
						<li>
							
							<a href="index.php?view_products" id="admin_dropdown_link" class="dropdown-item">View Products</a>
							
						</li>

					</ul>
				</li>

				<li class="nav-item">

					<a class="nav-link side-bar-link" href="#" data-toggle="collapse" data-target="#p_cat">
						<i class="fas fa-tshirt"></i> P-Categories
						<i class="fas fa-caret-down"></i>

						<?php if ($active_arrow=="p_cat") 
						{
							arrow_ico();
						} ?>


					</a>

					<ul id="p_cat" class="collapse admin_top_nav_li" style="margin-left: -55px;">
						<li>

							<a href="index.php?insert_p_cat" id="admin_dropdown_link" class="dropdown-item">Insert Product Category</a>
							
						</li>
						<li>
							
							<a href="index.php?view_p_cats" id="admin_dropdown_link" class="dropdown-item">View Product Categories</a>
							
						</li>

					</ul>
				</li>

				<li class="nav-item">

					<a class="nav-link side-bar-link" href="#" data-toggle="collapse" data-target="#cat">
						<i class="fas fa-venus-mars"></i> Categories
						<i class="fas fa-caret-down"></i>

						<?php if ($active_arrow=="cat") 
						{
							arrow_ico();
						} ?>


					</a>

					<ul id="cat" class="collapse admin_top_nav_li" style="margin-left: -55px;">
						<li>

							<a href="index.php?insert_cat" id="admin_dropdown_link" class="dropdown-item">Insert Category</a>
							
						</li>
						<li>
							
							<a href="index.php?view_cats" id="admin_dropdown_link" class="dropdown-item">View Categories</a>
							
						</li>

					</ul>
				</li>

				<li class="nav-item">

					<a class="nav-link side-bar-link" href="#" data-toggle="collapse" data-target="#slides">
						<i class="fas fa-images"></i> Slides
						<i class="fas fa-caret-down"></i>

						<?php if ($active_arrow=="slide") 
						{
							arrow_ico();
						} ?>

					</a>

					<ul id="slides" class="collapse admin_top_nav_li" style="margin-left: -55px;">
						<li>

							<a href="index.php?insert_slide" id="admin_dropdown_link" class="dropdown-item">Insert Slide</a>
							
						</li>
						<li>
							
							<a href="index.php?view_slides" id="admin_dropdown_link" class="dropdown-item">View Slides</a>
							
						</li>

					</ul>
				</li>

				<li class="nav-item">

					<a class="nav-link" href="index.php?view_customers">

						<i class="fas fa-users"></i> View Customers


						<?php if ($active_arrow=="customer") 
						{
							arrow_ico();
						} ?>


					</a>

				</li>

				<li class="nav-item">

					<a class="nav-link" href="index.php?view_orders">

						<i class="fas fa-book"></i> View Orders


						<?php if ($active_arrow=="orders") 
						{
							arrow_ico();
						} ?>


					</a>

				</li>

				<li class="nav-item">

					<a class="nav-link" href="index.php?view_payments">

						<i class="fas fa-money-check-alt"></i> View Payments

						<?php if ($active_arrow=="payments") 
						{
							arrow_ico();
						} ?>

					</a>

				</li>

				<li class="nav-item">

					<a class="nav-link side-bar-link" href="#" data-toggle="collapse" data-target="#users">
						<i class="fas fa-users-cog"></i> Users
						<i class="fas fa-caret-down"></i>

						<?php if ($active_arrow=="user") 
						{
							arrow_ico();
						} ?>


					</a>

					<ul id="users" class="collapse admin_top_nav_li" style="margin-left: -55px;">
						<li>

							<a href="index.php?insert_user" id="admin_dropdown_link" class="dropdown-item">Insert User</a>
							
						</li>
						<li>
							
							<a href="index.php?view_users" id="admin_dropdown_link" class="dropdown-item">View Users</a>
							
						</li>
						<li>
							
							<a href="index.php?user_profile=<?php echo $admin_id; ?>" id="admin_dropdown_link" class="dropdown-item">Edit User Profile</a>
							
						</li>
					</ul>
				</li>


				<li class="nav-item">

					<a class="nav-link" href="logout.php">

						<i class="fas fa-power-off"></i> Logout

					</a>

				</li>

			</ul>

	</div>


</nav>
<script>
	$('.dropdown').on('show.bs.dropdown', function(e){
  $(this).find('.dropdown-menu').first().stop(true, true).slideDown(300);
});

$('.dropdown').on('hide.bs.dropdown', function(e){
  $(this).find('.dropdown-menu').first().stop(true, true).slideUp(200);
});
</script>

<?php 
	function arrow_ico()
	{
		echo 
		"
			<div class='float-right bg-light active_sidebar_ico'>&nbsp</div>
		";
	}
?>