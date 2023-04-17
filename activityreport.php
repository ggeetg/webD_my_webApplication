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
<?php 
  $curr_month = date('m');
  if(!isset($_POST["pr_id"]))
    exit();
  $pr_id=$_POST["pr_id"];
  $stm = $conn1->query("SELECT pac_code, title, activity_title FROM `project_registration` AS a JOIN `project_monthly_report` AS b JOIN `project_mr_activity` AS c on a.id = b.project_id and b.sno = c.mr_id WHERE b.month = $curr_month and a.id = $pr_id");
  $rows = $stm->fetch();

?>
<div class="container p-r-25 p-l-25 p-t-45 p-b-45">
  <h4 align="center">Programme Information Performa</h4>
  <h4 align="center">Activity Completion Report</h4>
  <br>
  <h6>PAC Code: <?php echo $rows["pac_code"] ?></h6>
  <br>
  <h6>Project Title: <?php echo $rows["project_id"] ?></h6>
  <form action="#.php?EncHid=<?php echo $_SESSION['EncTok'] ?>" method="post" style="min-height:400px; padding-top: 25px">
    <table class="table">
      <tr><th>Activites</th><th>Remarks</th><th>ACR</th></tr>
      <tr></tr>
    </table>
  </form>
</div>
<?php include_once("footer.php") ?>

</body>
</html>