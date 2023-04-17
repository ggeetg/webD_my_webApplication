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
    //mobile ajax function
  $(document).ready(function(){
    $("#dept_pac").change(function(){
      var url ="chkdeptpacajax.php";
      var x = $("#dept_pac").val();
      var data = {q:x};
      if(true){
        $.post(url,data,function(data, status){
            $("#dpacinfo").html(data);
          });
      }
    });
  });

  function validate(){
    if($("#dpacinfo").html()!=""){
      alert("Please select another department pac code.");
      return false;
    }
    if($("#srt_name").val()==""||$("#dept_name").val()==""||$("#dept_pac").val()==""){
      alert("Please fill all fields.");
      return false;
    }
    return true;
  }
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
  
  <h3>Add Department</h3>
  <br>
  <form onsubmit="return validate()" method="post" action="adddeptaction.php?EncHid=<?php echo $_SESSION['EncTok'] ?>">
    <div class="form-group">
      <label>Department Name:</label><input type="text" name="dept_name" id="dept_name" class="form-control">
    </div>
    <div class="form-group row">
      <div class="col">
        <label>Acronym:</label><input type="text" name="srt_name" id="srt_name" class="form-control" maxlength="30">
      </div>
      <div class="col">
        <label>Department PAC code:</label><input type="number" id="dept_pac" name="dept_pac" class="form-control mb-0" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength = "2" >
      <span id="dpacinfo" class="red mt-0"></span>
      </div>
    </div>
    <?php include_once("lib/csrfMain.php"); ?>
    <div class="text-center mt-1" id="f_end">
        <input type="submit" id="s1" name="submit" class="btn btn-primary" value="Submit">
    </div>
  </form>
  <div class="mt-4">
    <h3>List of Departments/Division/Group/Cell:</h3><br>
    <table class="table">
      <tr><th>Department Name</th><th>Department short name</th><th>Department PAC code</th></tr>
    <?php 
          $stm = $conn1->query("SELECT * FROM department where status ='Active' and id not in (1) order by dept_pac_code");
          $rows = $stm->fetchAll(PDO::FETCH_ASSOC);
          foreach ($rows as $val) {
              echo '<tr><td>'.$val['dept_name'].'</td><td>'.$val['short_name'].'</td><td>'.str_pad($val['dept_pac_code'],2,"0",STR_PAD_LEFT).'</td></tr>';          
          }
    ?>
    </table>
  </div>
</div>
<?php include_once("footer.php") ?>

</body>
</html>