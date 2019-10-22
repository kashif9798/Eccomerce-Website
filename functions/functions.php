<?php 

$db = mysqli_connect("localhost","id11284522_root","Thekille123@","id11284522_ecom_store");






function getRealIpUser()
{
	switch (true) {
		case (!empty($_SERVER["HTTP_X_REAL_IP"])): return $_SERVER["HTTP_X_REAL_IP"];
		case (!empty($_SERVER["HTTP_CLIENT_IP"])): return $_SERVER["HTTP_CLIENT_IP"];
		case (!empty($_SERVER["HTTP_X_FORWARDED_FOR"])): return $_SERVER["HTTP_X_FORWARDED_FOR"];

		default : return $_SERVER["REMOTE_ADDR"];
		
	}
}






function add_cart()
{
	global $db;

	if (isset($_GET["add_cart"])) 
	{
		$ip_add = getRealIpUser();

		$p_id = $_GET["add_cart"];

		$product_qty = $_POST["product_qty"];

		$product_size = $_POST["product_size"];

		$check_product = "SELECT * FROM cart WHERE ip_add = '$ip_add' AND p_id = $p_id AND ";

		$run_check = mysqli_query($db,$check_product);

		if (mysqli_num_rows($run_check)>0)
		{	
			echo "<script>window.open('details.php?pro_id=$p_id&msg=This product has already been added to cart ','_self');</script>";
		}
		else
		{
			$query = "INSERT INTO cart (p_id,ip_add,qty,size) VALUES ('$p_id','$ip_add','$product_qty','$product_size')";

			$run_query = mysqli_query($db,$query);

			echo "<script>window.open('details.php?pro_id=$p_id','_self');</script>";

		}

	}
}





 // getPro() started
function getPro(){

	global $db;

	$get_products = "SELECT * FROM products ORDER BY 1 DESC LIMIT 0,6";

	// ORDER BY 1 DESC or clause name Order by makes the sqli database data of products in reverse order so the the latest data when inserted in database will be inserted last but the order by clause will make it the 1st data so the latest product appear to be the first one

	$run_products = mysqli_query($db,$get_products);

	while ($row_products=mysqli_fetch_array($run_products)) {
		$pro_id = $row_products["product_id"];
		$pro_title = $row_products["product_title"];
		$pro_price = $row_products["product_price"];
		$pro_img1 = $row_products["product_img1"];


		echo "
			<div class='col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4 single_card'>

				<div class='card card_custom'>


					<a href='details.php?pro_id=$pro_id'>

						<img src='admin_area/product_images/$pro_img1' class='img_custom_index' alt='Front Page product Card 1 Image'>

					</a>


					<div class='card-body single_card_body_index'>


						<h4 class='card-title'>

							<a href='details.php?pro_id=$pro_id'>

								$pro_title

							</a>

						</h4>


						<p class='card-text price'>

							<strong>Price: </strong>$$pro_price

						</p>


						<a class='btn btn-secondary text-light card_btns1' href='details.php?pro_id=$pro_id'>

							View Details

						</a>


						<a class='btn btn-primary text-light card_btns2' href='details.php?pro_id=$pro_id'>

							<i class='fa fa-shopping-cart'></i> Add to Cart

						</a>

					</div>
				</div>

			</div>


		";

	}
}
 // getPro() finished







 // getPCats() or products categories started
function getPCats()
{
	global $db;

	$get_p_cats = "SELECT * FROM product_categories";

	$run_p_cats = mysqli_query($db,$get_p_cats);

	while ($row_p_cats=mysqli_fetch_array($run_p_cats)) {
		$p_cat_id = $row_p_cats["p_cat_id"];
		$p_cat_title = $row_p_cats["p_cat_title"];

		echo "

			<li class='nav-item links_card'>

				<a href='shop.php?p_cat=$p_cat_id' class='nav-link'> 

					$p_cat_title

				</a>

			</li>
		";
	}
}
 // getPCats() or products categories finished






 // getCats() or categories started
function getCats()
{
	global $db;

	$get_cats = "SELECT * FROM categories";

	$run_cats = mysqli_query($db,$get_cats);

	while ($row_cats=mysqli_fetch_array($run_cats)) {
		$cat_id = $row_cats["cat_id"];
		$cat_title = $row_cats["cat_title"];

		echo "

			<li class='nav-item links_card'>

				<a href='shop.php?cat=$cat_id' class='nav-link'>

					$cat_title

				</a>

			</li>
		";
	}
}
 // getCats() or categories finished







