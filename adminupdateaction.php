<?php
session_start();
if (true) {
    require_once __DIR__ . '/lib/SecurityService.php';
    $antiCSRF = new \Phppot\SecurityService\securityService();
    $csrfResponse = $antiCSRF->validate();
    if (! empty($csrfResponse)) {

    } else {
		echo "<script>location.href='adminedit.php?EncHid=".$_SESSION['EncTok']."&msg=".urlencode("Someting went wrong, please try again later.")."';</script>";
		exit();
    }
}
?>
<!-- /////////////////////////////////////////////////////////////////////////////////////////////////// -->
<?php 
include_once("loginchk.php");
include_once("db.php");
$conn1 = getconnection();

function clean($string) {
   return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
}

function fullclean($str){
	$str=trim($str);
	$str=htmlspecialchars($str, ENT_QUOTES);
	return $str;
}


$const_u=!empty($_POST["constituent"])?fullclean($_POST["constituent"]):null;
$pac=!empty($_POST["pac_code"])?fullclean($_POST["pac_code"]):null;
//$year=!empty($_POST["fin_year"])?$_POST["fin_year"]:null;
//$year_end=!empty($_POST["fin_end_year"])?$_POST["fin_end_year"]:null;
$title=!empty($_POST["title"])?fullclean($_POST["title"]):null;
$coord=!empty($_POST["pc"])?fullclean($_POST["pc"]):null;
$state=!empty($_POST["state"])?fullclean($_POST["state"]):null;
$focus_a=!empty($_POST["focus_area"])?$_POST["focus_area"]:null;	//Array
$focus_area="0";
foreach($focus_a as $val){
	$focus_area.=",".fullclean($val);
}
$type=!empty($_POST["type"])?fullclean($_POST["type"]):null;
$status=!empty($_POST["status"])?fullclean($_POST["status"]):null;
$b_all=!empty($_POST["budget_all"])?fullclean($_POST["budget_all"]):null;
$b_uti=!empty($_POST["budget_util"])?fullclean($_POST["budget_util"]):null;
$level=!empty($_POST["level"])?fullclean($_POST["level"]):null;
$t_grp=!empty($_POST["target_group"])?fullclean($_POST["target_group"]):null;
$stage=!empty($_POST["stage"])?fullclean($_POST["stage"]):null;
$obj=!empty($_POST["objective"])?fullclean($_POST["objective"]):null;
$methodology=!empty($_POST["methodology"])?fullclean($_POST["methodology"]):null;
$tools=!empty($_POST["tools"])?fullclean($_POST["tools"]):null;
$c_agg=!empty($_POST["agencies"])?fullclean($_POST["agencies"]):null;
$diss=!empty($_POST["dissenmination"])?fullclean($_POST["dissenmination"]):null;
$r_submitted=!empty($_POST["report_submission"])?fullclean($_POST["report_submission"]):null;
$pid = fullclean($_POST["pid"]);

try {
	$stm = $conn1->prepare("UPDATE `project_registration` SET `constituent_unit`=:const_u, `pac_code`=:pac, `title`=:title, `proj_coord`=:coord, `state`=:state, `focus_area`=:focus_area, `type`=:type, `status`=:status, `budget_allocated`=:b_all, `budget_utilized`=:b_uti, `level`=:level, `target_group`=:t_grp, `stage`=:stage, `objective`=:obj, `methodology`=:methodology, `tools`=:tools, `collaborating_agencies`=:c_agg, `dissemination`=:diss, `report_submit`=:r_submitted WHERE id = :pid ");
	$stm->bindParam(":const_u", $const_u, PDO::PARAM_INT);
	$stm->bindParam(":pac", $pac, PDO::PARAM_STR, 2000);
	$stm->bindParam(":title", $title, PDO::PARAM_STR, 2000);
	$stm->bindParam(":coord", $coord, PDO::PARAM_STR, 2000);
	$stm->bindParam(":state", $state, PDO::PARAM_INT);
	$stm->bindParam(":focus_area", $focus_area, PDO::PARAM_STR, 2000);
	$stm->bindParam(":type", $type, PDO::PARAM_INT);
	$stm->bindParam(":status", $status, PDO::PARAM_INT);
	$stm->bindParam(":b_all", $b_all, PDO::PARAM_INT);
	$stm->bindParam(":b_uti", $b_uti, PDO::PARAM_INT);
	$stm->bindParam(":level", $level, PDO::PARAM_INT);
	$stm->bindParam(":t_grp", $t_grp, PDO::PARAM_INT);
	$stm->bindParam(":stage", $stage, PDO::PARAM_INT);
	$stm->bindParam(":obj", $obj, PDO::PARAM_STR, 2000);
	$stm->bindParam(":methodology", $methodology, PDO::PARAM_STR, 2000);
	$stm->bindParam(":tools", $tools, PDO::PARAM_STR, 2000);
	$stm->bindParam(":c_agg", $c_agg, PDO::PARAM_STR, 2000);
	$stm->bindParam(":diss", $diss, PDO::PARAM_STR, 2000);
	$stm->bindParam(":r_submitted", $r_submitted, PDO::PARAM_INT);
	$stm->bindParam(":pid", $pid, PDO::PARAM_INT);
	$nrow = $stm->execute();
} catch(PDOException $e) {
	echo "1.Some Error Occurred: " . $e->getMessage();
	exit();
}
//for update budget in financial_year table  readonly style="cursor: not-allowed;"

