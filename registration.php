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

	<!--===============================================================================================-->
	<style>
	</style>
</head>

<body>

	<?php include_once('header.php'); ?>
	<?php include_once('menubar.php'); ?>

	<!-- ================  Main Container =================== -->
	<div class="container p-r-25 p-l-25 p-t-45 p-b-45">
		<?php if (isset($_GET['msg'])) { ?>
			<div class="alert alert-success alert-dismissible" id="myAlert">
				<button type="button" class="close">&times;</button>
				<?php echo htmlentities($_GET['msg']); ?>
			</div>
		<?php } ?>

		<h4 align="center">Programme Registration Form</h4>
		<br>
		<form action="registrationaction.php?EncHid=<?php echo $_SESSION['EncTok'] ?>" method="post" onsubmit="return validate()">
			<div class="form-group">
				<label>Name of Constituent Unit:</label>
				<select class="form-control" name="constituent" id="constituent" required>
					<option value="">Select</option>
					<?php
					$stm = $conn1->query("SELECT * FROM department WHERE status='Active' and id not in (1) order by dept_pac_code ASC");
					$rows = $stm->fetchAll(PDO::FETCH_ASSOC);
					foreach ($rows as $val) {
						echo '<option value="' . $val['id'] . '">' . $val['dept_name'] . '</option>';
					}
					?>
				</select>
			</div>
			<div class="row form-group">
				<div class="col">
					<label>PAC/PAB/Any other </label><select class="form-control" name="prj_type" required>
						<option value="1">PAC</option>
						<option value="2">PAB</option>
						<option value="3">Others</option>
					</select>
				</div>
				<!--  			<div class="col" style="display: none">
 				<label for="pac_code">PAC/PAB/Any other code: (EX. 21101R01)</label><input type="text" class="form-control" name="pac_code" id="pac_code" placeholder="Enter PAC Code" minlength="8" maxlength="8" data-toggle="tooltip" title="initialYear PAC/PAB/Other deptPAC R/D/T/E srNo" required>
 				<span id="uinfo" class="red mt-0"></span>
 			</div>
 -->
				<div class="col">
					<label>Year of commencement &nbsp;&nbsp;&nbsp; Year of completion: </label><br><select class="form-control" name="fin_year" id="year_from" style="width: 30%; display: inline-block;" required>
						<option value="">Select</option>
					</select>
					<span> &nbsp;&nbsp;&nbsp;to&nbsp;&nbsp;&nbsp; </span><select class="form-control" name="fin_end_year" id="year_till" style="width: 30%; display: inline-block;" required>
						<option value="">Select</option>
					</select>
				</div>
			</div>

			<div class="row form-group">
				<div class="col">
					<div>
						<label>Title:</label><input type="text" class="form-control" name="title" required>
					</div>
				</div>
				<div class="col">
					<div>
						<label>Project Coordinator:</label>
						<select class="form-control" name="pc" id="pc" required>
							<option value="">Select</option>
						</select>
						<a href="adduser.php?EncHid=<?php echo $_SESSION['EncTok'] ?>" style="font-size: 11px; color: blue; float: right;">Add Project Coordinator</a>
					</div>
				</div>
			</div>
			<div class="row form-group">
				<div class="col">
					<div>
						<label>State:</label>
						<select class="form-control" name="state" required>
							<option value="">Select</option>
							<?php
							$stm = $conn1->query("SELECT * FROM india_state WHERE status='Active' order by  state ASC");
							$rows = $stm->fetchAll(PDO::FETCH_ASSOC);
							foreach ($rows as $val) {
								echo '<option value="' . $val['state_id'] . '">' . $val['state'] . '</option>';
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
								echo '<option value="' . $val['id'] . '">' . $val['name'] . '</option>';
							}
							?>
						</select>
					</div>
				</div>
			</div>
			<div class="row form-group">
				<div class="col">
					<label>Type:</label>
					<select class="form-control" name="type" required>
						<option value="">Select</option>
						<?php
						$stm = $conn1->query("SELECT * FROM program_type WHERE status='Active'");
						$rows = $stm->fetchAll(PDO::FETCH_ASSOC);
						foreach ($rows as $val) {
							echo '<option value="' . $val['sno'] . '">' . $val['type'] . '</option>';
						}
						?>
					</select>
				</div>
				<div class="col">
					<label>Status:</label>
					<select class="form-control" name="status" required>
						<option value="">Select</option>
						<?php
						$stm = $conn1->query("SELECT * FROM program_status WHERE status='Active' order by arranging_order");
						$rows = $stm->fetchAll(PDO::FETCH_ASSOC);
						foreach ($rows as $val) {
							if ($val['sno'] == 1 || $val['sno'] == 6)
								echo '<option value="' . $val['sno'] . '">' . $val['type'] . '</option>';
							else
								echo '<option value="' . $val['sno'] . '" disabled>' . $val['type'] . '</option>';
						}
						?>
					</select>
				</div>
			</div>
			<div class="row form-group">
				<div class="col">
					<label>Budget Allocated (in INR):</label><input type="number" class="form-control" name="budget_all" min="0" required>
				</div>
				<div class="col">
					<label>Budget Utilized (in INR):</label><input type="number" class="form-control" name="budget_util" min="0" required>
				</div>
			</div>
			<div class="row form-group">
				<div class="col">
					<label>Level:</label>
					<select class="form-control" name="level" required>
						<option value="">Select</option>
						<?php
						$stm = $conn1->query("SELECT * FROM program_level WHERE status='Active'");
						$rows = $stm->fetchAll(PDO::FETCH_ASSOC);
						foreach ($rows as $val) {
							echo '<option value="' . $val['sno'] . '">' . $val['level'] . '</option>';
						}
						?>
					</select>
				</div>
				<div class="col">
					<label>Target Group:</label>
					<select class="form-control" name="target_group" required>
						<option value="">Select</option>
						<?php
						$stm = $conn1->query("SELECT * FROM program_target_group WHERE status='Active'");
						$rows = $stm->fetchAll(PDO::FETCH_ASSOC);
						foreach ($rows as $val) {
							echo '<option value="' . $val['sno'] . '">' . $val['target_group'] . '</option>';
						}
						?>
					</select>
				</div>
				<div class="col">
					<label>Stage:</label>
					<select class="form-control" name="stage" required>
						<option value="">Select</option>
						<?php
						$stm = $conn1->query("SELECT * FROM program_stage WHERE status='Active'");
						$rows = $stm->fetchAll(PDO::FETCH_ASSOC);
						foreach ($rows as $val) {
							echo '<option value="' . $val['sno'] . '">' . $val['stage'] . '</option>';
						}
						?>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label>Objectives:</label><br><textarea name="objective" class="form-control" name="objc" required></textarea>
			</div>
			<div class="form-group">
				<label>Methodology:</label><br><textarea name="methodology" class="form-control" name="methodology" required></textarea>
			</div>
			<div class="row form-group">
				<div class="col">
					<label>Tools:</label><br><textarea class="form-control" name="tools" required></textarea>
				</div>
			</div>
			<div class="form-group">
				<label>Collaborating Agencies:</label><br><textarea name="agencies" class="form-control" required></textarea>
			</div>
			<label>Key Performance</label>
			<table class="table table-bordered" id="kpr">
				<tr>
					<td width="60%">Performance Indicators</td>
					<td width="15%">Expected Completion Month</td>
					<td width="15%">Status</td>
					<td width="10%"></td>
				</tr>
				<tr id="kpr1">
					<td><textarea class="form-control" rows="1" name="p_indicator[]"></textarea></td>
					<td style="vertical-align:middle;">
						<?php $stm = $conn1->query("SELECT * FROM months");
						$rows = $stm->fetchAll(PDO::FETCH_ASSOC);
						echo '<select class="form-control" name="comp_month[]" id="comp_month"><option value="">Select</option>';
						$c_month = date('m');
						foreach ($rows as $val) {
							echo '<option value="' . $val['sno'] . '" >' . $val['name'] . '</option> ';
						}
						echo '</select>';
						?></td>
					<td style="vertical-align:middle;">
						<?php $stm = $conn1->query("SELECT * FROM p_status");
						$rows = $stm->fetchAll(PDO::FETCH_ASSOC);
						echo '<select class="form-control" name="complete[]" id="complete"><option value="">Select</option>';
						$c_month = date('m');
						foreach ($rows as $val) {
							echo '<option value="' . $val['sno'] . '" >' . $val['name'] . '</option> ';
						}
						echo '</select>';
						?></td>
					<td style="vertical-align:middle;" class="kpr_rb"><button type="button" class="btn btn-primary" id="add_m">Add</button></td>
				</tr>
			</table>
			<label>Activities Proposed:</label><br>
			<table class="table table-bordered" id="activity_table">
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
					<td><input class="form-control" type="text" name="activity_name[]" required></td>
					<td><input class="form-control" type="date" name="comp_date[]" required></td>
					<td>
						<select class="form-control" id="comp_status0" name="comp_status[]" required>
							<option value="">Select</option>

						</select>
					</td>
					<td><input class="form-control" type="text" name="obst[]"></td>
					<td><button type="button" class="btn-sm btn-primary" id="add_act">Add</button></td>
				</tr>
			</table>
			<label>Project Staff Details:</label>
			<table class="table table-bordered" id="project_table">
				<tr>
					<td>Post:</td>
					<td>Sanctioned numbers:</td>
					<td>Duration (in months):</td>
					<td>Total Expenditure:</td>
					<td>Expenditure used till date:</td>
					<td></td>
				</tr>
				<tr>
					<td><select class="form-control" id="senc_post0" name="senc_post[]" required>
							<option value="">Select</option>
						</select></td>
					<td><input class="form-control" type="number" name="post_sanc_num[]" min="0" required></td>
					<td><input class="form-control" type="number" name="dura[]" min="0" required></td>
					<td><input class="form-control" type="number" name="expendi[]" min="0" required></td>
					<td><input class="form-control" type="number" name="expn_used[]" min="0"></td>
					<td><button type="button" class="btn-sm btn-primary" id="add_post">Add</button></td>
				</tr>
			</table>

			<div class="form-group">
				<label>Dissemination of Outcome of the Project:</label><textarea class="form-control" name="dissenmination" required></textarea>
			</div>
			<div class="form-group">
				<label>Report Submitted or not</label>
				<select class="form-control" name="report_submission" required>
					<option value="">Select</option>
					<?php
					$stm = $conn1->query("SELECT * FROM yes_no WHERE status='Active'");
					$rows = $stm->fetchAll(PDO::FETCH_ASSOC);
					foreach ($rows as $val) {
						echo '<option value="' . $val['sno'] . '">' . $val['choose'] . '</option>';
					}
					?>
				</select>
			</div>
			<br>
			<?php include_once("lib/csrfMain.php"); ?>
			<div class="text-center mt-1">
				<input type="submit" name="submit" class="btn btn-primary" value="submit">
			</div>
		</form>
	</div>

	<!-- =============================== End of Main Container ========================================== -->

	<?php include_once("footer.php") ?>

