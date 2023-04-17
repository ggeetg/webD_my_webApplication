<?php
include_once("db.php");
$conn1 = getconnection();

$username=$_REQUEST['q'];

$stm = $conn1->prepare('SELECT id from user WHERE uname = :name');
$stm->bindParam(":name",$username,PDO::PARAM_STR,500);
$nrow = $stm->execute();
$row = $stm->fetch(PDO::FETCH_ASSOC);
if($stm->rowCount() > 0){
	echo " username not available.";
}