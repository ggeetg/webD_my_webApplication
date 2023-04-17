<?php 
include("db.php");
$conn1=getconnection();

  $stm = $conn1->query("SELECT * FROM program_post WHERE status='Active' order by post ASC");
  $rows = $stm->fetchAll(PDO::FETCH_ASSOC);
  echo "<option value=''>Select</option>";
  foreach ($rows as $val) {
    echo '<option value="'.$val['sno'].'">'.$val['post'].'</option>';
  }
?>