try {
	$stm = $conn1->prepare("UPDATE `financial_year` SET `budget_allocated`=:b_all, `budget_utilized`=:b_uti WHERE project_id = :pid ");
	$stm->bindParam(":b_all", $b_all, PDO::PARAM_INT);
	$stm->bindParam(":b_uti", $b_uti, PDO::PARAM_INT);
	$stm->bindParam(":pid", $pid, PDO::PARAM_INT);	
	$nrow = $stm->execute();
	} catch(PDOException $e) {
	echo "1.Some Error Occurred: " . $e->getMessage();
	exit();
}


//key performance indicators////////////////////////////////////////////
if($nrow>0&&!empty($_POST["p_indicator"][0])){
	$new_kpr_act=$_POST['new_kpr_act'];	//ARRAY
	$indi=$_POST["p_indicator"];		//Array
	$exp_m=$_POST["comp_month"];		//Array
	$status=$_POST["complete"];			//Array
	$sno = $_POST["kpr_id"];			//Array
	try {
		$len = count($indi);
		for($i=0;$i<$len;$i++){
			$indi[$i]=fullclean($indi[$i]);
			$exp_m[$i]=fullclean($exp_m[$i]);
			$status[$i]=fullclean($status[$i]);
			$sno[$i]=fullclean($sno[$i]);
			if($new_kpr_act[$i]=="true"){
				$stm = $conn1->prepare("INSERT INTO `p_indicators`(`pid`, `per_indi`, `exp_month`, `completed`) VALUES (:project_id,:indi,:m,:c)");
				$stm->bindParam(":project_id", $pid, PDO::PARAM_INT);
				$stm->bindParam(":indi", $indi[$i], PDO::PARAM_STR, 2000);
				$stm->bindParam(":m", $exp_m[$i], PDO::PARAM_INT);
				$stm->bindParam(":c", $status[$i], PDO::PARAM_INT);
				$stm->execute();
			} else if($new_kpr_act[$i]=="false"){
				$stm = $conn1->prepare("UPDATE `p_indicators` SET `per_indi`=:a,`exp_month`=:b,`completed`=:c WHERE `sno`=:d ");
				$stm->bindParam(":a", $indi[$i], PDO::PARAM_STR, 2000);
				$stm->bindParam(":b", $exp_m[$i], PDO::PARAM_INT);
				$stm->bindParam(":c", $status[$i], PDO::PARAM_INT);
				$stm->bindParam(":d", $sno[$i], PDO::PARAM_INT);
				$stm->execute();
			}
		}
	} catch(PDOException $e) {
	  	echo "25.Some Error Occurred: " . $e->getMessage();
	  	exit();
	}
}
/////////////////////////////////////////////////////////////////////////

