<?php 
include("db.php");
$conn1=getconnection();
$d_name = htmlspecialchars($_POST["q"]);

	$stm = $conn1->prepare("SELECT id FROM department WHERE dept_name=:a ");
	$stm->bindParam(":a", $d_name, PDO::PARAM_STR);
	$stm->execute();
    $rows = $stm->fetch();
    $did = $rows['id'];
	$stm = $conn1->query("SELECT * FROM project_registration WHERE status in (1,2,3,6) and constituent_unit=$did ");
    $rows = $stm->fetchAll(PDO::FETCH_ASSOC);
    foreach ($rows as $val) {
        echo '<button type="submit" name="submit" value="'.$val['id'].'">> '.$val['title'].'</button><br>';
    }
?>