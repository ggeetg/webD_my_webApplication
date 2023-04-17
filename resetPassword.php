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
    .b1,.b1:focus{
      border:1px solid gray !important;
    }
  </style>
</head>
<body>

<?php include_once('header.php'); ?>
<div class="container p-r-25 p-l-25 p-t-45 p-b-45">
  <?php if(isset($_GET['msg'])){ ?>
    <div class="alert alert-success alert-dismissible" id="myAlert">
      <button type="button" class="close">&times;</button>
      <?php echo htmlentities($_GET['msg']); ?>
    </div>
  <?php } ?>
  <h4>Please set the new password before continuing:</h4><br>
  <form method="post" action="resetpasswordaction.php?EncHid=<?php echo $_SESSION['EncTok'] ?>" onsubmit="return validate()">
    <label for="pass_old">Enter Old Password:</label><br>
    <input type="password" name="pass_old" id="pass_old" class="b1 m-b-5" autocomplete="off">
    <span id="err_1" style="display: block;"></span>
    <label for="pass_new_1">Enter New Password:</label><br>
    <input type="password" name="pass_new_1" id="pass_new_1" class="b1 b2 m-b-5" data-toggle="tooltip" title="Should be at least 6 digit long and contains at least one special character" autocomplete="off">
    <span id="err_2" style="display: block;"></span>
    <label for="pass_new_2">Confirm New Password:</label><br>
    <input type="password" name="pass_new_2" id="pass_new_2" class="b1 b2 m-b-5" autocomplete="off">
    <span id="err_3" style="display: block;"></span><br>
    <input type="submit" name="submit" class="btn btn-primary" value="Submit">
  </form>
</div>
<?php include_once("footer.php") ?>

</body>

<script type="text/javascript">
  $(".b2").change(function(){
    var x = this.id;
    if(document.getElementById(x).value.length<6){
      document.getElementById(x).nextElementSibling.style.color="red";
      document.getElementById(x).nextElementSibling.innerHTML+="password length should be at least 6<br>";
    } else {
      document.getElementById(x).nextElementSibling.innerHTML="";
    }

    var format = /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]+/;
    if(!format.test(document.getElementById(x).value)){
      document.getElementById(x).nextElementSibling.style.color="red";
      document.getElementById(x).nextElementSibling.innerHTML+="password should contain at least one special character<br>";
    } else {
      document.getElementById(x).nextElementSibling.innerHTML="";
    }
  });

  function validate(){
    var flag = 1;
    if(document.getElementById("pass_new_1").value.length<6||document.getElementById("pass_new_2").value.length<6)
      flag = 0;

    var format = /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]+/;
    if(!format.test(document.getElementById("pass_new_1").value)||!format.test(document.getElementById("pass_new_2").value))
      flag = 0;

    if(document.getElementById("pass_new_1").value != document.getElementById("pass_new_2").value){
      alert("New password does not match with confirm new password");
      flag = 0;
    }

    if(flag==1){
      return true;
    }
    
    return false;
  }

  $(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
  });
</script>

</html>