if($nrow>0&&!empty($_POST["activity_name"][0])){
	$activity=$_POST["activity_name"];	//Array
	$comp_date=$_POST["comp_date"];		//Array
	$status=$_POST["comp_status"];		//Array
	$obst=$_POST["obst"];				//Array
	$new_activity=$_POST["new_activity"]; //Array
	$sno = $_POST["activity_id1"];		//Array
	try {
		$len = count($activity);
		for($i=0;$i<$len;$i++){
			$activity[$i]=fullclean($activity[$i]);
			$comp_date[$i]=fullclean($comp_date[$i]);
			$status[$i]=fullclean($status[$i]);
			$obst[$i]=fullclean($obst[$i]);
			$sno[$i]=fullclean($sno[$i]);
			if($new_activity[$i]=="true"){
				$stm = $conn1->prepare("INSERT INTO `project_activity`(`project_id`, `activity_name`, `comp_date`, `status_completed`, `obstacles`) VALUES (:project_id,:activity,:comp_date,:status,:obst)");
				$stm->bindParam(":project_id", $pid, PDO::PARAM_INT);
				$stm->bindParam(":activity", $activity[$i], PDO::PARAM_STR, 2000);
				$stm->bindParam(":comp_date", $comp_date[$i], PDO::PARAM_STR, 2000);
				$stm->bindParam(":status", $status[$i], PDO::PARAM_INT);
				$stm->bindParam(":obst", $obst[$i], PDO::PARAM_STR, 2000);
				$stm->execute();
			} else if($new_activity[$i]=="false"){
				$stm = $conn1->prepare("UPDATE `project_activity` SET `project_id`=:project_id, `activity_name`=:activity, `comp_date`=:comp_date, `status_completed`=:status, `obstacles`=:obst WHERE sno = :sno ");
				$stm->bindParam(":project_id", $pid, PDO::PARAM_INT);
				$stm->bindParam(":activity", $activity[$i], PDO::PARAM_STR, 2000);
				$stm->bindParam(":comp_date", $comp_date[$i], PDO::PARAM_STR, 2000);
				$stm->bindParam(":status", $status[$i], PDO::PARAM_INT);
				$stm->bindParam(":obst", $obst[$i], PDO::PARAM_STR, 2000);
				$stm->bindParam(":sno", $sno[$i], PDO::PARAM_INT);
				$stm->execute();
			}
		}
	} catch(PDOException $e) {
	  	echo "2.Some Error Occurred: " . $e->getMessage();
	  	exit();
	}
}

if($nrow>0&&!empty($_POST["senc_post"][0])){
	$post=$_POST["senc_post"];					//Array
	$senc_post_num=$_POST["post_sanc_num"];		//Array
	$duration=$_POST["dura"];					//Array
	$expenditure=$_POST["expendi"];				//Array
	$expenditure_used=$_POST["expn_used"];		//Array
	$new_staff = $_POST["new_staff"];			//Array
	$post_id = !empty($_POST["post_id"])?$_POST["post_id"]:null;
	try {
		$len = count($post);
		for($i=0;$i<$len;$i++){
			$post[$i]=fullclean($post[$i]);
			$senc_post_num[$i]=fullclean($senc_post_num[$i]);
			$duration[$i]=fullclean($duration[$i]);
			$expenditure[$i]=fullclean($expenditure[$i]);
			$expenditure_used[$i]=fullclean($expenditure_used[$i]);
			$post_id[$i]=fullclean($post_id[$i]);
			if($new_staff[$i]=="true"){
				$stm = $conn1->prepare("INSERT INTO `project_senc_post`(`project_id`, `post`, `senc_post_num`, `duration`, `expenditure`, `expenditure_used`) VALUES (:project_id,:post,:senc_post_num,:duration,:expenditure,:expenditure_used)");
				$stm->bindParam(":project_id", $pid, PDO::PARAM_INT);
				$stm->bindParam(":post", $post[$i], PDO::PARAM_INT);
				$stm->bindParam(":senc_post_num", $senc_post_num[$i], PDO::PARAM_INT);
				$stm->bindParam(":duration", $duration[$i], PDO::PARAM_INT);
				$stm->bindParam(":expenditure", $expenditure[$i], PDO::PARAM_INT);
				$stm->bindParam(":expenditure_used", $expenditure_used[$i], PDO::PARAM_INT);
				$stm->execute();
			} else if($new_staff[$i]=="false"){
				$stm = $conn1->prepare("UPDATE `project_senc_post` SET `project_id`=:project_id, `post`=:post, `senc_post_num`=:senc_post_num, `duration`=:duration, `expenditure`=:expenditure, `expenditure_used`=:expenditure_used WHERE sno = :sno ");
				$stm->bindParam(":project_id", $pid, PDO::PARAM_INT);
				$stm->bindParam(":post", $post[$i], PDO::PARAM_INT);
				$stm->bindParam(":senc_post_num", $senc_post_num[$i], PDO::PARAM_INT);
				$stm->bindParam(":duration", $duration[$i], PDO::PARAM_INT);
				$stm->bindParam(":expenditure", $expenditure[$i], PDO::PARAM_INT);
				$stm->bindParam(":expenditure_used", $expenditure_used[$i], PDO::PARAM_INT);
				$stm->bindParam(":sno", $post_id[$i], PDO::PARAM_INT);
				$stm->execute();
			}
		}
	} catch(PDOException $e) {
	  	echo "3.Some Error Occurred: " . $e->getMessage();
	  	exit();
	}
}


