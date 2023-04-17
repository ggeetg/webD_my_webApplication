<?php
session_start();
if (true) {
    require_once __DIR__ . '/lib/SecurityService.php';
    $antiCSRF = new \Phppot\SecurityService\securityService();
    $csrfResponse = $antiCSRF->validate();
    if (! empty($csrfResponse)) {

    } else {
    echo "<script>location.href='search.php?EncHid=".$_SESSION['EncTok']."&msg=".urlencode("Someting went wrong, please try again later.")."';</script>";
    exit();
    }
}
?>
<!-- /////////////////////////////////////////////////////////////////////////////////////////////////// -->
<?php include_once('loginchk.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Search Programmes</title>
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
  <?php
function validate(){
  $flag=1;
  if(!is_numeric($_POST['type'])){
    $flag=0;
  }
  if(!is_numeric($_POST['level'])){
    $flag=0;
  }
  if(!is_numeric($_POST['target_group'])){
    $flag=0;
  }
  if(!is_numeric($_POST['stage'])){
    $flag=0;
  }
  if(!is_numeric($_POST['state'])){
    $flag=0;
  }
  $focus_a=!empty($_POST["focus_area"])?$_POST["focus_area"]:null;  //Array
  if($focus_a!=null){
    foreach($focus_a as $val){
      if(!is_numeric($val)){
        $flag=0;
      }
    }
  }

  if($flag==0){
    echo "<script>location.href='search.php?EncHid=".$_SESSION['EncTok']."&msg=".urlencode("Something went wrong, please try again.")."';</script>";
    exit();
  }
}
validate();

    // $program=$_POST['prj_type'];
    $type=filter_var($_POST['type'], FILTER_SANITIZE_STRING);
    $level=filter_var($_POST['level'], FILTER_SANITIZE_STRING);
    $target_group=filter_var($_POST['target_group'], FILTER_SANITIZE_STRING);
    $stage=filter_var($_POST['stage'], FILTER_SANITIZE_STRING);
    $state=filter_var($_POST['state'], FILTER_SANITIZE_STRING);

    $focus_a=!empty($_POST["focus_area"])?$_POST["focus_area"]:null;  //Array
    if($focus_a!=null){
      $focus_area=" focus_area LIKE '%".$_POST["focus_area"][0]."%' ";
      for($i=1;$i<count($_POST["focus_area"]);$i++){
        $focus_area.=" OR focus_area LIKE '%".$_POST["focus_area"][$i]."%'";
      }
    }

    $fin_year = date("y");
    if($fin_year<4)
		$fin_year=$fin_year;
	else if($fin_year>=4)
		$fin_year=$fin_year+1;

    $cond="WHERE ";
    if($type!=0)
      $cond.="type = $type and ";
    if($level!=0)
      $cond.="level= $level and ";
    if($target_group!=0)
      $cond.="target_group= $target_group and ";
    if($stage!=0)
      $cond.="stage= $stage and ";
    if($state!=0)
      $cond.="state= $state and ";
    if($focus_a!=null)
      $cond.=$focus_area." and "; // WHERE focus_area LIKE '%14%' OR focus_area LIKE '%19%'
    $cond.=" fin_year_end=$fin_year ";

    // echo "SELECT pac_code, title, project_registration.id FROM project_registration join financial_year on project_registration.id=financial_year.project_id $cond";
    $stm = $conn1->query("SELECT DISTINCT pac_code, title, project_registration.id FROM project_registration join financial_year on project_registration.id=financial_year.project_id $cond");
    $rows=$stm->fetchAll(PDO::FETCH_ASSOC);
  ?>
  <form method="POST" action="projectview.php?EncHid=<?php echo $_SESSION['EncTok'] ?>">
    <input type="hidden" name="view" value="true">
    <table class="table">
      <tr>
        <th>S.No.</th>
        <th>PAC Code</th>
        <th>Title</th>
      </tr>
      <?php 
      $v=0;
      foreach ($rows as $val) {
        echo "<tr>";
        echo "<td>".++$v."</td>";
        echo "<td><button type='submit' name='submit' value='".$val['id']."' style='color:blue'>".$val['pac_code']."</button></td>";
        echo "<td>".$val['title']."</td>";
        echo "</tr>";
      }
      ?>
    </table>
  </form>
</div>
<?php include_once("footer.php") ?>

</body>
</html>