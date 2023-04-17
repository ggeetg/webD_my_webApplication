<?php
session_start();
if (true) {
    require_once __DIR__ . '/lib/SecurityService.php';
    $antiCSRF = new \Phppot\SecurityService\securityService();
    $csrfResponse = $antiCSRF->validate();
    if (! empty($csrfResponse)) {

    } else {
		echo "<script>location.href='user.php?EncHid=".$_SESSION['EncTok']."&msg=".urlencode("Someting went wrong, please try again later.")."';</script>";
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

function validate_input(){
	$flag=1;
	$flag_msg="";
	if($_POST['pfx']==""){
			$flag=0;
			$flag_msg.=' , name prefix ';	//
	}
	if($_POST['fname']==""){
			$flag=0;
			$flag_msg.=' , first name ';	//
	}
	if($_POST['lname']==""){
			$flag=0;
			$flag_msg.=' , last name ';		//
	}
	if($_POST['desig']==""){
			$flag=0;
			$flag_msg.=' , designation ';	//
	}
	if($_POST['dept']==""){
			$flag=0;
			$flag_msg.=' , department ';	//
	}
	if($_POST['phn']==""||strlen($_POST['phn'])!==10||!is_numeric($_POST['phn'])){
			$flag=0;
			$flag_msg.=' , mobile ';		//
	}
	if($_POST['ustatus']==""){
			$flag=0;
			$flag_msg.=' , user status ';	//
	}
	if($_POST['uid']==""||!is_numeric($_POST['uid'])){
			$flag=0;
			$flag_msg.=' , Something went wrong. Please try again. ';
	}
	if($_POST['email']==""){
			$flag=0;
			$flag_msg.=' , email ';
	}
	if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
	  
	} else {
	  $flag=0;
	  $flag_msg.=' , email address is not valid ';	//
	}
	if($_POST['role']==""){
			$flag=0;
			$flag_msg.=' , role ';	//
	}

	if($flag==0){
		echo '<form id="myform" action="edituser.php?EncHid='.$_SESSION['EncTok'].'&msg='.urlencode('Please fill the following details correct:-'.$flag_msg.'.').'" method="post"><input id="submit" type="submit" name="submit" value="'.$_POST['uid'].'"></form>';
		echo '<script>document.getElementById("submit").click();</script>';
		// echo "<script>location.href='edituser.php?EncHid=".$_SESSION['EncTok']."&msg=".urlencode("Please fill the following fields:-".$flag_msg.".")."';</script>";
		exit();
	}
}
validate_input();




$id=$_POST['uid'];
$role=clean($_POST['role']);
$first_name=clean($_POST['fname']);
$last_name=clean($_POST['lname']);
$department=clean($_POST['dept']);
$email=$_POST['email'];
$prefix = clean($_POST['pfx']);
$desig = clean($_POST['desig']);
$desig_other = htmlentities($_POST['desig_txt'], ENT_QUOTES, 'UTF-8');
$contact = clean($_POST['phn']);
$ustatus = clean($_POST['ustatus']);

try {
	$stm = $conn1->prepare(" UPDATE `user` SET `utype`=:c, `first_name`=:d, `last_name`=:e, `dept`=:f, `email`=:h, `name_prefix`=:j, `designation`=:k, `desig_other`=:l, `contact`=:m, `status`=:n WHERE `id` = :o ");
	$stm->bindParam(":c", $role, PDO::PARAM_INT);
	$stm->bindParam(":d", $first_name, PDO::PARAM_STR, 500);
	$stm->bindParam(":e", $last_name, PDO::PARAM_STR, 500);
	$stm->bindParam(":f", $department, PDO::PARAM_INT);
	$stm->bindParam(":h", $email, PDO::PARAM_STR, 500);
	$stm->bindParam(":j", $prefix, PDO::PARAM_INT);
	$stm->bindParam(":k", $desig, PDO::PARAM_INT);
	$stm->bindParam(":l", $desig_other, PDO::PARAM_STR, 500);
	$stm->bindParam(":m", $contact, PDO::PARAM_INT);
	$stm->bindParam(":n", $ustatus, PDO::PARAM_STR, 500);
	$stm->bindParam(":o", $id, PDO::PARAM_INT);
	$nrow = $stm->execute();
} catch(PDOException $e) {
  echo "1.Some Error Occurred: " . $e->getMessage();
  exit();
}

$password=$_POST['passcode'];
$f_reset=$_POST['f_reset']??0;
if(!empty($password)){
	$password=md5($password);
	try {
		$stm = $conn1->prepare(" UPDATE `user` SET `upass`=:a, `f_p_reset`=:b WHERE `id` =:c ");
		$stm->bindParam(":a", $password, PDO::PARAM_STR, 500);
		$stm->bindParam(":b", $f_reset, PDO::PARAM_INT);
		$stm->bindParam(":c", $id, PDO::PARAM_INT);
		$nrow = $stm->execute();
	} catch(PDOException $e) {
	  echo "2.Some Error Occurred: " . $e->getMessage();
	  exit();
	}
}

echo "<script>location.href='user.php?EncHid=".$_SESSION['EncTok']."&msg=".urlencode("User details edited Successfully.")."';</script>";