function getshop()
{

	global $db;

	if (!isset($_GET["p_cat"]) && !isset($_GET["cat"]) ) 
	{																
		echo 
		"

			<div class='box shop_box'>
				<h1 class='shop_title'>Shop</h1>
				<p class='shop_text'>
					Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
					consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
					cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
					proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
				</p>
			</div>

		";
								
	}


	if (isset($_GET["p_cat"]) )
	{	

		$p_cat_id = $_GET["p_cat"];

		$get_p_cat = "SELECT * FROM product_categories WHERE p_cat_id='$p_cat_id'";

		$run_p_cat = mysqli_query($db,$get_p_cat);

		$row_p_cat = mysqli_fetch_array($run_p_cat);

		$p_cat_title = $row_p_cat["p_cat_title"];

		$p_cat_desc = $row_p_cat["p_cat_desc"];

		echo
		"
			<div class='box shop_box text-center'>
				<h1 class='shop_title'>$p_cat_title </h1>
				<p class='shop_text'>
					$p_cat_desc
				</p>
			</div>
		";

	}


	if (isset($_GET["cat"]) )
	{
		
		$cat_id = $_GET["cat"];

		$get_cat = "SELECT * FROM categories WHERE cat_id='$cat_id'";

		$run_cat = mysqli_query($db,$get_cat);

		$row_cat = mysqli_fetch_array($run_cat);

		$cat_title = $row_cat["cat_title"];

		$cat_desc = $row_cat["cat_desc"];

		echo
		"
			<div class='box shop_box text-center'>
				<h1 class='shop_title'>$cat_title </h1>
				<p class='shop_text'>
					$cat_desc
				</p>
			</div>
		";
	}
}






function getpcatpro()
{
	global $db;

	if (isset($_GET["p_cat"])) 
	{
		$p_cat_id = $_GET["p_cat"];

		$get_products = "SELECT * FROM products WHERE p_cat_id='$p_cat_id' ORDER BY 1 DESC LIMIT 0,8";

		$run_products = mysqli_query($db,$get_products);

		$count = mysqli_num_rows($run_products);


		if ($count==0) 
		{
			echo 
			"<div class='col-md-10 col-lg-6 offset-md-1 offset-lg-3 mt-5'>
				<center>
					<div class='boxProductNotFound rounded_page'>
						<h4> No Product Found In This Product Category </h4>
					</div>
				</center>
			</div>

			";
		}


		while ($row_products = mysqli_fetch_array($run_products)) 
		{
			$pro_id = $row_products["product_id"];
			$pro_title = $row_products["product_title"];
			$pro_price = $row_products["product_price"];
			$pro_img1 = $row_products["product_img1"];

			echo 
				"
					<div class='col-10 col-sm-6 col-md-5 col-lg-4 col-xl-3 offset-1 offset-sm-0 offset-md-1 offset-lg-0 offset-xl-0 single_card'>

						<div class='card card_custom'>
							<a href='details.php?pro_id=$pro_id'>
								<img src='admin_area/product_images/$pro_img1' class='img_custom_shop' alt='Front Page product Card 1 Image'>
							</a>
							<div class='card-body single_card_body'>

									<h4 class='card-title'>
										<a href='details.php?pro_id=$pro_id'>$pro_title</a>
									</h4>

								<p class='card-text'><strong>Price: </strong>$$pro_price</p>

								<a class='btn btn-secondary btn-sm text-light card_btns1_shop' href='details.php?pro_id=$pro_id'>

									View Details
								</a>
											
								<a class='btn btn-primary btn-sm text-light card_btns2_shop' href='details.php?pro_id=$pro_id'>

									<i class='fa fa-shopping-cart'></i> Add to Cart
								</a>

							</div>

						</div>

					</div>
				";			
		}
	}
}






