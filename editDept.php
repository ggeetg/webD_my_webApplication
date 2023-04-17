<?php include_once('loginchk.php'); ?>
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
  <?php if(isset($_GET['msg'])){ ?>
    <div class="alert alert-success alert-dismissible" id="myAlert">
      <button type="button" class="close">&times;</button>
      <?php echo htmlentities($_GET['msg']); ?>
    </div>
  <?php } ?>
  
  <h3>Edit Department</h3><br>
  <form action="editDept.php?EncHid=<?php echo $_SESSION['EncTok'] ?>" method="post">
  <label>Select Department: </label>
  <select name="dept_id" id="dept_list">
    <option value="">Select</option>
    <?php 
          $stm = $conn1->query("SELECT * FROM department where id not in (1) ");
          $rows = $stm->fetchAll(PDO::FETCH_ASSOC);
          foreach ($rows as $val) {
              echo '<option value="'.$val['id'].'">'.$val['dept_name'].'</option>';          
          }
    ?>
  </select>
  &nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="submit" value="Go">
  </form><br><br>

  <?php 
    if(!empty($_POST['dept_id'])){
      $id=htmlspecialchars($_POST['dept_id']);
      echo '<script>$("#dept_list").val('.$id.')</script>';
      $stm = $conn1->prepare("SELECT * FROM department where id = :b");
      $stm->bindParam(":b", $id, PDO::PARAM_INT);
      $stm->execute();
      $row = $stm->fetch(PDO::FETCH_ASSOC); 
  ?>
  <form action="editdeptaction.php?EncHid=<?php echo $_SESSION['EncTok'] ?>" method="post">
    <div class="form-group">
      <input type="hidden" name="dept_id" value="<?php echo $id ?>">
      <label>Department Name:</label><input type="text" name="dept_name" class="form-control" value="<?php echo $row['dept_name'] ?>">
    </div>
    <div class="form-group row">
      <div class="col">
        <label>Short Name:</label><input type="text" name="srt_name" class="form-control" value="<?php echo $row['short_name'] ?>">
      </div>
      <div class="col">
        <label>Department PAC code:</label><input type="number" name="dept_pac" class="form-control" value="<?php echo str_pad($row['dept_pac_code'],2,"0",STR_PAD_LEFT) ?>">
      </div>
      <div class="col">
        <label>Activate/Deactivate:</label><select name="dept_status" class="form-control"><option value="Active" <?php echo ($row['status']=='Active')?  'selected':'' ?> >Active</option><option value="Deactive" <?php echo ($row['status']=='Deactive')?  'selected':'' ?> >Deactive</option></select>
      </div>
    </div>
    <?php include_once("lib/csrfMain.php"); ?>
    <div class="text-center mt-1" id="f_end">
        <input type="submit" id="s1" name="submit" class="btn btn-primary" value="Submit">
    </div>
  </form>
  <?php } ?>

</div>
<?php include_once("footer.php") ?>

</body>
</html>