<h1 align="center"> Change Password</h1>


<form action="" method="post" enctype="multipart/form-data">

	<label>Your Old Password:</label>

	<div class="input-group">
		
		<input type="password" class="form-control" id="pass_inputs" name="old_pass" required></input>

		<div class="input-group-append">
      		<button type="button" class="btn outline_view_custom" id="pass_inputs_btn" onclick="pass_toggle()" ><i class="fas fa-eye" id="pass_inputs_ico"></i></button>
    	</div>

	</div>






	<label>Your New Password:</label>

	<div class="input-group">
		
		<input type="password" class="form-control" id="pass_inputs2" name="new_pass" required></input>

		<div class="input-group-append">
      		<button type="button" class="btn outline_view_custom" id="pass_inputs_btn2" onclick="pass_toggle2()" ><i class="fas fa-eye" id="pass_inputs_ico2"></i></button>
    	</div>

	</div>






	<label>Confirm Your New Password:</label>

	<div class="input-group">
		
		<input type="password" class="form-control" id="pass_inputs3" name="new_pass_again" required></input>

		<div class="input-group-append">
      		<button type="button" class="btn outline_view_custom" id="pass_inputs_btn3" onclick="pass_toggle3()" ><i class="fas fa-eye" id="pass_inputs_ico3"></i></button>
    	</div>

	</div>

	<div class="text-center mt-5">
		<button type="submit" name="submit" class="btn btn-outline-success">
			<i class="fas fa-sync-alt"></i> Update Now
		</button>
	</div>

</form>

<script>
function pass_toggle() 
{
  var x = document.getElementById("pass_inputs");
  var y =document.getElementById("pass_inputs_btn");
  var z =document.getElementById("pass_inputs_ico");
  if (x.type === "password") {
    x.type = "text";
    y.classList.add("bg-primary");
   	z.classList.add("text-white");
  } else {
    x.type = "password";
    y.classList.remove("bg-primary");
   	z.classList.remove("text-white");
  }
}

function pass_toggle2() 
{
  var x = document.getElementById("pass_inputs2");
  var y =document.getElementById("pass_inputs_btn2");
  var z =document.getElementById("pass_inputs_ico2");
  if (x.type === "password") {
    x.type = "text";
    y.classList.add("bg-primary");
   	z.classList.add("text-white");
  } else {
    x.type = "password";
    y.classList.remove("bg-primary");
   	z.classList.remove("text-white");
  }
}

function pass_toggle3() 
{
  var x = document.getElementById("pass_inputs3");
  var y =document.getElementById("pass_inputs_btn3");
  var z =document.getElementById("pass_inputs_ico3");
  if (x.type === "password") {
    x.type = "text";
    y.classList.add("bg-primary");
   	z.classList.add("text-white");
  } else {
    x.type = "password";
    y.classList.remove("bg-primary");
   	z.classList.remove("text-white");
  }
}
</script>

<?php 
	if (isset($_POST["submit"])) 
	{
		$c_email = $_SESSION["customer_email"];

		$c_old_pass = $_POST["old_pass"];

		$c_new_pass = $_POST["new_pass"];

		$c_new_pass_again = $_POST["new_pass_again"];

		$sel_old_pass = "SELECT * FROM customers WHERE customer_pass = '$c_old_pass'";

		$run_c_old_pass = mysqli_query($con,$sel_old_pass);

		$check_c_old_pass = mysqli_fetch_array($run_c_old_pass);

		if ($check_c_old_pass==0) 
		{
			echo 
			"
				<script>alert('Sorry, your current password is not valid, Please try again');</script>
			";

			exit();	
			
		}
		if ($c_new_pass!=$c_new_pass_again) 
		{
			echo 
			"
				<script>alert('Sorry, your new password did not match, Please try again');</script>
			";

			exit();			
		}

		$update_c_pass = "UPDATE customers SET customer_pass = '$c_new_pass' WHERE customer_email = '$c_email'";

		$run_c_pass = mysqli_query($con,$update_c_pass);

		if ($run_c_pass) 
		{
			echo 
			"
				<script>alert('Your Password has been updated');</script>
			";

			echo 
			"
				<script>window.open('my_account.php?my_orders','_self');</script>
			";
		}
	}
?>