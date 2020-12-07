<?php
include 'connect.php';

$data_in = "";
if(isset($data_in)){

	$conn = getConn();
	$data = json_decode($data_in);

	// Sql syntax
	$sql = "INSERT INTO user(id_user, nama, password) VALUES ?,?,?";
	// Sql Statement
	$sth = $conn->query($sql);
	$sth->setFetchMode(PDO::FETCH_ASSOC);

}
?>