</body>
<script>
	$(document).ready(function() {
		$('#add_m').click(function() {
			var t1 = $("#kpr1").clone().find("textarea").val("").end();
			t1.find(".kpr_rb").html('<button type="button" name="kpr_remove" id="' + i + '" class="kpr_btn_remove">X</button>');
			$('#kpr').append(t1);
		});
		$(document).on('click', '.kpr_btn_remove', function() {
			$(this).parent().parent().remove();
		});
	});

	$(document).ready(function() {
		var mySelect = $('#year_from');
		var mySelect2 = $('#year_till');
		var date = new Date();
		var startYear = date.getFullYear();
		var nextY = startYear.toString().substr(-2);
		var nextYear = parseInt(nextY) + 1;
		mySelect.append(
			$('<option></option>').val(startYear).html(startYear)
		);
		mySelect2.append(
			$('<option></option>').val(nextYear).html(nextYear)
		);
		// for (var i = 0; i < 30; i++) {
		//   mySelect.append(
		//     $('<option></option>').val(startYear).html(startYear)
		//   );
		//   mySelect2.append(
		//     $('<option></option>').val(nextYear).html(nextYear)
		//   );
		// startYear = startYear + 1;
		// nextYear = nextYear + 1;
		// }
	});

	//hide msg after 3sec
	$(document).ready(function() {
		$(".close").click(function() {
			$(".alert").alert("close");
		});
		//$("#myAlert").fadeOut(3000);    //fadeout message after 3sec
	});

	//ajax completed status , activity table
	function callcomp(id) {
		var url = "completedajax.php";
		var x = "true";
		var data = {
			q: x
		};
		$.post(url, data, function(data, status) {
			$("#comp_status" + id).html(data);
		});
	};
	$(document).ready(
		callcomp(0)
	);

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
	function callpost(id) {
		var url = "postajax.php";
		var x = "true";
		var data = {
			q: x
		};
		$.post(url, data, function(data, status) {
			$("#senc_post" + id).html(data);
		});
	};
	$(document).ready(
		callpost(0)
	);

	//post list ajax, project staff table
	$(document).ready(function() {
		var j = 1;
		$('#add_post').click(function() {
			j++;
			$('#project_table').append('<tr id="row2' + j + '" ><td><select class="form-control" id="senc_post' + j + '" name="senc_post[]" required><option value="">Select</option></select></td><td><input class="form-control" type="number" name="post_sanc_num[]" min="0" required></td><td><input class="form-control" type="number" name="dura[]" min="0" required></td><td><input class="form-control" type="number" name="expendi[]" min="0" required></td><td><input class="form-control" type="number" name="expn_used[]" min="0"></td><td><button type="button" name="remove" id="' + j + '" class="btn_remove2">X</button></td></tr>');
			callpost(j);
		});
		$(document).on('click', '.btn_remove2', function() {
			var button_id = $(this).attr("id");
			$('#row2' + button_id + '').remove();
		});
	});

	//change program coordinator
	$(document).ready(function() {
		$("#constituent").change(function() {
			var url = "chkpcajax.php";
			var x = $("#constituent").val();
			var data = {
				q: x
			};
			$.post(url, data, function(data, status) {
				$("#pc").html(data);
			});
		});
	});


	//ajax pac code check
	$(document).ready(function() {
		$("#pac_code").keyup(function() {
			var url = "chkpacajax.php";
			var x = $("#pac_code").val();
			var data = {
				q: x
			};
			$.post(url, data, function(data, status) {
				$("#uinfo").html(data);
			});
		});
	});

	// function validate(){
	// 	if($("#uinfo").html()!=""){
	//       alert("Please enter correct PAC/PAB code.");
	//       return false;
	//     }
	// }

	$('#pac_code').keypress(function(e) {
		var regex = new RegExp("^[a-zA-Z0-9]+$");
		var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
		if (regex.test(str)) {
			return true;
		}

		e.preventDefault();
		return false;
	});

	$(document).ready(function() {
		$('[data-toggle="tooltip"]').tooltip();
	});
</script>

</html>