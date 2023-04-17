<?php
include_once('loginchk.php') ;
include_once("db.php");
$conn1=getconnection();

function fullclean($str){
	$str=trim($str);
	$str=htmlspecialchars($str, ENT_QUOTES);
	return $str;
}


///////// upload image section ///////////////
// Check if form was submited
if(isset($_POST['submit'])) {

	// Configure upload directory and allowed file types
	$upload_dir = 'images/acr_image/'.DIRECTORY_SEPARATOR;
	$allowed_types = array('jpg', 'png', 'jpeg', 'gif');
	
	// Define maxsize for files i.e 2MB
	$maxsize = 2 * 1024 * 1024;

	// Checks if user sent an empty form
	if(!empty(array_filter($_FILES['files']['name']))) {

		// Loop through each file in files[] array
		foreach ($_FILES['files']['tmp_name'] as $key => $value) {
			
			$file_tmpname = $_FILES['files']['tmp_name'][$key];
			$file_name = $_FILES['files']['name'][$key];
			$file_size = $_FILES['files']['size'][$key];
			$file_ext = pathinfo($file_name, PATHINFO_EXTENSION);

			// Set upload file path
			$filepath = $upload_dir.$file_name;

			// Check file type is allowed or not
			if(in_array(strtolower($file_ext), $allowed_types)) {

				// Verify file size - 2MB max
				if ($file_size > $maxsize){		
					echo "Error: File size is larger than the allowed limit.";
					exit();
				}
				// If file with name already exist then append time in
				// front of name of the file to avoid overwriting of file
				if(file_exists($filepath)) {
					$filepath = $upload_dir.time().$file_name;
					
					if( move_uploaded_file($file_tmpname, $filepath)) {
						echo "{$file_name} successfully uploaded <br />";
						$stm = $conn1->prepare("INSERT INTO acr_image (name,image,acr_id) values (:a,:b,:c)");
						$stm->bindParam(":a", $file_name, PDO::PARAM_STR);
						$stm->bindParam(":b", $filepath, PDO::PARAM_STR);
						$stm->bindParam(":c", $_POST['acrid'], PDO::PARAM_INT);
						$stm->execute();
					}
					else {					
						echo "Error uploading {$file_name} <br />";
						exit();
					}
				}
				else {
				
					if( move_uploaded_file($file_tmpname, $filepath)) {
						echo "{$file_name} successfully uploaded <br />";
						$stm = $conn1->prepare("INSERT INTO acr_image (name,image,acr_id) values (:a,:b,:c)");
						$stm->bindParam(":a", $file_name, PDO::PARAM_STR);
						$stm->bindParam(":b", $filepath, PDO::PARAM_STR);
						$stm->bindParam(":c", $_POST['acrid'], PDO::PARAM_INT);
						$stm->execute();
					}
					else {					
						echo "Error uploading {$file_name} <br />";
						exit();
					}
				}
			}
			else {
				
				// If file extention not valid
				echo "Error uploading {$file_name} ";
				echo "({$file_ext} file type is not allowed)<br / >";
				exit();
			}
		}
	}
	else {
		
		// If no files selected
		echo "No files selected.";
	}
}

/////////////////////////////////////////////


function clean($string) {
   return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
}

