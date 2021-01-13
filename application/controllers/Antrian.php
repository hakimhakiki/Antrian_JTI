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

	public function fileTemp($prodi){
		$fileAdr = base_url("mods/temp/". $prodi. ".txt");
		$openFile = opendir($fileAdr);
		return $openFile;
	}

	// Fungsi di bawah ini untuk memanggil nomor panggilan
	public function getMif(){
		$data = $this->fileTemp("mif");
		echo $data;
	}
	public function getTif(){
		// Tunggu event "panggil" dari admin
		$data = $this->fileTemp("tif");
		echo $data;
	}
	public function getTkk(){
		// Tunggu event "panggil" dari admin
		$data = $this->fileTemp("tkk");
		echo $data;
	}
	public function getInt(){
		// Tunggu event "panggil" dari admin
		$data = $this->fileTemp("inter");
		echo $data;
	}
}

?>