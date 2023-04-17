<?php
include_once("db.php");
$conn1 = getconnection();

$phn=$_REQUEST['q'];

$stm = $conn1->prepare('SELECT contact from user WHERE contact = :phn');
$stm->bindParam(":phn",$phn,PDO::PARAM_INT);
$nrow = $stm->execute();
$row = $stm->fetch(PDO::FETCH_ASSOC);
if($stm->rowCount() > 0){
	echo " Contact already exists.";
}