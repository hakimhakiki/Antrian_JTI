<?php
defined ("BASEPATH") or exit("No direct access allowed");

class ModelAdmin extends CI_Model{
	private $table = "admin";

	public function getDataAdmin($user){
		$this->db->where("username", $user);
		return $this->db->get($this->table)->result();
	}

	public function getDataById($id){
		$this->db->where("id_admin", $id);
		return $this->db->get($this->table)->result();
	}

	public function lookProdi($id){
		$result = $this->db->query("SELECT prodi FROM prodi WHERE id_prodi='$id'");
		return $result->result();
	}

	public function setAktif($id, $status){
		if($status == "aktif"){
			$sql = "UPDATE ". $this->table. " SET aktif_kerja = 1 WHERE id_admin='$id'";
			$this->db->query($sql);
		}elseif ($status == "tidak aktif") {
			$sql = "UPDATE ". $this->table. " SET aktif_kerja = 0 WHERE id_admin='$id'";
			$this->db->query($sql);
		}
	}

}
?>