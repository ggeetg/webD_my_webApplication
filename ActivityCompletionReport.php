<?php
session_start();
if (true) {
    require_once __DIR__ . '/lib/SecurityService.php';
    $antiCSRF = new \Phppot\SecurityService\securityService();
    $csrfResponse = $antiCSRF->validate();
    if (! empty($csrfResponse)) {

    } else {
    echo "<script>location.href='dashboard.php?EncHid=".$_SESSION['EncTok']."&msg=".urlencode("Someting went wrong, please try again later.")."';</script>";
    exit();
    }
}
?>
<!-- /////////////////////////////////////////////////////////////////////////////////////////////////// -->
<?php include_once('loginchk.php');
// echo $_POST['submit']; 
function clean_look($str){
  $str = str_replace("'", "\'", $str);
  $str = str_replace('"', '\"', $str);
  $str = trim(preg_replace('/\s\s+/', "\\n", $str));
  return $str;
}
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
  <!-- for upload -->
  <!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.js"></script>  -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.js"></script> 
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/util.css">
  <link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="css/mymain.css">
  <script type="text/javascript" src="js/mymain.js"></script>
  <script type="text/javascript" src="js/jspdf.umd.min.js"></script>
    <script type="text/javascript" src="js/reportgen.js"></script>
<!--===============================================================================================-->
	<script>
	//history.go(1); // disable the browser's back button
	</script>
<!--===============================================================================================-->
  <style>
    .table td {
      padding: 0;
    }
    .g1 {
      background-color: #17a2b8;
      color: #fff;
    }
    .table .form-control {
      height: calc(1.5em + .75rem + 12px);
    }
    .a1{
      font-weight: 700;
    }
  </style>
</head>
<body>

