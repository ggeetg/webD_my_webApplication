<?php
session_start();
if (true) {
    require_once __DIR__ . '/lib/SecurityService.php';
    $antiCSRF = new \Phppot\SecurityService\securityService();
    $csrfResponse = $antiCSRF->validate();
    if (! empty($csrfResponse)) {

    } else {
		echo "<script>location.href='finalsubmit.php?EncHid=".$_SESSION['EncTok']."&msg=".urlencode("Someting went wrong, please try again later.")."';</script>";
		exit();
    }
}
?>
<!-- /////////////////////////////////////////////////////////////////////////////////////////////////// -->
<?php include_once('loginchk.php') ;
include_once("db.php");
$conn1=getconnection();

function clean($string) {
   return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
}

//ARRAY
$mr_id=$_POST["final_mrid"];
$len=count($mr_id);
$chk = "Submit";

for($i=0;$i<$len;$i++){
	$mr_id[$i]=clean($mr_id[$i]);
if($mr_id[$i]==""){
	header("Location: finalsubmit.php?EncHid=".$_SESSION['EncTok']."&msg=".urlencode("Please select only ready to submit programmes."));
	exit();
}
$stm=$conn1->query("SELECT chk1, chk2 from project_monthly_report where `sno` = $mr_id[$i] ");
$row = $stm->fetch();
if($row['chk1']=="Pending"||$row['chk2']=="Submit"){
	header("Location: finalsubmit.php?EncHid=".$_SESSION['EncTok']."&msg=".urlencode("Please select only ready to submit programmes."));
	exit();
}
}

try {
	for($i=0;$i<$len;$i++){
		$mr_id[$i]=clean($mr_id[$i]);
		$stm = $conn1->prepare("UPDATE `project_monthly_report` SET `chk1`=:a,`chk2`=:b WHERE `sno` = :c");
		$stm->bindParam(":a", $chk, PDO::PARAM_STR, 500);
		$stm->bindParam(":b", $chk, PDO::PARAM_STR, 500);
		$stm->bindParam(":c", $mr_id[$i], PDO::PARAM_INT);
		$stm->execute();
	}
} catch(PDOException $e) {
	  	echo "Some Error Occurred: " . $e->getMessage();
	  	exit();
	}


	header("Location: finalsubmit.php?EncHid=".$_SESSION['EncTok']);

?>

