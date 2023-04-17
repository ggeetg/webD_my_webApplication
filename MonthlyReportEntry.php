<?php
session_start();
if (true) {
    require_once __DIR__ . '/lib/SecurityService.php';
    $antiCSRF = new \Phppot\SecurityService\securityService();
    $csrfResponse = $antiCSRF->validate();
    if (! empty($csrfResponse)) {

    } else {
    echo "<script>location.href='monthlyReport.php?EncHid=".$_SESSION['EncTok']."&msg=".urlencode("Someting went wrong, please try again later.")."';</script>";
    exit();
    }
}
?>
<!-- /////////////////////////////////////////////////////////////////////////////////////////////////// -->
<?php include_once('loginchk.php');
function clean_look($str){
  $str = str_replace("'", "&apos;", $str);
  $str = str_replace('"', '&quot;', $str);
  $str = trim(preg_replace('/\s\s+/', "\\n", $str));
  return $str;
}
function clean_look2($str){
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
  <link href="css/bootstrap-directional-buttons.css" rel="stylesheet">
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
  $(document).ready(function(){
      $("#acti_name").keydown(function(e){
      if (e.keyCode == 13 && !e.shiftKey)
      {
        // prevent default behavior
        e.preventDefault();
        //alert("ok");
        return false;
      }
    });
  });

  //activity list ajax
    $(document).ready(function(){
      var j=1;
      $('#add_activity').click(function(){  
         j++;  
         $('#act_table').append('<tr id="row2'+j+'" ><td class="editable"><input type="hidden" class="new_entry" name="new_entry[]" value="true"><input type="hidden" class="mr_activity_id" name="mr_activity_id[]" id="mr_activity_id'+j+'"><textarea class="form-control acti_name" name="acti_name[]" id="acti_name" ></textarea></td><td class="editable"><input type="text" class="form-control apprv_authority" name="apprv_authority[]" id="apprv_authority" ></td><td class="editable"><input type="number" class="form-control duration" name="duration[]" style="width: 70px;" ></td><td class="editable">From:&nbsp;&nbsp;<input type="date" class="d a_date" name="a_date[]"  >To:&nbsp;&nbsp;<input type="date" class="d b_date" name="b_date[]" style="margin-top: 5px;" ></td><td class="editable"><input type="text" class="form-control venue" name="venue[]" ></td><td class="editable"><input type="number" class="form-control number_level_part m-b-3" name="number_level_part[]" placeholder="Number"><input type="text" class="form-control num_level_part" name="num_level_part[]" placeholder="Level"></td><td class="editable"><textarea class="form-control a_remarks" name="a_remarks[]" id="a_remarks"></textarea></td><td><button type="button" name="remove" id="'+j+'" class="btn_remove2">X</button></td></tr>');
      });
      $(document).on('click', '.btn_remove2', function(){  
         var button_id = $(this).attr("id");   
         var act_id = document.getElementById('mr_activity_id'+button_id).value;
         if(removeact(act_id))
           $('#row2'+button_id+'').remove();
        }); 
    });

    function chngstatus(xyz,id){
          var url ="chkacrajax2.php";
          var x = id;
          var data = {q:x};
          $.post(url,data,function(data, status){
            if(data=="Pending"||data==""){
              alert("Please fill ACR first.");
              $(xyz).val("2");
            }
          });
    }

	</script>
<!--===============================================================================================-->
  <style>
    .editable{
      background-color: ;
    }
    .card-body{
      padding: 1rem;
    }
    .bl{
      color: #000;
    }
    .na{
      cursor: not-allowed;
    }
    /* Chrome, Safari, Edge, Opera REMOVE SCROLL ARROW  FROM INPUT */ 
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
      -webkit-appearance: none;
      margin: 0;
    }
    /* Firefox REMOVE SCROLL ARROW  FROM INPUT */
    input[type=number] {
      -moz-appearance:textfield;
    }
    .d{
      width: 158px;
      height: 24px; 
      border: 1px solid lightgray;
    }
    #act_table .form-control{
    	height: auto;
    	padding: 0;
    }
  </style>
</head>
<body>