function getcatpro()
{
	global $db;

	if (isset($_GET["cat"])) 
	{
		$cat_id = $_GET["cat"];

		$get_cat = "SELECT * FROM products WHERE cat_id='$cat_id' ORDER BY 1 DESC LIMIT 0,8";

		$run_products = mysqli_query($db,$get_cat);

		$count = mysqli_num_rows($run_products);

		if ($count==0) 
		{
			echo 
			"<div class='col-md-10 col-lg-6 offset-md-1 offset-lg-3 mt-5'>
				<center>
					<div class='boxProductNotFound rounded_page'>
						<h4> No Product Found In This Category </h4>
					</div>
				</center>
			</div>

			";
		}

		while ($row_products = mysqli_fetch_array($run_products)) 
		{
			$pro_id = $row_products["product_id"];
			$pro_title = $row_products["product_title"];
			$pro_price = $row_products["product_price"];
			$pro_img1 = $row_products["product_img1"];

			echo 
				"
					<div class='col-10 col-sm-6 col-md-5 col-lg-4 col-xl-3 offset-1 offset-sm-0 offset-md-1 offset-lg-0 offset-xl-0 single_card'>

						<div class='card card_custom'>
							<a href='details.php?pro_id=$pro_id'>
								<img src='admin_area/product_images/$pro_img1' class='img_custom_shop' alt='Front Page product Card 1 Image'>
							</a>
							<div class='card-body single_card_body'>

									<h4 class='card-title'>
										<a href='details.php?pro_id=$pro_id'>$pro_title</a>
									</h4>

								<p class='card-text'><strong>Price: </strong>$$pro_price</p>

								<a class='btn btn-secondary btn-sm text-light card_btns1_shop' href='details.php?pro_id=$pro_id'>

									View Details
								</a>
											
								<a class='btn btn-primary btn-sm text-light card_btns2_shop' href='details.php?pro_id=$pro_id'>

									<i class='fa fa-shopping-cart'></i> Add to Cart
								</a>

							</div>

						</div>

					</div>
				";			
		}


	}
}






function countItemsInCart()
{
	global $db;

	$ip_add = getRealIpUser();

	$select_cart = "SELECT * FROM cart WHERE ip_add = '$ip_add'";

	$run_cart = mysqli_query($db,$select_cart);

	$count = mysqli_num_rows($run_cart);

	return $count;
}








function TotalItemsInCartPrice()
{
	global $db;

	$total = 0;

	$ip_add = getRealIpUser();

	$select_cart = "SELECT * FROM cart WHERE ip_add = '$ip_add'";

	$run_cart = mysqli_query($db,$select_cart);

	while ($row_cart = mysqli_fetch_array($run_cart))
	{
		$pro_id = $row_cart["p_id"];

		$pro_qty = $row_cart["qty"];

		$get_products = "SELECT * FROM products WHERE product_id = '$pro_id'";

		$run_products = mysqli_query($db,$get_products);

		while ($row_products = mysqli_fetch_array($run_products)) 
		{

		$sub_total = $row_products["product_price"]*$pro_qty;

		$total += $sub_total;

		}	
	}

	echo "$".$total;
}







function ProYouMayLike()
{				
	global $db;	

	$get_product = "SELECT * FROM products ORDER BY rand() LIMIT 0,3";

	$run_product = mysqli_query($db,$get_product);

	while ($row_product = mysqli_fetch_array($run_product)) 
	{		
		$pro_id = $row_product["product_id"];

		$pro_title = $row_product["product_title"];

		$pro_price = $row_product["product_price"];

		$pro_img1 = $row_product["product_img1"];

		echo 
		"
		<div class='col-4 col-sm-4 col-md-4 col-lg-3 col-xl-3 center-responsive'>
			<div class='product same-height'>
											
				<a href='details.php?pro_id=$pro_id'>
					<img src='admin_area/product_images/$pro_img1' class='img-fluid img_custom_details'>
				</a>

				<div class='text mt-1'>

					<h4 class='product_like_name_h'>

						<a href='details.php?pro_id=$pro_id' class='product_like_name_a'>
							$pro_title
						</a>

					</h4>

					<p><strong>Price: </strong>$$pro_price</p>

				</div>
			</div>
		</div>

		";
	}

							
}







function AccountHref()
{
	if (isset($_SESSION["customer_name"])) 
	{
		echo
		"
			href='customer/my_account.php?my_orders'
		";
	}
	else
	{
		echo
		"
			href='checkout.php'	
		";
	} 
}

function RegisterHref()
{
	if (isset($_SESSION["customer_name"])) 
	{	
		echo
		"
			href='customer/my_account.php?edit_account'
		";
	}
	else
	{
		echo
		"
			href='customer_register.php'	
		";
	} 
}





function RegisterHrefForAcc()
{
	if (isset($_SESSION["customer_name"])) 
	{
		echo
		"
			href='my_account.php?edit_account'
		";
	}
	else
	{
		echo
		"
			href='../customer_register.php'	
		";
	} 
}





?>


