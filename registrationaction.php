<?php
session_start();
if (true) {
	require_once __DIR__ . '/lib/SecurityService.php';
	$antiCSRF = new \Phppot\SecurityService\securityService();
	$csrfResponse = $antiCSRF->validate();
	if (!empty($csrfResponse)) {
	} else {
		echo "<script>location.href='registration.php?EncHid=" . $_SESSION['EncTok'] . "&msg=" . urlencode("Someting went wrong, please try again later.") . "';</script>";
		exit();
	}
}
?>
<!-- /////////////////////////////////////////////////////////////////////////////////////////////////// -->
<?php
include_once("loginchk.php");
include_once("db.php");
include_once("validate.php");
$conn1 = getconnection();

function clean($string)
{
	return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
}

function fullclean($str)
{
	$str = trim($str);
	$str = htmlspecialchars($str, ENT_QUOTES);
	return $str;
}

//validation of data
function validate_input()
{
	$flag = 1;
	$flag_msg = "";

	if (validate_req($_POST['fin_year']) || validate_numeric($_POST['fin_year'])) {
		$flag = 0;
		$flag_msg .= ' , Financial year ';
	}
	if (validate_req($_POST['prj_type']) || validate_numeric($_POST['prj_type'])) {
		$flag = 0;
		$flag_msg .= ' , PAC/PAB/Others ';
		echo "ajay " . $flag;
	}
	if (validate_req($_POST['constituent']) || validate_numeric($_POST['constituent'])) {
		$flag = 0;
		$flag_msg .= ' , Constituent unit ';
		echo "ajay " . $flag;
	}
	if (validate_req($_POST['title'])) {
		$flag = 0;
		$flag_msg .= ' , Title ';
		echo "ajay " . $flag;
	}
	if (validate_req($_POST['pc']) || validate_numeric($_POST['pc'])) {
		$flag = 0;
		$flag_msg .= ' , Programme coordinator ';
		echo "ajay " . $flag;
	}
	if (validate_req($_POST['state']) || validate_numeric($_POST['state'])) {
		$flag = 0;
		$flag_msg .= ' , State ';
		echo "ajay " . $flag;
	}
	if (validate_req($_POST['type']) || validate_numeric($_POST['type'])) {
		$flag = 0;
		$flag_msg .= ' , Type ';
		echo "ajay " . $flag;
	}
	if (validate_req($_POST['status']) || validate_numeric($_POST['status'])) {
		$flag = 0;
		$flag_msg .= ' , Status ';
		echo "ajay " . $flag;
	}
	if (validate_req($_POST['level']) || validate_numeric($_POST['level'])) {
		$flag = 0;
		$flag_msg .= ' , Level ';
		echo "ajay " . $flag;
	}
	if (validate_req($_POST['target_group']) || validate_numeric($_POST['target_group'])) {
		$flag = 0;
		$flag_msg .= ' , Target group ';
		echo "ajay " . $flag;
	}
	if (validate_req($_POST['stage']) || validate_numeric($_POST['stage'])) {
		$flag = 0;
		$flag_msg .= ' , Stage ';
		echo "ajay " . $flag;
	}
	if (validate_req($_POST['objective'])) {
		$flag = 0;
		$flag_msg .= ' , Objective ';
		echo "ajay " . $flag;
	}
	if (validate_req($_POST['methodology'])) {
		$flag = 0;
		$flag_msg .= ' , Methodology ';
		echo "ajay " . $flag;
	}
	if (validate_req($_POST['tools'])) {
		$flag = 0;
		$flag_msg .= ' , Tools ';
		echo "ajay " . $flag;
	}
	if (validate_req($_POST['agencies'])) {
		$flag = 0;
		$flag_msg .= ' , Agencies ';
		echo "ajay " . $flag;
	}
	if (validate_req($_POST['dissenmination'])) {
		$flag = 0;
		$flag_msg .= ' , Dissemination ';
		echo "ajay " . $flag;
	}
	if (validate_req($_POST['report_submission'])) {
		$flag = 0;
		$flag_msg .= ' , Report submission ';
		echo "ajay " . $flag;
	}
	foreach ($_POST['focus_area'] as $val) {
		if (validate_req($val)) {
			$flag = 0;
			$flag_msg .= ' , Focus area ';
			echo "ajay " . $flag;
		}
	}
	if (validate_req($_POST['budget_all']) || validate_numeric($_POST['budget_all'])) {
		$flag = 0;
		$flag_msg .= ' , Budget allocated ';
		echo "ajay1 " . $flag;
	}
	if (validate_req($_POST['budget_util']) || validate_numeric($_POST['budget_util'])) {
		$flag = 0;
		$flag_msg .= ' , Budget utilized ';
		echo "ajay " . $flag;
	}
	if (validate_req($_POST['fin_year']) || validate_numeric($_POST['fin_year'])) {
		$flag = 0;
		$flag_msg .= ' , Year of commencement ';
		echo "ajay " . $flag;
	}
	if (validate_req($_POST['fin_end_year']) || validate_numeric($_POST['fin_end_year'])) {
		$flag = 0;
		$flag_msg .= ' , Year of completion ';
		echo "ajay " . $flag;
	}
	foreach ($_POST['activity_name'] as $val) {
		if (validate_req($val)) {
			$flag = 0;
			$flag_msg .= ' , Activity name ';
		}
	}
	foreach ($_POST['comp_date'] as $val) {
		if (validate_req($val)) {
			$flag = 0;
			$flag_msg .= ' , Date of completion ';
		}
	}
	foreach ($_POST['comp_status'] as $val) {
		if (validate_req($val) || validate_numeric($val)) {
			$flag = 0;
			$flag_msg .= ' , Completed/not completed ';
		}
	}
	// foreach ($_POST['obst'] as $val) {
	// 	if(validate_req($val)){
	// 		$flag=0;
	// 		$flag_msg.=' , Obstacles ';
	// 	}
	// }
	foreach ($_POST['senc_post'] as $val) {
		if (validate_req($val) || validate_numeric($val)) {
			$flag = 0;
			$flag_msg .= ' , Post ';
		}
	}
	foreach ($_POST['post_sanc_num'] as $val) {
		if (validate_req($val) || validate_numeric($val)) {
			$flag = 0;
			$flag_msg .= ' , Post sanctioned number ';
		}
	}
	foreach ($_POST['dura'] as $val) {
		if (validate_req($val) || validate_numeric($val)) {
			$flag = 0;
			$flag_msg .= ' , Duration ';
		}
	}
	foreach ($_POST['expendi'] as $val) {
		if (validate_req($val) || validate_numeric($val)) {
			$flag = 0;
			$flag_msg .= ' , Total expenditure ';
		}
	}
	foreach ($_POST['expn_used'] as $val) {
		if (validate_req($val) || validate_numeric($val)) {
			$flag = 0;
			$flag_msg .= ' , Expenditure used till date ';
		}
	}
	foreach ($_POST['p_indicator'] as $val) {
		if (validate_req($val)) {
			$flag = 0;
			$flag_msg .= ' , Performance Indicators ';
		}
	}
	foreach ($_POST['complete'] as $val) {
		if (validate_req($val) || validate_numeric($val)) {
			$flag = 0;
			$flag_msg .= ' , Key Performance Status ';
		}
	}

	if ($flag == 0) {
		echo "<script>location.href='registration.php?EncHid=" . $_SESSION['EncTok'] . "&msg=" . urlencode("All fields are mandatory. Please fill the following fields correctly:-" . $flag_msg . ".") . "';</script>";
		exit();
	}
}
validate_input();
/////////////////////////////////////////////////////////////


