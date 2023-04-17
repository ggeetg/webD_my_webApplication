<?php 
session_start();
$params = session_get_cookie_params();
setcookie("PHPSESSID", session_id(), 0, $params["path"], $params["domain"],
false, // this is the secure flag you need to set. Default is false.
true // this is the httpOnly flag you need to set
);
include_once('db.php');


// captcha check
if($_POST && "all required variables are present") {
    session_start();
    if($_POST['T3'] != $_SESSION['digit']){
	    session_destroy();
	    echo "<script>location.href='login.php';alert('Wrong captcha entered');</script>";
	    exit();
	}
}

/////// login atemt chk

	$conn1=getconnection();
	

	$IpAddress=$_SERVER['REMOTE_ADDR'];
//echo 'SELECT count(*) as count FROM `login_attempt` WHERE `ip` LIKE "'.$IpAddress.'" AND attempt = "Failure" AND usename="'.$_REQUEST['email'].'" AND `timestamp` > (now() - interval 10 minute) ';
	$stm=$conn1->query('SELECT count(*) as count FROM `login_attempt` WHERE `ip` LIKE "'.$IpAddress.'" AND attempt = "Failure" AND usename="'.$_REQUEST['email'].'" AND `timestamp` > (now() - interval 10 minute) ');
	$row = $stm->fetch();
	$count = $row['count'];
	
	echo $count."lo";
	if($count > 3){
    echo "<script>location.href='login.php';alert('Three failed attempts in last 10 minutes.Please try again after 10 minutes');</script>";
    exit();
	}
//////////

session_start();

function varspchar($string)
{
	$cmp=array('!','$','%','^','&','*','{','}','<','>','`','~','`','~','\'',';','\\','=');
	$val=$string;
	foreach($cmp as $ind=>$char )
	{
		$pos=strpos($val,$char);
		if ($pos!==false)
		{
		headers();
		break;

		}
	}

}
function headers()
	{
//////////////////// login attempt
		$conn1= getconnection();
		$atmp="Failure";
		$uname=$_REQUEST['email'];
		$IpAddress=$_SERVER['REMOTE_ADDR'];
		$stm=$conn1->prepare(" INSERT INTO `login_attempt`( `usename`, `ip`, `attempt`) VALUES (:a,:b,:c) ");
		$stm->bindParam(":a", $uname);
		$stm->bindParam(":b", $IpAddress);
		$stm->bindParam(":c", $atmp);
		$stm->execute();
///////////////////
    echo "<script>location.href='login.php';alert('Incorrect UserName or Password Supplied');</script>";
    exit;
	}

function GetRandom()
{
$sLeft=rand(1,99999);
if (strLen($sLeft)<5)
{
	$sLeft=(5-strLen($sLeft)).$sLeft;
}
$sRight=rand(1,99999);
	if (strLen($sRight)<5)
	{
		$sRight=(5-strLen($sRight)).$sRight;
	}
$sSeed = $sLeft.".".$sRight;
return $sSeed;
}
   
    
$sValidEmailAddress=$_REQUEST['email'];
$sValidEmailAddress=trim($sValidEmailAddress);
$pwd=$_REQUEST['pass'];
$pwd=md5($pwd);
$sValidHash=$_REQUEST['hash'];

if (strlen($_REQUEST['email'])>150)
{
	headers();
}

if (strlen($_REQUEST['hash'])>150)
{
	headers();
}

if ($_REQUEST['email']==="")
{

	headers();
}

if ($_REQUEST['hash']==="") 
{

	headers();
}
varspchar($_REQUEST['email']);
varspchar($_REQUEST['hash']);

loginChk($pwd,$sValidEmailAddress);      

function loginChk($pwd,$uname)
{echo "hello";
	$conn1= getconnection();

	$uname=trim($uname);

   if (strpos($uname,"?")|| strpos($uname,"<")|| strpos($uname,">")|| strpos($uname,"!")|| strpos($uname,"$")|| strpos($uname,"%")|| strpos($uname,"^")|| strpos($uname,"&")|| strpos($uname,"*")|| strpos($uname,"(")|| strpos($uname,")")|| strpos($uname,"+")|| strpos($uname,"|")|| strpos($uname,"'")){
		headers();
    }

	$stm = $conn1->prepare("SELECT upass, uname FROM user WHERE uname = :id and status = 'Active'");
	$stm->bindParam(":id", $uname, PDO::PARAM_STR,500);
	$nrow = $stm->execute();

	if($stm->rowCount()<=0)
	{
	   	headers();
		exit;
	}
	while($row = $stm->fetch(PDO::FETCH_ASSOC))
	{
		$DbPass=$row['upass'];
		$DbUname=$row['uname'];
		$DbUname=trim($DbUname);
	}
	if($DbUname!=$uname)
	{
		headers();
		exit;
	}
	if($DbPass===$pwd)
	{
		$rand=GetRandom();
		$_SESSION['loginid']=$rand;
		setcookie("Uses",$rand,0, "", "", "", "true");
		setcookie("Usesid",session_id(),0, "", "", "", "true");
		$EncTok=GetRandom();
		$_SESSION['EncTok']=$EncTok;
		$_SESSION['user_id']=$uname;
		$token=getToken(5);
		$_SESSION['token']=$token;
//////////////////// login attempt
		$atmp="Success";
		$IpAddress=$_SERVER['REMOTE_ADDR'];
		$stm=$conn1->prepare(" INSERT INTO `login_attempt`( `usename`, `ip`, `attempt`) VALUES (:a,:b,:c) ");
		$stm->bindParam(":a", $uname);
		$stm->bindParam(":b", $IpAddress);
		$stm->bindParam(":c", $atmp);
		$stm->execute();

		$stm=$conn1->prepare(" UPDATE `user` SET `token` = :a WHERE uname = :b ");
		$stm->bindParam(":a", $token);
		$stm->bindParam(":b", $uname);
		$stm->execute();
///////////////////

		header("Location:dashboard.php?EncHid=$EncTok");
	}
	else
	{
		headers();
		exit;
	}

}


// Generate token
function getToken($length){
  $token = "";
  $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
  $codeAlphabet.= "abcdefghijklmnopqrstuvwxyz";
  $codeAlphabet.= "0123456789";
  $max = strlen($codeAlphabet); // edited

  for ($i=0; $i < $length; $i++) {
    $token .= $codeAlphabet[random_int(0, $max-1)];
  }

  return $token;
}
?>

