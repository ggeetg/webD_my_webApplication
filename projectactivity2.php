<?php
session_start();
if (true) {
    require_once __DIR__ . '/lib/SecurityService.php';
    $antiCSRF = new \Phppot\SecurityService\securityService();
    $csrfResponse = $antiCSRF->validate();
    if (! empty($csrfResponse)) {

    } else {
    echo "<script>location.href='projectactivity.php?EncHid=".$_SESSION['EncTok']."&msg=".urlencode("Someting went wrong, please try again later.")."';</script>";
    exit();
    }
}
?>
<!-- /////////////////////////////////////////////////////////////////////////////////////////////////// -->
<?php include_once('loginchk.php');
// echo $_POST['submit']; ?>
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
<?php if(isset($_GET['msg'])&&!empty($_GET['msg'])){ ?>
  <div class="alert alert-danger alert-dismissible" id="myAlert">
    <button type="button" class="close">&times;</button>
    <?php echo htmlentities($_GET['msg']); ?>
  </div>
<?php } ?>

  <?php 
  if(empty($_POST['submit']))
    exit();
    $pid = $_POST['submit'];
    $stm = $conn1->query("SELECT title FROM project_registration WHERE id = $pid ");
    $rows = $stm->fetch();
  ?>
  <h4 align="center">Activity Completion Report of <?php echo $rows['title']; ?></h4>
  <br>
  <form action="activitycompletionreport.php?EncHid=<?php echo $_SESSION['EncTok'] ?>" method="post" style="min-height:400px; padding-top: 65px">
    <table class="table">
      <tr><th>S.No.</th><th>Activity</th><th>Tentative Date of Completion</th><th>Remarks</th><th>ACR</th></tr>
      <?php
          $sno = 1;
          $month = date('m');
          $stm = $conn1->query("SELECT activity_name, sno, comp_date FROM project_activity WHERE project_id = $pid ");
          $rows = $stm->fetchAll(PDO::FETCH_ASSOC);
          if(count($rows) == 0)
            echo '<h2 align="center">No activity has been entered in this month.</h2><br><br>';
          foreach ($rows as $val) {
            $stm2 = $conn1->query("SELECT chk1 FROM acr WHERE mr_activity_id = '$val[sno]' ");
            $row2 = $stm2->fetch();
            $row2['chk1'] = $row2['chk1'] ?? null;
            if($row2["chk1"]=="Submit"){$remark= "<span style='color:green'>ACR submitted</span>";}
                elseif($row2["chk1"]=="Pending"){$remark= "<span style='color:orange'>Available to edit</span>";}
                  else{$remark= "<span style='color:red'>ACR not filled</span>";}
            echo '<tr><td>'.$sno++.'</td><td>'.$val['activity_name'].'</td><td>'.$val['comp_date'].'</td><td>'.$remark.'</td><td><button type="submit" name="submit" value="'.$val['sno'].'">Fill</button></td></tr>';
          }
      ?>
    </table>
    <?php include_once("lib/csrfMain.php"); ?>
  </form>
</div>
<?php include_once("footer.php") ?>

</body>
</html>