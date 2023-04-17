<?php
function getconnection(){
	$servername = "localhost";
	$username = "root";
	$password = "";
	
	try {
	  $conn = new PDO("mysql:host=$servername;dbname=pac_mis", $username, $password);
	  // set the PDO error mode to exception
	  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} catch(PDOException $e) {
	  echo "Connection failed: " . $e->getMessage();
	}
	return $conn;
}

//pdo query prepared====================
// $stm = $pdo->prepare("SELECT * FROM countries WHERE id = :id");
// $stm->bindParam(":id", $id, PDO::PARAM_INT);
// $stm->execute();
// $row = $stm->fetch(PDO::FETCH_ASSOC);
