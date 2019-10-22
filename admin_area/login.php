<?php 
	session_start();
	include("includes/db.php");
	if (isset($_SESSION["admin_email"])) 
	{
		echo 
		"
			<script>window.open('index.php?dashboard','_self');</script>
		";	
	}
	else
	{
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Aphro - Admin Area</title>
	<link rel="icon" href="../images/ico.png" type="image/ico">
	<link rel="stylesheet" type="text/css" href="css/login.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="font_awesome/fontawesome-free-5.9.0-web/css/all.css">
	<script src="js/jquery-3.4.1.js"></script>
	<script src="js/bootstrap.js"></script>
</head>

<body>

	<div class="container">

		<form action="" class="form_login" method="post">
			
			<h1 class="form_login_heading" style="font-family: Helvetica !important;"> Admin Login </h1>

			<div class="mat-div">

				<label class="mat-label">Email Address</label>

				<input type="email" class="mat-input focus_input_color" name="admin_email" required>

			 </div>

			<div class="mat-div">

			<label class="mat-label">Password</label>				

			<input type="password" class="mat-input focus_input_color" name="admin_pass" required>

			</div>

			<button type="submit" class="btn btn-lg btn-outline-light btn-block mt-5" name="admin_login">
				Login
			</button>			

		</form>

	</div>

</body>
</html>

<?php 
 
	if (isset($_POST["admin_login"])) 
	{
		$admin_email = mysqli_real_escape_string($con,$_POST["admin_email"]);

		$admin_pass = mysqli_real_escape_string($con,$_POST["admin_pass"]);

		$get_admin = "SELECT * FROM admins WHERE admin_email='$admin_email' AND admin_pass='$admin_pass'";

		$run_admin = mysqli_query($con,$get_admin);

		$count = mysqli_num_rows($run_admin);

		if ($count==1) 
		{
			$_SESSION["admin_email"] = $admin_email;
			echo 
			"
				<script>alert('Logged In, Welcome Back.');</script>
			";
			echo 
			"
				<script>window.open('index.php?dashboard','_self');</script>
			";	
		}
		else
		{
			echo 
			"
				<script>alert('Wrong Email or Password.');</script>
			";
		}

	}

?>


<?php } ?>

<script>
    $(".mat-input").focus(function(){
  $(this).parent().addClass("is-active is-completed");
});

$(".mat-input").focusout(function(){
  if($(this).val() === "")
    $(this).parent().removeClass("is-completed");
  $(this).parent().removeClass("is-active");
})
</script>