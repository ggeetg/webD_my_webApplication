<?php include_once('loginchk.php');
function clean_look($str){
  $str = str_replace("'", "&apos;", $str);
  $str = str_replace('"', '&quot;', $str);
  return $str;
}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Dashboard</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="css/mymain.css">
  	<script type="text/javascript" src="js/mymain.js"></script>
  	<script type="text/javascript" src="js/jspdf.umd.min.js"></script>
  	<script type="text/javascript" src="js/reportgen.js"></script>
<!--===============================================================================================-->
<!--===============================================================================================-->
  <style>
  	.ab {
  		font-weight: 700;
  	}
  </style>
</head>
<body>

<?php include_once('header.php'); ?>
<?php include_once('menubar.php');
$stm001 = $conn1->query("SELECT id FROM user WHERE uname = '$_SESSION[user_id]' ");
$rows001 = $stm001->fetch();
$uid = $rows001['id'];
?>
<!-- just for clone -->
<table style="display: none;">
<tr id="mjr_ach_rw">
				<td>
					<?php $stm = $conn1->query("SELECT * FROM months");
				          $rows = $stm->fetchAll(PDO::FETCH_ASSOC);
				          echo '<select  name="curr_month[]" id="curr_month"><option value="">Select</option>';
				          $c_month = date('m'); 
				          echo $c_month;
				          foreach ($rows as $val) {
				              echo '<option value="'.$val['sno'].'" >'.$val['name'].'</option> ';
				          }
				          echo '</select>';
				      ?>
				      <label>Year:<select name="fin_year_end[]"><option value="21">2020-21</option><option value="22">2021-22</option><option value="23">2022-23</option><option value="24">2023-24</option><option value="25">2024-25</option><option value="26">2025-26</option></select></label>
				</td>
				<td class="editable"><input type="hidden" class="new_entry" name="new_entry[]" value="true"><textarea class="form-control acti_name" name="acti_name[]" id="acti_name"></textarea></td>
			      <td><input type="text" class="form-control apprv_authority" name="apprv_authority[]" id="apprv_authority"></td>
			      <td class="editable"><input type="number" class="form-control duration" name="duration[]" style="width: 70px;"></td>
			      <td class="editable">From:&nbsp;&nbsp;<input type="date" class="d a_date" name="a_date[]" >To:&nbsp;&nbsp;<input type="date" class="d b_date" name="b_date[]" style="margin-top: 5px;"></td>
			      <td class="editable"><input type="text" class="form-control venue" name="venue[]"></td>
			      <td class="editable"><input type="number" class="form-control number_level_part m-b-3" name="number_level_part[]" placeholder="Number"><input type="text" class="form-control num_level_part" name="num_level_part[]" placeholder="Level"></td>
			      <td class="editable"><textarea class="form-control a_remarks" name="a_remarks[]" id="a_remarks"></textarea></td>
			      <td><span class="rmv_mjr_achi">X</span></td>
			</tr>
