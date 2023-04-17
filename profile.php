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
  // change email ajax
  $(document).ready(function(){
    $("#email").keyup(function(){
      var url ="change_email_ajax.php";
      var ne = $("#email").val();
      var oe = $("#my_email").val();
      if(ne!=oe){
        var data = {o:oe,n:ne};
        $.post(url,data,function(data, status){
          $("#emailinfo").html(data);
        });
      }
    });
  });

  //change phn ajax
  $(document).ready(function(){
    $("#phn").keyup(function(){
      var url ="change_phn_ajax.php";
      var nc = $("#phn").val();
      var oc = $("#my_phn").val();
      if(nc!=oc&&nc.length==10){
        var data = {o:oc,n:nc};
        $.post(url,data,function(data, status){
          $("#phninfo").html(data);
        });
      }
    });
  });
	</script>
<!--===============================================================================================-->
  <style>
    input{
      border: 1px solid gray;
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
  <h2>Edit user details</h2></br>
  <form action="profileaction.php?EncHid=<?php echo $_SESSION['EncTok'] ?>" method="post" onsubmit="return validate()">
    <input type="hidden" name="uid" id="uid">
    <table class="table">
      <tr>
        <td>Applicant Name:</td>
        <td>
          <div class="row">
            <div class="col">
            <select class="form-control" id="pfx" name="pfx" required><option value="">Select</option>
              <?php 
                  $stm = $conn1->query("SELECT * FROM name_prefix WHERE status='Active' order by prefix ASC");
                  $rows = $stm->fetchAll(PDO::FETCH_ASSOC);
                  foreach ($rows as $val) {
                    echo '<option value="'.$val['id'].'">'.$val['prefix'].'</option>';
                  }
              ?>
            </select>
          </div>
            <div class="col">
              <input type="text" class="form-control" placeholder="Enter First Name" id="fname" name="fname" autocomplete="off" onkeydown="return alphaOnly(event)" required>
            </div>
            <div class="col">
              <input type="text" class="form-control" placeholder="Enter Last Name" id="lname" name="lname" autocomplete="off" onkeydown="return alphaOnly(event)" required>
            </div>
          </div>
        </td>
      </tr>
      <tr>
        <td>Designation</td>
        <td>
          <div class="row">
            <div class="col">
              <select class="form-control mb-1" id="desig" name="desig" required><option value="">Select</option>
                <?php 
                    $stm = $conn1->query("SELECT * FROM designation WHERE status='Active' order by id ASC");
                    $rows = $stm->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($rows as $val) {
                      echo '<option value="'.$val['id'].'">'.$val['desig'].'</option>';
                    }
                ?>
              </select>
            </div>
            <div class="col">
              <input type="text" class="form-control mt-0" name="desig_txt" id="desig_txt" placeholder="Enter Designation" autocomplete="off" style="display: ;">
            </div>
          </div>
        </td>
      </tr>
      <tr>
        <td>Department</td>
        <td>
          <h6 id="dept" style="display: inline-block;"></h6>
        </td>
      </tr>
      <tr>
        <td>Contact No.</td>
        <td>
          <input type="tel" class="form-control" placeholder="Enter Mobile Number" id="phn" name="phn" autocomplete="off" minlength="10" maxlength="10" onkeyup="this.value=this.value.replace(/[^\d]/,'')" required>
          <input type="hidden" id="my_phn">
          <span id="phninfo"  class="red mt-0"></span>
        </td>
      </tr>
      <tr>
        <td>Username</td>
        <td>
          <input type="text" class="form-control mb-0" placeholder="Enter Username" id="uname" readonly autocomplete="off" minlength="4" style="cursor: not-allowed;">
        </td>
      </tr>
      <tr>
        <td>New Password</td>
        <td>
          <span id="chng_p"><a href="javascript:void(0);">Click here to change password</a></span>
          <input type="text" class="form-control b2" placeholder="Enter New Password" id="passcode" name="passcode" minlength="4" style="background: deeppink; color: #fff;" data-toggle="tooltip" title="Should be at least 6 digit long and contains at least one special character"  autocomplete="off" >
          <span id="err1"></span>
        </td>
      </tr>
      <tr>
        <td>Email Address</td>
        <td>
          <input type="email" class="form-control" placeholder="Enter email" id="email" name="email" autocomplete="off" required>
          <input type="hidden" id="my_email">
          <span id="emailinfo"  class="red mt-0"></span>
        </td>
      </tr>
    </table>
    <?php include_once("lib/csrfMain.php"); ?>
    <div class="text-center mt-4">
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
  </form>
</div>
<?php include_once("footer.php") ?>

</body>

<script type="text/javascript">
  <?php
    $u_name = $_SESSION['user_id'];
    $stm = $conn1->query("SELECT a.id, a.uname, a.upass, a.utype, a.name_prefix, a.first_name, a.last_name, a.designation, a.desig_other, a.contact, a.dept_code, a.head_dept, a.head_dept_code, a.email, a.menu_ref_id, b.dept_name FROM user as a join department as b on a.dept = b.id WHERE a.uname = '$u_name' ");
    $row = $stm->fetch();
  ?>
  document.getElementById("uid").value="<?php echo md5($row['id']) ?>";
  document.getElementById("pfx").value="<?php echo $row['name_prefix'] ?>";
  document.getElementById("fname").value="<?php echo $row['first_name'] ?>";
  document.getElementById("lname").value="<?php echo $row['last_name'] ?>";
  document.getElementById("desig").value="<?php echo $row['designation'] ?>";
  document.getElementById("desig_txt").value="<?php echo $row['desig_other'] ?>";
  document.getElementById("dept").innerHTML="<?php echo $row['dept_name'] ?>";
  document.getElementById("phn").value="<?php echo $row['contact'] ?>";
  document.getElementById("uname").value="<?php echo $row['uname'] ?>";
  // document.getElementById("passcode").value="<?php //echo $row[''] ?>";
  document.getElementById("email").value="<?php echo $row['email'] ?>";
  document.getElementById("my_email").value="<?php echo $row['email'] ?>";
  document.getElementById("my_phn").value="<?php echo $row['contact'] ?>";


  $("#desig").change(function(){
    if($("#desig").val()==4){
      $("#desig_txt").css("display","inline-block");
      $("#desig_txt").attr("required",true);
    }
    else{
      $("#desig_txt").css("display","none");
      $("#desig_txt").attr("required",false);
    }
  });
  $("#desig").trigger("change");

  function alphaOnly(event) {
    var key = event.keyCode;
    return ((key >= 65 && key <= 90) || key == 8);
  };

  $("#name").keypress(function(e){
    if(e.which === 32)
      return false;
  });

  $("#email").keypress(function(e){
    if(e.which === 32)
      return false;
  });

  $("input").prop("autocomplete",'off');

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

  $(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
  });

  function validate(){
    if($("#pfx").val()==""||$("#fname").val()==""||$("#lname").val()==""||$("#desig").val()==""||$("#phn").val()==""||$("#email").val()==""){
      alert("Please fill all fields.");
      return false;
    }
    if($("#phn").val().length!=10){
      alert("Contact number should be 10 digit long.");
      return false;
    }
    if($("#err1").html()!=""){
      alert("New password should be at least 6 digit long and should contain at least one special character.");
      return false;
    }
    if($("#emailinfo").html()!=""){
      alert("Email address already exist, please enter another one.");
      return false;
    }
    if($("#phninfo").html()!=""){
      alert("Contact number already exist, please enter another one.");
      return false;
    }
    return true;
  }

  $(document).ready(function(){
    $("#passcode").hide();
    $("#chng_p").click(function(){
      $("#passcode").show();
      $("#chng_p").hide();
    });
  });
  
</script>
</html>