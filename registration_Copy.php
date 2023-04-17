<?php include_once('loginchk.php') ?>
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
<!--===============================================================================================-->
	<script>
		$(document).ready(function(){
			var mySelect = $('#year_from');
			var date = new Date();
			var startYear = date.getFullYear();
			var nextY = startYear.toString().substr(-2);
			var nextYear = parseInt(nextY) + 1;
			for (var i = 0; i < 20; i++) {
			  mySelect.append(
			    $('<option></option>').val(startYear + "-" + nextYear).html(startYear + "-" + nextYear)
			  );
			  startYear = startYear + 1;
			  nextYear = nextYear + 1;
			}
		});
	</script>
<!--===============================================================================================-->
  <style>
  </style>
</head>
<body>

<?php include_once('header.php'); ?>
<?php include_once('menubar.php'); ?>

<!-- ================  Main Container =================== -->
<div class="container p-r-25 p-l-25 p-t-45 p-b-45">
	<h4 align="center">Programme Registration Form</h4>
	<br>
 	<form>
 		<div class="form-group">
			<label>Name of Constituent Unit:</label><input type="text" class="form-control" name="const_unit">
		</div>
		<div class="row form-group">
 			<div class="col">
 				<label for="pac_code">PAC code:</label><input type="text" class="form-control" name="pac_code" id="pac_code" placeholder="Enter PAC Code">
 			</div>
 			<div class="col">
 				<label>Year:</label><br><select class="form-control" name="year_from" id="year_from"><option>Select</option>
 				</select>
 			</div>
		</div>

		<div class="row form-group">
			<div class="col">
	 			<div>
	 				<label>Title:</label><input type="text" class="form-control" name="title">
	 			</div>
 			</div>
     		<div class="col">
     			<div>
     				<label>Project Coordinator:</label><input type="text" class="form-control" name="title">
     			</div>
     		</div>
		</div>
		<div class="row form-group">
 			<div class="col">
 				<label>Type:</label>
 				<select class="form-control"><option>Select</option>
 					<?php 
			          $stm = $conn1->query("SELECT * FROM program_type WHERE status='Active'");
			          $rows = $stm->fetchAll(PDO::FETCH_ASSOC);
			          foreach ($rows as $val) {
			            echo '<option value="'.$val['sno'].'">'.$val['type'].'</option>';
			          }
			        ?>
			    </select>
 			</div>
 			<div class="col">
 				<label>Status:</label>
 				<select class="form-control"><option>Select</option>
 					<?php 
			          $stm = $conn1->query("SELECT * FROM program_status WHERE status='Active'");
			          $rows = $stm->fetchAll(PDO::FETCH_ASSOC);
			          foreach ($rows as $val) {
			            echo '<option value="'.$val['sno'].'">'.$val['type'].'</option>';
			          }
			        ?>
			    </select>
 			</div>
 		</div>
		<div class="row form-group">
 			<div class="col">
 				<label>Budget Allocated (in INR):</label><input type="number" class="form-control" name="budget_all">
 			</div>
 			<div class="col">
 				<label>Budget Utilized (in INR):</label><input type="number" class="form-control" name="budget_util">
 			</div>
 		</div>
		<div class="row form-group">
 			<div class="col">
 				<label>Level:</label>
 				<select class="form-control">
 					<option>Select</option>
 					<?php 
			          $stm = $conn1->query("SELECT * FROM program_level WHERE status='Active'");
			          $rows = $stm->fetchAll(PDO::FETCH_ASSOC);
			          foreach ($rows as $val) {
			            echo '<option value="'.$val['sno'].'">'.$val['level'].'</option>';
			          }
			        ?>
 				</select>
 			</div>
 			<div class="col">
 				<label>Target Group:</label>
 				<select class="form-control">
 					<option>Select</option>
 					<?php 
			          $stm = $conn1->query("SELECT * FROM program_target_group WHERE status='Active'");
			          $rows = $stm->fetchAll(PDO::FETCH_ASSOC);
			          foreach ($rows as $val) {
			            echo '<option value="'.$val['sno'].'">'.$val['target_group'].'</option>';
			          }
			        ?>
 				</select>
 			</div>
 			<div class="col">
 				<label>Stage:</label>
 				<select class="form-control">
 					<option>Select</option>
 					<?php 
			          $stm = $conn1->query("SELECT * FROM program_stage WHERE status='Active'");
			          $rows = $stm->fetchAll(PDO::FETCH_ASSOC);
			          foreach ($rows as $val) {
			            echo '<option value="'.$val['sno'].'">'.$val['stage'].'</option>';
			          }
			        ?>
 				</select>
 			</div>
 		</div>
		<div class="form-group">
			<label>Objectives:</label><br><textarea name="objective" class="form-control"></textarea>
		</div>
		<div class="form-group">
			<label>Methodology:</label><br><textarea name="methodology" class="form-control"></textarea>
		</div>
		<div class="row form-group">
 			<div class="col">
 				<label>Tools:</label><br><textarea class="form-control" name="tools"></textarea>
 			</div>
