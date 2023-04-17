<?php
include_once("db.php");
$conn1 = getconnection();

$code=$_REQUEST['q'];

$stm = $conn1->prepare('SELECT dept_pac_code from department WHERE dept_pac_code = :code');
$stm->bindParam(":code",$code,PDO::PARAM_INT);
$nrow = $stm->execute();
$row = $stm->fetch(PDO::FETCH_ASSOC);
if($stm->rowCount() > 0){
	echo " Department PAC code already exists.";
}