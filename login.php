<!DOCTYPE html>
<html lang="en">

<head>
	<title>Welcome to Yojana web portal</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<!-- NOT OPEN -->
	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<!--===============================================================================================-->
	<style>
		.jumbotron::after {
			content: '';
		}

		body {
			min-height: 100vh;
			
		}

		.h1,
		.h2,
		.h3,
		.h4,
		.h5,
		.h6,
		h1,
		h2,
		h3,
		h4,
		h5,
		h6 {
			line-height: 1.1;
		}

		#T3:focus {
			border: 1px solid gray !important;
		}
	</style>
</head>

<body>

	<script language="Javascript" src="js/md5.js"></script>
	<script language="Javascript">
		//history.go(1); // disable the browser's back button
	</script>

	<?php include_once('header.php'); ?>


	<div class="container" style="margin-top:30px;justify-content: center; float: none;">
		<div class="login-form">
			<div class="wrap-login100" style="border: 8px solid gold; border-radius : 35px; box-shadow : 0 0.5rem 1rem; ">
				<div class="login100-pic js-tilt" data-tilt style="text-align: end; " >
					<img src="images/img-01.png" alt="ncert_logo" width="300" height="450">
				</div>

				<form class="login100-form validate-form" METHOD="POST" ACTION="verify.php" target="_parent">
					<span class="login100-form-title">
						Member Login
					</span>
					<input type="hidden" name="hash" value="29e457082db729fa1059d4294ede3909">
					<div class="wrap-input100">
						<input class="input100" type="text" name="email" placeholder="Username" autocomplete="off">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<input class="input100" type="password" name="pass" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>

					<div style="margin-left: 10px; font-family: verdana; font-size: 11px;" align="left">
						<span style="color : green;">Enter Captcha:</span>
						<img src="captchafiles/captchasecurityimages.php" alt="Please Enter The Security Code shown in the Text Box Provided." />
						<input size="5" maxlength="5" id="T3" type="text" name="T3" style="border: 1px solid gray; padding: 3px 0; font-size: 15px; vertical-align: middle;" required />
						<!-- <i class="fa fa-refresh fa-3x" aria-hidden="true" style="vertical-align: middle;" ></i> -->
					</div>


					<div class="container-login100-form-btn">
						<button class="login100-form-btn" style="font-size :larger">
							Login
						</button>
					</div>
					<br>
					<div class="text-center p-t-12" style="box-shadow:  0 0.5rem 1rem; border-radius : 15px; color : red;">
						<span class="txt1">
							Forgot
						</span>
						<a class="txt2" href="forgetPassword.php">
							Username / Password?
						</a>
					</div>
					<br>
					<div class="text-center " style="box-shadow:  0 0.5rem 1rem; border-radius : 15px; color : blue;">
						<a class="txt2" href="#">
							Official Account Registration
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div>

				</form>
			</div>
		</div><br><br>
	</div>

	<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="vendor/select2/select2.min.js"></script>
	<script src="vendor/tilt/tilt.jquery.min.js"></script>
	<script>
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
	<script src="js/main.js"></script>
	<!--===============================================================================================-->

	<?php include_once("footer.php") ?>

</body>

</html>