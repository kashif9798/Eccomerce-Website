<?php 

	if (isset($_GET["user_profile"]))
	{

		$edit_user = $_GET["user_profile"];

		$get_admin = "SELECT * FROM admins WHERE admin_id='$edit_user'";

		$run_user = mysqli_query($con,$get_admin);

		$row_user = mysqli_fetch_array($run_user);

		$user_id = $row_user["admin_id"];

		$user_name = $row_user["admin_name"];

		$user_pass = $row_user["admin_pass"];

		$user_email = $row_user["admin_email"];

		$user_image = $row_user["admin_image"];

		$user_country = $row_user["admin_country"];

		$user_about = $row_user["admin_about"];

		$user_contact = $row_user["admin_contact"];

		$user_job = $row_user["admin_job"];		

	}

?>





<?php 
	include("includes/db.php");

	if (isset($_POST["submit"])) 
	{
	 	$user_name = $_POST["admin_name"];

	 	$user_email = $_POST["admin_email"];

	 	$user_pass = $_POST["admin_pass"];

	 	$user_country = $_POST["admin_country"];

	 	$user_contact = $_POST["admin_contact"];

	 	$user_job = $_POST["admin_job"];

	 	$user_about = $_POST["admin_about"];


	 	$user_img = $_FILES["admin_img"]["name"];

	 	$temp_name = $_FILES["admin_img"]["tmp_name"];

	 	move_uploaded_file($temp_name, "admin_images/$user_img");


	 	$insert_user = "UPDATE admins SET admin_name='$user_name',admin_email='$user_email',admin_pass='$user_pass',admin_image='$user_img',admin_country='$user_country',admin_about='$user_about',admin_contact='$user_contact',admin_job='$user_job'WHERE admin_id='$user_id'";

	 	$run_user = mysqli_query($con,$insert_user);

	 	if ($run_user) {

			echo "<script>alert('Admin User has been Updated successfully')</script>";

			echo "<script>window.open('logout.php','_self');</script>";	

		}
		else
		{
			echo "<script>alert('Admin User Updation was not successful')</script>";

			echo "<script>window.open('index.php?view_users','_self');</script>";				

		}
	 } 
?>


		<div class="row mt-5">
			<div class="col-lg-12">
				<ol class="breadcrumb">
					<li class="breadcrumb-item">
						<a href="index.php?dashboard" style="text-decoration: none;color: #0275d8;"><i class="fas fa-tachometer-alt"></i> Dashboard </a>
					</li>

					<li class="breadcrumb-item active">
						<i class="fas fa-user-edit"></i> Edit User
					</li>
				</ol>
			</div>
		</div>

		<div class="row mb-3">
			<div class="col-lg-12">

				<div class="card bg-light text-dark">
					<div class="card-header">
						<h4 class="card-title"> <i class="fas fa-user-edit"></i> Edit User</h4>
					</div>
					<div class="card-body">
						<form method="post" enctype="multipart/form-data">

							<div class="form-group row"> 

								<label class="col-form-label col-md-3" for="name">User Name:</label> 

							    <div class="col-md-6">
							    	<input class="form-control" type="text" value="<?php echo($user_name); ?>" name="admin_name" id="name" required> 
							    </div>

							</div>

							<div class="form-group row"> 

								<label class="col-form-label col-md-3" for="email">Email:</label> 

							    <div class="col-md-6">
							    	<input class="form-control" value="<?php echo($user_email); ?>" type="text" name="admin_email" id="email" required> 
							    </div>

							</div>


							<div class="form-group row"> 
								<label class="col-form-label col-md-3" for="password">Password</label> 
							    <div class="col-md-6">
							    	<input class="form-control" value="<?php echo($user_pass); ?>" type="text" name="admin_pass" id="password" required> 
							    </div>
							</div>

							<div class="form-group row"> 
								<label class="col-form-label col-md-3" for="country">Country</label> 
							    <div class="col-md-6">
							    	<input class="form-control" value="<?php echo($user_country); ?>" type="text" name="admin_country" id="country" required> 
							    </div>
							</div>

							<div class="form-group row"> 
								<label class="col-form-label col-md-3" for="country">Contact</label> 
							    <div class="col-md-6">
							    	<input class="form-control" type="text" value="<?php echo($user_contact); ?>" name="admin_contact" id="country" required> 
							    </div>
							</div>

							<div class="form-group row"> 
								<label class="col-form-label col-md-3" for="country">Job</label> 
							    <div class="col-md-6">
							    	<input class="form-control" value="<?php echo($user_job); ?>" type="text" name="admin_job" id="country" required> 
							    </div>
							</div>

							<div class="form-group row"> 
								<label class="col-form-label col-md-3" for="Image">User Image</label> 
							    <div class="col-md-6">
							    	<input class="form-control-file" type="file" name="admin_img" id="Image" required>
							    	<br>
							    	<img id="img_admin_view_pro_edit" src="admin_images/<?php echo($user_image); ?>"> 
							    </div>
							</div>

							<div class="form-group row"> 
								<label class="col-form-label col-md-3" for="about">About</label> 
							    <div class="col-md-6">
							    	<textarea class="form-control" type="text" name="admin_about" id="about" rows="3" required>		<?php echo($user_about); ?>"
							    	</textarea> 
							    </div>
							</div>							

							<div class="form-group mt-5 row">   
							    <div class="offset-md-3 col-md-6">
							    	<input class="btn btn-success" style="width: 100%;" value="Update User" type="submit" name="submit"> 
							    </div>
							</div>

						</form>
					</div>
				</div>

			</div>
		</div>


<script>
	tinymce.init({
    	selector: '#about'
	});
 </script>