<!-- 	     			<div class="col">
					<div class="form-group"> 
     				<label>Duration:</label><br><input type="number" class="form-control" name="duration" style="width: 50%; display: inline-block;"><select class="form-control" style="width: 40%; display: inline-block;"><option>Select</option></select>
     			</div>
 			</div> -->
 		</div>
		<div class="form-group">
			<label>Collaborating Agencies:</label><br><textarea name="agencies" class="form-control"></textarea>
		</div>
		<label>Activities Proposed:</label><br>
		<table class="table table-bordered">
			<tr>
				<td>S.No.:</td>
				
				<td>Name of the Activity:</td>

				<td>Tentative Date of Completion:</td>
			
				<td>Completed/Not Completed:</td>
			
				<td>Obstacles if any:</td>
			
				<td></td>
			</tr>
			<tr>
				<td>1</td>
				<td><input type="text" name=""></td>
				<td><input type="text" name=""></td>
				<td><input type="text" name=""></td>
				<td><input type="text" name=""></td>
				<td><button type="button" class="btn-sm btn-primary">Add</button></td>
			</tr>
		</table>
		<label>Project Staff Details:</label>
		<table class="table table-bordered">
			<tr>
				<td>Post:</td>
				<td>Sanctioned numbers:</td>
				<td>Duration:</td>
				<td>Expenditure:</td>
				<td>Expenditure used:</td>
				<td></td>
			</tr>
			<tr>
				<td><select class="form-control"><option>Select</option>
					<?php 
			          $stm = $conn1->query("SELECT * FROM program_post WHERE status='Active' order by post ASC");
			          $rows = $stm->fetchAll(PDO::FETCH_ASSOC);
			          foreach ($rows as $val) {
			            echo '<option value="'.$val['sno'].'">'.$val['post'].'</option>';
			          }
				    ?>	
				</select></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td><button type="button" class="btn-sm btn-primary">Add</button></td>
			</tr>
		</table>
	
		<div class="form-group">
			<label>How to disseminate outcome of the project:</label><input type="text" class="form-control" name="">
			</div>
			<div class="form-group">
			<label>Major Achievements/Month Wise Progress:</label>
			<table class="table table-bordered">
				<tr>
					<td>Months:</td>
					<td>Achievements:</td>
					<td></td>
				</tr>
				<tr>
					<td>April</td>
					<td></td>
					<td><button type="button" class="btn-sm btn-primary">Add</button></td>
				</tr>
			</table>
				<label>Overall Achievements:</label><textarea class="form-control" name="obs_txt"></textarea>
		</div>
		<div class="form-group">
			<label>Report Submitted or not</label>
			<select class="form-control">
				<option>Select</option>
				<?php 
		          $stm = $conn1->query("SELECT * FROM yes_no WHERE status='Active'");
		          $rows = $stm->fetchAll(PDO::FETCH_ASSOC);
		          foreach ($rows as $val) {
		            echo '<option value="'.$val['sno'].'">'.$val['choose'].'</option>';
		          }
			    ?>
			</select>
		</div>
		<br>
		<div class="text-center mt-1">
 			<input type="submit" name="submit" class="btn btn-primary" value="submit">
 		</div>
	</form>
</div>

<!-- =============================== End of Main Container ========================================== -->

<?php include_once("footer.php") ?>

</body>
</html>