//generate automatic pac code
$in_y = clean($_POST['fin_year']);
$in_year = substr($in_y, -2);
$prj_type = clean($_POST['prj_type']);
$dept_id = clean($_POST['constituent']);
$stm = $conn1->query("SELECT dept_pac_code from department WHERE id = $dept_id ");
$row = $stm->fetch();
$dept_pac = $row['dept_pac_code'];
$type = clean($_POST['type']);
$stm = $conn1->query("SELECT type from program_type WHERE sno = $type ");
$row = $stm->fetch();
$type = $row['type'][0];
$stm = $conn1->query("SELECT count(a.id) as tp from project_registration AS a LEFT JOIN financial_year AS b ON a.id = b.project_id WHERE a.constituent_unit = $dept_id AND b.fin_year_start = $in_y AND (a.status = 1 OR a.status = 6) ");
$row = $stm->fetch();
$sr_no = $row['tp'] + 1;
$_POST["pac_code"] = $in_year . $prj_type . sprintf("%02s", $dept_pac) . $type . sprintf("%02s", $sr_no);
// echo $_POST["pac_code"];
// exit;
/////////////////////////////////////////////////////////////


$const_u = !empty($_POST["constituent"]) ? fullclean($_POST["constituent"]) : null;
$pac = !empty($_POST["pac_code"]) ? fullclean($_POST["pac_code"]) : null;
$title = !empty($_POST["title"]) ? fullclean($_POST["title"]) : null;
$coord = !empty($_POST["pc"]) ? fullclean($_POST["pc"]) : null;
$state = !empty($_POST["state"]) ? fullclean($_POST["state"]) : null;
$focus_a = !empty($_POST["focus_area"]) ? $_POST["focus_area"] : null;	//Array
$focus_area = "0";
foreach ($focus_a as $val) {
	$focus_area .= "," . $val;
}
$type = !empty($_POST["type"]) ? fullclean($_POST["type"]) : null;
$prj_status = !empty($_POST["status"]) ? fullclean($_POST["status"]) : null;
$level = !empty($_POST["level"]) ? fullclean($_POST["level"]) : null;
$t_grp = !empty($_POST["target_group"]) ? fullclean($_POST["target_group"]) : null;
$stage = !empty($_POST["stage"]) ? fullclean($_POST["stage"]) : null;
$obj = !empty($_POST["objective"]) ? fullclean($_POST["objective"]) : null;
$methodology = !empty($_POST["methodology"]) ? fullclean($_POST["methodology"]) : null;
$tools = !empty($_POST["tools"]) ? fullclean($_POST["tools"]) : null;
$c_agg = !empty($_POST["agencies"]) ? fullclean($_POST["agencies"]) : null;
$diss = !empty($_POST["dissenmination"]) ? fullclean($_POST["dissenmination"]) : null;
$r_submitted = !empty($_POST["report_submission"]) ? fullclean($_POST["report_submission"]) : null;


