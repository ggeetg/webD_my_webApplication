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
    table{
      width:600px;
      margin: 0 auto;
    }
    td{
      padding: 3px 0;
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

  <h4>Search Programmes:</h4><br>
  <form method="POST" action="search_main.php?EncHid=<?php echo $_SESSION['EncTok'] ?>">
  <table>
<!--     <tr>
      <td>PAC/PAB/Others</td>
      <td>
        <select name="prj_type" ><option value="0">-----All-----</option><option value="1">PAC</option><option value="2">PAB</option><option value="3">Others</option></select>
      </td>
    </tr> -->
    <tr>
      <td>Type</td>
      <td>
        <select name="type" ><option value="0">-----All-----</option>
          <?php 
                $stm = $conn1->query("SELECT * FROM program_type WHERE status='Active'");
                $rows = $stm->fetchAll(PDO::FETCH_ASSOC);
                foreach ($rows as $val) {
                  echo '<option value="'.$val['sno'].'">'.$val['type'].'</option>';
                }
              ?>
          </select>
      </td>
    </tr>
    <tr>
      <td>Level</td>
      <td>
        <select name="level" >
          <option value="0">-----All-----</option>
          <?php 
                $stm = $conn1->query("SELECT * FROM program_level WHERE status='Active'");
                $rows = $stm->fetchAll(PDO::FETCH_ASSOC);
                foreach ($rows as $val) {
                  echo '<option value="'.$val['sno'].'">'.$val['level'].'</option>';
                }
              ?>
        </select>
      </td>
    </tr>
    <tr>
      <td>Target Group</td>
      <td>
        <select name="target_group" >
          <option value="0">-----All-----</option>
          <?php 
                $stm = $conn1->query("SELECT * FROM program_target_group WHERE status='Active'");
                $rows = $stm->fetchAll(PDO::FETCH_ASSOC);
                foreach ($rows as $val) {
                  echo '<option value="'.$val['sno'].'">'.$val['target_group'].'</option>';
                }
              ?>
        </select>
      </td>
    </tr>
    <tr>
      <td>Stage</td>
      <td>
        <select name="stage" >
          <option value="0">-----All-----</option>
          <?php 
                $stm = $conn1->query("SELECT * FROM program_stage WHERE status='Active'");
                $rows = $stm->fetchAll(PDO::FETCH_ASSOC);
                foreach ($rows as $val) {
                  echo '<option value="'.$val['sno'].'">'.$val['stage'].'</option>';
                }
              ?>
        </select>
      </td>
    </tr>
    <tr>
      <td>State</td>
      <td>
        <select name="state" >
            <option value="0">-----All-----</option>
            <?php 
                  $stm = $conn1->query("SELECT * FROM india_state WHERE status='Active' order by  state ASC");
                  $rows = $stm->fetchAll(PDO::FETCH_ASSOC);
                  foreach ($rows as $val) {
                    echo '<option value="'.$val['state_id'].'">'.$val['state'].'</option>';
                  }
                ?>
          </select>
        </td>
    </tr>
    <tr>
      <td>Keywords</td>
      <td>
        <select class="form-control" name="focus_area[]" multiple>
              <?php 
                  $stm = $conn1->query("SELECT * FROM focus_area WHERE status='Active' order by name ASC ");
                  $rows = $stm->fetchAll(PDO::FETCH_ASSOC);
                  foreach ($rows as $val) {
                    echo '<option value="'.$val['id'].'">'.$val['name'].'</option>';
                  }
                ?>
            </select>
          </td>
    </tr>
  </table>
    <?php include_once("lib/csrfMain.php"); ?>
  <div class="text-center mt-1">
      <input type="submit" name="submit" class="btn btn-primary" value="Search">
    </div>
  </form>

</div>
<?php include_once("footer.php") ?>

</body>
</html>