<?php include_once('header.php'); ?>
<?php include_once('menubar.php'); ?>
<div class="container p-r-25 p-l-25 p-t-45 p-b-45" id="pdf">
  <h4 align="center">Programme Information Performa</h4>
  <h4 align="center">Activity Completion Report</h4>
  <br>
  <?php 
  if(empty($_POST['submit']))
    exit();
    $act_id = $_POST['submit'];
    $stm = $conn1->query("select a.activity_name, c.id, c.pac_code, c.title, d.type, e.dept_name from project_activity as a join project_registration as c join program_type as d join department as e on a.project_id = c.id and c.type = d.sno and c.constituent_unit = e.id where a.sno = $act_id; ");
    $rows = $stm->fetch();
  ?>
    <div class="form-group row">
      <div class="col">
        Name of the Institute/Department/Division/Cell: <span class="a1"><?php echo $rows['dept_name']; ?></span>
      </div>
    </div>
    <div class="form-group row">
      <div class="col">
        Major Programme of which the activity is part of: <span class="a1"><?php echo $rows['title']; ?></span>
      </div>
      <div class="col">
        PAC Code Number: <span class="a1"><?php echo $rows['pac_code']; ?></span>
      </div>
    </div>
    <div class="form-group row">
      <div class="col">
        Title of the Activity: <span class="a1"><?php echo $rows['activity_name']; ?></span>
      </div>
      <div class="col">
        Programme Category: <span class="a1"><?php echo $rows['type']; ?></span>
      </div>
    </div>
    

    <div class="card bg-info text-white form-group">
      <div class="card-body">Budget provision for the activity along with sanction number, date and amount sanctioned:</div>
    </div>
  <form id="mf_2" action="acraction.php?EncHid=<?php echo $_SESSION['EncTok'] ?>" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="act_id" value="<?php echo $act_id; ?>">
    <input type="hidden" name="pid" value="<?php echo $rows['id']; ?>">
    <div class="form-group row">
      <div class="col">
        Target Group:
        <input type="text" name="t_grp" id="t_grp" class="form-control">
      </div>
    </div>
    <div class="form-group row">
      <div class="col">
        Budget sanction Number: <input type="text" name="bsn" id="bsn"  class="form-control">
      </div>
      <div class="col">
        Budget sanction date: <input type="date" name="bsd" id="bsd" class="form-control">
      </div>
    </div>
    <div class="form-group row">
      <div class="col">
        Budget amount sanctioned: <input type="number" min="0" name="bas" id="bas" class="form-control">
      </div>
      <div class="col">
        Amount utilized: <input type="number" min="0" name="amnt_spent" id="amnt_spent" class="form-control" readonly>
      </div>
    </div>
    <div class="form-group row">
      <div class="col">
        Venue of the Activity: <textarea name="venue" id="venue" class="form-control resze"></textarea><!-- <input type="text" name="venue" id="venue" class="form-control"> -->
      </div>
      <div class="col">
        Duration of the activity: <input type="date" name="start_date" id="start_date" class="form-control">
        To <input type="date" name="end_date" id="end_date" class="form-control">
      </div>
    </div>
    <div class="form-group row">
      <div class="col">
        Whether the programme is exclusively for SC/ST/Women group:
        <select class="form-control" name="grp" id="grp"><option value="">Select</option>
        <?php
        $stm = $conn1->query("SELECT * FROM program_target_group WHERE status='Active' ");
        $rows = $stm->fetchAll(PDO::FETCH_ASSOC);
        foreach ($rows as $val) {
          echo '<option value="'.$val['sno'].'">'.$val['target_group'].'</option>';
        }
        ?>
        </select>
      </div>
    </div>
    <div class="form-group row">
      <div class="col">
        Objective of the Activity:
        <textarea class="form-control resze" name="obj" id="obj"></textarea>
      </div>
    </div>
    <div class="form-group row">
      <div class="col">
        Brief Report of the Activity:
        <textarea class="form-control resze" name="brief" id="brief"></textarea>
      </div>
    </div>
    <div class="form-group row">
      <div class="col">
        Difficulties experienced (if any):
        <textarea class="form-control resze" name="diff" id="diff"></textarea>
      </div>
    </div>
    <div class="form-group row">
      <div class="col">
        Outcome realized:
        <textarea class="form-control resze" name="outcome" id="outcome"></textarea>
      </div>
    </div>
    <div class="form-group row">
      <div class="col">
        Likely impact on the Qualitative improvement of School Education:
        <textarea class="form-control resze" name="impact" id="impact"></textarea>
      </div>
    </div>
    <div class="form-group row">
      <div class="col">
        Measures taken or proposed for impact on the qualitative improvement of:
        <textarea class="form-control resze" name="measures" id="measures"></textarea>
      </div>
    </div>
    <div class="form-group row">
      <div class="col">
        Follow-up action proposed for impact on the qualitative improvement of:
        <textarea class="form-control resze" name="followup" id="followup"></textarea>
      </div>
    </div>
    <div class="form-group row">
      <div class="col">
        Name, Designation and Department of the Faculty members involved in the Activity:
        <textarea class="form-control resze" name="faculty" id="faculty"></textarea>
      </div>
    </div>
    
  <br>
  <h4 class="m-b-10">Details of expenditure incurred on participants and Resource Persons:</h4>
  <table class="table table-bordered">
    <tr>
      <th>Participants</th>
      <th>Number</th>
      <th>Total TA/DA (Rs.)</th>
      <!-- <th>Total DA (Rs.)</th> -->
      <th>Total Honorarium (Rs.)</th>
      <!-- <th>Total Contingency (Rs.)</th> -->
      <!-- <th>Other Expenses (Rs.)</th> -->
      <th>Total Expenditure (Rs.)</th>
    </tr>
    <tr>
      <th colspan="7" class="g1">(A) Participants :<br>
      Category</th>
    </tr>
    <tr>
      <td><select class="form-control cat" name="cat[]"><option value="1">Local</option></select></td>
      <td><input type="number" min="0" name="num[]" class="form-control num" onchange="total_par()"></td>
      <td><input type="number" min="0" name="ta[]" class="form-control ta" onchange="calc_expen(0)"></td>
      <!-- <td><input type="number" name="da[]" class="form-control da"></td> -->
      <td><input type="number" min="0" name="hon[]" class="form-control hon" onchange="calc_expen(0)"></td>
      <!-- <td><input type="number" min="0" name="con[]" class="form-control con" onchange="calc_expen(0)"></td> -->
      <!-- <td><input type="number" min="0" name="o_exp[]" class="form-control o_exp" onchange="calc_expen(0)"></td> -->
      <td><input type="number" min="0" name="texp[]" class="form-control texp" readonly></td>
    </tr>
    <tr>
      <td><select class="form-control cat" name="cat[]"><option value="2">Non-Local</option></select></td>
      <td><input type="number" min="0" name="num[]" class="form-control num" onchange="total_par()"></td>
      <td><input type="number" min="0" name="ta[]" class="form-control ta" onchange="calc_expen(1)"></td>
      <!-- <td><input type="number" name="da[]" class="form-control da"></td> -->
      <td><input type="number" min="0" name="hon[]" class="form-control hon" onchange="calc_expen(1)"></td>
      <!-- <td><input type="number" min="0" name="con[]" class="form-control con" onchange="calc_expen(1)"></td> -->
      <!-- <td><input type="number" min="0" name="o_exp[]" class="form-control o_exp" onchange="calc_expen(1)"></td> -->
      <td><input type="number" min="0" name="texp[]" class="form-control texp" readonly></td>
    </tr>
    <tr>
      <td style="vertical-align: middle;">Total Participants </td>
      <td colspan="6"><input type="number" min="0" name="tp" id="tp" class="form-control" readonly></td>
    </tr>
    <tr>
      <th colspan="7" class="g1">(B) External Resource Persons :</th>
    </tr>
    <tr>
      <td>Total External Resource Persons </td>
      <td colspan="6"><input type="number" min="0" name="terp" id="terp" class="form-control"></td>
    </tr>    
    <tr>
      <th colspan="7" class="g1">(C) Internal Resource Persons :</th>
    </tr>
    <tr>
      <td>Total Internal Resource Persons </td>
      <td colspan="6"><input type="number" min="0" name="tirp" id="tirp" class="form-control"></td>
    </tr>
     <tr>
      <th colspan="7" class="g1">(D) Contingency  :</th>
    </tr>
    <tr>
      <td>Total Contingency </td>
      <td colspan="6"><input type="number" min="0" name="con" id="con" class="form-control con" onchange="amt_utilized()"></td>
    </tr>
    <tr>
      <th colspan="7" class="g1">(E) Other Expenses  :</th>
    </tr>
    <tr>
      <td>Total Other Expenses </td>
      <td colspan="6"><input type="number" min="0" name="o_exp" id="o_exp" class="form-control o_exp" onchange="amt_utilized()"></td>
    </tr>
  </table>