<?php include_once('header.php'); ?>
<?php include_once('menubar.php'); ?>
<!-- check for finencial ending status change -->
<?php
  $thisMonth= date('m');
  $thisYear= date('Y');
  if($thisMonth>=4&&$thisMonth<=12){
    $startingYear = $thisYear-1;
    $endingYear = $thisYear;
  $stm = $conn1->query("SELECT a.pac_code FROM project_registration as a join department as b join yes_no as c join financial_year as d on a.constituent_unit = b.id and a.report_submit = c.sno and a.id=d.project_id where d.fin_year_end = substr($endingYear,-2) and a.status in (1,2,3,6) and d.chk1='Pending' ");
  $rows = $stm->fetch();
  if(!$rows);
  else{
    echo "<br><h1 align='center'>Please wait for updation.</h1>";
    exit();
    }
  }
?>
<!-- ----------------------------------------- -->
<?php 
  if(!isset($_POST["submit"]))
    exit();
  $prj_id = htmlentities($_POST["submit"],ENT_QUOTES);
 ?>
<?php 
  $pid=$_POST["submit"];
  $stm01 = $conn1->query("SELECT title, pac_code, first_name, last_name, program_type.type as type, department.dept_name as dept_name, fin_year_start, fin_year_end, project_registration.id as prid FROM project_registration INNER JOIN user INNER JOIN program_type INNER JOIN department INNER JOIN financial_year ON project_registration.proj_coord = user.id AND project_registration.type = program_type.sno AND project_registration.constituent_unit = department.id and project_registration.id = financial_year.project_id WHERE project_registration.id = $pid and financial_year.chk1='Pending' ");
  $rows01 = $stm01->fetch();
?>
<div class="container p-r-25 p-l-25 p-t-30 p-b-45" id="pdf">

  <!-- <br>
  <br> -->
  <h4 align="center">Monthly Report of the Major Activities and Achievements of the<br> constituent unit <?php echo $rows01['dept_name'] ?></h4>
  <br>
