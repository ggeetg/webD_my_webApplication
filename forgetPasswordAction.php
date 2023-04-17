<!DOCTYPE html>
<html>

<head>
	<title></title>
</head>

<body>
	<?php
	/////// login atempt chk

	include_once("db.php");
	$con = getconnection();

	$IpAddress = $_SERVER['REMOTE_ADDR'];
	$stm = $con->query('SELECT count(*) as count FROM `forget_attempt` WHERE `ip` LIKE "' . $IpAddress . '" AND email="' . $_POST['u_email'] . '" AND `timestamp` > (now() - interval 10 minute) ');
	$row = $stm->fetch();
	$count = $row['count'];
	if ($count >= 1) {
		$msg = "Password reset link has been sent to your provided email address. If not recieved try again after 10 minutes.";
		echo "<script>location.href='forgetPassword.php?msg=" . urlencode($msg) . "';</script>";
		exit();
	}
	//////////

	//////////////////// login attempt
	$IpAddress = $_SERVER['REMOTE_ADDR'];
	$user_mail = $_POST['u_email'];
	$stm = $con->prepare(" INSERT INTO `forget_attempt`( `ip`, `email`) VALUES (:a,:b) ");
	$stm->bindParam(":a", $IpAddress);
	$stm->bindParam(":b", $user_mail);
	$stm->execute();
	///////////////////
	?>


	<?php
	$rand = $_POST['submit'] ?? null;
	$rand = md5($rand);
	$rand2 = $_GET['EncId'];
	if ($rand != $rand2) {
		$msg = "Invalid Access. Please try again later.";
		echo "<script>location.href='forgetPassword.php?msg=" . urlencode($msg) . "';</script>";
		exit();
	}
	if (filter_var($_POST['u_email'], FILTER_VALIDATE_EMAIL) && $_POST['u_email'] != "") {
	} else {
		$msg = "Invalid E-mail address. Please try again later.";
		echo "<script>location.href='forgetPassword.php?msg=" . urlencode($msg) . "';</script>";
		exit();
	}
	$user_mail = $_POST['u_email'];


	$stm = $con->prepare("SELECT id,uname from user where email = :a ");
	$stm->bindParam(":a", $user_mail, PDO::PARAM_STR, 500);
	$stm->execute();
	$nrows = $stm->rowCount();
	$row = $stm->fetch(PDO::FETCH_ASSOC);
	if ($nrows == 1) {
		$uname = $row['uname'];
		$id = $row['id'];
		$new_passcode = random_int(100000, 999999);
		$enp = md5($new_passcode);
		$stm = $con->prepare("UPDATE user SET `upass`=:a WHERE email=:b and uname=:c and id=:d ");
		$stm->bindParam(":a", $enp, PDO::PARAM_STR, 500);
		$stm->bindParam(":b", $user_mail, PDO::PARAM_STR, 500);
		$stm->bindParam(":c", $uname, PDO::PARAM_STR, 500);
		$stm->bindParam(":d", $id, PDO::PARAM_INT);
		$stm->execute();

		$admin_email = "mispmdncert@gmail.com";
		$email = $user_mail;
		$subject = "Password Reset for MIS portal";
		$comment = "Done user,<br>Your credidential details are as follows:<br>Username: " . $uname . "<br>Temporary password: " . $new_passcode;

		//send email
		mail($email, $subject, $comment, "From:" . $admin_email);
		$msg = "If your email is registerd with us, you will get a passoword reset mail on your registerd email address.";
		echo "<script>location.href='forgetPassword.php?msg=" . urlencode($msg) . "';</script>";
		exit();
	} else if ($nrows > 1) {
		$msg = "If your email is registerd with us, you will get a passoword reset mail on your registerd email address.";
		echo "<script>location.href='forgetPassword.php?msg=" . urlencode($msg) . "';</script>";
		exit();
	} else if ($nrows == 0) {
		$msg = "If your email is registerd with us, you will get a passoword reset mail on your registerd email address.";
		echo "<script>location.href='forgetPassword.php?msg=" . urlencode($msg) . "';</script>";
		exit();
	}

	$msg = "Something went wrong, Please try again later.";
	echo "<script>location.href='forgetPassword.php?msg=" . urlencode($msg) . "';</script>";
	exit();
	?>


</body>

</html>