</table>
<!-- ================  Main Container =================== -->
<div class="container p-r-25 p-l-25 p-t-45 p-b-45">
	<?php if(isset($_POST["submit"]))
          $pid = htmlspecialchars($_POST["submit"]);
        else
          exit();
      $stm1 = $conn1->query("SELECT a.pac_code, a.constituent_unit, a.title, a.focus_area, a.state, a.type, a.objective, a.methodology, a.tools, a.collaborating_agencies, a.dissemination, a.status, a.level, a.target_group, a.stage, a.report_submit, a.proj_coord FROM project_registration as a where a.id = $pid ");
	  $row1 = $stm1->fetch();
	  $stm2 = $conn1->query(" SELECT a.sno, a.activity_name, a.comp_date, a.obstacles, b.value FROM project_activity as a join completed_or_not as b on a.status_completed = b.sno WHERE a.project_id = $pid ");
	  $row2 = $stm2->fetchAll(PDO::FETCH_ASSOC);
	  $stm3 = $conn1->query("SELECT a.senc_post_num, a.duration, a.expenditure, a.expenditure_used, b.post FROM project_senc_post as a join program_post as b on a.post = b.sno WHERE a.project_id = $pid ");
	  $row3 = $stm3->fetchAll(PDO::FETCH_ASSOC);
	  $stm4 = $conn1->query(" SELECT b.sno, b.month, b.budget_utilized, b.progress_till_date, c.name, year(time) as year FROM  project_monthly_report as b join months as c on b.month = c.sno WHERE b.project_id = $pid order by year, b.month ");
	  $row4 = $stm4->fetchAll(PDO::FETCH_ASSOC);
	  $stm6 = $conn1->query(" SELECT id, project_id, fin_year_start, fin_year_end, budget_allocated, budget_utilized from financial_year where project_id = $pid ");
	  $row6 = $stm6->fetchAll(PDO::FETCH_ASSOC);
	  
   ?>
	<h4 align="center">Programme Details</h4>
	<br>
	<div id="pdf">
 	<form action="adminupdateaction.php?EncHid=<?php echo $_SESSION['EncTok'] ?>" method="post" id="form1">
 		<input type="hidden" name="pid" value="<?php echo $pid ?>">
 		<div class="form-group">
			<label>Name of Constituent Unit:</label>
			<select class="form-control" name="constituent" id="constituent" readonly style="cursor: not-allowed;">
				<?php 
		          $stm = $conn1->query("SELECT * FROM department WHERE status='Active' and id not in (1) order by dept_pac_code ASC");
		          $rows = $stm->fetchAll(PDO::FETCH_ASSOC);
		          foreach ($rows as $val) {
		          	if($row1['constituent_unit']==$val['id'])
		            	echo '<option value="'.$val['id'].'" selected >'.$val['dept_name'].'</option>';
		            else
		            	echo '<option value="'.$val['id'].'" disabled>'.$val['dept_name'].'</option>';
		          }
			    ?>
			</select>
		</div>
		<div class="row form-group">
 			<div class="col">
 				<label for="pac_code">PAC/PAB/Any other code:</label><input type="text" class="form-control" name="pac_code" id="pac_code" placeholder="Enter PAC Code" value="<?php echo $row1['pac_code']; ?>" minlength="8" maxlength="8" readonly style="cursor: not-allowed;">
 			</div>
 			<div class="col">
 				<label>Year of commencement &nbsp;&nbsp;&nbsp; Year of completion: </label><br><select class="form-control" name="fin_year" id="year_from" style="width: 30%; display: inline-block; cursor: not-allowed;" readonly><option value="">Select</option>
 				</select>
 				<span> &nbsp;&nbsp;&nbsp;to&nbsp;&nbsp;&nbsp; </span><select class="form-control" name="fin_end_year" id="year_till" style="width: 30%; display: inline-block; cursor: not-allowed;" readonly><option value="">Select</option>
 				</select>
 			</div>
		</div>

		<div class="row form-group">
			<div class="col">
	 			<div>
	 				<label>Title:</label><input type="text" class="form-control" name="title" value="<?php echo clean_look($row1['title']); ?>">
	 			</div>
 			</div>
     		<div class="col">
     			<div>
     				<label>Project Coordinator:</label>
     				<select class="form-control" name="pc" id="pc"><option value="">Select</option>
     				<?php 
			          $stm = $conn1->query("SELECT id, first_name, last_name FROM user WHERE status='Active' and dept='$row1[constituent_unit]' order by first_name ASC");
			          $rows = $stm->fetchAll(PDO::FETCH_ASSOC);
			          foreach ($rows as $val) {
			          	if($val['id']==$row1['proj_coord'])
				            echo '<option value="'.$val['id'].'" selected>'.$val['first_name']." ".$val['last_name'].'</option>';
			            else
				            echo '<option value="'.$val['id'].'">'.$val['first_name']." ".$val['last_name'].'</option>';
			          }
			        ?>
     				</select>
     				
     			</div>
     		</div>
		</div>
		<div class="row form-group">
			<div class="col">
	 			<div>
	 				<label>State:</label>
	 				<select class="form-control" name="state">
	 					<option value="">Select</option>
	 					<?php 
				          $stm = $conn1->query("SELECT * FROM india_state WHERE status='Active' order by  state ASC");
				          $rows = $stm->fetchAll(PDO::FETCH_ASSOC);
				          foreach ($rows as $val) {
				          	if($row1['state']==$val['state_id'])
				            	echo '<option value="'.$val['state_id'].'" selected>'.$val['state'].'</option>';
				            else
				            	echo '<option value="'.$val['state_id'].'">'.$val['state'].'</option>';
				          }
				        ?>
	 				</select>
	 			</div>
 			</div>
     		<div class="col">
     			<div>
     				<label>Focus Area: </label><br>
	 				<select class="form-control" name="focus_area[]" multiple>
	     				<?php 
				          $stm = $conn1->query("SELECT * FROM focus_area WHERE status='Active' order by name ASC ");
				          $rows = $stm->fetchAll(PDO::FETCH_ASSOC);
				          foreach ($rows as $val) {
				          	if(in_array($val['id'],explode(",", $row1['focus_area']) ))
				            	echo '<option value="'.$val['id'].'" selected>'.$val['name'].'</option>';
				            else
					            echo '<option value="'.$val['id'].'">'.$val['name'].'</option>';
				          }
				        ?>
			    	</select>
     			</div>
     		</div>
		</div>
		<div class="row form-group">
 			<div class="col">
 				<label>Type:</label>
 				<select class="form-control" name="type"  style="cursor: not-allowed;" readonly>
 					<?php 
			          $stm = $conn1->query("SELECT * FROM program_type WHERE status='Active'");
			          $rows = $stm->fetchAll(PDO::FETCH_ASSOC);
			          foreach ($rows as $val) {
			          	if($row1['type']==$val['sno'])
				            echo '<option value="'.$val['sno'].'" selected >'.$val['type'].'</option>';
			            else
				            echo '<option value="'.$val['sno'].'" disabled>'.$val['type'].'</option>';
			          }
			        ?>
			    </select>
 			</div>
 			<div class="col">
 				<label>Status:</label>
 				<select class="form-control" name="status"><option value="">Select</option>
 					<?php 
			          $stm = $conn1->query("SELECT * FROM program_status WHERE status='Active'");
			          $rows = $stm->fetchAll(PDO::FETCH_ASSOC);
			          foreach ($rows as $val) {
			          	if($row1['status']==$val['sno'])
				            echo '<option value="'.$val['sno'].'" selected>'.$val['type'].'</option>';
			            else
			            	echo '<option value="'.$val['sno'].'">'.$val['type'].'</option>';
			          }
			        ?>
			    </select>
 			</div>
 		</div>
		<div class="row form-group">
 			<div class="col">
 				<label>Budget Allocated (in INR):</label>
 				<?php for($i=0;$i<count($row6)-1;$i++) echo "<br><strong>".$row6[$i]["fin_year_start"]." - ".$row6[$i]["fin_year_end"].":</strong> &nbsp;&nbsp;&nbsp;&nbsp;".$row6[$i]["budget_allocated"]; ?>
 				<input type="number" class="form-control" name="budget_all" value="<?php echo end($row6)['budget_allocated']; ?>">
 			</div>
 			<div class="col">
 				<label>Budget Utilized (in INR):</label>
 				<?php for($i=0;$i<count($row6)-1;$i++) echo "<br>".($row6[$i]["budget_utilized"]??"0"); ?>
 				<input type="number" class="form-control" name="budget_util" value="<?php echo end($row6)['budget_utilized']; ?>" >
 				
 			</div>
 		</div>
		<div class="row form-group">
 			<div class="col">
 				<label>Level:</label>
 				<select class="form-control" name="level">
 					<option value="">Select</option>
 					<?php 
			          $stm = $conn1->query("SELECT * FROM program_level WHERE status='Active'");
			          $rows = $stm->fetchAll(PDO::FETCH_ASSOC);
			          foreach ($rows as $val) {
			          	if($row1['level']==$val['sno'])
				            echo '<option value="'.$val['sno'].'" selected>'.$val['level'].'</option>';
			            else
			            	echo '<option value="'.$val['sno'].'">'.$val['level'].'</option>';
			          }
			        ?>
 				</select>
 			</div>
 			<div class="col">
 				<label>Target Group:</label>
 				<select class="form-control" name="target_group">
 					<option value="">Select</option>
 					<?php 
			          $stm = $conn1->query("SELECT * FROM program_target_group WHERE status='Active'");
			          $rows = $stm->fetchAll(PDO::FETCH_ASSOC);
			          foreach ($rows as $val) {
			          	if($row1['target_group']==$val['sno'])
				            echo '<option value="'.$val['sno'].'" selected>'.$val['target_group'].'</option>';
			            else
			            	echo '<option value="'.$val['sno'].'">'.$val['target_group'].'</option>';
			          }
			        ?>
 				</select>
 			</div>
 			<div class="col">
 				<label>Stage:</label>
 				<select class="form-control" name="stage">
 					<option value="">Select</option>
 					<?php 
			          $stm = $conn1->query("SELECT * FROM program_stage WHERE status='Active'");
			          $rows = $stm->fetchAll(PDO::FETCH_ASSOC);
			          foreach ($rows as $val) {
			          	if($row1['stage']==$val['sno'])
				            echo '<option value="'.$val['sno'].'" selected>'.$val['stage'].'</option>';
			            else
			            	echo '<option value="'.$val['sno'].'">'.$val['stage'].'</option>';
			          }
			        ?>
 				</select>
 			</div>
 		</div>
		<div class="form-group">
			<label>Objectives:</label><br><textarea name="objective" class="form-control resze" name="objc"><?php echo $row1['objective']; ?></textarea>
		</div>
		<div class="form-group">
			<label>Methodology:</label><br><textarea name="methodology" class="form-control resze" name="methodology"><?php echo $row1['methodology']; ?></textarea>
		</div>
		<div class="row form-group">
 			<div class="col">
 				<label>Tools:</label><br><textarea class="form-control resze" name="tools"><?php echo $row1['tools']; ?></textarea>
 			</div>
 		</div>
		<div class="form-group">
			<label>Collaborating Agencies:</label><br><textarea name="agencies" class="form-control resze"><?php echo $row1['collaborating_agencies']; ?></textarea>
		</div>
		<label>Key Performance:</label>
		<table class="table table-bordered m-b-0" id="kpr">
		  	<tr>
		  		<td width="60%">Performance Indicators</td>
		  		<td width="20%">Expected Completion Month</td>
		  		<td width="20%">Status</td>
		  	</tr>
		  	<?php
		  		$stm = $conn1->query("SELECT * FROM `p_indicators` WHERE pid = $pid ");
          		$rows = $stm->fetchAll(PDO::FETCH_ASSOC);
          		foreach ($rows as $value) {
		  	?>
		  	<tr id="kpr1">
		  		<td><input type="hidden" name="kpr_id[]" class="new_kpr_act" value="<?php echo $value['sno'] ?>"><textarea class="form-control resze" rows="1" name="p_indicator[]"><?php echo $value['per_indi'] ?></textarea></td>
		  		<td style="vertical-align:middle;">
		  			<?php $stm = $conn1->query("SELECT * FROM months");
			          $rows = $stm->fetchAll(PDO::FETCH_ASSOC);
			          echo '<input type="hidden" name="new_kpr_act[]" class="new_kpr_act" value="false"><select class="form-control" name="comp_month[]" id="comp_month"><option value="">Select</option>';
			          $c_month = date('m'); 
			          foreach ($rows as $val) {
			          	if($val['sno'] == $value['exp_month'])
			              echo '<option value="'.$val['sno'].'" selected>'.$val['name'].'</option> ';
			          else
			              echo '<option value="'.$val['sno'].'" >'.$val['name'].'</option> ';
			          }
			          echo '</select>';
		      		?></td>
		  		<td style="vertical-align:middle;">
		  			<?php $stm = $conn1->query("SELECT * FROM p_status");
			          $rows = $stm->fetchAll(PDO::FETCH_ASSOC);
			          echo '<select class="form-control" name="complete[]" id="complete"><option value="">Select</option>';
			          $c_month = date('m'); 
			          foreach ($rows as $val) {
			          	if($val['sno'] == $value['completed'])
			              echo '<option value="'.$val['sno'].'" selected>'.$val['name'].'</option> ';
			          else
			              echo '<option value="'.$val['sno'].'" >'.$val['name'].'</option> ';
			          }
			          echo '</select>';
		      		?></td>
		      		<?php if($uid==1) echo '<td><button type="button" id="'.$value["sno"].'" class="rmv_kpr_entry" >X</button></td>'; ?>
		  	</tr>
		  	<?php } ?>
		  </table>
		  <button type="button" class="btn-sm btn-primary m-t-0 m-b-10" id="add_m">Add More Indicators</button></br>
		<label>Activities Proposed:</label><br>
		<table class="table table-bordered m-b-0" id="activity_table">
			<tr>
				<td>S.No.:</td>
				<td>Name of the Activity:</td>
				<td>Tentative Date of Completion:</td>
				<td>Completed/Not Completed:</td>
				<td>Obstacles if any:</td>
				<td>ACR</td>
			</tr>
			<?php 
		  $stm = $conn1->query("SELECT * FROM project_activity WHERE project_id = $pid ");
          $rows = $stm->fetchAll(PDO::FETCH_ASSOC);
          $i=1;
          foreach ($rows as $val) {
            echo '<tr><td>'.$i++.'</td><td><input class="form-control na" type="text" name="activity_name[]" value="'.clean_look($val['activity_name']).'" ><input type="hidden" name="activity_id1[]" value="'.$val['sno'].'"><input type="hidden" name="new_activity[]" value="false"></td><td><input class="form-control na" type="date" name="comp_date[]" value="'.$val['comp_date'].'" ></td><td><select class="form-control" name="comp_status[]"><option value="">Select</option><option value="1"';
            echo ($val['status_completed']==1)? "selected": " ";
            echo '>Completed</option><option value="2"';
            echo ($val['status_completed']==2)? "selected": " ";
            echo '>Not Completed</option></select></td><td><input class="form-control" type="text" name="obst[]" value="'.clean_look($val['obstacles']).'"></td>
            <td><button class="view_mr" type="submit" name="submit" value="'.$val["sno"].'">View</button></td>';
            if($uid==1) echo '<td><button type="button" id="'.$val["sno"].'" class="rmv_activity" >X</button></td></tr>';
            else echo '</tr>';
          }
      ?>
		</table>
		<button type="button" class="btn-sm btn-primary m-t-0 m-b-10" id="add_act">Add more activities</button></br>
		<label>Project Staff Details:</label>
		<table class="table table-bordered m-b-10" id="project_table">
			<tr>
				<td>Post:</td>
				<td>Sanctioned numbers:</td>
				<td>Duration (in months):</td>
				<td>Total Allocated:</td>
				<td>Total utilized in last month:</td>
			</tr>
			<?php 
		        $stm = $conn1->query("SELECT * FROM project_senc_post WHERE project_id = $pid ");
		        $rows = $stm->fetchAll(PDO::FETCH_ASSOC);
		        // $i=1;
		        foreach ($rows as $val) {
		          echo "<tr><td>";
		            $stm002 = $conn1->query("SELECT * FROM program_post WHERE status='Active' order by post ASC");
		            $rows002 = $stm002->fetchAll(PDO::FETCH_ASSOC);
		            echo '<select class="form-control" id="senc_post0" name="senc_post[]"><option value="">Select</option>';
		            foreach ($rows002 as $val002) {
		              if($val002['sno']==$val['post'])
		                echo '<option value="'.$val002['sno'].'" selected>'.$val002['post'].'</option>';
		              else
		                echo '<option value="'.$val002['sno'].'">'.$val002['post'].'</option>';
		            }
		            echo '</select>';
		            echo '<input type="hidden" name="post_id[]" value="'.$val['sno'].'"><input type="hidden" name="new_staff[]" value="false" ></td>';
		            echo '<td><input type="number" name="post_sanc_num[]" class="form-control na" value="'.$val['senc_post_num'].'" ></td><td><input type="number" name="dura[]" class="form-control na" value="'.$val['duration'].'" ></td><td><input type="number" name="expendi[]" class="form-control na" value="'.$val['expenditure'].'" ></td><td><input class="form-control expn_used" type="number" name="expn_used[]" value="'.$val['expenditure_used'].'">';
		            if($uid==1) echo '<td><button type="button" id="'.$val["sno"].'" class="rmv_staff" >X</button></td></tr>';
            		else echo '</tr>';
		          }
		    ?>
		</table>
		<button type="button" class="btn-sm btn-primary m-t-0 m-b-10" id="add_post">Add more staff</button>
		<div class="form-group">
			<label>Dissemination of Outcome of the Project:</label><textarea class="form-control resze" name="dissenmination"><?php echo $row1['dissemination'] ?></textarea>
		</div>
		<div class="form-group">
			<label>Major Achievements/Month Wise Progress:</label>
			<table class=" table-bordered" id="major_achiv">
			    <tr bgcolor="gray" style="color: #fff;">
			      <td>Title of the Activity Performed during the Period</td>
			      <td>Name of the Approving Authority</td>
			      <td>Duration (days)</td>
			      <td>Date</td>
			      <td>Venue</td>
			      <td>No. & level of Participants</td>
			      <td>Remarks, if any</td>
			    </tr>
			    <?php
			    	foreach($row4 as $val){
			    		echo '<tr bgcolor="cyan"><th colspan="8"><input type="hidden" name="mr_month_id[]" value="'.$val["sno"].'">'.$val["name"].' '.$val["year"].' || Budget Utilized for project staff: <input type="number" style="background:transparent;" name="c_month_budget[]" value="'.$val["budget_utilized"].'"><th></tr>';
			    		echo '<tr><td colspan="8"><textarea class="form-control editable resze" name="obs_txt[]" style="background:#3cd6b9;">'.$val['progress_till_date'].'</textarea></td></tr>';
			    		$stm5 = $conn1->query(" SELECT a.id, a.mr_id, a.activity_title, a.approving_authority, a.duration, a.date, a.till_date, a.venue, a.num_lvl_participants, a.number_lvl_participants, a.remarks FROM project_mr_activity as a WHERE a.mr_id = $val[sno] ");
	  					$row5 = $stm5->fetchAll(PDO::FETCH_ASSOC);
			    		foreach ($row5 as $val1) {
			    			//if($val["sno"]==$val1["mr_id"])
	  echo '<tr><td class="editable"><input type="hidden" class="new_entry" name="new_entry[]" value="false"><input type="hidden" class="mr_activity_id" name="mr_activity_id[]" value="'.$val1["id"].'"><input type="hidden" name="mrid[]" value="'.$val["sno"].'"><textarea class="form-control acti_name resze" name="acti_name[]" id="acti_name">'.$val1["activity_title"].'</textarea></td>
      <td><input type="text" class="form-control apprv_authority" name="apprv_authority[]" id="apprv_authority" value="'.clean_look($val1["approving_authority"]).'"></td>
      <td class="editable"><input type="number" class="form-control duration" name="duration[]" style="width: 70px;" value="'.$val1["duration"].'"></td>
      <td class="editable">From:&nbsp;&nbsp;<input type="date" class="d a_date" name="a_date[]"  value="'.$val1["date"].'">To:&nbsp;&nbsp;<input type="date" class="d b_date" name="b_date[]"  value="'.$val1["till_date"].'" style="margin-top: 5px;"></td>
      <td class="editable"><input type="text" class="form-control venue" name="venue[]" value="'.clean_look($val1["venue"]).'"></td>
      <td class="editable"><input type="number" class="form-control number_level_part m-b-3" name="number_level_part[]" value="'.$val1["number_lvl_participants"].'"><input type="text" class="form-control num_level_part" name="num_level_part[]" value="'.clean_look($val1["num_lvl_participants"]).'"></td>
      <td class="editable"><textarea class="form-control a_remarks resze" name="a_remarks[]" id="a_remarks" >'.$val1["remarks"].'</textarea></td>';
      if($uid==1) echo '<td><button type="button" id="'.$val1["id"].'" class="rmv_achiv" >X</button></td></tr>';
      else echo '</tr>';
			    		}
			    	}
			    ?>
			  </table>
		<button id="add_major_achiv" type="button" class="btn-sm btn-primary">Add more major achievements</button>
		<table border="1" id="clone_mjr_achi" style="display: none;">
			<tr>
				<td>Month</td>
				<td>Title of the Activity Performed during the Period</td>
			    <td>Name of the Approving Authority</td>
			    <td>Duration (days)</td>
			    <td>Date</td>
			    <td>Venue</td>
			    <td>No. & level of Participants</td>
			    <td>Remarks, if any</td>
			</tr>
		</table>
		</div>
		<div class="form-group">
			<label>Report Submitted or not</label>
			<select class="form-control" name="report_submission">
				<option value="">Select</option>
				<?php 
		          $stm = $conn1->query("SELECT * FROM yes_no WHERE status='Active'");
		          $rows = $stm->fetchAll(PDO::FETCH_ASSOC);
		          foreach ($rows as $val) {
		          	if($row1['report_submit']==$val['sno'])
			            echo '<option value="'.$val['sno'].'" selected>'.$val['choose'].'</option>';
		            else
			            echo '<option value="'.$val['sno'].'">'.$val['choose'].'</option>';
		          }
			    ?>
			</select>
		</div>
    <?php include_once("lib/csrfMain.php"); ?>
		<div class="text-center mt-1">
 			<input type="submit" name="submit" id="s1" class="btn btn-primary" value="Update">
 		</div>
		<br>
	</form>
	</div>
	
		<button class="btn-sm btn-primary" id="prnt_btn" onclick="printDiv('pdf','Title')" style="display:none">Print report</button>
		<!-- <button onclick="saveDiv('pdf','Report')">Download report</button> -->