<!--   <div id="breadcrumb" style="padding-bottom: 10px;">
		<button type="button" class="btn btn-primary btn-arrow-right" style="padding: .239rem 1.5rem;">Monthly Report</button>
		<form action="projectactivity2.php?EncHid=<?php echo $_SESSION['EncTok'] ?>" method="post" style="display: inline-block;">
			<button type="submit" class="btn btn-info btn-arrow-right" name="submit" style="padding: .239rem 1.5rem; background-color: #28a745" value="<?php echo $rows01['prid']; ?>">ACR</button>
		</form>
		<form action="milestone.php?EncHid=<?php echo $_SESSION['EncTok'] ?>" method="post" style="display: inline-block;">
			<button type="submit" class="btn btn-info btn-arrow-right" name="submit" style="padding: .239rem 1.5rem; background-color: #28a745" value="<?php echo $rows01['prid']; ?>">Key Performance</button>
		</form>
	</div> -->
  <div class="alert alert-danger alert-dismissible" id="myAlert">
    <button type="button" class="close">&times;</button>
    <span id="err_msg"></span>
  </div>
  <div class="card bg-info text-white">
    <div class="card-body">Program Details</div>
  </div>
  <br>
  <table class="table">
    <tr>
      <td colspan="2">Title: <span class="bl"><?php echo $rows01['title'] ?></span></td>
    </tr>
    <tr>
      <td>PAC code: <span class="bl"><?php echo $rows01['pac_code'] ?></span></td>
      <td>Year: <span class="bl"><?php echo $rows01['fin_year_start'].' - '.$rows01['fin_year_end'] ?></span></td>
    </tr>
    <tr>
      <td>Type: <span class="bl"><?php echo $rows01['type'] ?></span></td>
      <td>Program Coordinator: <span class="bl"><?php echo $rows01['first_name'].' '.$rows01['last_name'] ?></span></td>
    </tr>
  </table>
  <form id="mf_1" action="#" method="post" >
    <input type="hidden" name="fin_year_end" value="<?php echo $rows01['fin_year_end'] ?>">
    <label>Key Performance:</label>
    <table class="table table-bordered" id="kpr">
        <tr>
          <td width="60%">Performance Indicators</td>
          <td width="20%">Expected Completion Month</td>
          <td width="20%">Status</td>
        </tr>
        <?php
          $stm = $conn1->query("SELECT * FROM `p_indicators` WHERE pid = $pid ");
              $rows = $stm->fetchAll(PDO::FETCH_ASSOC);
              foreach ($rows as $value) {
        ?>
        <tr id="kpr1">
          <td><input type="hidden" name="indi_sno[]" value="<?php echo $value['sno'] ?>"><textarea class="form-control resze na" rows="1" readonly><?php echo $value['per_indi'] ?></textarea></td>
          <td style="vertical-align:middle;">
            <?php $stm = $conn1->query("SELECT * FROM months");
                $rows = $stm->fetchAll(PDO::FETCH_ASSOC);
                echo '<select class="form-control" id="comp_month" readonly>';
                $c_month = date('m'); 
                foreach ($rows as $val) {
                  if($val['sno'] == $value['exp_month'])
                    echo '<option value="'.$val['sno'].'" selected>'.$val['name'].'</option> ';
                // else
                //     echo '<option value="'.$val['sno'].'" >'.$val['name'].'</option> ';
                }
                echo '</select>';
              ?></td>
          <td style="vertical-align:middle;">
            <?php $stm = $conn1->query("SELECT * FROM p_status");
                $rows = $stm->fetchAll(PDO::FETCH_ASSOC);
                echo '<select class="form-control" name="complete[]" id="complete">';
                $c_month = date('m'); 
                foreach ($rows as $val) {
                  if($value['completed']==1||$value['completed']==2){
                    if($val['sno'] == $value['completed'])
                      echo '<option value="'.$val['sno'].'" selected>'.$val['name'].'</option> ';
                    else
                      echo '<option value="'.$val['sno'].'" disabled>'.$val['name'].'</option> ';
                  } else if($val['sno'] == $value['completed']){
                    echo '<option value="'.$val['sno'].'" selected>'.$val['name'].'</option> ';
                  }
                  else{
                    echo '<option value="'.$val['sno'].'" >'.$val['name'].'</option> ';
                  }
                }
                echo '</select>';
              ?></td>
        </tr>
        <?php } ?>
      </table>
  <br>
  <label>Activities Proposed:</label><br>
    <table class="table table-bordered" id="activity_table">
      <tr>
        <td>S.No.:</td>
        <td>Name of the Activity:</td>
        <td>Tentative Date of Completion:</td>
        <td>Completed/Not Completed:</td>
        <td>Obstacles if any:</td>
        <td>ACR</td>
      </tr>
      <?php 
          $stm = $conn1->query("SELECT * FROM project_activity WHERE project_id = $pid ");
          $rows = $stm->fetchAll(PDO::FETCH_ASSOC);
          $i=1;
          foreach ($rows as $val) {
            echo '<tr><td>'.$i++.'</td><td><input class="form-control na" type="text" value="'.clean_look($val['activity_name']).'" readonly><input type="hidden" name="activity_id1[]" value="'.$val['sno'].'"></td><td><input class="form-control na comp_date" type="date" value="'.$val['comp_date'].'" readonly></td><td><select class="form-control comp_status1" name="comp_status1[]" onchange="chngstatus(this,'.$val['sno'].')" ><option value="1"';
            echo ($val['status_completed']==1)? "selected": " ";
            echo '>Completed</option><option value="2"';
            echo ($val['status_completed']==2)? "selected": "disabled ";
            echo '>Not Completed</option></select></td><td><input class="form-control" type="text" name="obst1[]" value="'.clean_look($val['obstacles']).'"></td>
             <td><button class="view_mr" type="submit" name="submit" value="'.$val["sno"].'">View</button></td></tr></tr>';
          }
      ?>
    </table>
  <br>
  <label>Project Staff Details:</label>
    <table class="table table-bordered" id="project_table">
      <tr>
        <td>Post:</td>
        <td>Sanctioned numbers:</td>
        <td>Duration:</td>
        <td>Total Allocated:</td>
        <td>Total utilized in this month:</td>
      </tr>
      <?php 
        $stm = $conn1->query("SELECT * FROM project_senc_post WHERE project_id = $pid ");
        $rows = $stm->fetchAll(PDO::FETCH_ASSOC);
        $i=1;
        foreach ($rows as $val) {
          echo "<tr><td>";
            $stm002 = $conn1->query("SELECT * FROM program_post WHERE status='Active' order by post ASC");
            $rows002 = $stm002->fetchAll(PDO::FETCH_ASSOC);
            foreach ($rows002 as $val002) {
              if($val002['sno']==$val['post'])
                echo '<input type="text" class="form-control na" value="'.$val002['post'].'" readonly>';
              // else
              //   echo '<option value="'.$val002['sno'].'">'.$val002['post'].'</option>';
            }
            echo '<input type="hidden" name="post_id[]" value="'.$val['sno'].'"></td>';
            echo '<td><input type="number" class="form-control na" value="'.$val['senc_post_num'].'" readonly></td><td><input type="number" class="form-control na" value="'.$val['duration'].'" readonly></td><td><input type="number" class="form-control na" value="'.$val['expenditure'].'" readonly></td><td><input class="form-control expn_used" type="number" name="expn_used[]" onchange="pr_st_bu_cal()" ></td>';
          }
      ?>
    </table>
  <br>
  <div class="form-group">
      <label>Budget Utilized for project staff in this month (in INR):</label>
      <input type="number" class="form-control" id="c_month_budget" name="c_month_budget" style="width: ; display: inline-block;" readonly >
  </div>
  <label>Progress till date:</label><textarea class="form-control editable resze" name="obs_txt" id="obs_txt" ></textarea>
  <br>
  <div class="card bg-info text-white">
    <div class="card-body">Monthly Report of the Major Activities and Achievements</div>
    <input type="hidden" name="project_sno" value="<?php echo $prj_id ?>">
  </div>
  <br>
  <div class="row form-group">
    <div class="col">
      <label>Month:</label>
      <?php $stm = $conn1->query("SELECT * FROM months");
          $rows = $stm->fetchAll(PDO::FETCH_ASSOC);
          echo '<select class="form-control" name="curr_month" id="curr_month"><option value="">Select</option>';
          $c_month = date('m'); 
          echo $c_month;
          foreach ($rows as $val) {
            if($c_month==$val['sno'])
              echo '<option value="'.$val['sno'].'" selected>'.$val['name'].'</option> ';
            else
              echo '<option value="'.$val['sno'].'" disabled>'.$val['name'].'</option> ';          
          }
          echo '</select>';
      ?>
    </div>
    <div class="col">
      
      
    </div>
  </div>
  <table id="act_table" class="table-bordered">
    <tr style="vertical-align: baseline;">
      <td>Title of the Activity Performed during the Period</td>
      <td>Name of the Approving Authority (PAC/ PAB/ ERIC/ Any Other)</td>
      <td style="width: 100px;">Duration<br> (in days)</td>
      <td>Date</td>
      <td>Venue</td>
      <td>Number & level of Participants</td>
      <td>Remarks, if any</td>
      <td></td>
    </tr>
    <tr>
      <td class="editable"><input type="hidden" class="new_entry" name="new_entry[]" value="true"><input type="hidden" class="mr_activity_id" name="mr_activity_id[]"><textarea class="form-control acti_name" name="acti_name[]" id="acti_name" ></textarea></td>
      <td><input type="text" class="form-control apprv_authority" name="apprv_authority[]" id="apprv_authority" ></td>
      <td class="editable"><input type="number" class="form-control duration" name="duration[]" style="width: 70px;" ></td>
      <td class="editable">From:&nbsp;&nbsp;<input type="date" class="d a_date" name="a_date[]"  >To:&nbsp;&nbsp;<input type="date" class="d b_date" name="b_date[]" style="margin-top: 5px;" ></td>
      <td class="editable"><textarea class="form-control venue" name="venue[]"></textarea><!-- <input type="text" class="form-control venue" name="venue[]" > --></td>
      <td class="editable"><input type="number" class="form-control number_level_part m-b-3" name="number_level_part[]" placeholder="Number"><input type="text" class="form-control num_level_part" name="num_level_part[]" placeholder="Level"></td>
      <td class="editable"><textarea class="form-control a_remarks" name="a_remarks[]" id="a_remarks"></textarea></td>
      <td><button id="add_activity" type="button" class="btn-sm btn-primary">Add more activity</button></td>
    </tr>
  </table>
  
  <br>
    <?php include_once("lib/csrfMain.php"); ?>
  <div class="text-center mt-1" id="f_end">
      <input type="submit" id="s1" name="submit" class="btn btn-primary" value="Save">
      <input type="submit" id="s2" name="submit" class="btn btn-success" value="Submit">
  </div>
  </form>
  
  <button class="btn-sm btn-primary" id="prnt_btn" onclick="printDiv('pdf','Title')" style="display:none">Print report</button>