function validate_acr(){
	$flag=1;
	$flag_msg="Please fill the following fields:- ";
	if($_POST['submit']=='Submit'){
		if($_POST['t_grp']==""||empty($_POST['t_grp'])){
			$flag=0;
			$flag_msg.=' , Target group ';
		}
		if($_POST['bsn']==""||empty($_POST['bsn'])){
			$flag=0;
			$flag_msg.=' , Budget sanction number ';
		}
		if($_POST['bsd']==""||empty($_POST['bsd'])){
			$flag=0;
			$flag_msg.=' , Budget sanction date ';
		}
		if($_POST['bas']==""||empty($_POST['bas'])){
			$flag=0;
			$flag_msg.=' , Budget amount sanction ';
		}
		if(!is_numeric($_POST['bas'])){
			$flag=0;
			$_POST['bas']=null;
			$flag_msg.=' , Budget amount sanction must be numeric value ';
		}
		if($_POST['amnt_spent']==""||empty($_POST['amnt_spent'])){
			$flag=0;
			$flag_msg.=' , Amount actually spent ';
		}
		if(!is_numeric($_POST['amnt_spent'])){
			$flag=0;
			$_POST['amnt_spent']=null;
			$flag_msg.=' , Amount actually spent must be numeric value ';
		}
		if($_POST['venue']==""||empty($_POST['venue'])){
			$flag=0;
			$flag_msg.=' , Venue ';
		}
		if($_POST['start_date']==""||empty($_POST['start_date'])){
			$flag=0;
			$flag_msg.=' , Date ';
		}
		if($_POST['end_date']==""||empty($_POST['end_date'])){
			$flag=0;
			$flag_msg.=' , Date ';
		}
		if($_POST['grp']==""||empty($_POST['grp'])){
			$flag=0;
			$flag_msg.=' , Whether the programme is exclusively for SC/ST/Women group ';
		}
		if($_POST['obj']==""||empty($_POST['obj'])){
			$flag=0;
			$flag_msg.=' , Objective of the Activity ';
		}
		if($_POST['brief']==""||empty($_POST['brief'])){
			$flag=0;
			$flag_msg.=' , Brief Report of the Activity ';
		}
		if($_POST['outcome']==""||empty($_POST['outcome'])){
			$flag=0;
			$flag_msg.=' , Outcome realized ';
		}
		if($_POST['impact']==""||empty($_POST['impact'])){
			$flag=0;
			$flag_msg.=' , Likely impact on the Qualitative improvement of School Education ';
		}
		if($_POST['measures']==""||empty($_POST['measures'])){
			$flag=0;
			$flag_msg.=' , Measures taken or proposed for impact on the qualitative improvement of ';
		}
		if($_POST['followup']==""||empty($_POST['followup'])){
			$flag=0;
			$flag_msg.=' , Follow-up action proposed for impact on the qualitative improvement of ';
		}
		if($_POST['faculty']==""||empty($_POST['faculty'])){
			$flag=0;
			$flag_msg.=' , Name Designation and Department of the Faculty members involved in the Activity ';
		}
		if(!is_numeric($_POST['tp'])||!is_numeric($_POST['terp'])||!is_numeric($_POST['tirp'])||!is_numeric($_POST['con'][$i])||!is_numeric($_POST['o_exp'][$i])){
			$flag=0;
			if(!is_numeric($_POST['tp']))
				$_POST['tp']=null;
			if(!is_numeric($_POST['terp']))
				$_POST['terp']=null;
			if(!is_numeric($_POST['tirp']))
				$_POST['tirp']=null;
			if(!is_numeric($_POST['con']))
					$_POST['con']=null;
			if(!is_numeric($_POST['o_exp']))
					$_POST['o_exp']=null;
			$flag_msg.=' , Expenditure details must be numeric values ';
		}
		for($i=0; $i<count($_POST['num']);$i++){
			if(!is_numeric($_POST['num'][$i])||!is_numeric($_POST['ta'][$i])||!is_numeric($_POST['hon'][$i])||!is_numeric($_POST['texp'][$i])){
				$flag=0;
				if(!is_numeric($_POST['num'][$i]))
					$_POST['num'][$i]=null;
				if(!is_numeric($_POST['ta'][$i]))
					$_POST['ta'][$i]=null;
				if(!is_numeric($_POST['hon'][$i]))
					$_POST['hon'][$i]=null;
				if(!is_numeric($_POST['texp'][$i]))
					$_POST['texp'][$i]=null;
				$flag_msg.=' , Expenditure details must be numeric values ';
			}
		}
		if($flag==0){
			//echo "<script>location.href='projectactivity2.php?EncHid=".$_SESSION['EncTok']."&msg=".urlencode("Please fill the following fields:-".$flag_msg.".")."';</script>";
			$_POST['submit']='Save';
			return $flag_msg;
		}
	}
}
$flag_msg = validate_acr();

