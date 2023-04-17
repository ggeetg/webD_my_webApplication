<?php
include_once("db.php");
$conn1 = getconnection();

$code=$_REQUEST['q'];

$stm = $conn1->prepare('SELECT pac_code from project_registration WHERE pac_code = :code');
$stm->bindParam(":code",$code,PDO::PARAM_STR,500);
$nrow = $stm->execute();
$row = $stm->fetch(PDO::FETCH_ASSOC);
if($stm->rowCount() > 0){
	echo " PAC/PAB code already exist.";
}