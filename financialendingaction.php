<?php
session_start();
if (true) {
    require_once __DIR__ . '/lib/SecurityService.php';
    $antiCSRF = new \Phppot\SecurityService\securityService();
    $csrfResponse = $antiCSRF->validate();
    if (! empty($csrfResponse)) {

    } else {
		echo "<script>location.href='financialEnding.php?EncHid=".$_SESSION['EncTok']."&msg=".urlencode("Someting went wrong, please try again later.")."';</script>";
		exit();
    }
}
?>
<!-- /////////////////////////////////////////////////////////////////////////////////////////////////// -->
<?php 
include_once("loginchk.php");
include_once("db.php");
$conn1 = getconnection();

function validate_input(){
	$flag=1;
	$flag_msg="Some Error Occurred.Please try again.<br>";
	foreach($_POST['pid'] as $val){
		if($val==""||empty($val)||$val<1){
			$flag=0;
			$flag_msg.=', pid= '.$val;
		}
	}
	foreach($_POST['pac_code'] as $val){
		if($val==""||empty($val)){
			$flag=0;
			$flag_msg.=', pac code= '.$val;
		}
	}
	foreach($_POST['report_submit'] as $val){
		if($val==""||empty($val)||$val<1){
			$flag=0;
			$flag_msg.=', report submit= '.$val;
		}
	}
	foreach($_POST['f_status'] as $val){
		if($val==""||empty($val)||$val<1){
			$flag=0;
			$flag_msg.=', final status= '.$val;
		}
	}
	foreach($_POST['year_start'] as $val){
		if($val==""||empty($val)||$val<1){
			$flag=0;
			$flag_msg.=', year start= '.$val;
		}
	}
	foreach($_POST['year_end'] as $val){
		if($val==""||empty($val)||$val<1){
			$flag=0;
			$flag_msg.=', year end= '.$val;
		}
	}
	for($i=0;$i<count($_POST['f_status']);$i++){
		if($_POST['f_status'][$i]==2||$_POST['f_status'][$i]==3){
			if($_POST['budget_allocated'][$i]==""||$_POST['budget_allocated'][$i]<0){
				$flag=0;
				$flag_msg.=', budget allocated= '.$i;
			}
		}
	}
	if($flag==0){
		header("location:financialEnding.php?EncHid=".$_SESSION['EncTok']."&msg=".urlencode($flag_msg));
		exit();
	}
}
validate_input();


$pid= $_POST['pid'];
$pac_code= $_POST['pac_code'];
$report_submit= $_POST['report_submit'];
$f_status= $_POST['f_status'];
$year= $_POST['year_start'];
$year_end= $_POST['year_end'];
$b_all= $_POST['budget_allocated'];
$done="Done";


try{
	for($i=0;$i<count($pid);$i++){
		$stm=$conn1->prepare("UPDATE project_registration SET report_submit=:b, status=:c WHERE id = :e");
		$stm->bindParam(":b", $report_submit[$i], PDO::PARAM_INT);
		$stm->bindParam(":c", $f_status[$i], PDO::PARAM_INT);
		$stm->bindParam(":e", $pid[$i], PDO::PARAM_INT);
		$nrow = $stm->execute();

		$stm=$conn1->prepare("UPDATE financial_year SET chk1=:a, final_status=:d WHERE project_id = :b and fin_year_end = :c ");
		$stm->bindParam(":a", $done, PDO::PARAM_STR);
		$stm->bindParam(":b", $pid[$i], PDO::PARAM_INT);
		$stm->bindParam(":c", $year_end[$i], PDO::PARAM_INT);
		$stm->bindParam(":d", $f_status[$i], PDO::PARAM_INT);
		$nrow = $stm->execute();

		if($f_status[$i]==2||$f_status[$i]==3 ){
			$year[$i]=$year[$i]+1;
			$year_end[$i]=$year_end[$i]+1;
			$stm=$conn1->prepare("INSERT INTO `financial_year`(`project_id`, `yearly_status`, `fin_year_start`, `fin_year_end`, `budget_allocated`) VALUES (:project_id,:y_status,:year,:year_end,:b_all)");
			$stm->bindParam(":project_id", $pid[$i], PDO::PARAM_INT);
			$stm->bindParam(":y_status", $f_status[$i], PDO::PARAM_INT);
			$stm->bindParam(":year", $year[$i], PDO::PARAM_INT);
			$stm->bindParam(":year_end", $year_end[$i], PDO::PARAM_INT);
			$stm->bindParam(":b_all", $b_all[$i], PDO::PARAM_INT);
			$nrow = $stm->execute();			
		}
	}
} catch(PDOException $e) {
	echo "1.Some Error Occurred: " . $e->getMessage();
	exit();
}

header("location:financialEnding.php?EncHid=".$_SESSION['EncTok']);

?>