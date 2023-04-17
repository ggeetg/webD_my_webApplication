<?php
include_once("lib/csrfMain.php");
	include_once("db.php");
	$con=getconnection();

echo '<select>';
	$stm = $con->query("SELECT * FROM department where status ='Active' and id not in (1) ");
          $rows = $stm->fetchAll(PDO::FETCH_ASSOC);
          foreach ($rows as $val) {
              echo '<option value="'.$val['id'].'">'.$val['dept_name'].'</option>';          
          }
echo '</select>';

echo '<br>ajay<br>';


	$a='Active';
	$stm = $con->prepare("SELECT * FROM department where status =:a and id not in (1) ");
	$stm->bindParam(":a", $a, PDO::PARAM_STR);
	$stm->execute();
	$rows = $stm->fetchAll(PDO::FETCH_ASSOC);	
	echo $stm->rowCount();		//gives no of rows
	foreach($rows as $v) {
		echo $v['dept_name'].'<br>';
	}

echo '<br>ajay<br>';

$input = "ajay<verm'a\"";
echo htmlentities($input, ENT_QUOTES, 'UTF-8');

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


echo "<br>".getToken(5);

?>