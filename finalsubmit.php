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
<?php if(isset($_GET['msg'])&&!empty($_GET['msg'])){ ?>
  <div class="alert alert-danger alert-dismissible" id="myAlert">
    <button type="button" class="close">&times;</button>
    <?php echo htmlentities($_GET['msg']); ?>
  </div>
<?php } ?>

  <h4 align="center">List of Projects</h4>
  <form id="form1" action="finalsubmitaction.php?EncHid=<?php echo $_SESSION['EncTok'] ?>" method="post" style="min-height:400px; padding-top: 65px">
    <table class="table">
      <tr><th><input type="checkbox" onClick="toggle1(this)"> Select All</th><th>PAC Code</th><th>Title</th><th>Programme Coordinator</th><th>Remarks</th><th>View</th><th>Enable Editing</th></tr>
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
        if($uid==1){
          $stm = $conn1->query("SELECT project_registration.pac_code, project_registration.title, project_registration.id, project_registration.proj_coord, user.first_name, user.last_name, name_prefix.prefix FROM project_registration JOIN user JOIN name_prefix on project_registration.proj_coord = user.id and user.name_prefix = name_prefix.id WHERE constituent_unit = '$dept' and project_registration.status in (1,2,3,6) ");
          $rows = $stm->fetchAll(PDO::FETCH_ASSOC);
          foreach ($rows as $val) {
            $stm2 = $conn1->query("SELECT sno,chk1,chk2,chk3 FROM project_monthly_report WHERE project_id = '$val[id]' and month = $cur_month and fin_year_end = $curr_fy ");
            $row2 = $stm2->fetch();
            $row2["chk1"]=$row2["chk1"]??null;
            $row2["chk2"]=$row2["chk2"]??null;
            $row2["sno"]=$row2["sno"]??null;
            if($row2["chk1"]=="Submit"&&$row2["chk2"]=="Submit"){$remark= "<span style='color:green'>Monthly report submitted to Portal</span>";$enb="";} 
                elseif($row2["chk1"]=="Submit"&&$row2["chk2"]=="Pending"){$remark= "<span style='color:orange'>Ready to submit</span>"; $enb="Enable";} 
                  else{$remark= "<span style='color:red'>Monthly report not filled</span>";$enb="";};
            echo '<tr><td><input type="checkbox" name="final_mrid[]" class="final_mrid" value="'.$row2['sno'].'"></td><td>'.$val['pac_code'].'</td><td>'.$val['title'].'</td><td>'.$val['prefix'].' '.$val['first_name'].' '.$val['last_name'].'</td><td>'.$remark.'</td><td><button class="edit_mr" type="submit" name="submit" value="'.$val['id'].'">View</button></td><td><button class="enable_edit" type="submit" name="submit" value="'.$val['id'].'">'.$enb.'</button></td></tr>';
          }
        } 
      ?>
    </table>
    <div class="text-center mt-1" id="f_end">
      <input type="submit" id="s1" name="submit" class="btn btn-primary" onclick="return finalcall()" value="Final Submit">
  </div>
    <?php include_once("lib/csrfMain.php"); ?>
  </form>
</div>
<?php include_once("footer.php") ?>

</body>
<script type="text/javascript">
  $(document).ready(function(){
    $(".edit_mr").click(function(){
      $('#form1').attr('action', "MonthlyReportEntry.php?EncHid=<?php echo $_SESSION['EncTok'] ?>");
    });
    $(".enable_edit").click(function(){
      $('#form1').attr('action', "allowedit.php?EncHid=<?php echo $_SESSION['EncTok'] ?>");
    });
  });
  function toggle1(source) {
      checkboxes = document.getElementsByClassName('final_mrid');
      for(var i=0, n=checkboxes.length;i<n;i++) {
        checkboxes[i].checked = source.checked;
      }
    }
  function finalcall(){
    return confirm("Once you submit, you are not able to change it. Please confirm");
  }
</script>
</html>