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

	// public function fileTemp($prodi){
	// 	$fileAdr = base_url("mods/temp/". $prodi. ".txt");
	// 	$openFile = opendir($fileAdr);
	// 	return $openFile;
	// }

	// Fungsi di bawah ini untuk memanggil nomor panggilan
	// untuk prodi mif
	public function getMif(){
		// $tgl = date("Y-m-d"); AND tanggal='$tgl'
		$tgl = date("Y-m-d");
		$sql = "SELECT * FROM antrian WHERE prodi='01' AND status=1 AND tanggal='$tgl'";
		$data = $this->db->query($sql)->result();
		$nomor_str = "";
		foreach ($data as $d) {
			$id = $d->id;
			$len = strlen($id);
			$nomor_str = substr($id, $len - 3, $len);
		}
		echo $nomor_str;
	}
	public function panggilMif(){
		// $tgl = date("Y-m-d"); AND tanggal='$tgl'
		$tgl = date("Y-m-d");
		$sql = "SELECT * FROM antrian WHERE prodi='01' AND status=1 AND tanggal='$tgl'";
		$data = $this->db->query($sql)->result();
		$panggil = 0;
		foreach ($data as $d) {
			$panggil = $d->panggil;
		}
		echo $panggil;
	}
	public function kunciMif(){
		// $tgl = date("Y-m-d"); AND tanggal='$tgl'
		$tgl = date("Y-m-d");
		$sql = "UPDATE antrian SET panggil=1 WHERE prodi='01' AND status=1 AND tanggal='$tgl'";
		$data = $this->db->query($sql)->result();
	}
	public function sisaMif(){
		echo $this->ModelAntrian->getTersisa('01');
	}

	// untuk prodi tif
	public function getTif(){
		// $tgl = date("Y-m-d"); AND tanggal='$tgl'
		$tgl = date("Y-m-d");
		$sql = "SELECT * FROM antrian WHERE prodi='02' AND status=1 AND tanggal='$tgl'";
		$data = $this->db->query($sql)->result();
		$nomor_str = "";
		foreach ($data as $d) {
			$id = $d->id;
			$len = strlen($id);
			$nomor_str = substr($id, $len - 3, $len);
		}
		echo $nomor_str;
	}
	public function panggilTif(){
		// $tgl = date("Y-m-d"); AND tanggal='$tgl'
		$tgl = date("Y-m-d");
		$sql = "SELECT * FROM antrian WHERE prodi='02' AND status=1 AND tanggal='$tgl'";
		$data = $this->db->query($sql)->result();
		$panggil = 0;
		foreach ($data as $d) {
			$panggil = $d->panggil;
		}
		echo $panggil;
	}
	public function kunciTif(){
		// $tgl = date("Y-m-d"); AND tanggal='$tgl'
		$tgl = date("Y-m-d");
		$sql = "UPDATE antrian SET panggil=1 WHERE prodi='02' AND status=1 AND tanggal='$tgl'";
		$data = $this->db->query($sql)->result();
	}
	public function sisaTif(){
		echo $this->ModelAntrian->getTersisa('02');
	}

	// untuk prodi tkk
	public function getTkk(){
		// Tunggu event "panggil" dari admin
		$sql = "SELECT * FROM antrian WHERE prodi='03' AND status=1";
		$data = $this->db->query($sql)->result();
		$nomor_str = "";
		foreach ($data as $d) {
			$id = $d->id;
			$len = strlen($id);
			$nomor_str = substr($id, $len - 3, $len);
		}
		echo $nomor_str;
	}
	public function panggilTkk(){
		$sql = "SELECT * FROM antrian WHERE prodi='03' AND status=1";
		$data = $this->db->query($sql)->result();
		$panggil = 0;
		foreach ($data as $d) {
			$panggil = $d->panggil;
		}
		echo $panggil;
	}
	public function kunciTkk(){
		$sql = "UPDATE antrian SET panggil=1 WHERE prodi='03' AND status=1";
		$data = $this->db->query($sql)->result();
	}
	public function sisaTkk(){
		echo $this->ModelAntrian->getTersisa('03');
	}

	// untuk kelas international
	public function getInt(){
		// Tunggu event "panggil" dari admin
		$sql = "SELECT * FROM antrian WHERE prodi='04' AND status=1";
		$data = $this->db->query($sql)->result();
		$nomor_str = "";
		foreach ($data as $d) {
			$id = $d->id;
			$len = strlen($id);
			$nomor_str = substr($id, $len - 3, $len);
		}
		echo $nomor_str;
	}
	public function panggilInt(){
		$sql = "SELECT * FROM antrian WHERE prodi='04' AND status=1";
		$data = $this->db->query($sql)->result();
		$panggil = 0;
		foreach ($data as $d) {
			$panggil = $d->panggil;
		}
		echo $panggil;
	}
	public function kunciInt(){
		$sql = "UPDATE antrian SET panggil=1 WHERE prodi='04' AND status=1";
		$data = $this->db->query($sql)->result();
	}
	public function sisaInt(){
		echo $this->ModelAntrian->getTersisa('04');
	}
}

?>