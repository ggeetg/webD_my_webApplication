<?php
session_start();
if (true) {
    require_once __DIR__ . '/lib/SecurityService.php';
    $antiCSRF = new \Phppot\SecurityService\securityService();
    $csrfResponse = $antiCSRF->validate();
    if (! empty($csrfResponse)) {

    } else {
		echo "<script>location.href='monthlyreport.php?EncHid=".$_SESSION['EncTok']."&msg=".urlencode("Someting went wrong, please try again later.")."';</script>";
		exit();
    }
}
?>
<!-- /////////////////////////////////////////////////////////////////////////////////////////////////// -->
<?php include_once('loginchk.php') ;
include_once("db.php");
$conn1=getconnection();

function fullclean($str){
	$str=trim($str);
	$str=htmlspecialchars($str, ENT_QUOTES);
	return $str;
}


// if($_POST["submit"]=="Submit"){
// 	$prid=$_POST['project_sno'];
// 	$month = date("m");
// 	$stm=$conn1->query("SELECT b.sno, a.chk1 from acr as a right join project_activity as b on a.mr_activity_id = b.sno where b.project_id = $prid and MONTH(comp_date) = $month");
// 	$rows = $stm->fetchAll(PDO::FETCH_ASSOC);
// 	foreach ($rows as $val) {
// 		if($val['chk1']=="Pending"||$val['chk1']==""){
// 			echo "<script>location.href='monthlyreport.php?EncHid=".$_SESSION['EncTok']."&msg=".urlencode("Please fill the Activity Completion Report (ACR) of current month before submitting the final report.")."';</script>";
// 			$_POST["submit"]="Save";
// 		}
// 	}
// }

$activity_id=$_POST["activity_id1"];
$activity_status=$_POST["comp_status1"];
$len=count($activity_id);
for($i=0;$i<$len;$i++){
	$activity_id[$i]=fullclean($activity_id[$i]);
	if($activity_status[$i]==1){
		$stm = $conn1->prepare("SELECT chk1 from acr where mr_activity_id = :a");
		$stm->bindParam(":a", $activity_id[$i] );
		$stm->execute();
		$row=$stm->fetch();
		if($row['chk1']=="Pending"||$row['chk1']==""){
			$_POST["comp_status1"][$i]=2;
			echo $_POST["comp_status1"][$i];
		}
	}
}


function validate_input(){
	$flag=1;
	$flag_msg="";
	if($_POST['submit']=='Submit'){
		foreach ($_POST['comp_status1'] as $val) {
			if($val==""||empty($val)){
				$flag=0;
				$flag_msg.=' Activity Proposed Completed/Not Completed ';
			}
		}
		foreach ($_POST['expn_used'] as $val) {
			if($val==""||empty($val)){
				$flag=0;
				$flag_msg.=' , Project staff expenditure used ';
			}
			if(!is_numeric($val)){
				$flag=0;
				$val=null;
				$flag_msg.=' , Project staff expenditure used must be numeric value ';
			}
		}
		if($_POST['c_month_budget']==""){
				$flag=0;
				$flag_msg.=' , Budget utilized ';
			}
		if(!is_numeric($_POST['c_month_budget'])){
				$flag=0;
				$_POST['c_month_budget']=null;
				$flag_msg.=' , Budget utilized must be numeric value ';
			}
		if($_POST['obs_txt']==""){
				$flag=0;
				$flag_msg.=' , Progress till date ';
			}
	if($_POST['acti_name'][0]!=""){
		foreach ($_POST['acti_name'] as $val) {
			if($val==""||empty($val)){
				$flag=0;
				$flag_msg.=' , Title of the Activity ';
			}
		}
		foreach ($_POST['apprv_authority'] as $val) {
			if($val==""||empty($val)){
				$flag=0;
				$flag_msg.=' , Name of the Approving Authority ';
			}
		}
		foreach ($_POST['duration'] as $val) {
			if($val==""||empty($val)){
				$flag=0;
				$flag_msg.=' , Duration ';
			}
			if(!is_numeric($val)){
				$flag=0;
				$val=null;
				$flag_msg.=' , Duration must be numeric value ';
			}
		}
		foreach ($_POST['a_date'] as $val) {
			if($val==""||empty($val)){
				$flag=0;
				$flag_msg.=' , Date ';
			}
		}
		foreach ($_POST['b_date'] as $val) {
			if($val==""||empty($val)){
				$flag=0;
				$flag_msg.=' , Date ';
			}
		}
		foreach ($_POST['venue'] as $val) {
			if($val==""||empty($val)){
				$flag=0;
				$flag_msg.=' , Venue ';
			}
		}
		foreach ($_POST['num_level_part'] as $val) {
			if($val==""||empty($val)){
				$flag=0;
				$flag_msg.=' , Level of Participants ';
			}
		}
		foreach ($_POST['number_level_part'] as $val) {
			if($val==""||empty($val)){
				$flag=0;
				$flag_msg.=' , Number of Participants ';
			}
			if(!is_numeric($val)){
				$flag=0;
				$val=null;
				$flag_msg.=' , Number of Participants must ne numeric value ';
			}
		}
	}
		if($flag==0){
			echo "<script>location.href='monthlyreport.php?EncHid=".$_SESSION['EncTok']."&msg=".urlencode("Please fill the following fields:-".$flag_msg.".")."';</script>";
			$_POST['submit']='Save';
		}
	}
}
validate_input();


