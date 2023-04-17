<?php
session_start();
if (true) {
    require_once __DIR__ . '/lib/SecurityService.php';
    $antiCSRF = new \Phppot\SecurityService\securityService();
    $csrfResponse = $antiCSRF->validate();
    if (! empty($csrfResponse)) {

    } else {
		echo "<script>location.href='addDept.php?EncHid=".$_SESSION['EncTok']."&msg=".urlencode("Someting went wrong, please try again later.")."';</script>";
		exit();
    }
}
?>
<!-- /////////////////////////////////////////////////////////////////////////////////////////////////// -->
<?php 
include_once("loginchk.php");
include_once("db.php");
$conn1=getconnection();

function fullclean($str){
	$str=trim($str);
	$str=htmlentities($str, ENT_QUOTES, 'UTF-8');
	return $str;
}

function validate_input(){
	$flag=1;
	$flag_msg="";
	if($_POST['dept_name']==""){
			$flag=0;
			$flag_msg.=' , department name ';	//
	}
	if($_POST['srt_name']==""){
			$flag=0;
			$flag_msg.=' , Acronym ';	//
	}
	if($_POST['dept_pac']==""||!is_numeric($_POST['dept_pac'])){
			$flag=0;
			$flag_msg.=' , department pac code ';	//
	}

	if($flag==0){
		echo "<script>location.href='addDept.php?EncHid=".$_SESSION['EncTok']."&msg=".urlencode("Please fill the following fields:-".$flag_msg.".")."';</script>";
		exit();
	}
}
validate_input();


$name=fullclean($_POST['dept_name']);
$sname=fullclean($_POST['srt_name']);
$dpc=fullclean($_POST['dept_pac']);
$sts="Active";

try{
$stm = $conn1->prepare("INSERT INTO `department`(`dept_name`, `short_name`, `dept_pac_code`, `status`) VALUES (:a,:b,:c,:d) ");
$stm->bindParam(":a", $name, PDO::PARAM_STR);
$stm->bindParam(":b", $sname, PDO::PARAM_STR);
$stm->bindParam(":c", $dpc, PDO::PARAM_INT);
$stm->bindParam(":d", $sts, PDO::PARAM_STR);
$nrow = $stm->execute();
} catch(PDOException $e) {
	  	echo "Some Error Occurred: " . $e->getMessage();
	  	exit();
	}

header("Location: addDept.php?EncHid=".$_SESSION['EncTok']);

?>