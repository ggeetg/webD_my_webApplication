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
  //hide msg after 5sec
  $(document).ready(function(){
    $(".close").click(function(){
      $(".alert").alert("close");
    });
    // $("#myAlert").fadeOut(3000);
  });

  //username ajax function
  $(document).ready(function(){
    $("#name").keyup(function(){
      var url ="chkuserajax.php";
      var x = $("#name").val();
      var data = {q:x};
      if(x.length>=4){
        $.post(url,data,function(data, status){
            $("#uinfo").html(data);
          });
      }
    });
  });

  //mobile ajax function
  $(document).ready(function(){
    $("#phn").keyup(function(){
      var url ="chkphnajax.php";
      var x = $("#phn").val();
      var data = {q:x};
      if(x.length>=4){
        $.post(url,data,function(data, status){
            $("#phninfo").html(data);
          });
      }
    });
  });

  //email ajax function
  $(document).ready(function(){
    $("#email").keyup(function(){
      var url ="chkemailajax.php";
      var x = $("#email").val();
      var data = {q:x};
      if(x.length>=4){
        $.post(url,data,function(data, status){
            $("#emailinfo").html(data);
          });
      }
    });
  });



  function validate(){
    var array = $.map($('input[name="menu_ref[]"]:checked'), function(c){return c.value; });
    if(array==""){
      alert("Please select privileges");
      return false;
    }
    if($("#fname").val()==""||$("#lname").val()==""||$("#email").val()==""||$("#name").val()==""||$("#dept").val()==""||$("#role").val()==""){
      alert("Please fill all mandatory fields.");
      return false;
    }
    if($("#uinfo").html()!=""){
      alert("Please select another username.");
      return false;
    }
    if($("#phninfo").html()!=""){
      alert("Please enter another contact number.");
      return false;
    }
    if($("#emailinfo").html()!=""){
      alert("Please enter another email address.");
      return false;
    }
    if($("#phn").val().length!="10"){
      alert("Please enter correct Mobile number.");
      return false;
    }
    return true;
  }

  var dh = [23,31,32,43];
  var di = [23,31,32];
  var de = [23,31,32];
  var vi = [23,41,42];
  $(document).ready(function(){
    $("#role").change(function(){     //Department Head
      if($("#role").val()==1){
        $("#chkbx_role").find("input[type='checkbox']").prop("checked",false);
        for(var i=0;i<dh.length;i++){
          $("#"+dh[i]).prop("checked",true);
        }
      } else if($("#role").val()==2){        //Department Incharge
        $("#chkbx_role").find("input[type='checkbox']").prop("checked",false);
        for(var i=0;i<di.length;i++){
          $("#"+di[i]).prop("checked",true);
        }
      } else if($("#role").val()==3){        //Data Entry
        $("#chkbx_role").find("input[type='checkbox']").prop("checked",false);
        for(var i=0;i<de.length;i++){
          $("#"+de[i]).prop("checked",true);
        }
      } else if($("#role").val()==4){        //View
        $("#chkbx_role").find("input[type='checkbox']").prop("checked",false);
        for(var i=0;i<vi.length;i++){
          $("#"+vi[i]).prop("checked",true);
        }
      } else{
        $("#chkbx_role").find("input[type='checkbox']").prop("checked",false);
      }
    });
  });

  $(document).ready(function(){
    const equals = (array1, array2) => array1.length === array2.length && array1.every(function(value, index) { return value == array2[index]});
    $("#chkbx_role").find("input[type='checkbox']").click(function(){
      var array = $.map($('input[name="menu_ref[]"]:checked'), function(c){return c.value; });
        if(equals(dh,array))
          $("#role").val("1");
        else if(equals(di,array))
          $("#role").val("2");
        else if(equals(de,array))
          $("#role").val("3");
        else if(equals(vi,array))
          $("#role").val("4");
        else
          $("#role").val("5");
    });
  });
	</script>