function clean($string) {
   return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
}

//ARRAY
$activity_id=$_POST["activity_id1"];
$activity_status=$_POST["comp_status1"];
$activity_obst=$_POST["obst1"];
$len=count($activity_id);
try {
	for($i=0;$i<$len;$i++){
		$activity_status[$i]=fullclean($activity_status[$i]);
		$activity_obst[$i]=fullclean($activity_obst[$i]);
		$activity_id[$i]=fullclean($activity_id[$i]);
		$stm = $conn1->prepare("UPDATE `project_activity` SET `status_completed`=:sc,`obstacles`=:ob WHERE `sno` = :id");
		$stm->bindParam(":sc", $activity_status[$i], PDO::PARAM_INT);
		$stm->bindParam(":ob", $activity_obst[$i], PDO::PARAM_STR, 1000);
		$stm->bindParam(":id", $activity_id[$i], PDO::PARAM_INT);
		$stm->execute();
	}
} catch(PDOException $e) {
	  	echo "1.Some Error Occurred: " . $e->getMessage();
	  	exit();
	}

if(!empty($_POST["activity_name"][0])){
	$project_id=$_POST["project_sno"];
	$activity=$_POST["activity_name"];	//Array
	$comp_date=$_POST["comp_date"];		//Array
	$status=$_POST["comp_status"];		//Array
	$obst=$_POST["obst"];				//Array
	try {
		$len = count($activity);
		for($i=0;$i<$len;$i++){
			$project_id[$i]=fullclean($project_id[$i]);
			$activity[$i]=fullclean($activity[$i]);
			$comp_date[$i]=fullclean($comp_date[$i]);
			$status[$i]=fullclean($status[$i]);
			$obst[$i]=fullclean($obst[$i]);
			$stm = $conn1->prepare("INSERT INTO `project_activity`(`project_id`, `activity_name`, `comp_date`, `status_completed`, `obstacles`) VALUES (:project_id,:activity,:comp_date,:status,:obst)");
			$stm->bindParam(":project_id", $project_id[$i], PDO::PARAM_INT);
			$stm->bindParam(":activity", $activity[$i], PDO::PARAM_STR, 1000);
			$stm->bindParam(":comp_date", $comp_date[$i], PDO::PARAM_STR, 1000);
			$stm->bindParam(":status", $status[$i], PDO::PARAM_INT);
			$stm->bindParam(":obst", $obst[$i], PDO::PARAM_STR, 1000);
			$stm->execute();
		}
	} catch(PDOException $e) {
	  	echo "2.Some Error Occurred: " . $e->getMessage();
	  	exit();
	}
}


$expnd_till=$_POST["expn_used"];
$post_id=$_POST["post_id"];
try {
	$len = count($post_id);
	for($i=0;$i<$len;$i++){
		$expnd_till[$i]=fullclean($expnd_till[$i]);
		$post_id[$i]=fullclean($post_id[$i]);
		$stm = $conn1->prepare("UPDATE `project_senc_post` SET `expenditure_used`=:exp_u WHERE `sno` = :id");
		$stm->bindParam(":exp_u", $expnd_till[$i], PDO::PARAM_INT);
		$stm->bindParam(":id", $post_id[$i], PDO::PARAM_INT);
		$stm->execute();
	}
} catch(PDOException $e) {
	  	echo "3.Some Error Occurred: " . $e->getMessage();
	  	exit();
}