</div>

<!-- =============================== End of Main Container ========================================== -->

<?php include_once("footer.php") ?>

</body>
<script type="text/javascript">
//performance indicators add more button
$(document).ready(function(){
			$('#add_m').click(function(){
				var t1 = $("#kpr1").clone().find("textarea").val("").end(); 
				t1.find(".new_kpr_act").val("true").end();
				t1.find(".kpr_rb").html('<button type="button" name="kpr_remove" id="'+i+'" class="kpr_btn_remove">X</button>'); 
			   $('#kpr').append(t1);
			});
			$(document).on('click', '.kpr_btn_remove', function(){  
			   $(this).parent().parent().remove();   
			}); 
		});


	$(document).ready(function(){
	    $(".view_mr").click(function(){
	    	var acr_view = document.createElement("INPUT");
		    acr_view.setAttribute("type", "hidden");
		    acr_view.setAttribute("name", "acr_view");
		    <?php if($uid==1 && isset($_POST['view']))
		    		echo 'acr_view.setAttribute("value", "true");';
		    	else if($uid==1 && !isset($_POST['view']))
		    		echo 'acr_view.setAttribute("value", "false");';
		    	else
		    		echo 'acr_view.setAttribute("value", "true");';
		     ?>
      		document.getElementById("form1").appendChild(acr_view);
	      $('#form1').attr('action', "activitycompletionreport.php?EncHid=<?php echo $_SESSION['EncTok'] ?>");
	    });
	  });