<!--===============================================================================================-->
<style>
  .container {
    font-family: Arial, Helvetica, sans-serif;
  }
  /* Full-width input fields */
  .form-control {
    width: 100%;
    padding: 8px;
    margin: 5px 0 22px 0;
    display: inline-block;
    border: none;
    background-color: #f1f1f1;
  }
  input[type=text]:focus, input[type=password]:focus, input[type=email]:focus {
    background-color: #ddd;
    outline: none;
  }
  form{
    border-right: 1px solid #dee2e6;
    border-bottom: 1px solid #dee2e6;
    border-left: 1px solid #dee2e6;
    padding: 15px;
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
  <?php if(isset($_GET['err_msg'])){ ?>
    <div class="alert alert-danger alert-dismissible" id="myAlert2">
      <button type="button" class="close">&times;</button>
      <?php echo htmlentities($_GET['err_msg']); ?>
    </div>
  <?php } ?>

  <ul class="nav nav-tabs">
    <li class="nav-item">
      <a class="tab nav-link active" href="javascript:void(0)">Add User</a>
    </li>
  </ul>
  <!-- <h2>Add User</h2> -->
  <form action="adduseraction.php?EncHid=<?php echo $_SESSION['EncTok'] ?>" method="post" onsubmit="return validate()">
    <div class="row">
    <div class="form-group col-sm">
      <label for="pfx">Prefix:<span class="red"> *</span></label>
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
    <div class="form-group col-sm">
      <label for="fname">First Name:<span class="red"> *</span></label>
      <input type="text" class="form-control" placeholder="Enter First Name" id="fname" name="fname" autocomplete="off" onkeydown="return alphaOnly(event)" required>
    </div>
    <div class="form-group col-sm">
      <label for="lname">Last Name:<span class="red"> *</span></label>
      <input type="text" class="form-control" placeholder="Enter Last Name" id="lname" name="lname" autocomplete="off" onkeydown="return alphaOnly(event)" required>
    </div>
    </div>
    <div class="row">
    <div class="form-group col-sm">
      <label for="desig">Designation:<span class="red"> *</span></label>
      <select class="form-control mb-1" id="desig" name="desig" required><option value="">Select</option>
        <?php 
            $stm = $conn1->query("SELECT * FROM designation WHERE status='Active' order by id ASC");
            $rows = $stm->fetchAll(PDO::FETCH_ASSOC);
            foreach ($rows as $val) {
              echo '<option value="'.$val['id'].'">'.$val['desig'].'</option>';
            }
        ?>
      </select>
      <input type="text" class="form-control mt-0" name="desig_txt" id="desig_txt" placeholder="Enter Designation" autocomplete="off" style="display: none;">
    </div>
    <div class="form-group col-sm">
      <label for="dept">Department:<span class="red"> *</span></label>
      <select class="form-control" id="dept" name="dept" required><option value="">Select</option>
        <?php 
            $stm = $conn1->query("SELECT * FROM department WHERE status='Active' and id NOT IN (1) order by dept_name ASC");
            $rows = $stm->fetchAll(PDO::FETCH_ASSOC);
            foreach ($rows as $val) {
              echo '<option value="'.$val['id'].'">'.$val['dept_name'].'</option>';
            }
        ?>
      </select>
    </div>
    <div class="form-group col-sm">
      <label for="phn">Mobile:<span class="red"> *</span></label>
      <input type="tel" class="form-control mb-0" placeholder="Enter Mobile Number" id="phn" name="phn" autocomplete="off" maxlength="10" minlength="10" onkeyup="this.value=this.value.replace(/[^\d]/,'')" required>
      <span id="phninfo" class="red mt-0"></span>
    </div>
    </div>
    <div class="row">
    <div class="form-group col-sm">
      <label for="name">Username:<span class="red"> *</span></label>
      <input type="text" class="form-control mb-0" placeholder="Enter Username" id="name" name="name" required autocomplete="off" minlength="4" data-toggle="tooltip" title="Only alphanumeric and _ allowed."><br>
      <span id="uinfo" class="red mt-0"></span>
    </div>
<!--     <div class="form-group col-sm">
      <label for="passcode">Password:<span class="red"> *</span></label>
      <input type="password" class="form-control" placeholder="Enter Password" id="passcode" name="passcode" minlength="6" required>
    </div> -->
    <div class="form-group col-sm">
      <label for="email">Email Address:<span class="red"> *</span></label>
      <input type="email" class="form-control mb-0" placeholder="Enter email" id="email" name="email" autocomplete="off" required>
      <span id="emailinfo" class="red mt-0"></span>
    </div>
    </div>
    <div class="row">
    <div class="form-group col-sm">
      <label for="role">Role:<span class="red"> *</span></label>
      <select class="form-control" id="role" name="role" required><option value="">Select</option>
        <?php 
          $stm = $conn1->query("SELECT * FROM user_type WHERE status='Active'");
          $rows = $stm->fetchAll(PDO::FETCH_ASSOC);
          foreach ($rows as $val) {
            echo '<option value="'.$val['id'].'">'.$val['role'].'</option>';
          }
        ?>
      </select>
    </div>
    </div>


  <div style="position: relative;">
    <table id="chkbx_role">
      <tr>
        <td width="50%" valign="top"><h5>Select Privileges:</h5></td>
        <td width="50%">
          <?php
          $stm = $conn1->query("SELECT * FROM menu WHERE status = 'Active'");
          $rows = $stm->fetchAll(PDO::FETCH_ASSOC);
          foreach($rows as $row){
            echo '<div class="form-check">
              <label class="form-check-label" for="'.$row['menu_id'].'">
                <input type="checkbox" class="form-check-input" id="'.$row['menu_id'].'" name="menu_ref[]" value="'.$row['menu_id'].'" >'.$row['menu_name'].'
              </label>
           </div>';
          }
          ?>
        </td>
    </tr></table>
  <div style="position:absolute; height:100%; width:100%; top:0; cursor: not-allowed;"></div>
  </div>



    <?php include_once("lib/csrfMain.php"); ?>
    <div class="text-center mt-4">
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
  </form>
</div>
<?php include_once("footer.php") ?>

</body>
<script type="text/javascript">
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

$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();   
});
</script>

</html>
