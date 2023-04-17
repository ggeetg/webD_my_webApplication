<?php
include_once("db.php");
$conn1 = getconnection();

if(isset($_REQUEST['q'])){
	$id=$_REQUEST['q'];
	$stm = $conn1->prepare('DELETE FROM `project_mr_activity` WHERE id = :id');
	$stm->bindParam(":id",$id,PDO::PARAM_INT);
	$nrow = $stm->execute();
	echo "done";
} else
	echo "Not Done";