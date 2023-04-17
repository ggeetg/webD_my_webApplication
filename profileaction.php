<?php
session_start();
if (true) {
    require_once __DIR__ . '/lib/SecurityService.php';
    $antiCSRF = new \Phppot\SecurityService\securityService();
    $csrfResponse = $antiCSRF->validate();
    if (! empty($csrfResponse)) {

    } else {
		echo "<script>location.href='profile.php?EncHid=".$_SESSION['EncTok']."&msg=".urlencode("Someting went wrong, please try again later.")."';</script>";
		exit();
    }
}
?>
<!-- /////////////////////////////////////////////////////////////////////////////////////////////////// -->
<?php include_once("loginchk.php");
include_once("db.php");
$conn1=getconnection();

function clean($string) {
   return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
}

$stm = $conn1->prepare("SELECT id, upass, previous_pass from user where uname = :a");
$stm->bindParam(":a",$_SESSION['user_id']);
$stm->execute();
$row = $stm->fetch();
$db_uid=$row['id'];
$old_pass=$row['upass'];
$previous_pass = $row['previous_pass'];


function validate(){
	$password=$_POST['passcode'];
	$flag=1;
	global $db_uid;
	if(md5($db_uid)!=intval($_POST['uid'])){
		$flag=0;
		$flag_msg=' , Invalid access, Please try again.'.$row['id'].'ajay'.$_POST['uid'];
	}

	if($_POST['email']==""){
		$flag=0;
		$flag_msg.=' , email ';
	}
	if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {} else {
	  $flag=0;
	  $flag_msg.=' , email address is not valid ';
	}
	if($_POST['phn']==""||strlen($_POST['phn'])!=10||!is_numeric($_POST['phn'])){
			$flag=0;
			$flag_msg.=' , mobile number should be 10 digit long ';
	}
	if(!empty($_POST['passcode'])){
		if(!preg_match('/[!@#$%^&*_+-]+/', $_POST['passcode'])){
			$flag=0;
			$flag_msg=' , Password does not contain any special character.';
		}
		if(strlen($_POST['passcode'])<6){
			$flag=0;
			$flag_msg=' , Password length is less then 6 digits.';
		}
	}

	if($flag==0){
		echo "<script>location.href='profile.php?EncHid=".$_SESSION['EncTok']."&msg=".urlencode("Please fill the following fields:-".$flag_msg.".")."';</script>";
		exit();
	}
}
validate();

$id=$db_uid;	//$_POST['uid'];
$first_name=clean($_POST['fname']);
$last_name=clean($_POST['lname']);
$email=$_POST['email'];
$prefix = clean($_POST['pfx']);
$desig = clean($_POST['desig']);
$desig_other = $_POST['desig_txt'];
$contact = clean($_POST['phn']);

try {
	$stm = $conn1->prepare(" UPDATE `user` SET `first_name`=:d, `last_name`=:e, `email`=:h, `name_prefix`=:j, `designation`=:k, `desig_other`=:l, `contact`=:m WHERE `id` = :o ");
	$stm->bindParam(":d", $first_name, PDO::PARAM_STR, 500);
	$stm->bindParam(":e", $last_name, PDO::PARAM_STR, 500);
	$stm->bindParam(":h", $email, PDO::PARAM_STR, 500);
	$stm->bindParam(":j", $prefix, PDO::PARAM_INT);
	$stm->bindParam(":k", $desig, PDO::PARAM_INT);
	$stm->bindParam(":l", $desig_other, PDO::PARAM_STR, 500);
	$stm->bindParam(":m", $contact, PDO::PARAM_INT);
	$stm->bindParam(":o", $id, PDO::PARAM_INT);
	$nrow = $stm->execute();
} catch(PDOException $e) {
  echo "1.Some Error Occurred: " . $e->getMessage();
  exit();
}

$password=$_POST['passcode'];
if(!empty($password)){
	if(md5($password)==$old_pass){
		echo "<script>alert('Password is same as current password.')</script>";
		echo "<script>location.href='profile.php?EncHid=".$_SESSION['EncTok']."&msg=".urlencode("User details has been updated successfully.")."';</script>";
		exit();
	}
	if(md5($password)==$previous_pass){
		echo "<script>alert('New password cannot be your last two passwords.')</script>";
		echo "<script>location.href='profile.php?EncHid=".$_SESSION['EncTok']."&msg=".urlencode("User details has been updated successfully except password.")."';</script>";
		exit();
	}
	
	$password=md5($password);
	try {
		$stm = $conn1->prepare(" UPDATE `user` SET `upass`=:a, `previous_pass`=:b WHERE `id` =:c ");
		$stm->bindParam(":a", $password, PDO::PARAM_STR, 500);
		$stm->bindParam(":b", $old_pass, PDO::PARAM_STR, 500);
		$stm->bindParam(":c", $id, PDO::PARAM_INT);
		$nrow = $stm->execute();
	} catch(PDOException $e) {
	  echo "2.Some Error Occurred: " . $e->getMessage();
	  exit();
	}
}

echo "<script>location.href='profile.php?EncHid=".$_SESSION['EncTok']."&msg=".urlencode("User details has been updated successfully.")."';</script>";