</div>
<?php include_once("footer.php") ?>

</body>

<!-- updation part of monthly report seperated from upper portion -->
<?php 
    $month = date('m');
    $curr_fy = date('y');
    if($month>3)
      $curr_fy+=1;
    $stm4 = $conn1->query(" SELECT b.sno, b.month, b.budget_utilized, b.progress_till_date, b.chk1, c.name FROM  project_monthly_report as b join months as c on b.month = c.sno WHERE b.project_id = $pid and b.month = $month and b.fin_year_end = $curr_fy ");
    $row4 = $stm4->fetch();
    $row4['chk1']=$row4['chk1']??null;
    if(isset($_POST["submit"])&&($row4['chk1']=='Submit'||$row4['chk1']=='Pending')) {
      $pid = $_POST["submit"];
      $stm3 = $conn1->query("SELECT a.senc_post_num, a.duration, a.expenditure, a.expenditure_used, b.post FROM project_senc_post as a join program_post as b on a.post = b.sno WHERE a.project_id = $pid ");
      $row3 = $stm3->fetchAll(PDO::FETCH_ASSOC);
?>
<script type="text/javascript">
  
  $(document).ready(function(){
    <?php for($i=0;$i<count($row3);$i++){
      echo 'document.getElementsByClassName("expn_used")['.$i.'].value='.$row3[$i]['expenditure_used'].';';
    } ?>
    document.getElementById("obs_txt").value='<?php echo clean_look2($row4["progress_till_date"]); ?>';
    document.getElementById("curr_month").value='<?php echo $row4["month"]; ?>';
// create element for monthly report id
    var m_r_id = document.createElement("INPUT");
    m_r_id.setAttribute("type", "hidden");
    m_r_id.setAttribute("name", "mrid");
    m_r_id.setAttribute("value", "<?php echo $row4['sno']; ?>");
// create element for monthly report activities id
    var m_r_a_id = document.createElement("INPUT");
    m_r_a_id.setAttribute("type", "hidden");
    m_r_a_id.setAttribute("name", "mraid");
    var arr = [];
/////////////    
    <?php
      $stm5 = $conn1->query(" SELECT a.id, a.mr_id, a.activity_title, a.duration, a.date, a.till_date, a.venue, a.num_lvl_participants, a.number_lvl_participants, a.remarks, a.approving_authority FROM project_mr_activity as a WHERE a.mr_id = $row4[sno] ");
      $row5 = $stm5->fetchAll(PDO::FETCH_ASSOC);
      for($i=0;$i<count($row5);$i++){
        echo 'arr.push("'.$row5[$i]["id"].'");';
        if($i>0)
          echo 'document.getElementById("add_activity").click();';
        echo 'document.getElementsByClassName("new_entry")['.$i.'].value="false";';
        echo 'document.getElementsByClassName("mr_activity_id")['.$i.'].value="'.$row5[$i]['id'].'";';
        echo 'document.getElementsByClassName("acti_name")['.$i.'].value="'.clean_look2($row5[$i]['activity_title']).'";';
        echo 'document.getElementsByClassName("apprv_authority")['.$i.'].value="'.clean_look2($row5[$i]['approving_authority']).'";';
        echo 'document.getElementsByClassName("duration")['.$i.'].value="'.$row5[$i]['duration'].'";';
        echo 'document.getElementsByClassName("a_date")['.$i.'].value="'.$row5[$i]['date'].'";';
        echo 'document.getElementsByClassName("b_date")['.$i.'].value="'.$row5[$i]['till_date'].'";';
        echo 'document.getElementsByClassName("venue")['.$i.'].value="'.clean_look2($row5[$i]['venue']).'";';
        echo 'document.getElementsByClassName("number_level_part")['.$i.'].value="'.$row5[$i]['number_lvl_participants'].'";';
        echo 'document.getElementsByClassName("num_level_part")['.$i.'].value="'.clean_look2($row5[$i]['num_lvl_participants']).'";';
        echo 'document.getElementsByClassName("a_remarks")['.$i.'].value="'.clean_look2($row5[$i]['remarks']).'";';
      }
    ?>
    document.getElementById("c_month_budget").value='<?php echo $row4["budget_utilized"]; ?>';
    m_r_a_id.setAttribute("value", arr);
// make readOnly
      if(<?php echo ($row4['chk1']=='Submit')?'true':'false' ?>){
          var x = document.getElementsByTagName("input");
          for(var i=0;i<x.length;i++)
            x[i].readOnly='true';
          var x = document.getElementsByTagName("textarea");
          for(var i=0;i<x.length;i++)
            x[i].readOnly='true';
          var x = document.getElementsByTagName("select");
          for(var i=0;i<x.length;i++)
            x[i].disabled='true';
          console.log("dddd");
          document.getElementById("prnt_btn").style.display="initial";
          document.getElementById("add_activity").style.display="none";
          document.getElementById("s1").style.display="none";
          document.getElementById("s2").style.display="none";
          $('.btn_remove2').css("display","none");
      }
// Make updatable
      if(<?php echo $row4['chk1']=='Pending'?'true':'false' ?>){
          document.getElementById("s1").style.display="none";
          document.getElementById("s2").style.display="none";
          document.getElementById("mf_1").appendChild(m_r_id);
          document.getElementById("mf_1").appendChild(m_r_a_id);
          $("#f_end").append('<input type="submit" id="s4" name="submit" class="btn btn-primary m-r-5" value="Save">');
          $("#f_end").append('<input type="submit" id="s3" name="submit" class="btn btn-success" value="Submit">');
          $("#mf_1").attr("action","monthlyentryaction2.php?EncHid=<?php echo $_SESSION['EncTok'] ?>");
      }
  });
</script>
<?php } ?>