// regisstration page script:-
	$(document).ready(function(){
		var mySelect = $('#year_from');
		var mySelect2 = $('#year_till');
		var date = new Date();
		var startYear = 2020;
		var nextY = startYear.toString().substr(-2);
		var nextYear = parseInt(nextY) + 1;
		for (var i = 0; i < 30; i++) {
		  mySelect.append(
		    $('<option disabled></option>').val(startYear).html(startYear)
		  );
		  mySelect2.append(
		    $('<option disabled></option>').val(nextYear).html(nextYear)
		  );
		  startYear = startYear + 1;
		  nextYear = nextYear + 1;
		}
	});

	  //hide msg after 3sec
	  $(document).ready(function(){
	    $(".close").click(function(){
	      $(".alert").alert("close");
	    });
	    $("#myAlert").fadeOut(3000);
	  });

	//ajax completed status , activity table
	function callcomp(id){
	      var url ="completedajax.php";
	      var x = "true";
	      var data = {q:x};
	      $.post(url,data,function(data, status){
	        $("#comp_status"+id).html(data);
	      });
	};


	//add activity replicate, activity table
	// $(document).ready(function(){
	// 	var i=1;
	// 	$('#add_act').click(function(){  
	// 	   i++;  
	// 	   $('#activity_table').append('<tr id="row'+i+'" ><td>'+i+'</td><td><input class="form-control" type="text" name="activity_name[]"></td><td><input class="form-control" type="date" name="comp_date[]"></td><td><select class="form-control" id="comp_status'+i+'" name="comp_status[]"><option value="">Select</option></select></td><td><input class="form-control" type="text" name="obst[]"></td><td><button type="button" name="remove" id="'+i+'" class="btn_remove">X</button></td></tr>');
	// 	callcomp(i);
	// 	});
	// 	$(document).on('click', '.btn_remove', function(){  
	// 	   var button_id = $(this).attr("id");   
	// 	   $('#row'+button_id+'').remove();
	//   	}); 
	// });

	//ajax post  , project staff table
	function callpost(id){
	      var url ="postajax.php";
	      var x = "true";
	      var data = {q:x};
	      $.post(url,data,function(data, status){
	        $("#senc_post"+id).html(data);
	      });
	};

	//post list ajax, project staff table
	$(document).ready(function(){
		var j=1;
		$('#add_post').click(function(){  
		   j++;  
		   $('#project_table').append('<tr id="row2'+j+'" ><td><select class="form-control" id="senc_post'+j+'" name="senc_post[]"><option value="">Select</option></select><input type="hidden" name="new_staff[]" value="true" ></td><td><input class="form-control" type="number" name="post_sanc_num[]"></td><td><input class="form-control" type="number" name="dura[]"></td><td><input class="form-control" type="number" name="expendi[]"></td><td><input class="form-control" type="number" name="expn_used[]"></td><td><button type="button" name="remove" id="'+j+'" class="btn_remove2">X</button></td></tr>');
		callpost(j);
		});
		$(document).on('click', '.btn_remove2', function(){  
		   var button_id = $(this).attr("id");   
		   $('#row2'+button_id+'').remove();
	  	}); 
	});

	//change program coordinator
	$(document).ready(function(){
	    $("#constituent").change(function(){
	      var url ="chkpcajax.php";
	      var x = $("#constituent").val();
	      var data = {q:x};
	        $.post(url,data,function(data, status){
	            $("#pc").html(data);
	      });
	    });
	  });

	$(document).ready(function(){
		$("#year_from").val("<?php echo end($row6)['fin_year_start'] ?>");
		$("#year_till").val("<?php echo end($row6)['fin_year_end'] ?>");
	});


	//major activites list ajax, dynamic
	$(document).ready(function(){
		var j=1;
		$('#add_major_achiv').click(function(){ 
		   $("#clone_mjr_achi").css("display","table");
		   $("#mjr_ach_rw").clone().find("input[type='date']").val("").end().find("input[type='text']").val("").end().find("textarea").val("").end().appendTo("#clone_mjr_achi");
		});
		$(document).on('click', '.rmv_mjr_achi', function(){  
		   $(this).parent().parent().remove();
	  	}); 
	});

