<?php
include("db.php");
$conn1=getconnection();

  $stm = $conn1->query("SELECT * FROM completed_or_not WHERE status='Active' order by value ASC");
  $rows = $stm->fetchAll(PDO::FETCH_ASSOC);
  echo "<option value=''>Select</option>";
  foreach ($rows as $val) {
    echo '<option value="'.$val['sno'].'">'.$val['value'].'</option>';
  }

?>