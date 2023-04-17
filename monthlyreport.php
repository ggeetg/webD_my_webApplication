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
<!-- check for finencial ending status change -->
<?php
  $thisMonth= date('m');
  $thisYear= date('Y');
  if($thisMonth>=4&&$thisMonth<=12){
    $startingYear = $thisYear-1;
    $endingYear = $thisYear;
  $stm = $conn1->query("SELECT a.pac_code FROM project_registration as a join department as b join yes_no as c join financial_year as d on a.constituent_unit = b.id and a.report_submit = c.sno and a.id=d.project_id where d.fin_year_end = substr($endingYear,-2) and a.status in (1,2,3,6) and d.chk1='Pending' ");
  $rows = $stm->fetch();
  if(!$rows);
  else{
    echo "<br><h1 align='center'>Please wait for updation.</h1>";
    exit();
    }
  }
?>
<!-- ----------------------------------------- -->

<?php if(isset($_GET['msg'])){ ?>
  <div class="alert alert-danger alert-dismissible" id="myAlert">
    <button type="button" class="close">&times;</button>
    <?php echo htmlentities($_GET['msg']); ?>
  </div>
<?php } ?>

  <h4 align="center">Monthly Report of the Major Activities and Achievements</h4>
  <br>
  <form action="MonthlyReportEntry.php?EncHid=<?php echo $_SESSION['EncTok'] ?>" method="post" style="min-height:400px; padding-top: 65px">
    <table class="table">
      <tr><th>PAC Code</th><th>Title</th><th>Remarks</th><th>Monthly Report</th></tr>
      <?php
        $stm = $conn1->query("SELECT id, utype, dept FROM user WHERE uname = '$_SESSION[user_id]' ");
        $rows = $stm->fetch();
        $uid = $rows["utype"];
        $us_id = $rows["id"];
        $dept = $rows["dept"];
        $cur_month = date('m');
        $curr_fy = date('y');
        if($cur_month>3)
          $curr_fy+=1;
        if($uid==1||$uid==2){
          $stm = $conn1->query("SELECT pac_code, title, id FROM project_registration WHERE proj_coord = '$us_id' and status in (1,2,3,6) ");
          $rows = $stm->fetchAll(PDO::FETCH_ASSOC);
          foreach ($rows as $val) {
            $stm2 = $conn1->query("SELECT chk1,chk2,chk3 FROM project_monthly_report WHERE project_id = '$val[id]' and month = $cur_month and fin_year_end = $curr_fy");
            $row2 = $stm2->fetch();
            $row2["chk2"]=$row2["chk2"]??null;
            $row2["chk1"]=$row2["chk1"]??null;
            if($row2["chk2"]=="Submit"){$remark= "<span style='color:green'>Monthly report submitted</span>";} 
                elseif($row2["chk1"]=="Submit"){$remark= "<span style='color:orange'>Pending at head</span>";} 
                  else{$remark= "<span style='color:red'>Monthly report not filled</span>";};
            echo '<tr><td>'.$val['pac_code'].'</td><td>'.$val['title'].'</td><td>'.$remark.'</td><td><button type="submit" name="submit" value="'.$val['id'].'">Fill</button></td></tr>';
          }
        } else if($uid==3){
          $stm = $conn1->query("SELECT pac_code, title, id FROM project_registration WHERE constituent_unit = '$dept' and status in (1,2,3,6) ");
          $rows = $stm->fetchAll(PDO::FETCH_ASSOC);
          foreach ($rows as $val) {
            $stm2 = $conn1->query("SELECT chk1,chk2,chk3 FROM project_monthly_report WHERE project_id = '$val[id]' and month = $cur_month");
            $row2 = $stm2->fetch();
            $row2["chk2"]=$row2["chk2"]??null;
            $row2["chk1"]=$row2["chk1"]??null;
            if($row2["chk2"]=="Submit"){$remark= "<span style='color:green'>Monthly report submitted</span>";} 
                elseif($row2["chk1"]=="Submit"){$remark= "<span style='color:orange'>Pending at head</span>";} 
                  else{$remark= "<span style='color:red'>Monthly report not filled</span>";};
            echo '<tr><td>'.$val['pac_code'].'</td><td>'.$val['title'].'</td><td>'.$remark.'</td><td><button type="submit" name="submit" value="'.$val['id'].'">Fill</button></td></tr>';
          }
        } 
      ?>
    </table>
    <?php include_once("lib/csrfMain.php"); ?>
  </form>
</div>
<?php include_once("footer.php") ?>

</body>
</html>