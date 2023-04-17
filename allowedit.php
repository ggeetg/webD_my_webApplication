<?php include_once('loginchk.php');
include_once('db.php');
$conn1 = getconnection();

function clean($string) {
   return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
}

 ?>
<!DOCTYPE html>
<html lang="en">
<body>
<?php
  $prj_id=clean($_POST['submit']);
  $month = date('m');
  $stm = $conn1->query("SELECT sno, chk1, chk2 from project_monthly_report where project_id = $prj_id and month = $month ");
  $rows = $stm->fetch();
  $sno = $rows['sno'];
  $chk = "Pending"; 

try{
  if($rows['chk1']=="Submit" && $rows['chk2']=="Pending"){
    $stm = $conn1->prepare("UPDATE `project_monthly_report` SET chk1 = :a where sno = :b");
    $stm->bindParam(":a", $chk, PDO::PARAM_STR, 500);
    $stm->bindParam(":b", $sno, PDO::PARAM_INT);
    $nrow = $stm->execute();
  }
 } catch(PDOException $e) {
  echo "1.Some Error Occurred: " . $e->getMessage();
  exit();
}

// ENABLE ACR FOR EDITING BY CLICK ENABLE EDITING IN FINAL_SUBMIT PAGE BY DEPT_HEAD
// $month = date('m');
// $stm2 = $conn1->query("select sno from project_activity where MONTH(comp_date) = $month and project_id = $prj_id");
// $rows2 = $stm2->fetchAll(PDO::FETCH_ASSOC);
// foreach ($rows2 as $val) {
//   if($rows['chk1']=="Submit" && $rows['chk2']=="Pending"){
//     $stm = $conn1->prepare("UPDATE `acr` SET chk1 = :a where mr_activity_id = :b");
//     $stm->bindParam(":a", $chk, PDO::PARAM_STR, 500);
//     $stm->bindParam(":b", $val['sno'], PDO::PARAM_INT);
//     $nrow = $stm->execute();
//   }
// }


  echo "<script>location.href='finalSubmit.php?EncHid=".$_SESSION['EncTok']."';</script>";

?>


</body>
</html>