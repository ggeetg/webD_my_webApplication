<?php
header("X-Frame-Options: DENY");
header("Content-Security-Policy: frame-ancestors 'none'", false);
?>
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
<div class="container p-r-25 p-l-25 p-t-45 p-b-45">
  <?php if(isset($_GET['msg'])){ ?>
    <div class="alert alert-danger alert-dismissible" id="myAlert">
      <button type="button" class="close">&times;</button>
      <?php echo htmlentities($_GET['msg']); ?>
    </div>
  <?php } ?>
  <h3>Forget Password:</h3>
  <br>
  <form id="e_reset" action="forgetPassword.php" method="POST">
    <div class="form-group">
      <label for="u_email">Enter your email address:</label>
      <div class="row">
        <div class="col"><input class="form-control" type="email" name="u_email" id="u_email"></div>
        <div class="col"><button type="submit" name="submit" id="rst" class="btn btn-primary" value="123">Submit</button></div>
      </div>
    </div>
    
  </form>
</div>
<?php include_once("footer.php") ?>

</body>
<script type="text/javascript">
  $(document).ready(function() {
    $("#e_reset").submit(function() {
      // do the extra stuff here
      <?php 
        $r = rand(10,100);
        $er = md5($r); 
      ?>
      var r = <?php echo $r; ?>;
      var er = '<?php echo $er; ?>';
      $("#rst").val(r);
      $('#e_reset').attr('action', 'forgetPasswordAction.php?EncId='+er);

    });
  });
</script>
</html>