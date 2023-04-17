<?php
include_once('db.php');
$conn1=getconnection();

$status="Active";
//this is php function for creating menu
$stm = $conn1->prepare('select user.id, first_name, last_name, f_p_reset, head_dept, dept, menu_ref_id, role from user JOIN user_type on utype = user_type.id where uname = :username and user.status = :sts');
$stm->bindParam(":username",$_SESSION['user_id'],PDO::PARAM_STR,500);
$stm->bindParam(":sts",$status,PDO::PARAM_STR,500);
$stm->execute();
$row = $stm->fetch(PDO::FETCH_ASSOC);

//check for force password reset
if($row['f_p_reset']==1){
	header('location:resetPassword.php?EncHid='.$_SESSION['EncTok']);
}

$u_name = $row['first_name'].' '.$row['last_name'];
$dept_code = $row['dept'];
$h_dept_code = $row['head_dept'];
$menu_items = $row['menu_ref_id'];
$role = $row['role'];

$stm = $conn1->prepare('select dept_name, short_name from department where id = :did and status = :sts');
$stm->bindParam(":did", $dept_code, PDO::PARAM_INT);

$stm->bindParam(":sts",$status,PDO::PARAM_STR,500);
$stm->execute();
$row = $stm->fetch(PDO::FETCH_ASSOC);
$dept = $row['short_name'];

$stm = $conn1->prepare('select dept_name from department where id = :did and status = :sts');
$stm->bindParam(":did", $h_dept_code, PDO::PARAM_INT);
$stm->bindParam(":sts",$status,PDO::PARAM_STR,500);
$stm->execute();
$row = $stm->fetch(PDO::FETCH_ASSOC);
$h_dept = $row['dept_name'];

global $conn1;
global $menu_items;
$stm = $conn1->prepare("SELECT * FROM menu WHERE menu_id in ($menu_items) and status = :sts");
$stm->bindParam(":sts",$status,PDO::PARAM_STR,500);
$stm->execute();
$rows = $stm->fetchAll(PDO::FETCH_ASSOC);
 	echo '<div class="container sticky-top" style="border-bottom:1px solid #ddd; padding: 0;">
 	<nav class="navbar navbar-expand-sm bg-light sticky-top nav-pills">
		<ul class="navbar-nav">
			<li class="nav-item">
				<a class="nav-link" href="dashboard.php?EncHid='.$_SESSION['EncTok'].'">Home</a>
			</li>
			<li class="dropdown">
				<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" style="display:none" id="initi">Initialization</a>
			<div class="dropdown-menu">';
			foreach($rows as $row)
	        {
	          if(10<$row['menu_id']&&$row['menu_id']<20){
	          	echo '<script>document.getElementById("initi").style.display="inline-block";</script>';
	          	echo '<a class="dropdown-item" href="'.$row['menu_link'].'?EncHid='.$_SESSION['EncTok'].'">'.$row['menu_name'].'</a>';
	          }
	      	}
			echo '</div>
			</li>
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" style="display:none" id="prog">Program</a>
			<div class="dropdown-menu">';
			foreach($rows as $row)
	        {
	          if(20<$row['menu_id']&&$row['menu_id']<30){
	          	echo '<script>document.getElementById("prog").style.display="inline-block";</script>';
	          	echo '<a class="dropdown-item" href="'.$row['menu_link'].'?EncHid='.$_SESSION['EncTok'].'">'.$row['menu_name'].'</a>';
	          }
	      	}
			echo '</div>
			</li>
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" style="display:none" id="repo">Report</a>
			<div class="dropdown-menu">';
			foreach($rows as $row)
	        {
	          if(30<$row['menu_id']&&$row['menu_id']<40){
	          	echo '<script>document.getElementById("repo").style.display="inline-block";</script>';
	          	echo '<a class="dropdown-item" href="'.$row['menu_link'].'?EncHid='.$_SESSION['EncTok'].'">'.$row['menu_name'].'</a>';
	          }
	      	}
			echo '</div>
			</li>
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" style="display:none" id="summ">Summary</a>
			<div class="dropdown-menu">';
			foreach($rows as $row)
	        {
	          if(40<$row['menu_id']&&$row['menu_id']<50){
	          	echo '<script>document.getElementById("summ").style.display="inline-block";</script>';
	          	echo '<a class="dropdown-item" href="'.$row['menu_link'].'?EncHid='.$_SESSION['EncTok'].'">'.$row['menu_name'].'</a>';
	          }
	      	}
			echo '</div>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="announcement.php?EncHid='.$_SESSION['EncTok'].'">Announcements</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="contactus.php?EncHid='.$_SESSION['EncTok'].'">Contact Us</a>
			</li>
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">Profile</a>
				<div class="dropdown-menu">
				<a class="dropdown-item" href="profile.php?EncHid='.$_SESSION['EncTok'].'">Edit Profile</a>
				</div>
			</li>
		</ul>
		<ul class="navbar-nav ml-auto mr-1">
			<li class="nav-item">
				<a class="nav-link" href="logoff.php?EncHid='.$_SESSION['EncTok'].'">Logout</a>
			</li>
		</ul>
		
		<a class="navbar-brand123 dropdown" href="javascript:void(0)" id="profile-icon" >
			<i class="fa fa-user-circle" style="font-size: 36px; font-weight: 700;"></i>
		</a>
	</nav>
	</div>';

?>

<div class="container p-l-0 p-t-3" style="justify-content: center; float: none; color: #000;">
	<h6>Welcome <?php echo $u_name ?>, <?php echo $dept ?>, <?php echo $h_dept ?><span style="float: right;"><?php echo $role ?></span></h6>
</div>

<noscript>
    <style type="text/css">
        .container {display:none;}
    </style>
    <div class="alert alert-danger text-center noscriptmsg">
    	<strong>Info! You don't have javascript enabled. Please Enable javascript.</strong>
  	</div>
</noscript>


