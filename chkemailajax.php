<?php
include_once("db.php");
$conn1 = getconnection();

$mail=$_REQUEST['q'];

$stm = $conn1->prepare('SELECT email from user WHERE email = :mail');
$stm->bindParam(":mail",$mail,PDO::PARAM_STR,500);
$nrow = $stm->execute();
$row = $stm->fetch(PDO::FETCH_ASSOC);
if($stm->rowCount() > 0){
	echo " email already exists.";
}