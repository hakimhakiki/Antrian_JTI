<?php

defined("BASEPATH") or exit("No direct access allowed");

class ModelAntrian extends CI_Model{
	private $table = "antrian";

	public function getJumlahAntri($prodi){
		
		$sql = "SELECT count(id) as jumlah FROM ". $this->table. " WHERE prodi='". $prodi. "'";
		$rs = $this->db->query($sql)->result();

		foreach($rs as $m){
			return $m->jumlah;
		}
	}
}

?>