try {
	$stm = $conn1->prepare("INSERT INTO `project_registration`(`constituent_unit`, `pac_code`, `title`, `proj_coord`, `state`, `focus_area`, `type`, `status`, `level`, `target_group`, `stage`, `objective`, `methodology`, `tools`, `collaborating_agencies`, `dissemination`, `report_submit`) VALUES (:const_u,:pac,:title,:coord,:state,:focus_area,:type,:status,:level,:t_grp,:stage,:obj,:methodology,:tools,:c_agg,:diss,:r_submitted)");
	$stm->bindParam(":const_u", $const_u, PDO::PARAM_INT);
	$stm->bindParam(":pac", $pac, PDO::PARAM_STR, 1000);
	$stm->bindParam(":title", $title, PDO::PARAM_STR, 1000);
	$stm->bindParam(":coord", $coord, PDO::PARAM_STR, 1000);
	$stm->bindParam(":state", $state, PDO::PARAM_INT);
	$stm->bindParam(":focus_area", $focus_area, PDO::PARAM_STR, 500);
	$stm->bindParam(":type", $type, PDO::PARAM_INT);
	$stm->bindParam(":status", $prj_status, PDO::PARAM_INT);
	$stm->bindParam(":level", $level, PDO::PARAM_INT);
	$stm->bindParam(":t_grp", $t_grp, PDO::PARAM_INT);
	$stm->bindParam(":stage", $stage, PDO::PARAM_INT);
	$stm->bindParam(":obj", $obj, PDO::PARAM_STR, 2000);
	$stm->bindParam(":methodology", $methodology, PDO::PARAM_STR, 2000);
	$stm->bindParam(":tools", $tools, PDO::PARAM_STR, 2000);
	$stm->bindParam(":c_agg", $c_agg, PDO::PARAM_STR, 2000);
	$stm->bindParam(":diss", $diss, PDO::PARAM_STR, 2000);
	$stm->bindParam(":r_submitted", $r_submitted, PDO::PARAM_INT);
	$nrow = $stm->execute();
} catch (PDOException $e) {
	echo "1.Some Error Occurred: " . $e->getMessage();
	exit();
}

$stm = $conn1->query("SELECT id FROM project_registration WHERE pac_code = '$pac'");
$rows = $stm->fetch();
$project_id = $rows["id"];

if ($nrow > 0 && !empty($_POST["activity_name"][0])) {
	$activity = $_POST["activity_name"];	//Array
	$comp_date = $_POST["comp_date"];		//Array
	$status = $_POST["comp_status"];		//Array
	$obst = $_POST["obst"];				//Array

	try {
		$len = count($activity);
		for ($i = 0; $i < $len; $i++) {
			$project_id = fullclean($project_id);
			$activity[$i] = fullclean($activity[$i]);
			$comp_date[$i] = fullclean($comp_date[$i]);
			$status[$i] = fullclean($status[$i]);
			$obst[$i] = fullclean($obst[$i]);
			$stm = $conn1->prepare("INSERT INTO `project_activity`(`project_id`, `activity_name`, `comp_date`, `status_completed`, `obstacles`) VALUES (:project_id,:activity,:comp_date,:status,:obst)");
			$stm->bindParam(":project_id", $project_id, PDO::PARAM_INT);
			$stm->bindParam(":activity", $activity[$i], PDO::PARAM_STR, 1000);
			$stm->bindParam(":comp_date", $comp_date[$i], PDO::PARAM_STR, 1000);
			$stm->bindParam(":status", $status[$i], PDO::PARAM_INT);
			$stm->bindParam(":obst", $obst[$i], PDO::PARAM_STR, 1000);
			$stm->execute();
		}
	} catch (PDOException $e) {
		echo "2.Some Error Occurred: " . $e->getMessage();
		exit();
	}
}

