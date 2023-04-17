<?php include_once('loginchk.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Archive</title>
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
<?php if(!isset($_REQUEST['fyear'])){
        $year=date('y');
        $month=date('m');
        if($month>4)
          $year=$year+1;
} else if($_REQUEST['fyear']=="")
          $year="21";
  else $year = $_REQUEST['fyear'];
?>
<div class="container p-r-25 p-l-25 p-t-45 p-b-45">
	<h3>Archive</h3>
  <form action="projectview.php?EncHid=<?php echo $_SESSION['EncTok'] ?>" method="post">
    <select id="fyear" name="fyear" style="float: right;"></select>
    <input type="hidden" name="view" value="true">
    <table class="table">
      <tr>
        <th>PAC</th>
        <th>Title</th>
        <th>Type</th>
        <th>Department</th>
        <th>View</th>
      </tr>
  <?php 
    $stm = $conn1->prepare("SELECT a.id, a.pac_code, a.title, b.type, c.dept_name FROM project_registration as a join program_status as b join department as c join financial_year as d on a.status = b.sno and a.constituent_unit = c.id and a.id = d.project_id WHERE a.status in (4,5) and fin_year_end = :a ");
    $stm->bindParam(":a",$year);
    $stm->execute();
    $rows = $stm->fetchAll(PDO::FETCH_ASSOC);
    foreach ($rows as $val) {
        echo '<tr><td>'.$val['pac_code'].'</td><td>'.$val['title'].'</td><td>'.$val['type'].'</td><td>'.$val['dept_name'].'</td><td><button type="submit" name="submit" value="'.$val['id'].'">View</button></td></tr>';
    }
  ?>
	</table>
  </form>
</div>
<?php include_once("footer.php") ?>

</body>

<script type="text/javascript">
  $(document).ready(function(){
      var mySelect = $('#fyear');
      var date = new Date();
      var startYear = 2020;
      var nextY = startYear.toString().substr(-2);
      var nextYear = parseInt(nextY) + 1;
      for (var i = 0; i < 30; i++) {
        mySelect.append(
          $('<option></option>').val(nextYear).html(startYear+'-'+nextYear)
        );
        startYear = startYear + 1;
        nextYear = nextYear + 1;
      }
  });
  $('#fyear').change(function(){
    location.href='archive.php?EncHid='+<?php echo $_SESSION['EncTok'] ?>+'&fyear='+$('#fyear').val();
  });
  $(document).ready(function(){
    document.getElementById("fyear").value='<?php echo $year ?>';
  });
</script>
</html>