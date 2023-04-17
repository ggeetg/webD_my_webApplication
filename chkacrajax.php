<?php
include_once("db.php");
$conn1 = getconnection();

$pid=$_REQUEST['q'];

$stm=$conn1->query("SELECT a.chk1 from acr as a join project_activity as b on a.mr_activity_id = b.sno where b.project_id = $pid");
$rows = $stm->fetchAll(PDO::FETCH_ASSOC);
foreach ($rows as $val) {
	if($val['chk1']=="Pending"){
		echo "Pending";
		exit();
	}
}