$acrid = fullclean($_POST['acrid']);
$mr_id = fullclean($_POST['act_id']);
$t_grp=fullclean($_POST['t_grp']);
$b_san_no=fullclean($_POST['bsn']);
$b_san_date=fullclean($_POST['bsd']);
$b_amt=fullclean($_POST['bas']);
$grp=fullclean($_POST['grp']);
$obj=fullclean($_POST['obj']);
$brief=fullclean($_POST['brief']);
$diff=fullclean($_POST['diff']);
$amnt_spent=fullclean($_POST['amnt_spent']);
$venue=fullclean($_POST['venue']);
$start_date=fullclean($_POST['start_date']);
$end_date=fullclean($_POST['end_date']);
$outcome=fullclean($_POST['outcome']);
$impact=fullclean($_POST['impact']);
$measures=fullclean($_POST['measures']);
$followup=fullclean($_POST['followup']);
$faculty=fullclean($_POST['faculty']);
$t_part=fullclean($_POST['tp']);
$t_ext_part=fullclean($_POST['terp']);
$t_int_part=fullclean($_POST['tirp']);
$contingency=fullclean($_POST['con']);
$other_expense=fullclean($_POST['o_exp']);
$chk1=($_POST["submit"]=="Save")?"Pending":"Submit";

//calculate acr completion financial year ending
echo $start_date;
if(!empty($start_date)){
	$co_time=explode('-',$start_date);
	$fy_month= $co_time[1];
	$fy_year= $co_time[0];
	if($fy_month<4)
		$fy_year=substr($fy_year, -2);
	else if($fy_month>=4)
		$fy_year=substr(($fy_year+1), -2);
} else 
	$fy_year=null; 


$stm = $conn1->prepare(" UPDATE `acr` SET `mr_activity_id`=:a, `target_group`=:b, `bud_san_no`=:c, `bud_san_date`=:d, `bud_amnt`=:e, `sc_st_group`=:f, `objective`=:g, `brief`=:h, `difficulties`=:i, `amnt_spent`=:j, `venue`=:k, `start_date`=:l, `end_date`=:m, `outcome`=:n, `impact`=:o, `measures`=:p, `followup`=:q, `faculty`=:r, `total_participants`=:s, `total_external_resource`=:t, `total_internal_resource`=:u, `completion_fy_end`=:x, `chk1`=:v, `contingency`=:y, `othr_expense`=:z WHERE id = :w ");
//echo "UPDATE `acr` SET `mr_activity_id`=$mr_id, `target_group`='$t_grp', `bud_san_no`='$b_san_no', `bud_san_date`='$b_san_date', `bud_amnt`=$b_amt, `sc_st_group`=$grp, `objective`='$obj', `brief`='$brief', `difficulties`='$diff', `amnt_spent`=$amnt_spent, `venue`='$venue', `start_date`='$start_date', `end_date`='$end_date', `outcome`='$outcome', `impact`='$impact', `measures`='$measures', `followup`='$followup', `faculty`='$faculty', `total_participants`=$t_part, `total_external_resource`=$t_ext_part, `total_internal_resource`=$t_int_part, `chk1`='$chk1' WHERE id = $acrid";
$stm->bindParam(":a", $mr_id, PDO::PARAM_INT);
$stm->bindParam(":b", $t_grp, PDO::PARAM_STR);
$stm->bindParam(":c", $b_san_no, PDO::PARAM_STR);
$stm->bindParam(":d", $b_san_date, PDO::PARAM_STR);
$stm->bindParam(":e", $b_amt, PDO::PARAM_INT);
$stm->bindParam(":f", $grp, PDO::PARAM_INT);
$stm->bindParam(":g", $obj, PDO::PARAM_STR);
$stm->bindParam(":h", $brief, PDO::PARAM_STR);
$stm->bindParam(":i", $diff, PDO::PARAM_STR);
$stm->bindParam(":j", $amnt_spent, PDO::PARAM_INT);
$stm->bindParam(":k", $venue, PDO::PARAM_STR);
$stm->bindParam(":l", $start_date, PDO::PARAM_STR);
$stm->bindParam(":m", $end_date, PDO::PARAM_STR);
$stm->bindParam(":n", $outcome, PDO::PARAM_STR);
$stm->bindParam(":o", $impact, PDO::PARAM_STR);
$stm->bindParam(":p", $measures, PDO::PARAM_STR);
$stm->bindParam(":q", $followup, PDO::PARAM_STR);
$stm->bindParam(":r", $faculty, PDO::PARAM_STR);
$stm->bindParam(":s", $t_part, PDO::PARAM_INT);
$stm->bindParam(":t", $t_ext_part, PDO::PARAM_INT);
$stm->bindParam(":u", $t_int_part, PDO::PARAM_INT);
$stm->bindParam(":v", $chk1, PDO::PARAM_STR);
$stm->bindParam(":w", $acrid, PDO::PARAM_INT);
$stm->bindParam(":x", $fy_year, PDO::PARAM_INT);
	$stm->bindParam(":y", $contingency, PDO::PARAM_INT);
	$stm->bindParam(":z", $other_expense, PDO::PARAM_INT);