$mrid = !empty($_POST["mrid"])?fullclean($_POST["mrid"]):null;
$new_entry=$_POST["new_entry"]??null;
$act_id=!empty($_POST["mr_activity_id"])?$_POST["mr_activity_id"]:null;
$act_title=$_POST["acti_name"]??null;
$apprv_athor=$_POST["apprv_authority"]??null;
$dur=$_POST["duration"]??null;
$date=$_POST["a_date"]??null;
$b_date=$_POST["b_date"]??null;
$venue=$_POST["venue"]??null;
$nlp=$_POST["num_level_part"]??null;
$nlp_b=$_POST["number_level_part"]??null;
$remarks=$_POST["a_remarks"]??null;
$fin_year_end=$_POST['fin_year_end']??null;
$month = !empty($_POST["curr_month"])?$_POST["curr_month"]:null;
try {
	$len = count($act_title);
	for($i=0,$j=0;$i<$len;$i++){
		$month[$j]=fullclean($month[$j]);
		$fin_year_end[$j]=fullclean($fin_year_end[$j]);
		$act_title[$i]=fullclean($act_title[$i]);
		$apprv_athor[$i]=fullclean($apprv_athor[$i]);
		$dur[$i]=fullclean($dur[$i]);
		$date[$i]=fullclean($date[$i]);
		$b_date[$i]=fullclean($b_date[$i]);
		$venue[$i]=fullclean($venue[$i]);
		$nlp[$i]=fullclean($nlp[$i]);
		$nlp_b[$i]=fullclean($nlp_b[$i]);
		$remarks[$i]=fullclean($remarks[$i]);
		$act_id[$i]=fullclean($act_id[$i]);
		if($new_entry[$i]=="true"){
			$stm = $conn1->query("SELECT sno from project_monthly_report where month = '$month[$j]' and project_id = '$pid' and `fin_year_end` = '$fin_year_end[$j]' ");
	        $row = $stm->fetch();
	        if(empty($row["sno"])){	  //incase monthly report of past month is entered, no previous available
				$time=date($fin_year_end[$j]."/m/d");
	        	$stm=$conn1->prepare("INSERT INTO `project_monthly_report`(`project_id`, `month`, `fin_year_end`, `chk1`, `chk2`,`time`) VALUES (:a,:b,:e,:c,:d,:e)");
	        	$su="Submit";
	        	$stm->bindParam(":a",$pid,PDO::PARAM_INT);
	        	$stm->bindParam(":b",$month[$j],PDO::PARAM_INT);
	        	$stm->bindParam(":e",$fin_year_end[$j],PDO::PARAM_INT);
	        	$stm->bindParam(":c",$su,PDO::PARAM_STR);
	        	$stm->bindParam(":d",$su,PDO::PARAM_STR);
	        	$stm->bindParam(":e",$time,PDO::PARAM_STR);
				$stm->execute();

				$stm = $conn1->query("select sno from project_monthly_report where month = '$month[$j]' and project_id = '$pid' and fin_year_end = $fin_year_end[$j]");
	        	$row = $stm->fetch();
	        }
	        $j++;
	        $mrid = $row["sno"];

			$stm = $conn1->prepare("INSERT INTO `project_mr_activity`( `mr_id`, `activity_title`, `approving_authority`, `duration`, `date`, `till_date`, `venue`, `num_lvl_participants`, `number_lvl_participants`, `remarks`) VALUES (:id,:at,:aa,:du,:da,:db,:ve,:nlp,:nlp_b,:rmk)");
			$stm->bindParam(":id", $mrid, PDO::PARAM_INT);
			$stm->bindParam(":at", $act_title[$i], PDO::PARAM_STR, 2000);
			$stm->bindParam(":aa", $apprv_athor[$i], PDO::PARAM_STR, 2000);
			$stm->bindParam(":du", $dur[$i], PDO::PARAM_INT);
			$stm->bindParam(":da", $date[$i], PDO::PARAM_STR, 2000);
			$stm->bindParam(":db", $b_date[$i], PDO::PARAM_STR, 2000);
			$stm->bindParam(":ve", $venue[$i], PDO::PARAM_STR, 2000);
			$stm->bindParam(":nlp", $nlp[$i], PDO::PARAM_STR, 2000);
			$stm->bindParam(":nlp_b", $nlp_b[$i], PDO::PARAM_INT);
			$stm->bindParam(":rmk", $remarks[$i], PDO::PARAM_STR, 2000);
			$stm->execute();
		} else if($new_entry[$i]=="false"){
			$stm = $conn1->prepare("UPDATE `project_mr_activity` SET `mr_id`=:id, `activity_title`=:at, `approving_authority`=:aa, `duration`=:du, `date`=:da, `till_date`=:db, `venue`=:ve, `num_lvl_participants`=:nlp, `number_lvl_participants`=:nlp_b, `remarks`=:rmk WHERE id = :act_id");
			$stm->bindParam(":id", $mrid[$i], PDO::PARAM_INT);
			$stm->bindParam(":at", $act_title[$i], PDO::PARAM_STR, 2000);
			$stm->bindParam(":aa", $apprv_athor[$i], PDO::PARAM_STR, 2000);
			$stm->bindParam(":du", $dur[$i], PDO::PARAM_INT);
			$stm->bindParam(":da", $date[$i], PDO::PARAM_STR, 2000);
			$stm->bindParam(":db", $b_date[$i], PDO::PARAM_STR, 2000);
			$stm->bindParam(":ve", $venue[$i], PDO::PARAM_STR, 2000);
			$stm->bindParam(":nlp", $nlp[$i], PDO::PARAM_STR, 2000);
			$stm->bindParam(":nlp_b", $nlp_b[$i], PDO::PARAM_INT);
			$stm->bindParam(":rmk", $remarks[$i], PDO::PARAM_STR, 2000);
			$stm->bindParam(":act_id", $act_id[$i], PDO::PARAM_INT);
			$stm->execute();
		}
	} 
}catch(PDOException $e) {
	  	echo "4.Some Error Occurred: " . $e->getMessage();
	  	exit();
}