$mrid = fullclean($_POST["mrid"]);
$pid=fullclean($_POST["project_sno"]);
$month=fullclean($_POST["curr_month"]);
$budget_u=fullclean($_POST["c_month_budget"]);
$progress_till=fullclean($_POST["obs_txt"]);
$chk1=($_POST["submit"]=="Save")?"Pending":"Submit";
try {
$stm = $conn1->prepare("UPDATE `project_monthly_report`SET `project_id`=:pid, `month`=:mn, `budget_utilized`=:bu, `progress_till_date`=:ptd, `chk1`=:chk WHERE sno = :mrid ");
$stm->bindParam(":pid", $pid, PDO::PARAM_INT);
$stm->bindParam(":mn", $month, PDO::PARAM_INT);
$stm->bindParam(":bu", $budget_u, PDO::PARAM_INT);
$stm->bindParam(":ptd", $progress_till, PDO::PARAM_STR, 1000);
$stm->bindParam(":chk", $chk1, PDO::PARAM_STR, 1000);
$stm->bindParam(":mrid", $mrid, PDO::PARAM_INT);
$stm->execute();
} catch(PDOException $e) {
	  	echo "4.Some Error Occurred: " . $e->getMessage();
	  	exit();
}

// if(!empty($_POST["mraid"])){
// 	$exp = $_POST["mraid"]; //string of activity_id
// 	$mraid = explode(",", $exp);
// 	try {
// 		if(count($mraid)>0){
// 			for($i=0;$i<count($mraid);$i++){
// 				$stm = $conn1->exec("DELETE FROM `project_mr_activity` WHERE id = $mraid[$i]");
// //				echo "DELETE FROM `project_mr_activity` WHERE id = $mraid[$i]";
// 			}
// 		}
// 	} catch(PDOException $e) {
// 		  	echo "5.Some Error Occurred: " . $e->getMessage();
// 		  	exit();
// 	}
// }