<script type="text/javascript">
  $(document).ready(function(){
  $(".view_mr").click(function(){
    $('#mf_1').attr('action', "activitycompletionreport.php?EncHid=<?php echo $_SESSION['EncTok'] ?>");
  });
  $("#s1").click(function(){
    $('#mf_1').attr('action', "monthlyentryaction.php?EncHid=<?php echo $_SESSION['EncTok'] ?>");
  });
  $("#s2").click(function(){
    $('#mf_1').attr('action', "monthlyentryaction.php?EncHid=<?php echo $_SESSION['EncTok'] ?>");
  });
});

$(document).on('focusout', '.duration', function(){  
  var dur = $(this).parent().parent().find(".duration").val();
  var date1 = $(this).parent().parent().find(".a_date").val();
  var date2 = $(this).parent().parent().find(".b_date").val();

  if(dur!=""&&date1!=""&&date2!=""){
    var one_day=1000*60*60*24;
    var parts=date1.split('-');
    var mydate= new Date(parts[0], parts[1]-1, parts[2]);
    var parts1=date2.split('-');
    var mydate1= new Date(parts1[0], parts1[1]-1, parts1[2]);
    var date1_ms=mydate.getTime();
    var date2_ms=mydate1.getTime();
    var date_diff=date2_ms-date1_ms;
    var date_diff1=Math.round(date_diff/one_day);
    date_diff1=date_diff1+1;
    console.log(date_diff1);
    if(date_diff1<1){
      alert("Ending date is not less than starting date.");
      $(this).parent().parent().find(".b_date").val("");
    }
    if(date_diff1<dur){
      alert("Duration and date difference are not matched.");
      $(this).parent().parent().find(".b_date").val("");
    }
  }
});

$(document).on('focusout', '.a_date', function(){  
  $(this).parent().parent().find(".duration").trigger("focusout");
}); 

$(document).on('focusout', '.b_date', function(){  
  $(this).parent().parent().find(".duration").trigger("focusout");
}); 

$(document).ready(function(){
  $("#myAlert").css("display","none");
  var x = document.getElementsByClassName("comp_date");
  var y = document.getElementsByClassName("comp_status1");
  var d = new Date();
  for(var i=0;i<x.length;i++){
    var d2 = new Date(x[i].value);
    if(d2<d&&y[i].value!=1){
      $("#myAlert").css("display","block");
      $("#err_msg").html("Some proposed activities are pending.");
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


  // calculate total budget utilized for project staff
  function pr_st_bu_cal(){
    var a= document.getElementsByClassName("expn_used");
    var tot=0
    for(var i=0; i<a.length;i++){
      tot += parseInt(a[i].value);
    }
    document.getElementById("c_month_budget").value=tot;
  }
</script>
</html>