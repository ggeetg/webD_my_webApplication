<?php
include_once("db.php");
$conn1 = getconnection();

$pid=$_REQUEST['q'];

$stm=$conn1->query("SELECT chk1 from acr where mr_activity_id = $pid");
$rows = $stm->fetch();
echo $rows['chk1'];

?>