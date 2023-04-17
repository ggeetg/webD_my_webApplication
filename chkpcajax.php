<?php 
include("db.php");
$conn1=getconnection();
$d_name = $_POST["q"];

	$stm = $conn1->query("SELECT id, first_name, last_name FROM user WHERE status='Active' and dept=$d_name and utype in (1,2) order by first_name ASC");
    $rows = $stm->fetchAll(PDO::FETCH_ASSOC);
	echo "<option value=''>Select</option>";
    foreach ($rows as $val) {
        echo '<option value="'.$val['id'].'">'.$val['first_name']." ".$val['last_name'].'</option>';
    }
?>