$new_entry=$_POST["new_entry"];
$act_id=$_POST["mr_activity_id"];
$act_title=$_POST["acti_name"];
$apprv_athor=$_POST["apprv_authority"];
$dur=$_POST["duration"];
$date=$_POST["a_date"];
$b_date=$_POST["b_date"];
$venue=$_POST["venue"];
$nlp=$_POST["num_level_part"];
$nlp_b=$_POST["number_level_part"];
$remarks=$_POST["a_remarks"];
if(true){  //if(!empty($_POST["acti_name"][0])){
	try {
		$len = count($act_title);
		for($i=0;$i<$len;$i++){
			$act_id[$i]=fullclean($act_id[$i]);
			$act_title[$i]=fullclean($act_title[$i]);
			$apprv_athor[$i]=fullclean($apprv_athor[$i]);
			$dur[$i]=fullclean($dur[$i]);
			$date[$i]=fullclean($date[$i]);
			$b_date[$i]=fullclean($b_date[$i]);
			$venue[$i]=fullclean($venue[$i]);
			$nlp[$i]=fullclean($nlp[$i]);
			$nlp_b[$i]=fullclean($nlp_b[$i]);
			$remarks[$i]=fullclean($remarks[$i]);
			if($new_entry[$i]=="true"){
				$stm = $conn1->prepare("INSERT INTO `project_mr_activity`( `mr_id`, `activity_title`, `approving_authority`, `duration`, `date`, `till_date`, `venue`, `num_lvl_participants`, `number_lvl_participants`, `remarks`) VALUES (:id,:at,:aa,:du,:da,:db,:ve,:nlp,:nlp_b,:rmk)");
				$stm->bindParam(":id", $mrid, PDO::PARAM_INT);
				$stm->bindParam(":at", $act_title[$i], PDO::PARAM_STR, 1000);
				$stm->bindParam(":aa", $apprv_athor[$i], PDO::PARAM_STR, 1000);
				$stm->bindParam(":du", $dur[$i], PDO::PARAM_INT);
				$stm->bindParam(":da", $date[$i], PDO::PARAM_STR, 1000);
				$stm->bindParam(":db", $b_date[$i], PDO::PARAM_STR, 1000);
				$stm->bindParam(":ve", $venue[$i], PDO::PARAM_STR, 1000);
				$stm->bindParam(":nlp", $nlp[$i], PDO::PARAM_STR, 1000);
				$stm->bindParam(":nlp_b", $nlp_b[$i], PDO::PARAM_INT);
				$stm->bindParam(":rmk", $remarks[$i], PDO::PARAM_STR, 1000);
				$stm->execute();
			} else if($new_entry[$i]=="false"){
				$stm = $conn1->prepare("UPDATE `project_mr_activity` SET `mr_id`=:id, `activity_title`=:at, `approving_authority`=:aa, `duration`=:du, `date`=:da, `till_date`=:db, `venue`=:ve, `num_lvl_participants`=:nlp, `number_lvl_participants`=:nlp_b, `remarks`=:rmk WHERE id = :act_id");
				$stm->bindParam(":id", $mrid, PDO::PARAM_INT);
				$stm->bindParam(":at", $act_title[$i], PDO::PARAM_STR, 1000);
				$stm->bindParam(":aa", $apprv_athor[$i], PDO::PARAM_STR, 1000);
				$stm->bindParam(":du", $dur[$i], PDO::PARAM_INT);
				$stm->bindParam(":da", $date[$i], PDO::PARAM_STR, 1000);
				$stm->bindParam(":db", $b_date[$i], PDO::PARAM_STR, 1000);
				$stm->bindParam(":ve", $venue[$i], PDO::PARAM_STR, 1000);
				$stm->bindParam(":nlp", $nlp[$i], PDO::PARAM_STR, 1000);
				$stm->bindParam(":nlp_b", $nlp_b[$i], PDO::PARAM_STR, 1000);
				$stm->bindParam(":rmk", $remarks[$i], PDO::PARAM_STR, 1000);
				$stm->bindParam(":act_id", $act_id[$i], PDO::PARAM_STR, 1000);
				$stm->execute();
			}
		} 
	}catch(PDOException $e) {
		  	echo "6.Some Error Occurred: " . $e->getMessage();
		  	exit();
	}
}

$fin_year_end=$_POST['fin_year_end'];
if($_POST['submit']=="Submit"){
	try {
		$stm=$conn1->query("SELECT sum(budget_utilized) as bud_t from project_monthly_report where project_id = $pid and fin_year_end=$fin_year_end ");
		$row=$stm->fetch();
		$t_bud = $row['bud_t'];
		$stm=$conn1->query("SELECT sum(amnt_spent) as acr_t FROM `acr` left join project_activity on acr.mr_activity_id=project_activity.sno WHERE project_activity.project_id=$pid and acr.chk1='Submit' and completion_fy_end = $fin_year_end ");
		$row=$stm->fetch();
		$t_acr_amt=$row['acr_t'];
		$t_bud_utl=$t_bud+$t_acr_amt;
		$stm=$conn1->prepare("UPDATE financial_year set budget_utilized = :a where project_id = :b and fin_year_end = :c ");
		$stm->bindParam(":a",$t_bud_utl,PDO::PARAM_INT);
		$stm->bindParam(":b",$pid,PDO::PARAM_INT);
		$stm->bindParam(":c",$fin_year_end,PDO::PARAM_INT);
		$stm->execute();
	}catch(PDOException $e) {
			  	echo "7.Some Error Occurred: " . $e->getMessage();
			  	exit();
		}
	}

// performance indicators //////////////////////////////////////////
$c1=$_POST['complete'];
$i_sno=$_POST['indi_sno'];
if($c1!=""){
	for($i=0;$i<count($c1);$i++){
		$c1[$i]=fullclean($c1[$i]);
		$i_sno[$i]=fullclean($i_sno[$i]);
		$stm = $conn1->prepare("UPDATE `p_indicators` SET `completed`=:a WHERE `sno`=:b");
			$stm->bindParam(":a", $c1[$i], PDO::PARAM_INT);
			$stm->bindParam(":b", $i_sno[$i], PDO::PARAM_INT);
			$stm->execute();
	}
}
///////////////////////////////////////////////////////////////////

	echo "<script>location.href='monthlyreport.php?EncHid=".$_SESSION['EncTok']."';</script>";


