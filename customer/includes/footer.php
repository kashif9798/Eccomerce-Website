
<div id="footer"><!-- #footer begin -->
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-6 col-md-3"> <!-- 1st Pages And User Selection col-sm-6 col-md-3 begin -->
				<h5>Pages</h5>
				<ul>
					<li><a href="../cart.php">Shopping Cart</a></li>
					<li><a href="../contact.php">Contact Us</a></li>
					<li><a href="../shop.php">Shop</a></li>
					<li><a href="my_account.php">My Account</a></li>
				</ul>
				<hr>
				<h5>User Selection</h5>
				<ul>
					<li>
						<?php 
							if (isset($_SESSION["customer_name"])) 
							{
								echo 
								"
									<a href='../logout.php'>Log Out</a>
								";
							}
							else
							{
								echo
								"
									<a href='../checkout.php'>Login</a>
								";
							}
						?>
					</li>
					<li><a <?php RegisterHrefForAcc(); ?> >Register</a></li>
				</ul>
				<hr class="d-sm-none d-md-none d-lg-none">
			</div><!-- 1st Pages And User Selection col-sm-6 col-md-3 Finish -->

			<div class="col-sm-6 col-md-3"><!-- 2nd Top Products Categories col-sm-6 col-md-3 begin -->
				<h5>Top Products Categories</h5>
				<ul>
					<?php 

							$get_p_cat = "SELECT * FROM product_categories";
							$run_p_cat = mysqli_query($con,$get_p_cat);

							while ($row_p_cat=mysqli_fetch_array($run_p_cat)) {

								$p_cat_id = $row_p_cat["p_cat_id"];
								$p_cat_title = $row_p_cat["p_cat_title"];

								echo "
									<li>

										<a href='../shop.php?p_cat=$p_cat_id'>

										$p_cat_title

										</a>

									</li>
								";
							}
						?>
				</ul>
				<hr class="d-md-none d-lg-none">
			</div><!-- 2nd Top Products Categories col-sm-6 col-md-3 Finish -->

			<div class="col-sm-6 col-md-3"><!-- 3rd Find Us col-sm-6 col-md-3 begin -->
				<h5>Find Us</h5>
				<p>
					<strong>Muhammad Kashif</strong>
					<br>Managing Director
					<br>Peshawar, Pakistan.
					<br>092-311-9941899
					<br>Qazi.kashif97@gmail.com
				</p>
				<a href="../contact.php" class="btn btn-sm btn-outline-primary">Check Our Contact Page</a>
				<hr class="d-md-none d-lg-none">
			</div><!-- 3rd Find Us col-sm-6 col-md-3 Finish -->

			<div class="col-sm-6 col-md-3"><!-- 4th Get The News & Keep in Touch col-sm-6 col-md-3 begin -->
				<h5>Get The News</h5>
				<p class="text-muted">Don't miss our latest updates.</p>
				<form action="" method="post">
					<div class="input-group">
						<input type="email" class="form-control" name="email" placeholder="Enter Your Email">
						<div class="input-group-append">
							<input type="submit" value="Subscribe" class="btn btn-sm btn-success">
						</div>
					</div>
				</form>
				<br>
				<h5>Keep In Touch</h5>
				<p class="social">
					<a href="#" class="fab fa-facebook-f fac"></a>
					<a href="#" class="fab fa-twitter twi"></a>
					<a href="#" class="fab fa-instagram ins"></a>
					<a href="#" class="fab fa-google-plus goo"></a>
					<a href="#" class="fa fa-envelope en"></a>
				</p>
			</div><!-- 4th Get The News & Keep in Touch col-sm-6 col-md-3 Finish -->
		</div>
	</div>
</div><!-- #footer finish -->
<div id="copyright">
	<div class="container-fluid">
		<div class="row">
			<div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
				<p class="float-left">&copy; 2018-<p id="showyear"></p></p>
			</div>
			<div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
				<p class="float-right">Theme By: <a href="#" id="AuthorName">Muhammad Kashif</a></p>
			</div>
		</div>
	</div>
</div>
<script>
		var d = new Date();
		document.getElementById("showyear").innerHTML = d.getFullYear();
</script>