$stm->execute();


//ARRAY
$p_cat=$_POST['cat'];
$number=$_POST['num'];
$ta=$_POST['ta'];
// $da=$_POST['da'];
$honorarium=$_POST['hon'];
$t_expend=$_POST['texp'];

$expen_id = $_POST["expen"];	//string of acr participants category
$expend = explode(",", $expen_id);


for($i=0;$i<2;$i++){
	$acrid=!empty($acrid)?fullclean($acrid):null;
	$p_cat[$i]=!empty($p_cat[$i])?fullclean($p_cat[$i]):null;
	$number[$i]=!empty($number[$i])?fullclean($number[$i]):null;
	$ta[$i]=!empty($ta[$i])?fullclean($ta[$i]):null;
	$da[$i]=!empty($da[$i])?fullclean($da[$i]):null;
	$honorarium[$i]=!empty($honorarium[$i])?fullclean($honorarium[$i]):null;
	$t_expend[$i]=!empty($t_expend[$i])?fullclean($t_expend[$i]):null;

	$stm = $conn1->prepare(" UPDATE `acr_expenditure` SET `acr_id`=:a, `participants_category`=:b, `number`=:c, `ta`=:d, `da`=:e, `honorarium`=:f, `total_expenditure`=:h WHERE id = :i ");
	$stm->bindParam(":a", $acrid, PDO::PARAM_INT);
	$stm->bindParam(":b", $p_cat[$i], PDO::PARAM_INT);
	$stm->bindParam(":c", $number[$i], PDO::PARAM_INT);
	$stm->bindParam(":d", $ta[$i], PDO::PARAM_INT);
	$stm->bindParam(":e", $da[$i], PDO::PARAM_INT);
	$stm->bindParam(":f", $honorarium[$i], PDO::PARAM_INT);
	$stm->bindParam(":h", $t_expend[$i], PDO::PARAM_INT);
	$stm->bindParam(":i", $expend[$i], PDO::PARAM_INT);
	$stm->execute();
}


$pid=$_POST['pid'];

//update budget of project
if($_POST['submit']=="Submit"){
	try {
		$stm=$conn1->query("SELECT sum(budget_utilized) as bud_t from project_monthly_report where project_id = $pid and fin_year_end=$fy_year ");
		$row=$stm->fetch();
		$t_bud = $row['bud_t'];
		$stm=$conn1->query("SELECT sum(amnt_spent) as acr_t FROM `acr` left join project_activity on acr.mr_activity_id=project_activity.sno WHERE project_activity.project_id=$pid and acr.chk1='Submit' and completion_fy_end = $fy_year ");
		$row=$stm->fetch();
		$t_acr_amt=$row['acr_t'];
		$t_bud_utl=$t_bud+$t_acr_amt;
		$stm=$conn1->prepare("UPDATE financial_year set budget_utilized = :a where project_id = :b and fin_year_end = :c ");
		$stm->bindParam(":a",$t_bud_utl,PDO::PARAM_INT);
		$stm->bindParam(":b",$pid,PDO::PARAM_INT);
		$stm->bindParam(":c",$fy_year,PDO::PARAM_INT);
		$stm->execute();
	} catch(PDOException $e) {
	  	echo "7.Some Error Occurred: " . $e->getMessage();
	  	exit();
	}
}


?>
<form action="projectactivity2.php?EncHid=<?php echo $_SESSION['EncTok'] ?>&msg=<?php echo urlencode($flag_msg) ?>" method="POST" name="myForm">
	<input type="submit" name="submit" id="verma" value="<?php echo $pid ?>">
</form>
<script type="text/javascript">document.getElementById("verma").click();</script>
