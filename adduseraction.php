<?php
session_start();
if (true) {
    require_once __DIR__ . '/lib/SecurityService.php';
    $antiCSRF = new \Phppot\SecurityService\securityService();
    $csrfResponse = $antiCSRF->validate();
    if (! empty($csrfResponse)) {

    } else {
		echo "<script>location.href='adduser.php?EncHid=".$_SESSION['EncTok']."&msg=".urlencode("Someting went wrong, please try again later.")."';</script>";
		exit();
    }
}
?>
<!-- /////////////////////////////////////////////////////////////////////////////////////////////////// --><?php include_once("loginchk.php");
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
			$flag_msg.=' , name prefix ';
	}
	if($_POST['fname']==""){
			$flag=0;
			$flag_msg.=' , first name ';
	}
	if($_POST['lname']==""){
			$flag=0;
			$flag_msg.=' , last name ';
	}
	if($_POST['desig']==""){
			$flag=0;
			$flag_msg.=' , designation ';
	}
	if($_POST['dept']==""){
			$flag=0;
			$flag_msg.=' , department ';
	}
	if($_POST['phn']==""){
			$flag=0;
			$flag_msg.=' , mobile ';
	}
	if($_POST['name']==""){
			$flag=0;
			$flag_msg.=' , username ';
	}
	// if($_POST['passcode']==""){
	// 		$flag=0;
	// 		$flag_msg.=' , password ';
	// }
	if($_POST['email']==""){
			$flag=0;
			$flag_msg.=' , email ';
	}
	if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
	  
	} else {
	  $flag=0;
	  $flag_msg.=' , email address is not valid ';
	}
	if($_POST['role']==""){
			$flag=0;
			$flag_msg.=' , role ';
	}
	if(!preg_match('/^[a-z0-9][a-z0-9_]*[a-z0-9]$/', $_POST['name'])){
		$flag=0;
		$flag_msg=" , Please enter username in correct format ";
	}

	//user role validation
	switch ($_POST['role']) {
		case 1:
			$a = array(23,31,32,43);
			if($_POST['menu_ref']!=$a){
				$flag=0;
				$flag_msg=" , Err:197-Something went wrong please try again. ";
			}
			break;
		case 2:
			$a = array(23,31,32);
			if($_POST['menu_ref']!=$a){
				$flag=0;
				$flag_msg=" , Err:198-Something went wrong please try again. ";
			}
			break;
		case 3:
			$a = array(23,31,32);
			if($_POST['menu_ref']!=$a){
				$flag=0;
				$flag_msg=" , Err:199-Something went wrong please try again. ";
			}
			break;
		case 4:
			$a = array(23,41,42);
			if($_POST['menu_ref']!=$a){
				$flag=0;
				$flag_msg=" , Err:191-Something went wrong please try again. ";
			}
			break;
		
		default:
			$flag=0;
			$flag_msg=" , Err:190-Something went wrong please try again. ";
			break;
	}

	if($flag==0){
		echo "<script>location.href='adduser.php?EncHid=".$_SESSION['EncTok']."&msg=".urlencode("Please fill the following fields:-".$flag_msg.".")."';</script>";
		exit();
	}
}
validate_input();

$username=$_POST['name'];
$password=$_POST['email'];
if($password==""||$username==""){
	echo "<script>location.href='adduser.php?EncHid=".$_SESSION['EncTok']."&err_msg=".urlencode("Please fill all mandatory fields.")."';</script>";
}
$password=md5($password);
$role=clean($_POST['role']);
$first_name=clean($_POST['fname']);
$last_name=clean($_POST['lname']);
$department=clean($_POST['dept']);
$head_dept=1;
$email=$_POST['email'];
$menu=$_POST['menu_ref'];	//array
$menu_ref="0";
foreach($menu as $val){
	$menu_ref.=",".$val;
}
$prefix = clean($_POST['pfx']);
$desig = clean($_POST['desig']);
$desig_other = htmlentities($_POST['desig_txt'], ENT_QUOTES, 'UTF-8');
$contact = clean($_POST['phn']);

try {
	$stm = $conn1->prepare("INSERT INTO `user`(`uname`, `upass`, `utype`, `first_name`, `last_name`, `dept`, `head_dept`, `email`, `menu_ref_id`, `name_prefix`, `designation`, `desig_other`, `contact`) VALUES (:a,:b,:c,:d,:e,:f,:g,:h,:i,:j,:k,:l,:m)");
	$stm->bindParam(":a", $username, PDO::PARAM_STR, 500);
	$stm->bindParam(":b", $password, PDO::PARAM_STR, 500);
	$stm->bindParam(":c", $role, PDO::PARAM_INT);
	$stm->bindParam(":d", $first_name, PDO::PARAM_STR, 500);
	$stm->bindParam(":e", $last_name, PDO::PARAM_STR, 500);
	$stm->bindParam(":f", $department, PDO::PARAM_INT);
	$stm->bindParam(":g", $head_dept, PDO::PARAM_INT);
	$stm->bindParam(":h", $email, PDO::PARAM_STR, 500);
	$stm->bindParam(":i", $menu_ref, PDO::PARAM_STR, 500);
	$stm->bindParam(":j", $prefix, PDO::PARAM_INT);
	$stm->bindParam(":k", $desig, PDO::PARAM_INT);
	$stm->bindParam(":l", $desig_other, PDO::PARAM_STR, 500);
	$stm->bindParam(":m", $contact, PDO::PARAM_INT);
	$nrow = $stm->execute();
} catch(PDOException $e) {
	  echo "Some Error Occurred: " . $e->getMessage();
	  exit();
	}

echo "<script>location.href='adduser.php?EncHid=".$_SESSION['EncTok']."&msg=".urlencode("User Added Successfully")."';</script>";