<br>
<!-- upload section -->
<div id="upload_sec">
<h4 class="m-b-10">Upload Images (optional) max size:2mb</h4>
    <p>
      Select images to upload:
      <!-- name of the input fields are going to
        be used in our php script-->
      <input type="file" class="file" id="file" name="files[]" onchange="return fileValidation()" multiple>
      <br><br>
    </p>
</div>
    <div id="preview">
      <?php 
      if(isset($_POST['submit'])){
        //for uploaded images
          $mraid = $_POST['submit'];
          $stm5 = $conn1->query("SELECT * FROM acr_image join acr on acr.id=acr_image.acr_id WHERE acr.mr_activity_id=$mraid ");
            $rows5 = $stm5->fetchAll(PDO::FETCH_ASSOC);
            foreach ($rows5 as $val) {
              echo '<a href='.str_replace(' ', '%20', $val['image']).' target="_blank">'.$val['name'].'</a><br>';
            }
      }
      ?>
    </div>
<!-- end -->

  <div class="text-center mt-1" id="f_end">
    <input type="submit" id="s1" name="submit" class="btn btn-primary m-r-5" value="Save">
    <input type="submit" id="s2" name="submit" class="btn btn-success" value="Submit">
  </div>
</form>


<button class="btn-sm btn-primary" id="prnt_btn" onclick="printDiv('pdf','Title')" style="display:none">Print report</button>
</div>
<?php include_once("footer.php") ?>

</body>

<!-- updation part of ACR seperated from upper portion -->
<?php 
    $mraid = $_POST['submit'];
    $stm4 = $conn1->query(" SELECT `id`, `mr_activity_id`, `project_id`, `target_group`, `bud_san_no`, `bud_san_date`, `bud_amnt`, `sc_st_group`, `objective`, `brief`, `difficulties`, `total_participants`, `total_external_resource`, `total_internal_resource`, `chk1`, `time`,amnt_spent,venue,start_date,end_date,outcome,impact,measures,followup,faculty,`contingency`,`othr_expense` FROM `acr` WHERE `mr_activity_id` = $mraid ");
    $row4 = $stm4->fetch();
    $row4['chk1'] = $row4['chk1'] ?? null;
