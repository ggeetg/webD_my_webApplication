<?php
include_once("db.php");
$con=getconnection();
session_start();

$uname = $_SESSION['user_id'];
$b_token = $_SESSION['token'];

$stm=$con->prepare(" SELECT token from user where uname = :a ");
$stm->bindParam(":a",$uname);
$stm->execute();

$row=$stm->fetch();
$db_token=$row['token']??null;

if($b_token!=$db_token){
	session_destroy();
	echo "<script>alert('Session expired, please login again.');</script>";
	header("Refresh:0; url=login.php");
	exit();
}

?>