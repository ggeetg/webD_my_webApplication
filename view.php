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
  <h4 align="center">List of ongoing programmes</h4>
  <br>
  <form action="projectview.php?EncHid=<?php echo $_SESSION['EncTok'] ?>" method="post" style="min-height:400px; padding-top: 65px">
    <table class="table">
      <tr><th>PAC Code</th><th>Title</th><th>Details</th></tr>
      <?php
        $stm = $conn1->query("SELECT id, utype, dept FROM user WHERE uname = '$_SESSION[user_id]' ");
        $rows = $stm->fetch();
        $uid = $rows["utype"];
        $us_id = $rows["id"];
        $dept = $rows["dept"];
        $cur_month = date('m');
        if($us_id==1||$uid==4)
            echo "<script>location.href='adminview.php?EncHid=".$_SESSION['EncTok']."';</script>";
        if($uid==2){
          $stm = $conn1->query("SELECT pac_code, title, id FROM project_registration WHERE proj_coord = '$us_id' and status in (1,2,3,6) ");
          $rows = $stm->fetchAll(PDO::FETCH_ASSOC);
          foreach ($rows as $val) {
            echo '<tr><td>'.$val['pac_code'].'</td><td>'.$val['title'].'</td><td><button type="submit" name="submit" value="'.$val['id'].'">View</button></td></tr>';
          }
        } else if($uid==1||$uid==3){
          $stm = $conn1->query("SELECT pac_code, title, id FROM project_registration WHERE constituent_unit = '$dept' and status in (1,2,3,6) ");
          $rows = $stm->fetchAll(PDO::FETCH_ASSOC);
          foreach ($rows as $val) {
            echo '<tr><td>'.$val['pac_code'].'</td><td>'.$val['title'].'</td><td><button type="submit" name="submit" value="'.$val['id'].'">View</button></td></tr>';
          }
        }
      ?>
    </table>
  </form>
</div>
<?php include_once("footer.php") ?>

</body>
</html>