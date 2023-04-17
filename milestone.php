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
	//history.go(1); // disable the browser's back button
	</script>
<!--===============================================================================================-->
  <style>
  </style>
</head>
<body>

<?php include_once('header.php'); ?>
<?php include_once('menubar.php'); ?>
<div class="container p-r-25 p-l-25 p-t-45 p-b-45">
  <h4 align="center" class="m-b-10">Key Performance</h4>
  <table class="table table-bordered">
  	<tr>
  		<td width="60%">Performance Indicators</td>
  		<td width="15%">Expected Completion Month</td>
  		<td width="15%">Status</td>
  		<td width="10%"></td>
  	</tr>
  	<tr>
  		<td><textarea class="form-control" rows="1"></textarea></td>
  		<td style="vertical-align:middle;">
  			<?php $stm = $conn1->query("SELECT * FROM months");
	          $rows = $stm->fetchAll(PDO::FETCH_ASSOC);
	          echo '<select class="form-control" name="comp_month" id="comp_month"><option value="">Select</option>';
	          $c_month = date('m'); 
	          foreach ($rows as $val) {
	              echo '<option value="'.$val['sno'].'" >'.$val['name'].'</option> ';
	          }
	          echo '</select>';
      		?></td>
  		<td style="vertical-align:middle;">
  			<?php $stm = $conn1->query("SELECT * FROM completed_or_not");
	          $rows = $stm->fetchAll(PDO::FETCH_ASSOC);
	          echo '<select class="form-control" name="complete" id="complete"><option value="">Select</option>';
	          $c_month = date('m'); 
	          foreach ($rows as $val) {
	              echo '<option value="'.$val['sno'].'" >'.$val['value'].'</option> ';
	          }
	          echo '</select>';
      		?></td>
  		<td style="vertical-align:middle;"><button class="btn btn-primary" id="add_m">Add</button></td>
  	</tr>
  </table>
</div>
<?php include_once("footer.php") ?>

</body>
</html>