<?php
include("db.php");
$conn1=getconnection();

$old_cont = $_REQUEST['o'];
$new_cont = $_REQUEST['n'];

if(strlen($new_cont)!=10){
	echo "Contact should be 10 digit long.";
	exit();
}

$stm = $conn1->query("SELECT contact FROM user WHERE contact = '$new_cont' AND contact NOT IN ('$old_cont')");
$row = $stm->fetchAll();
$count=$stm->rowCount();
if($count>0)
	echo "Contact number already exist.";

?>