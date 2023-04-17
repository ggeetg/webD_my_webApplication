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
    .b_all{
      border:1px solid gray;
      padding: 1px;
    }
    .b_all:focus{
      border:1px solid gray !important;
      padding: 1px;
    }
  </style>
</head>
<body>

<?php include_once('header.php'); ?>
<?php include_once('menubar.php'); ?>
<div class="container p-r-25 p-l-25 p-t-45 p-b-45">
  <?php if(isset($_GET['msg'])){ ?>
    <div class="alert alert-success alert-dismissible" id="myAlert">
      <button type="button" class="close">&times;</button>
      <?php echo htmlentities($_GET['msg']); ?>
    </div>
  <?php } ?>
  
	<?php 
		$thisMonth= date('m');
		$thisYear= date('Y');
		if($thisMonth>=4){
			$startingYear = $thisYear-1;
			$endingYear = $thisYear;
		} else if($thisMonth<4){
			$startingYear = $thisYear-2;
			$endingYear = $thisYear-1;
		}
	 ?>
  <h4>List of all programmes ending in financial year <?php echo $startingYear.' - '.$endingYear;  ?></h4>
  <br>
  <form action="financialendingaction.php?EncHid=<?php echo $_SESSION['EncTok'] ?>" method="post" onsubmit="return validate()">
  	<table class="table">
  		<tr>
  			<th></th>
	  		<th>PAC</th>
	  		<th>Department Name</th>
	  		<th>Report Submitted</th>
        <th>Final Status</th>
	  		<th>Budget Allocated</th>
	  	</tr>
  	<?php
  		$stm = $conn1->query("SELECT a.id, a.pac_code, a.status, a.report_submit, b.dept_name, c.choose, d.fin_year_start, d.fin_year_end  FROM project_registration as a join department as b join yes_no as c join financial_year as d on a.constituent_unit = b.id and a.report_submit = c.sno and a.id=d.project_id where d.fin_year_end = substr($endingYear,-2) and a.status in (1,2,3,6) and d.chk1='Pending' ");
  		$rows = $stm->fetchAll(PDO::FETCH_ASSOC);
  		foreach($rows as $val){
  			echo '<tr><td><input type="hidden" name="pid[]" value="'.$val['id'].'"></td><td><input type="text" name="pac_code[]" value="'.$val['pac_code'].'" readonly></td>';
  			echo '<td>'.$val['dept_name'].'</td>';
  			$stm = $conn1->query("SELECT sno, choose FROM yes_no where status='Active' ");
  			$rows2 = $stm->fetchAll(PDO::FETCH_ASSOC);
  			echo '<td><Select name="report_submit[]">';
  			foreach ($rows2 as $val2) {
  				if($val['report_submit']==$val2['sno'])
	  				echo '<option value="'.$val2['sno'].'" selected>'.$val2['choose'].'</option>';
	  			else
	  				echo '<option value="'.$val2['sno'].'">'.$val2['choose'].'</option>';
  			}
  			echo '</select></td>';
  			$stm = $conn1->query("SELECT sno, type FROM program_status where status='Active' ");
  			$rows1 = $stm->fetchAll(PDO::FETCH_ASSOC);
  			echo '<td><Select name="f_status[]" class="sts_all" required><option value="">Select</option>';
  			foreach ($rows1 as $val1) {
  				// if($val['status']==$val1['sno'])
	  			// 	echo '<option value="'.$val1['sno'].'" selected>'.$val1['type'].'</option>';
          if($val1['sno']==1||$val1['sno']==6)
           continue;
	  			else
	  				echo '<option value="'.$val1['sno'].'">'.$val1['type'].'</option>';
  			}
  			echo '</select></td>';
        echo '<td><input type="number" name="budget_allocated[]" class="b_all" ><input type="hidden" name="year_start[]" value="'.$val['fin_year_start'].'"><input type="hidden" name="year_end[]" value="'.$val['fin_year_end'].'"></td></tr>';
  		}
  	?>
  	</table>
    <?php include_once("lib/csrfMain.php"); ?>
  	<div class="text-center mt-1" id="f_end">
    	<input type="submit" id="s1" name="submit" class="btn btn-primary m-r-5" value="Save">
  	</div>
  </form>
</div>
<?php include_once("footer.php") ?>

</body>

<script type="text/javascript">
  function validate(){
    var flag = 1;
    var showAlert = true;
    var status = document.getElementsByClassName("sts_all");
    var bud_alloc = document.getElementsByClassName("b_all");
    for(var x=0;x<status.length;x++){
      if((status[x].value==2&&bud_alloc[x].value=="")||(status[x].value==3&&bud_alloc[x].value=="")){
        bud_alloc[x].style.border = "2px solid red";
        if(showAlert==true){
          alert("Please fill the budget details in red boxes");
          showAlert = false;
        }
        flag = 0;
      }
    }
    if(flag==0)
      return false;
    return true;
  }
</script>
</html>