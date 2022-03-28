<?php session_start();?>
<!doctype html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--favicon-->
	<link rel="icon" href="assets/images/flamygo-icon.png" type="image/png" />
	<!--plugins-->
	<link rel="stylesheet" href="assets/plugins/notifications/css/lobibox.min.css" />
	<link href="assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
	<link href="assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
	<link href="assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
	<!-- loader-->
	<link href="assets/css/pace.min.css" rel="stylesheet" />
	<script src="assets/js/pace.min.js"></script>
	<!-- Bootstrap CSS -->
	<link href="assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="assets/css/bootstrap-extended.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&amp;display=swap" rel="stylesheet">
	<link href="assets/css/app.css" rel="stylesheet">
	<link href="assets/css/icons.css" rel="stylesheet">
	<title>Tourism Management System</title>
</head>

<body class="bg-login">
	<!--wrapper-->
	<div class="wrapper">
		<div class="section-authentication-signin d-flex align-items-center justify-content-center my-5 my-lg-0">
			<div class="container-fluid">
				<div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">
					<div class="col mx-auto">
						
						<div class="card">
							<div class="card-body">
								<div class=" p-4 rounded">
									<div class="text-center">
										<div class="mb-4 text-center">
											<img src="assets/images/flamygo-icon.png" width="60" alt="" />
										</div>

					<h5 class="mb-0 text-primary uppercase">Forgot Password</h5>
				</div>
				<hr>
				<form class="row g-3" method="post">
				
					<div class="col-md-12">
						<label for="inputEmail" class="form-label">Email Address</label>
						<input type="text" class="form-control" name="email" placeholder="enter email address">
					</div>
					<div class="col-12">
						<button type="submit" name="register" class="btn btn-primary px-5">Submit</button>
					</div>
				</form>
											</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!--end row-->
			</div>
		</div>
	</div>
	<!--end wrapper-->
	<!-- Bootstrap JS -->
	<script src="assets/js/bootstrap.bundle.min.js"></script>
	<!--plugins-->
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/plugins/simplebar/js/simplebar.min.js"></script>
	<script src="assets/plugins/metismenu/js/metisMenu.min.js"></script>
	<script src="assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
	<script src="assets/plugins/notifications/js/lobibox.min.js"></script>
	<script src="assets/plugins/notifications/js/notifications.min.js"></script>
	<script src="assets/plugins/notifications/js/notification-custom-script.js"></script>
	<!--Password show & hide js -->
	<script>
		$(document).ready(function () {
			$("#show_hide_password a").on('click', function (event) {
				event.preventDefault();
				if ($('#show_hide_password input').attr("type") == "text") {
					$('#show_hide_password input').attr('type', 'password');
					$('#show_hide_password i').addClass("bx-hide");
					$('#show_hide_password i').removeClass("bx-show");
				} else if ($('#show_hide_password input').attr("type") == "password") {
					$('#show_hide_password input').attr('type', 'text');
					$('#show_hide_password i').removeClass("bx-hide");
					$('#show_hide_password i').addClass("bx-show");
				}
			});
		});
	</script>
	<!--app JS-->
	<script src="assets/js/app.js"></script>
</body>

</html>

<?php 
	
	if (isset($_POST['register'])) {
		$email = trim($_POST['email']);
		$password = password_hash('password', PASSWORD_DEFAULT);
		$role = 1;

		if (empty($email)) {
			echo "<script>error_noti('All Fields Are Required ...');window.location='forgot_password'</script>";
		} else {
			$validateUser = $connect2db->prepare("SELECT email FROM tbl_users WHERE email = ?");
			$validateUser->execute([$email]);
			if ($validateUser->rowcount() > 0) {
				echo "<script>error_noti('Password Recovery Authentication Sent');window.location='forgot_password'</script>";
				
			} else {
				// $createUser = $connect2db->prepare("INSERT INTO tbl_users (firstname, lastname, username, phone,email, password,role) VALUES (?, ?, ?, ?, ?, ?, ?) ");
				// if ($createUser->execute([$fname, $lname, $uname, $pnum, $email, $password, $role])) {
					echo "<script>success_noti('Invalid Email');window.location='forgot_password';</script>";
					
				} 
				
			}
			
		}
	// }
	

?>