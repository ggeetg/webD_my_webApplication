<?php include_once("loginchk.php");
include_once("db.php");
$conn1=getconnection();

function clean($string) {
   return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
}

$old_passcode=$_POST['pass_old'];
$new_passcode1=$_POST['pass_new_1'];
$new_passcode2=$_POST['pass_new_2'];

if($old_passcode==""||$new_passcode1==""||$new_passcode2==""){
  echo "<script>location.href='resetPassword.php?EncHid=".$_SESSION['EncTok']."&msg=".urlencode("Password cannot be empty.")."';</script>";
  exit();
}
if($new_passcode1!=$new_passcode2){
  echo "<script>location.href='resetPassword.php?EncHid=".$_SESSION['EncTok']."&msg=".urlencode("Password does not match with confirm new password.")."';</script>";
  exit();
}
if(strlen($new_passcode1)<6||strlen($new_passcode2)<6){
  echo "<script>location.href='resetPassword.php?EncHid=".$_SESSION['EncTok']."&msg=".urlencode("Password should be at least 6 digit long.")."';</script>";
  exit();
}

$uname=$_SESSION['user_id'];
$stm = $conn1->query("SELECT id, upass FROM `user` WHERE `uname` = '$uname'");
$rows = $stm->fetch();
if($stm->rowCount()!=1){
  echo 'Technical error, please close the browser and try again.';
  exit();
}

$id=$rows['id'];
$db_pass=$rows['upass'];

$old_passcode=md5($old_passcode);

if($old_passcode!=$db_pass){
  echo '<script>alert("Old password is incorrect. Please try again.")</script>';
  echo "<script>location.href='resetPassword.php?EncHid=".$_SESSION['EncTok']."';</script>";
  exit();
}

$flag=0;
if($new_passcode1==$new_passcode2){
  if(!empty($new_passcode1)){
    $password=md5($new_passcode1);
    try {
      $stm = $conn1->prepare(" UPDATE `user` SET `upass`=:a, `f_p_reset`=:b WHERE `id` =:c ");
      $stm->bindParam(":a", $password, PDO::PARAM_STR, 500);
      $stm->bindParam(":b", $flag, PDO::PARAM_INT);
      $stm->bindParam(":c", $id, PDO::PARAM_INT);
      $nrow = $stm->execute();
      echo "<script>location.href='dashboard.php?EncHid=".$_SESSION['EncTok']."';</script>";
    } catch(PDOException $e) {
      echo "1.Some Error Occurred: " . $e->getMessage();
      exit();
    }
  }
} else 
    echo "password does not match";

