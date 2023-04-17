<?php
include("db.php");
$conn1=getconnection();

$old_email = $_REQUEST['o'];
$new_email = $_REQUEST['n'];

if($new_email==""){
	echo "Email address can't be blank.";
	exit();
}

if (filter_var($new_email, FILTER_VALIDATE_EMAIL)) {} else {
	echo "Invalid email address";
	exit();
}

$stm = $conn1->query("SELECT email FROM user WHERE email = '$new_email' AND email NOT IN ('$old_email')");
$row = $stm->fetchAll();
$count=$stm->rowCount();
if($count>0)
	echo "Email address already exist.";

?>