//////////////////////////////////////////////////////////////////

$('#pac_code').keypress(function (e) {
    var regex = new RegExp("^[a-zA-Z0-9]+$");
    var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
    if (regex.test(str)) {
        return true;
    }

    e.preventDefault();
    return false;
});
//////////////////////////////////////////////////////////////////////////

	<?php
		$stm = $conn1->prepare('select id from user where uname = :username and status = :sts');
		$stm->bindParam(":username",$_SESSION['user_id'],PDO::PARAM_STR,500);
		$stm->bindParam(":sts",$status,PDO::PARAM_STR,500);
		$stm->execute();
		$row = $stm->fetch(PDO::FETCH_ASSOC);
		if($row['id']!=1||isset($_POST['view'])){ ?>
			document.getElementById("prnt_btn").style.display="initial";
			var x = document.getElementsByTagName("input");
          for(var i=0;i<x.length;i++)
            x[i].readOnly='true';
          var x = document.getElementsByTagName("textarea");
          for(var i=0;i<x.length;i++)
            x[i].readOnly='true';
          var x = document.getElementsByTagName("select");
          for(var i=0;i<x.length;i++)
            x[i].disabled='true';
          $("#form1").attr("action","#");
          $("#add_act").remove();
          $("#add_post").remove();
          $("#add_major_achiv").remove();
          $("#add_m").remove();
          $("#s1").remove();
          $('.rmv_activity').parent().remove();
          $('.rmv_staff').parent().remove();
          $('.rmv_achiv').parent().remove();
          $('.rmv_kpr_entry').parent().remove();
    <?php } ?>


