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

	public function getLastAntrian($tanggal, $prodi){
		$sql = "SELECT id FROM ". $this->table. " WHERE tanggal='$tanggal' AND prodi='$prodi'";
		$rs = $this->db->query($sql)->result();

		$tmp = null;
		// 20201215 02 001
		// 8 2 3
		foreach ($rs as $r) {
			$id = $r->id;
			$tmp = substr($id, 10);
		}
		
		if (is_null($tmp)) {
            return $tmp = "000";
        }else{
            return $tmp;
        }
	}

	public function lookAdminAktif(){
		$sql = "SELECT * FROM admin WHERE aktif_kerja = 1";
		$rs = $this->db->query($sql);
		return $rs->result();
	}

	public function isAdminAktif($idprodi){
		$sql = "SELECT aktif_kerja FROM admin WHERE id_prodi='$idprodi'";
		$rs = $this->db->query($sql)->result();
		foreach ($rs as $r) {
			return $r->aktif_kerja;
		}
	}

	public function lookIdProdi($prodi){
		$sql = "SELECT id_prodi FROM prodi WHERE prodi='$prodi'";
		$rs = $this->db->query($sql)->result();

		foreach ($rs as $r) {
			return $r->id_prodi;
		}
	}

	public function addAntrian($data){
		$this->db->insert($this->table, $data);
	}
}

?>