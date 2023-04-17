<?php include_once('loginchk.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Announcements</title>
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
.container{
  position: relative123;
}

#add_post{
  position: fixed;
  bottom: 30px;
  right: 30px;
  transition: width 2s, height 2s, transform 2s;
}

#add_post:hover{
  transform: rotate(225deg);
}

#sv{
  display: none;
  width: 100%; 
  height: 100%; 
  position: fixed; 
  padding-top: 100px; 
  left: 0; 
  right: 0; 
  top: 0; 
  background: 
  rgba(0,0,0,0.4); 
  z-index: 9999;
}

#av{
  width: 80%; 
  background: #18d0a5; /*#64a4b3;*/ 
  margin: auto; 
  padding: 50px; 
  color: #fff;
  border-radius: 20px;
}

.fname{
  border-radius: 50%;
  background: #9c27b0;
  color: #fff;
  display: inline-block;
  font-size: 26px;
  width: 40px;
  height: 40px;
  text-align: center;
}

.details{
  display: inline-block;
  line-height: 1.2;
  vertical-align: top;
  margin-left: 8px;
}

.main_comment{
  padding-bottom: 10px;
  border-bottom: 1px solid #dedfe0;
}

.all_com{
  padding-top: 20px;
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

  <div id="posts">
    <h4 class="m-b-20" style="font-weight: 700;">Recent Announcements:</h4>
    <div id="post-1">
      <?php 
        $stm=$conn1->query("SELECT a.id, a.comment, date(a.time) as time, b.first_name, b.last_name, c.role, d.short_name FROM `announcement` as a JOIN user as b JOIN user_type as c JOIN department as d ON a.user_id = b.id and b.dept = d.id and b.utype = c.id WHERE a.status='Active' order by a.time desc ");
        $rows=$stm->fetchAll(PDO::FETCH_ASSOC);
        foreach($rows as $val){
          echo '<div class="all_com"><div class="fname">'.strtoupper($val['first_name'][0]).'</div><div class="details"><strong>'.$val['first_name'].' '.$val['last_name'].'</strong><br>'.$val['role'].', '.$val['short_name'].', '.$val['time'].'</div>';
          echo '<div class="main_comment mt-2"><pre>'.$val['comment'].'</pre></div></div>';
        }
      ?>
    </div>
  </div>

  <div><img id="add_post" src="./images/add_button.png" width="60" height="60" data-toggle="tooltip" title="Add New Post"></div>

<div id="sv">
  <div id="av">
    <form id="myForm" action="announceaction.php?EncHid=<?php echo $_SESSION['EncTok'] ?>" method="post" onsubmit="return validate()">
      <h3 style="float: left; padding-bottom: 23px;">Enter Your Post:</h3>
      <textarea class="form-control" id="mypost" name="mypost" style="height: 200px;" required></textarea>
      <span class="mt-0 text-left">Maximum 1000 characters allowed.</span>
    <?php include_once("lib/csrfMain.php"); ?>
      <div class="text-right mt-3">
        <input type="submit" name="submit" class="btn btn-primary" value="Post">
      </div>
    </form>
  </div>
</div>

</div>
<?php include_once("footer.php") ?>

</body>

<script type="text/javascript">
  $(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
  });

  //hide if click outside
  window.onclick = function(event) {
      if (event.target == sv) {
      sv.style.display = "none";
      }
  }

  $("#add_post").click(function(){
    $("#sv").css("display","initial");
  });

  function validate(){
    if($("#mypost").val()==""){
      alert("Post cannot be empty.")
      return false;
    }
    return true;
  }

</script>
</html>