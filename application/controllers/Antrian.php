<?php
defined("BASEPATH") or exit("No direct access allowed");

class Antrian extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model("ModelAntrian");
	}
	public function index(){
		$data['title'] = "Nomor antrian";
		$this->load->view('antrian', $data);
	}

	// Fungsi di bawah ini untuk memanggil nomor panggilan
	public function getMif(){}
	public function getTif(){}
	public function getTkk(){}
	public function getInt(){}
}

?>