try{
	$bud=$_POST['c_month_budget']??null;
	$mr_mon_id=$_POST['mr_month_id']??null;
	$prog=$_POST['obs_txt']??null;
	for($i=0;$i<count($mr_mon_id);$i++){
		$bud[$i]=fullclean($bud[$i]);
		$prog[$i]=fullclean($prog[$i]);
		$mr_mon_id[$i]=fullclean($mr_mon_id[$i]);
		$stm = $conn1->prepare("UPDATE `project_monthly_report` SET `budget_utilized`=:a,`progress_till_date`=:b WHERE sno = :c");
				$stm->bindParam(":a", $bud[$i], PDO::PARAM_INT);
				$stm->bindParam(":b", $prog[$i], PDO::PARAM_STR);
				$stm->bindParam(":c", $mr_mon_id[$i], PDO::PARAM_INT);
				$stm->execute();
	}
}catch(PDOException $e) {
	  	echo "5.Some Error Occurred: " . $e->getMessage();
	  	exit();
}

try {
	$stm=$conn1->query("SELECT sum(budget_utilized) as bud_t, fin_year_end from project_monthly_report where project_id = $pid and chk1='Submit' GROUP BY fin_year_end ");
	$rows=$stm->fetchAll(PDO::FETCH_ASSOC);
	$stm007=$conn1->query("SELECT sum(amnt_spent) as acr_b ,completion_fy_end as acr_fy FROM `acr` left join project_activity on acr.mr_activity_id=project_activity.sno WHERE project_activity.project_id=$pid and acr.chk1='Submit' group BY completion_fy_end");
	$rows007=$stm007->fetchAll(PDO::FETCH_ASSOC);
	foreach($rows as $val){
		$t_bud = $val['bud_t'];
		foreach ($rows007 as $val007) {
			if($val['fin_year_end']==$val007['acr_fy'])
				$t_bud=$val['bud_t']+$val007['acr_b'];
		}
		$f_year = $val['fin_year_end'];
		$stm=$conn1->prepare("UPDATE financial_year set budget_utilized = :a where project_id = :b and fin_year_end = :c");
		$stm->bindParam(":a",$t_bud,PDO::PARAM_INT);
		$stm->bindParam(":b",$pid,PDO::PARAM_INT);
		$stm->bindParam(":c",$f_year,PDO::PARAM_INT);
		$stm->execute();
	}
}catch(PDOException $e) {
		  	echo "6.Some Error Occurred: " . $e->getMessage();
		  	exit();
	}


?>

<form action="projectview.php?EncHid=<?php echo $_SESSION['EncTok'] ?>" method="POST" name="myForm">
	<input type="submit" name="submit" id="verma" value="<?php echo $pid ?>">
</form>
<script type="text/javascript">document.getElementById("verma").click();</script>