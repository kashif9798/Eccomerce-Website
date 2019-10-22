<?php
	$active="Contact";
	$activeTop=""; 
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
							Contact Us
						</li>
					</ul>
				</div>
			</div>
		</div><!-- breadcrumb container Finish -->

		<div class="container-fluid">
			<div class="row">

				<div class="col-md-3"><!-- Products Categories, Genders and Start -->
					<div class="card bg-light text-dark sidebar-menu products_categories_details1">
						<div class="card-header">
							<h4 class="card-title sidebar-title">Products Categories</h4>
						</div>
						<div class="card-body">
							<ul class="nav nav-pills flex-column category-menu">

								<?php getPCats(); ?>

							</ul>
						</div>
					</div>
					<br>
					<div class="card bg-light text-dark sidebar-menu products_categories_details2">
						<div class="card-header">
							<h4 class="card-title sidebar-title">Categories</h4>
						</div>
						<div class="card-body">
							<ul class="nav nav-pills flex-column category-menu">
																
								<?php getCats(); ?>

							</ul>
						</div>
					</div>
				</div><!-- Products Categories, Genders and Finish -->

				<div class="col-md-9">
					<div class="boxCart margin-top-side-menu">
						<div class="box-header">
							
							<center>
								<h2>Feel free to Contact Us</h2>
								<p class="text-muted">If you have any questions feel free to contact us. Our Customer Service works 24/7.</p>
							</center>

							<form action="contact.php" class="mt-5" method="php">
								<div class="form-group">
									<label for="name">Name</label>
									<input type="text" class="form-control" name="name" required>
								</div>

								<div class="form-group">
									<label for="email">Email</label>
									<input type="email" class="form-control" name="email" required>
								</div>

								<div class="form-group">
									<label>Email Password</label>
									<input type="password" class="form-control" name="pass" required>
								</div>

								<div class="form-group">
									<label for="subject">Subject</label>
									<input type="text" class="form-control" name="subject" required>
								</div>

								<div class="form-group">
									<label>Message</label>
									<textarea name="message" class="form-control"></textarea>
								</div>

								<div class="text-center">
									<button type="submit" name="submit" class="btn btn-outline-success">
										<i class="fas fa-envelope"></i>&nbsp Send Message
									</button>
								</div>
							</form>
							<?php 
								
							 ?>

							<?php 

								if (isset($_POST["submit"])) 
								{

									$sender_name = $_POST["name"];

									$sender_email = $_POST["email"];

									$sender_pass = $_POST["pass"];	

									$sender_subject = $_POST["subject"];	

									$sender_message = $_POST["message"];

									$reciever_email = "qazi.kashif97@gmail.com";

									// mail($reciever_email,$sender_name,$sender_subject,$sender_message,$sender_email);

									require 'PHPMailerAutoload.php';

									$mail = new PHPMailer;

									$mail->SMTPDebug = 4;                               // Enable verbose debug output

									$mail->isSMTP();                                      // Set mailer to use SMTP
									$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
									$mail->SMTPAuth = true;                               // Enable SMTP authentication
									$mail->Username = $sender_email;                 // SMTP username
									$mail->Password = $sender_pass;                           // SMTP password
									$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
									$mail->Port = 587;                                    // TCP port to connect to

									$mail->setFrom($sender_email, $sender_name);
									$mail->addAddress($reciever_email, 'Joe User');     // Add a recipient
									$mail->addReplyTo($sender_email);

									$mail->isHTML(true);                                  // Set email format to HTML

									$mail->Subject = $sender_subject;
									$mail->Body    = 'This is the HTML message body <b>in bold!</b>';
									$mail->AltBody = $sender_message;

									if(!$mail->send()) {
									    echo 'Message could not be sent.';
									    echo 'Mailer Error: ' . $mail->ErrorInfo;
									} else {
									    echo 'Message has been sent';
									}
								}

							?>

						</div>
					</div>
				</div>

			</div> 
		</div><!-- Products Categories, Genders and Finish --> 
	</div>
	
	<br>
	<?php 
		include("includes/footer.php") 
	?>
</body>
</html>