if($row4['chk1']=='Submit'||$row4['chk1']=='Pending') {
      $acr_id = $row4["id"];
      $stm3 = $conn1->query("SELECT `id`, `acr_id`, `participants_category`, `number`, `ta`, `da`, `honorarium`, `total_expenditure` FROM `acr_expenditure` WHERE `acr_id` = $acr_id ");
      $row3 = $stm3->fetchAll(PDO::FETCH_ASSOC);
?>
<script type="text/javascript">
  $(document).ready(function(){
    var acr_id = document.createElement("INPUT");
    acr_id.setAttribute("type", "hidden");
    acr_id.setAttribute("name", "acrid");
    acr_id.setAttribute("value", "<?php echo clean_look($row4['id']); ?>");
    document.getElementById("t_grp").value='<?php echo clean_look($row4["target_group"]); ?>';
    document.getElementById("bsn").value='<?php echo clean_look($row4["bud_san_no"]); ?>';
    document.getElementById("bsd").value='<?php echo clean_look($row4["bud_san_date"]); ?>';
    document.getElementById("bas").value='<?php echo clean_look($row4["bud_amnt"]); ?>';
    document.getElementById("grp").value='<?php echo clean_look($row4["sc_st_group"]); ?>';
    document.getElementById("obj").innerHTML ="<?php echo clean_look($row4['objective']); ?>";
    document.getElementById("brief").value='<?php echo clean_look($row4["brief"]); ?>';
    document.getElementById("diff").value='<?php echo clean_look($row4["difficulties"]); ?>';
    document.getElementById("tp").value='<?php echo clean_look($row4["total_participants"]); ?>';
    document.getElementById("terp").value='<?php echo clean_look($row4["total_external_resource"]); ?>';
    document.getElementById("tirp").value='<?php echo clean_look($row4["total_internal_resource"]); ?>';
    document.getElementById("amnt_spent").value='<?php echo clean_look($row4["amnt_spent"]); ?>';
    document.getElementById("venue").value='<?php echo clean_look($row4["venue"]); ?>';
    document.getElementById("start_date").value='<?php echo clean_look($row4["start_date"]); ?>';
    document.getElementById("end_date").value='<?php echo clean_look($row4["end_date"]); ?>';
    document.getElementById("outcome").value='<?php echo clean_look($row4["outcome"]); ?>';
    document.getElementById("impact").value='<?php echo clean_look($row4["impact"]); ?>';
    document.getElementById("measures").value='<?php echo clean_look($row4["measures"]); ?>';
    document.getElementById("followup").value='<?php echo clean_look($row4["followup"]); ?>';
    document.getElementById("faculty").value='<?php echo clean_look($row4["faculty"]); ?>';
    document.getElementById("con").value='<?php echo $row4['contingency']; ?>';
    document.getElementById("o_exp").value='<?php echo $row4['othr_expense']; ?>';
    var acr_expend = document.createElement("INPUT");
    acr_expend.setAttribute("type", "hidden");
    acr_expend.setAttribute("name", "expen");
    var arr = [];
    <?php for($i=0;$i<count($row3);$i++){
      echo 'arr.push("'.$row3[$i]["id"].'");';
      echo 'document.getElementsByClassName("num")['.$i.'].value="'.$row3[$i]['number'].'";';
      echo 'document.getElementsByClassName("ta")['.$i.'].value="'.$row3[$i]['ta'].'";';
      // echo 'document.getElementsByClassName("da")['.$i.'].value="'.$row3[$i]['da'].'";';
      echo 'document.getElementsByClassName("hon")['.$i.'].value="'.$row3[$i]['honorarium'].'";';
      echo 'document.getElementsByClassName("texp")['.$i.'].value="'.$row3[$i]['total_expenditure'].'";';
    } ?>
    acr_expend.setAttribute("value", arr);
  

// make updatable
  if(<?php echo $row4['chk1']=='Pending'?'true':'false' ?>){
      document.getElementById("s1").style.display="none";
      document.getElementById("s2").style.display="none";
      document.getElementById("mf_2").appendChild(acr_id);
      document.getElementById("mf_2").appendChild(acr_expend);
      $("#f_end").append('<input type="submit" id="s3" name="submit" class="btn btn-primary m-r-5" value="Save">');
      $("#f_end").append('<input type="submit" id="s4" name="submit" class="btn btn-success" value="Submit">');
      $("#mf_2").attr("action","acraction2.php?EncHid=<?php echo $_SESSION['EncTok'] ?>");
  }
});
</script>
<?php } ?>

