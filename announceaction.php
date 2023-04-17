<?php
session_start();
if (true) {
    require_once __DIR__ . '/lib/SecurityService.php';
    $antiCSRF = new \Phppot\SecurityService\securityService();
    $csrfResponse = $antiCSRF->validate();
    if (! empty($csrfResponse)) {

    } else {
		echo "<script>location.href='announcement.php?EncHid=".$_SESSION['EncTok']."&msg=".urlencode("Someting went wrong, please try again later.")."';</script>";
		exit();
    }
}
?>
<!-- /////////////////////////////////////////////////////////////////////////////////////////////////// -->
<?php
include_once('loginchk.php') ;
include_once("db.php");
$conn1=getconnection();

function validate_acr(){
	$flag=1;
	$flag_msg="Please fill the following fields:- ";
	if($_POST['submit']=='Submit'){
		if($_POST['mypost']==""||empty($_POST['mypost'])){
			$flag=0;
		}
		if($flag==0){
			echo "<script>location.href='announcement.php?EncHid=".$_SESSION['EncTok']."&msg=".urlencode("Post cannot be empty.")."';</script>";
			exit();
		}
	}
}
validate_acr();

$comment=htmlentities($_POST['mypost'], ENT_QUOTES);
$stm = $conn1->prepare(" SELECT id FROM user WHERE uname = :a ");
$stm->bindParam(":a", $_SESSION['user_id'], PDO::PARAM_STR);
$nrow = $stm->execute();
$row = $stm->fetch();
$userid = $row['id'];


if($nrow>0){
	$stm = $conn1->prepare(" INSERT INTO `announcement`(`comment`, `user_id`) VALUES (:a,:b) ");
	$stm->bindParam(":a", $comment, PDO::PARAM_STR,1000);
	$stm->bindParam(":b", $userid, PDO::PARAM_INT);
	$stm->execute();
}

echo "<script>location.href='announcement.php?EncHid=".$_SESSION['EncTok']."';</script>";

?>