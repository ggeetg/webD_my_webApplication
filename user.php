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
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

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
<div class="container p-r-25 p-l-25 p-t-45 p-b-45">
	<?php if(isset($_GET['msg'])){ ?>
	  <div class="alert alert-success alert-dismissible" id="myAlert">
	    <button type="button" class="close">&times;</button>
	    <?php echo htmlentities($_GET['msg']); ?>
	  </div>
	<?php } ?>
	
  <form action="edituser.php?EncHid=<?php echo $_SESSION['EncTok'] ?>" method="post">
  <?php 
  	$columns = array('first_name','dept_name');
	$column = isset($_GET['column']) && in_array($_GET['column'], $columns) ? $_GET['column'] : $columns[0];
	$sort_order = isset($_GET['order']) && strtolower($_GET['order']) == 'desc' ? 'DESC' : 'ASC';
	$stm = $conn1->prepare('SELECT user.id, user.first_name, user.last_name, user.email, department.dept_name FROM user LEFT JOIN department on user.dept = department.id where user.dept not in (1) ORDER BY ' .  $column . ' ' . $sort_order);
  	if ($stm->execute()) {
	// Some variables we need for the table.
	$up_or_down = str_replace(array('ASC','DESC'), array('up','down'), $sort_order); 
	$asc_or_desc = $sort_order == 'ASC' ? 'desc' : 'asc';
	$add_class = ' class="highlight"';
  ?>
  <h2>List of all users</h2><br>
  <table class="table">
	<tr>
		<th>S.No.</th>
		<th>
			<a href="user.php?column=first_name&order=<?php echo $asc_or_desc; ?>&EncHid=<?php echo $_SESSION['EncTok'] ?>">Name <i class="fas fa-sort" <?php echo $column == 'first_name' ? '-' . $up_or_down : ''; ?>>
				</i>
			</a>
		</th>
		<th>
			<a href="user.php?column=dept_name&order=<?php echo $asc_or_desc; ?>&EncHid=<?php echo $_SESSION['EncTok'] ?>">Department <i class="fas fa-sort<?php echo $column == 'dept_name' ? '-' . $up_or_down : ''; ?>">
				</i>
			</a>
		</th>
		<th>Email</th>
		<th>Details</th>
	</tr>
	<?php 
		$rows = $stm->fetchAll(PDO::FETCH_ASSOC);
		$i=1;
		foreach($rows as $val){ 
	?>
	<tr>
		<td><?php echo $i++; ?></td>
		<td<?php echo $column == 'first_name' ? $add_class : ''; ?>><?php echo $val['first_name'].' '.$val['last_name']; ?></td>
		<td<?php echo $column == 'dept_name' ? $add_class : ''; ?>><?php echo $val['dept_name']; ?></td>
		<td><?php echo $val['email']; ?></td>
		<td><button type="submit" name="submit" value="<?php echo $val['id']; ?>">Edit</button></td>
	</tr>
	<?php } ?>
  </table>
  <?php } ?>
  </form>
</div>
<?php include_once("footer.php") ?>

</body>
</html>