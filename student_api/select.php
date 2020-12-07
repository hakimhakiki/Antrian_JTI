<?php
include 'connect.php';

$conn = getConn();
// Sql Statement
$sth = $conn->query("SELECT * from user");
$sth->setFetchMode(PDO::FETCH_ASSOC);


$data = array();
// View Hasil
while ($row = $sth->fetch()){
	//echo $row->id_menu. " ". $row->nama. " ". $row->harga. "<br>";
	$data[]=$row;
}
echo json_encode($data);

?>