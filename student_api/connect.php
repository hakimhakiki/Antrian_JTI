<?php

function getConn(){
	$host = "localhost";
	$dbnm = "lalapan";
	$user = "root";
	$pass = "";

	try{
		$dbh = new PDO("mysql::host=$host;dbname=$dbnm", $user, $pass);
		return $dbh;
	}catch(PDOException $e){
		echo $e->getMessage;
	}
}

?>