if ($nrow > 0 && !empty($_POST["senc_post"][0])) {
	$post = $_POST["senc_post"];					//Array
	$senc_post_num = $_POST["post_sanc_num"];		//Array
	$duration = $_POST["dura"];					//Array
	$expenditure = $_POST["expendi"];				//Array
	$expenditure_used = $_POST["expn_used"];		//Array

	try {
		$len = count($post);
		for ($i = 0; $i < $len; $i++) {
			$project_id = fullclean($project_id);
			$post[$i] = fullclean($post[$i]);
			$senc_post_num[$i] = fullclean($senc_post_num[$i]);
			$duration[$i] = fullclean($duration[$i]);
			$expenditure[$i] = fullclean($expenditure[$i]);
			$expenditure_used[$i] = fullclean($expenditure_used[$i]);
			$stm = $conn1->prepare("INSERT INTO `project_senc_post`(`project_id`, `post`, `senc_post_num`, `duration`, `expenditure`, `expenditure_used`) VALUES (:project_id,:post,:senc_post_num,:duration,:expenditure,:expenditure_used)");
			$stm->bindParam(":project_id", $project_id, PDO::PARAM_INT);
			$stm->bindParam(":post", $post[$i], PDO::PARAM_INT);
			$stm->bindParam(":senc_post_num", $senc_post_num[$i], PDO::PARAM_INT);
			$stm->bindParam(":duration", $duration[$i], PDO::PARAM_INT);
			$stm->bindParam(":expenditure", $expenditure[$i], PDO::PARAM_INT);
			$stm->bindParam(":expenditure_used", $expenditure_used[$i], PDO::PARAM_INT);
			$stm->execute();
		}
	} catch (PDOException $e) {
		echo "3.Some Error Occurred: " . $e->getMessage();
		exit();
	}
}


//financial year insertion
if ($nrow > 0) {
	$b_all = !empty($_POST["budget_all"]) ? fullclean($_POST["budget_all"]) : null;
	$b_uti = !empty($_POST["budget_util"]) ? fullclean($_POST["budget_util"]) : null;
	$year = !empty($_POST["fin_year"]) ? fullclean($_POST["fin_year"]) : null;
	$year_end = !empty($_POST["fin_end_year"]) ? fullclean($_POST["fin_end_year"]) : null;

	try {
		$stm = $conn1->prepare("INSERT INTO `financial_year`(`project_id`, `yearly_status`, `fin_year_start`, `fin_year_end`, `budget_allocated`, `budget_utilized`) VALUES (:project_id,:y_status,:year,:year_end,:b_all,:b_uti)");
		$stm->bindParam(":project_id", $project_id, PDO::PARAM_INT);
		$stm->bindParam(":y_status", $prj_status, PDO::PARAM_INT);
		$stm->bindParam(":year", $year, PDO::PARAM_INT);
		$stm->bindParam(":year_end", $year_end, PDO::PARAM_INT);
		$stm->bindParam(":b_all", $b_all, PDO::PARAM_INT);
		$stm->bindParam(":b_uti", $b_uti, PDO::PARAM_INT);
		$stm->execute();
	} catch (PDOException $e) {
		echo "4.Some Error Occurred: " . $e->getMessage();
		exit();
	}
}


//Key Performance Indicators
if ($_POST['p_indicator'][0] != "") {
	$indi = $_POST['p_indicator'] ?? null;	//array
	$c_month = $_POST['comp_month'] ?? null;	//array
	$complete = $_POST['complete'] ?? null;	//array

	$len = count($indi);
	for ($i = 0; $i < $len; $i++) {
		$project_id = fullclean($project_id);
		$indi[$i] = fullclean($indi[$i]);
		$c_month[$i] = fullclean($c_month[$i]);
		$complete[$i] = fullclean($complete[$i]);
		$stm = $conn1->prepare("INSERT INTO `p_indicators`(`pid`, `per_indi`, `exp_month`, `completed`) VALUES (:project_id,:indi,:c_month,:complete)");
		$stm->bindParam(":project_id", $project_id, PDO::PARAM_INT);
		$stm->bindParam(":indi", $indi[$i], PDO::PARAM_STR, 2000);
		$stm->bindParam(":c_month", $c_month[$i], PDO::PARAM_INT);
		$stm->bindParam(":complete", $complete[$i], PDO::PARAM_INT);
		$stm->execute();
	}
}

echo "<script>location.href='registration.php?EncHid=" . $_SESSION['EncTok'] . "&msg=" . urlencode("Programme Registered Successfully. <br>PAC code is: " . $pac) . "';</script>";
?>