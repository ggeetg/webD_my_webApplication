<?php
include_once('loginchk.php');

	$rand="00";
	$_SESSION['loginid']=$rand;
	setcookie("Uses",01,0);
	setcookie("Usesid",02,0);
	$EncTok="GOODBYE";
	$_SESSION['EncTok']=$EncTok;
	$_SESSION['user_id']=04;
	header("Location:login.php?EncHid=$EncTok");

?>