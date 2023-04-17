<?php

header("X-Frame-Options: DENY");
header("Content-Security-Policy: frame-ancestors 'none'", false);

session_start();

function headers()
	{
    echo "<script>location.href='login.php';alert('Please login again...');</script>";
	}

if($_COOKIE['Uses']!=$_SESSION['loginid'] || $_COOKIE['Usesid']!=session_id())
	{
	session_destroy();
	headers();
	}

if (!isset($_SESSION['user_id']))
	{
	session_destroy();
	headers();
	}

if (!isset($_SESSION['loginid']))
	{
	session_destroy();
	headers();
	}



$userid=$_SESSION['user_id'];
$sessionid=$_SESSION['loginid'];
    

if(!isset($_SESSION['EncTok']) || !isset($_REQUEST['EncHid']))
	{
	session_destroy();
	headers();
	}

if($_SESSION['EncTok']!==$_REQUEST['EncHid'])
	{
	session_destroy();
	headers();
	}


include_once("lgn_tkn_chk.php");

?>

<!-- <script language="javascript">
history.go(1)
</script> -->