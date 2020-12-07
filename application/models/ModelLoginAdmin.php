<?php
defined ("BASEPATH") or exit("No direct access allowed");

class ModelLoginAdmin extends CI_Model{
	private $table = "admin";

	public function getDataAdmin($user){
		$this->db->where("username", $user);
		return $this->db->get($this->table)->result();
	}

	public function lookProdi($id){
		$result = $this->db->query("SELECT prodi FROM prodi WHERE id_prodi='$id'");
		return $result->result();
	}
}
?>