<script type="text/javascript">
  function calc_expen(id){
    var ta = document.getElementsByClassName("ta")[id].value;
    var hon = document.getElementsByClassName("hon")[id].value;
    var total = parseInt(ta)+parseInt(hon);
    document.getElementsByClassName("texp")[id].value=total;
    var texp = parseInt(document.getElementsByClassName("texp")[id].value);
    amt_utilized();
    console.log(total+" "+texp);
    if(texp!=total){
      //alert("Sum of TA/DA, Honorarium and Contingency is not equal to Total Expenditure. Please Check ");
      document.getElementsByClassName("texp")[id].value=null;
      //document.getElementsByClassName("texp")[id].focus();
      return;
    }
  }

  function amt_utilized(){
    var x = document.getElementsByClassName("texp");
    var y = document.getElementById("con").value;
    var z = document.getElementById("o_exp").value;
    var tot_amt=0;
    for(var i=0;i<x.length;i++)
      tot_amt+=parseInt(x[i].value);
    tot_amt = parseInt(tot_amt) + parseInt(y) + parseInt(z); 
    document.getElementById("amnt_spent").value=tot_amt;
  }
   

  function total_par(){
    var local= parseInt(document.getElementsByClassName("num")[0].value);
    var nonLocal= parseInt(document.getElementsByClassName("num")[1].value);
    var total = local+nonLocal;
    document.getElementById("tp").value=total;
    var t_par = parseInt(document.getElementById("tp").value);
    if(total!=t_par){
      //alert("Sum of total participants is not matching. Please Check");
      document.getElementById("tp").value = null;
      return;
    }
  }

// make readOnly
  if(<?php echo $row4['chk1']=='Submit'?'true':'false' ?>||<?php echo $_POST['acr_view']??"false" ?>){
      var x = document.getElementsByTagName("input");
      for(var i=0;i<x.length;i++)
        x[i].readOnly='true';
      var x = document.getElementsByTagName("textarea");
      for(var i=0;i<x.length;i++)
        x[i].readOnly='true';
      var x = document.getElementsByTagName("select");
      for(var i=0;i<x.length;i++)
        x[i].disabled='true';
      document.getElementById("upload_sec").style.display="none";
      document.getElementById("prnt_btn").style.display="initial";
      document.getElementById("s1").style.display="none";
      document.getElementById("s2").style.display="none";
      if(document.getElementById("s3"))document.getElementById("s3").style.display="none";
      if(document.getElementById("s4"))document.getElementById("s4").style.display="none";
  }

  // duraation validation
  $("#end_date").change(function(){
    if($("#start_date").val()==""){
      alert("Please select starting date first.");
      $("#end_date").val("");
    } else if($("#start_date").val() > $("#end_date").val()){
      alert("Ending date should be greater than or equal to starting date.");
      $("#end_date").val("");
    }
  });
  $("#start_date").change(function(){
    if($("#end_date").val()!=""){
      if($("#start_date").val() > $("#end_date").val()){
        alert("Ending date should be greater than or equal to starting date.");
        $("#end_date").val("");
      }
    }
  });


  //resize textarea dynamically
  $(document).ready(function(){
        function do_resize(textbox) {

     var maxrows=5; 
      var txt=textbox.value;
      var cols=textbox.cols;

     var arraytxt=txt.split('\n');
      var rows=arraytxt.length; 

     for (i=0;i<arraytxt.length;i++) 
      rows+=parseInt(arraytxt[i].length/cols);

     if (rows>maxrows) textbox.rows=maxrows;
      else textbox.rows=rows;
     }

     var e=document.getElementsByClassName("resze");
     console.log(e.length+"a");
     var aj=0;
     while(aj<e.length){
        do_resize(e[aj]);
        aj++;
     }
    });

  $(document).ready(function(){
   amt_utilized();
  });

//upload image validation
  function fileValidation() {
    // image type validation
    var fileInput = document.getElementsByClassName('file');
    for( var i=0;i<fileInput.length;i++){
      var filePath = fileInput[i].value;
      // Allowing file type
      var allowedExtensions = 
              /(\.jpg|\.jpeg|\.png|\.gif)$/i;
      if (!allowedExtensions.exec(filePath)) {
          alert('Invalid file type');
          fileInput[i].value = '';
          return false;
      } 
    }

    // image size validation
    const fi = document.getElementById('file');
        // Check if any file is selected.
        console.log(fi.files.item(0).size+"asd");
        if (fi.files.length > 0) {
            for (var i = 0; i <= fi.files.length - 1; i++) {
  
                var fsize = fi.files.item(i).size;
                var file = Math.round((fsize / 1024));
                // The size of the file.
                if (file > 2048) {
                    alert("File too Big, please select a file less than 2mb");
                    fi.value = '';
                    return false;
                } 
            }
        } 
  }
</script>

</html>