//remove activity by click on X
$(document).on('click', '.rmv_activity', function(){  
         var acti_id = $(this).attr("id");   
         var url = "rmv_activity_ajax.php";
	      var data = {q:acti_id};
	      //console.log(data);
	      if(confirm("Are you want to delete this activity.It will be permanently deleted.")){
	        $.post(url,data,function(data, status){
	          console.log(data);
	        });
	        location.reload();
	      } 
	  });

//remove project staff by click on X
$(document).on('click', '.rmv_staff', function(){  
         var staff_id = $(this).attr("id");   
         var url = "rmv_staff_ajax.php";
	      var data = {q:staff_id};
	      //console.log(data);
	      if(confirm("Are you want to delete this post.It will be permanently deleted.")){
	        $.post(url,data,function(data, status){
	          console.log(data);
	        });
	        location.reload();
	      } 
	  });

//remove achievements by click on X
$(document).on('click', '.rmv_achiv', function(){  
         var achiv_id = $(this).attr("id");   
	     if(removeact(achiv_id)){
	     	location.reload();	     	
	     }
	  });

//resize textarea dynamically
	$(document).ready(function(){
        function do_resize(textbox) {

		 var maxrows=5; 
		  var txt=textbox.value;
		  var cols=textbox.cols;

		 var arraytxt=txt.split('\n');
		  var rows=arraytxt.length; 

		 for (i=0;i<arraytxt.length;i++) 
		  rows+=parseInt(arraytxt[i].length/cols);

		 if (rows>maxrows) textbox.rows=maxrows;
		  else textbox.rows=rows;
		 }

		 var e=document.getElementsByClassName("resze");
		 console.log(e.length+"a");
		 var aj=0;
		 while(aj<7){
			  do_resize(e[aj]);
			  aj++;
		 }
    });


//remove p_indicators by click on X
$(document).on('click', '.rmv_kpr_entry', function(){  
         var kpr_id = $(this).attr("id");   
         var url = "rmv_kpr_activity_ajax.php";
	      var data = {q:kpr_id};
	      //console.log(data);
	      if(confirm("Are you want to delete this Performance Indicator.It will be permanently deleted.")){
	        $.post(url,data,function(data, status){
	          console.log(data);
	        });
	        location.reload();
	      } 
	  });
</script>

</html>
