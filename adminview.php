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
  //fetch running programmes list
    $(document).ready(function(){
        $(".card-link").click(function(){
          var url ="shwprjajax.php";
          var x = $(this).html();
          var par = $(this).parent().parent().find(".card-body");
          var data = {q:x};
            $.post(url,data,function(data, status){
                par.html(data);
          });
        });
      });
	</script>
<!--===============================================================================================-->
  <style>
  </style>
</head>
<body>

<?php include_once('header.php'); ?>
<?php include_once('menubar.php'); ?>
<div class="container p-r-25 p-l-25 p-t-45 p-b-45">
  <h2>View Programmes</h2><br>
  <form action="projectview.php?EncHid=<?php echo $_SESSION['EncTok'] ?>" method="post">
    <input type="hidden" name="view" value="true">
  <?php 
    $stm=$conn1->query("SELECT id, dept_name FROM department WHERE `status` = 'Active' and id not in (1) ");
    $rows = $stm->fetchAll(PDO::FETCH_ASSOC);
    foreach ($rows as $val) {
        echo '<div id="accordion"><div class="card"><div class="card-header"><a class="collapsed card-link" data-toggle="collapse" href="#collapse'.$val['id'].'">'.$val['dept_name'].'</a></div><div id="collapse'.$val['id'].'" class="collapse" data-parent="#accordion"><div class="card-body"></div></div></div></div>';
    }
  ?>
  </form>
</div>
<?php include_once("footer.php") ?>

</body>
</html>