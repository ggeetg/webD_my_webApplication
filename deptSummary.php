<?php include_once('loginchk.php');
  function clean($string) {
     return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
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
	<script>
	//history.go(1); // disable the browser's back button
  $(document).ready(function(){
      var mySelect = $('#year');
      var date = new Date();
      var startYear = 2019;
      var nextY = startYear.toString().substr(-2);
      var nextYear = parseInt(nextY) + 1;
      for (var i = 0; i < 30; i++) {
        mySelect.append(
          $('<option></option>').val("20"+nextYear).html(startYear+"-"+nextYear)
        );
        startYear = startYear + 1;
        nextYear = nextYear + 1;
      }
      mySelect.val(date.getFullYear());
    });
	</script>
<!--===============================================================================================-->
  <style>
  </style>
</head>
<body>

<?php include_once('header.php'); ?>
<?php include_once('menubar.php'); ?>
<div class="container p-r-25 p-l-25 p-t-45 p-b-45" id="pdf">
  <form action="deptSummary.php?EncHid=<?php echo $_SESSION['EncTok'] ?>" method="post">
  <label>Select Department: </label>
  <select name="dept" id="sel_dept">
    <option value="">Select</option>
    <?php 
          $stm = $conn1->query("SELECT * FROM department where status ='Active' and id not in (1) ");
          $rows = $stm->fetchAll(PDO::FETCH_ASSOC);
          foreach ($rows as $val) {
              echo '<option value="'.$val['id'].'">'.$val['dept_name'].'</option>';          
          }
    ?>
  </select>
  <select name="year" id="year"></select>
  <select name="month" id="month">
  <?php $stm = $conn1->query("SELECT * FROM months");
      $rows = $stm->fetchAll(PDO::FETCH_ASSOC);
      $c_month = date('m'); 
      echo $c_month;
      foreach ($rows as $val) {
        if($c_month==$val['sno'])
          echo '<option value="'.$val['sno'].'" selected>'.$val['name'].'</option> ';
        else
          echo '<option value="'.$val['sno'].'">'.$val['name'].'</option> ';          
      }
  ?>
  </select>
    <?php include_once("lib/csrfMain.php"); ?>
  &nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="submit" value="Go">
  </form><br><br>
  
  <?php if(isset($_POST['dept'])&&!empty($_POST['dept'])){ ?>
    <script type="text/javascript">
      $(document).ready(function(){
        $("#sel_dept").val(<?php echo $_POST['dept'] ?>);
        $("#month").val("<?php echo $_POST['month'] ?>");
        $("#year").val(<?php echo $_POST['year'] ?>);
      });
    </script>
    <?php
    $dept_id = clean($_POST['dept']);
    $year = clean(substr($_POST['year'], -2));
    $month = clean($_POST['month']);

	    $stm = $conn1->prepare("SELECT count(a.id) as rn_prog FROM project_registration as a join financial_year as b on a.id=b.project_id where a.type=1 and b.yearly_status=1 and a.constituent_unit = :a and b.fin_year_end=:b ");
      $stm->bindParam(":a",$dept_id);
      $stm->bindParam(":b",$year);
      $stm->execute();
	    $row1 = $stm->fetch();
	    $stm = $conn1->prepare("SELECT count(a.id) as ro_prog FROM project_registration as a join financial_year as b on a.id=b.project_id where a.type=1 and b.yearly_status=2 and a.constituent_unit = :a and b.fin_year_end=:b ");
      $stm->bindParam(":a",$dept_id);
      $stm->bindParam(":b",$year);
      $stm->execute();
	    $row2 = $stm->fetch();
	    $stm = $conn1->prepare("SELECT count(a.id) as rc_prog FROM project_registration as a join financial_year as b on a.id=b.project_id where a.type=1 and b.yearly_status=3 and a.constituent_unit = :a and b.fin_year_end=:b ");
      $stm->bindParam(":a",$dept_id);
      $stm->bindParam(":b",$year);
      $stm->execute();
	    $row3 = $stm->fetch();
	    $stm = $conn1->prepare("SELECT count(a.id) as tr_prog FROM project_registration as a join financial_year as b on a.id=b.project_id where b.yearly_status in (1,2,3,6) and a.type=1 and a.constituent_unit = :a and b.fin_year_end=:b ");
      $stm->bindParam(":a",$dept_id);
      $stm->bindParam(":b",$year);
      $stm->execute();
	    $row4 = $stm->fetch();
	    $stm = $conn1->prepare("SELECT sum(a.budget_allocated) as ba_prog FROM financial_year as a JOIN project_registration as b on a.project_id = b.id where a.yearly_status in (1,2,3,6) and b.type=1 and b.constituent_unit = :a and a.fin_year_end=:b ");
      $stm->bindParam(":a",$dept_id);
      $stm->bindParam(":b",$year);
      $stm->execute();
	    $row5 = $stm->fetch();
	    $stm = $conn1->prepare("SELECT sum(a.budget_utilized) as bu_prog FROM financial_year as a JOIN project_registration as b on a.project_id = b.id where a.yearly_status in (1,2,3,6) and b.type=1 and b.constituent_unit = :a and a.fin_year_end=:b ");
      $stm->bindParam(":a",$dept_id);
      $stm->bindParam(":b",$year);
      $stm->execute();
	    $row6 = $stm->fetch();

	    $stm = $conn1->prepare("SELECT count(a.id) as rn_prog FROM project_registration as a join financial_year as b on a.id=b.project_id where a.type=2 and b.yearly_status=1 and a.constituent_unit = :a and b.fin_year_end=:b ");
      $stm->bindParam(":a",$dept_id);
      $stm->bindParam(":b",$year);
      $stm->execute();
	    $row7 = $stm->fetch();
	    $stm = $conn1->prepare("SELECT count(a.id) as ro_prog FROM project_registration as a join financial_year as b on a.id=b.project_id where a.type=2 and b.yearly_status=2 and a.constituent_unit = :a and b.fin_year_end=:b ");
      $stm->bindParam(":a",$dept_id);
      $stm->bindParam(":b",$year);
      $stm->execute();
	    $row8 = $stm->fetch();
	    $stm = $conn1->prepare("SELECT count(a.id) as rc_prog FROM project_registration as a join financial_year as b on a.id=b.project_id where a.type=2 and b.yearly_status=3 and a.constituent_unit = :a and b.fin_year_end=:b ");
      $stm->bindParam(":a",$dept_id);
      $stm->bindParam(":b",$year);
      $stm->execute();
	    $row9 = $stm->fetch();
	    $stm = $conn1->prepare("SELECT count(a.id) as tr_prog FROM project_registration as a join financial_year as b on a.id=b.project_id where b.yearly_status in (1,2,3,6) and a.type=2 and a.constituent_unit = :a and b.fin_year_end=:b ");
      $stm->bindParam(":a",$dept_id);
      $stm->bindParam(":b",$year);
      $stm->execute();
	    $row10 = $stm->fetch();
	    $stm = $conn1->prepare("SELECT sum(a.budget_allocated) as ba_prog FROM financial_year as a JOIN project_registration as b on a.project_id = b.id where a.yearly_status in (1,2,3,6) and b.type=2 and b.constituent_unit = :a and a.fin_year_end=:b ");
      $stm->bindParam(":a",$dept_id);
      $stm->bindParam(":b",$year);
      $stm->execute();
	    $row11 = $stm->fetch();
	    $stm = $conn1->prepare("SELECT sum(a.budget_utilized) as bu_prog FROM financial_year as a JOIN project_registration as b on a.project_id = b.id where a.yearly_status in (1,2,3,6) and b.type=2 and b.constituent_unit = :a and a.fin_year_end=:b ");
      $stm->bindParam(":a",$dept_id);
      $stm->bindParam(":b",$year);
      $stm->execute();
	    $row12 = $stm->fetch();

	    $stm = $conn1->prepare("SELECT count(a.id) as rn_prog FROM project_registration as a join financial_year as b on a.id=b.project_id where a.type=3 and b.yearly_status=1 and a.constituent_unit = :a and b.fin_year_end=:b ");
      $stm->bindParam(":a",$dept_id);
      $stm->bindParam(":b",$year);
      $stm->execute();
	    $row13 = $stm->fetch();
	    $stm = $conn1->prepare("SELECT count(a.id) as ro_prog FROM project_registration as a join financial_year as b on a.id=b.project_id where a.type=3 and b.yearly_status=2 and a.constituent_unit = :a and b.fin_year_end=:b ");
      $stm->bindParam(":a",$dept_id);
      $stm->bindParam(":b",$year);
      $stm->execute();
	    $row14 = $stm->fetch();
	    $stm = $conn1->prepare("SELECT count(a.id) as rc_prog FROM project_registration as a join financial_year as b on a.id=b.project_id where a.type=3 and b.yearly_status=3 and a.constituent_unit = :a and b.fin_year_end=:b ");
      $stm->bindParam(":a",$dept_id);
      $stm->bindParam(":b",$year);
      $stm->execute();
	    $row15 = $stm->fetch();
	    $stm = $conn1->prepare("SELECT count(a.id) as tr_prog FROM project_registration as a join financial_year as b on a.id=b.project_id where b.yearly_status in (1,2,3,6) and a.type=3 and a.constituent_unit = :a and b.fin_year_end=:b ");
      $stm->bindParam(":a",$dept_id);
      $stm->bindParam(":b",$year);
      $stm->execute();
	    $row16 = $stm->fetch();
	    $stm = $conn1->prepare("SELECT sum(a.budget_allocated) as ba_prog FROM financial_year as a JOIN project_registration as b on a.project_id = b.id where a.yearly_status in (1,2,3,6) and b.type=3 and b.constituent_unit = :a and a.fin_year_end=:b ");
      $stm->bindParam(":a",$dept_id);
      $stm->bindParam(":b",$year);
      $stm->execute();
	    $row17 = $stm->fetch();
	    $stm = $conn1->prepare("SELECT sum(a.budget_utilized) as bu_prog FROM financial_year as a JOIN project_registration as b on a.project_id = b.id where a.yearly_status in (1,2,3,6) and b.type=3 and b.constituent_unit = :a and a.fin_year_end=:b ");
      $stm->bindParam(":a",$dept_id);
      $stm->bindParam(":b",$year);
      $stm->execute();
	    $row18 = $stm->fetch();

	    $stm = $conn1->prepare("SELECT count(a.id) as rn_prog FROM project_registration as a join financial_year as b on a.id=b.project_id where a.type=4 and b.yearly_status=1 and a.constituent_unit = :a and b.fin_year_end=:b ");
      $stm->bindParam(":a",$dept_id);
      $stm->bindParam(":b",$year);
      $stm->execute();
	    $row19 = $stm->fetch();
	    $stm = $conn1->prepare("SELECT count(a.id) as ro_prog FROM project_registration as a join financial_year as b on a.id=b.project_id where a.type=4 and b.yearly_status=2 and a.constituent_unit = :a and b.fin_year_end=:b ");
      $stm->bindParam(":a",$dept_id);
      $stm->bindParam(":b",$year);
      $stm->execute();
	    $row20 = $stm->fetch();
	    $stm = $conn1->prepare("SELECT count(a.id) as rc_prog FROM project_registration as a join financial_year as b on a.id=b.project_id where a.type=4 and b.yearly_status=3 and a.constituent_unit = :a and b.fin_year_end=:b ");
      $stm->bindParam(":a",$dept_id);
      $stm->bindParam(":b",$year);
      $stm->execute();
	    $row21 = $stm->fetch();
	    $stm = $conn1->prepare("SELECT count(a.id) as tr_prog FROM project_registration as a join financial_year as b on a.id=b.project_id where b.yearly_status in (1,2,3,6) and a.type=4 and a.constituent_unit = :a and b.fin_year_end=:b ");
      $stm->bindParam(":a",$dept_id);
      $stm->bindParam(":b",$year);
      $stm->execute();
	    $row22 = $stm->fetch();
	    $stm = $conn1->prepare("SELECT sum(a.budget_allocated) as ba_prog FROM financial_year as a JOIN project_registration as b on a.project_id = b.id where a.yearly_status in (1,2,3,6) and b.type=4 and b.constituent_unit = :a and a.fin_year_end=:b ");
      $stm->bindParam(":a",$dept_id);
      $stm->bindParam(":b",$year);
      $stm->execute();
	    $row23 = $stm->fetch();
	    $stm = $conn1->prepare("SELECT sum(a.budget_utilized) as bu_prog FROM financial_year as a JOIN project_registration as b on a.project_id = b.id where a.yearly_status in (1,2,3,6) and b.type=4 and b.constituent_unit = :a and a.fin_year_end=:b ");
      $stm->bindParam(":a",$dept_id);
      $stm->bindParam(":b",$year);
      $stm->execute();
	    $row24 = $stm->fetch();

      $stm = $conn1->prepare("SELECT count(b.project_id) as dr_prog FROM project_registration as a join financial_year as b on a.id = b.project_id where b.final_status=4 and a.type=1 and a.constituent_unit = :a and b.fin_year_end = :b ");
      $stm->bindParam(":a",$dept_id);
      $stm->bindParam(":b",$year);
      $stm->execute();
      $row25 = $stm->fetch();
      $stm = $conn1->prepare("SELECT count(b.project_id) as dr_prog FROM project_registration as a join financial_year as b on a.id = b.project_id where b.final_status=4 and a.type=2 and a.constituent_unit = :a and b.fin_year_end = :b ");
      $stm->bindParam(":a",$dept_id);
      $stm->bindParam(":b",$year);
      $stm->execute();
      $row26 = $stm->fetch();
      $stm = $conn1->prepare("SELECT count(b.project_id) as dr_prog FROM project_registration as a join financial_year as b on a.id = b.project_id where b.final_status=4 and a.type=3 and a.constituent_unit = :a and b.fin_year_end = :b ");
      $stm->bindParam(":a",$dept_id);
      $stm->bindParam(":b",$year);
      $stm->execute();
      $row27 = $stm->fetch();
      $stm = $conn1->prepare("SELECT count(b.project_id) as dr_prog FROM project_registration as a join financial_year as b on a.id = b.project_id where b.final_status=4 and a.type=4 and a.constituent_unit = :a and b.fin_year_end = :b ");
      $stm->bindParam(":a",$dept_id);
      $stm->bindParam(":b",$year);
      $stm->execute();
      $row28 = $stm->fetch();

      $stm = $conn1->prepare("SELECT count(a.id) as nr_prog FROM project_registration as a join financial_year as b on a.id=b.project_id where a.type=1 and b.yearly_status=6 and a.constituent_unit = :a and b.fin_year_end=:b ");
      $stm->bindParam(":a",$dept_id);
      $stm->bindParam(":b",$year);
      $stm->execute();
	  $row29 = $stm->fetch();
	  $stm = $conn1->prepare("SELECT count(a.id) as nr_prog FROM project_registration as a join financial_year as b on a.id=b.project_id where a.type=2 and b.yearly_status=6 and a.constituent_unit = :a and b.fin_year_end=:b ");
    $stm->bindParam(":a",$dept_id);
      $stm->bindParam(":b",$year);
      $stm->execute();
	  $row30 = $stm->fetch();
	  $stm = $conn1->prepare("SELECT count(a.id) as nr_prog FROM project_registration as a join financial_year as b on a.id=b.project_id where a.type=3 and b.yearly_status=6 and a.constituent_unit = :a and b.fin_year_end=:b ");
    $stm->bindParam(":a",$dept_id);
      $stm->bindParam(":b",$year);
      $stm->execute();
	  $row31 = $stm->fetch();
	  $stm = $conn1->prepare("SELECT count(a.id) as nr_prog FROM project_registration as a join financial_year as b on a.id=b.project_id where a.type=4 and b.yearly_status=6 and a.constituent_unit = :a and b.fin_year_end=:b ");
    $stm->bindParam(":a",$dept_id);
      $stm->bindParam(":b",$year);
      $stm->execute();
	  $row32 = $stm->fetch();
   ?>
   <table id="mytable" class="table">
     <tr>    
      <th>Programme</th>
      <th>New</th>
      <th>New-Regular</th>
      <th>On-going</th>
      <th>Carried over</th>
      <th>Total</th>
      <th>Drop</th>
      <th>Budget allocated</th>
      <th>Budget utilized</th>
    </tr>
    <tr>
      <td>Research</td>
      <td><?php echo $row1['rn_prog']??null ?></td>
      <td><?php echo $row29['nr_prog']??null ?></td>
      <td><?php echo $row2['ro_prog']??null ?></td>
      <td><?php echo $row3['rc_prog']??null ?></td>
      <td><?php echo $row4['tr_prog']??null ?></td>
      <td><?php echo $row25['dr_prog']??null ?></td>
      <td><?php echo $row5['ba_prog']??null ?></td>
      <td><?php echo $row6['bu_prog']??null ?></td>
    </tr>
    <tr>
      <td>Development</td>
      <td><?php echo $row7['rn_prog']??null ?></td>
      <td><?php echo $row30['nr_prog']??null ?></td>
      <td><?php echo $row8['ro_prog']??null ?></td>
      <td><?php echo $row9['rc_prog']??null ?></td>
      <td><?php echo $row10['tr_prog']??null ?></td>
      <td><?php echo $row26['dr_prog']??null ?></td>
      <td><?php echo $row11['ba_prog']??null ?></td>
      <td><?php echo $row12['bu_prog']??null ?></td>
    </tr>
    <tr>
      <td>Training</td>
      <td><?php echo $row13['rn_prog']??null ?></td>
      <td><?php echo $row31['nr_prog']??null ?></td>
      <td><?php echo $row14['ro_prog']??null ?></td>
      <td><?php echo $row15['rc_prog']??null ?></td>
      <td><?php echo $row16['tr_prog']??null ?></td>
      <td><?php echo $row27['dr_prog']??null ?></td>
      <td><?php echo $row17['ba_prog']??null ?></td>
      <td><?php echo $row18['bu_prog']??null ?></td>
    </tr>
    <tr>
      <td>Extension</td>
      <td><?php echo $row19['rn_prog']??null ?></td>
      <td><?php echo $row32['nr_prog']??null ?></td>
      <td><?php echo $row20['ro_prog']??null ?></td>
      <td><?php echo $row21['rc_prog']??null ?></td>
      <td><?php echo $row22['tr_prog']??null ?></td>
      <td><?php echo $row28['dr_prog']??null ?></td>
      <td><?php echo $row23['ba_prog']??null ?></td>
      <td><?php echo $row24['bu_prog']??null ?></td>
    </tr>
   </table>

   <br><h4>Progress Report</h4><br>
   <?php 
    $stm = $conn1->prepare("SELECT a.id, a.title, a.status, a.pac_code , c.progress_till_date, c.budget_utilized, c.month, d.type as status_name FROM project_registration as a JOIN financial_year as b on a.id=b.project_id left JOIN project_monthly_report as c on a.id=c.project_id and c.month =$month join program_status as d on a.status = d.sno WHERE b.fin_year_end = :b and a.constituent_unit = :a");
    $stm->bindParam(":a",$dept_id);
      $stm->bindParam(":b",$year);
      $stm->execute();
    $rows = $stm->fetchAll(PDO::FETCH_ASSOC);
    foreach ($rows as $val) {
      $pid = $val['id'];
      $stm2=$conn1->prepare("SELECT a.sno, a.activity_name, a.comp_date, a.status_completed, a.obstacles, b.bud_amnt, c.value as comp_status from project_activity as a left join acr as b on a.sno = b.mr_activity_id join completed_or_not as c on a.status_completed = c.sno where a.project_id = :a  ");
      $stm2->bindParam(":a",$pid);
      $stm2->execute();
      $rows2=$stm2->fetchAll(PDO::FETCH_ASSOC);
      echo "<table class='table table-bordered m-b-20'><tr class='table-primary'>";
      echo "<td colspan=4>Title: ".$val['title']."</td></tr>";
      echo "<tr><td>PAC code: ".$val['pac_code']."</td><td> Month: ".$month."</td><td> Budget utilized in selected month: ".$val['budget_utilized']."</td><td>Final Status: ".$val['status_name']."</td></tr>";
      foreach($rows2 as $val2){
        echo "<tr class='table-danger'><td>Activity name: ".$val2['activity_name']."</td><td>Tentative date of completion: ".$val2['comp_date']."</td><td>Activity status: ".$val2['comp_status']."</td><td>ACR budget utilized: ".$val2['bud_amnt']."</td></tr>";
      }
      echo "<tr class='table-success'><td colspan=4>".$val['progress_till_date']."</td></tr>";
      echo "</table>";
    }
   ?>


   <button class="btn-sm btn-primary" id="prnt_btn" onclick="printDiv('pdf','Title')">Print report</button>
 <?php } ?>
</div>
<?php include_once("footer.php") ?>

</body>
</html>