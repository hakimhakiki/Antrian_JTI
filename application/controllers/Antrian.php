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
		// bagian ambil nomor
		$sql = "SELECT * FROM antrian WHERE prodi='01' AND status=1 AND tanggal='$tgl'";
		$data = $this->db->query($sql)->result();
		$nomor_str = "";
		foreach ($data as $d) {
			$id = $d->id;
			$len = strlen($id);
			$nomor_str = substr($id, $len - 3, $len);
		}
		// bagian lihat status panggil
		$sql = "SELECT * FROM antrian WHERE prodi='01' AND status=1 AND tanggal='$tgl'";
		$data = $this->db->query($sql)->result();
		$panggil = 0;
		foreach ($data as $d) {
			$panggil = $d->panggil;
		}
		// bagian file yang diputar
		$files = array(base_url('audio/antrian/'). "mif.wav");
		$files = array_merge($files, $this->num2files(intval($nomor_str)) );
		$encode = array("nomor"=>$nomor_str, "sisa"=>$this->ModelAntrian->getTersisa('01'), "panggil"=>$panggil, "files"=>$files);
		echo json_encode($encode);
	}
	public function kunciMif(){
		// $tgl = date("Y-m-d"); AND tanggal='$tgl'
		$tgl = date("Y-m-d");
		$sql = "UPDATE antrian SET panggil=1 WHERE prodi='01' AND status=1 AND tanggal='$tgl'";
		$data = $this->db->query($sql);
	}

	// untuk prodi tif
	public function getTif(){
		// $tgl = date("Y-m-d"); AND tanggal='$tgl'
		$tgl = date("Y-m-d");
		// bagian ambil nomor
		$sql = "SELECT * FROM antrian WHERE prodi='02' AND status=1 AND tanggal='$tgl'";
		$data = $this->db->query($sql)->result();
		$nomor_str = "";
		foreach ($data as $d) {
			$id = $d->id;
			$len = strlen($id);
			$nomor_str = substr($id, $len - 3, $len);
		}
		// bagian lihat status panggil
		$sql = "SELECT * FROM antrian WHERE prodi='02' AND status=1 AND tanggal='$tgl'";
		$data = $this->db->query($sql)->result();
		$panggil = 0;
		foreach ($data as $d) {
			$panggil = $d->panggil;
		}
		// bagian file yang diputar
		$files = array(base_url('audio/antrian/'). "tif.wav");
		$files = array_merge($files, $this->num2files(intval($nomor_str)) );
		$encode = array("nomor"=>$nomor_str, "sisa"=>$this->ModelAntrian->getTersisa('02'), "panggil"=>$panggil, "files"=>$files);
		echo json_encode($encode);
	}
	public function kunciTif(){
		// $tgl = date("Y-m-d"); AND tanggal='$tgl'
		$tgl = date("Y-m-d");
		$sql = "UPDATE antrian SET panggil=1 WHERE prodi='02' AND status=1 AND tanggal='$tgl'";
		$data = $this->db->query($sql)->result();
	}

	// untuk prodi tkk
	public function getTkk(){
		// Tunggu event "panggil" dari admin
		$tgl = date("Y-m-d");
		// bagian ambil nomor
		$sql = "SELECT * FROM antrian WHERE prodi='03' AND status=1 AND tanggal='$tgl'";
		$data = $this->db->query($sql)->result();
		$nomor_str = "";
		foreach ($data as $d) {
			$id = $d->id;
			$len = strlen($id);
			$nomor_str = substr($id, $len - 3, $len);
		}
		// bagian lihat status panggil
		$sql = "SELECT * FROM antrian WHERE prodi='03' AND status=1 AND tanggal='$tgl'";
		$data = $this->db->query($sql)->result();
		$panggil = 0;
		foreach ($data as $d) {
			$panggil = $d->panggil;
		}
		// bagian file yang diputar
		$files = array(base_url('audio/antrian/'). "tkk.wav");
		$files = array_merge($files, $this->num2files(intval($nomor_str)) );
		$encode = array("nomor"=>$nomor_str, "sisa"=>$this->ModelAntrian->getTersisa('03'), "panggil"=>$panggil, "files"=>$files);
		echo json_encode($encode);
	}
	public function kunciTkk(){
		$sql = "UPDATE antrian SET panggil=1 WHERE prodi='03' AND status=1";
		$data = $this->db->query($sql)->result();
	}

	// untuk kelas international
	public function getInt(){
		// Tunggu event "panggil" dari admin
		$tgl = date("Y-m-d");
		// bagian ambil nomor
		$sql = "SELECT * FROM antrian WHERE prodi='04' AND status=1 AND tanggal='$tgl'";
		$data = $this->db->query($sql)->result();
		$nomor_str = "";
		foreach ($data as $d) {
			$id = $d->id;
			$len = strlen($id);
			$nomor_str = substr($id, $len - 3, $len);
		}
		// bagian lihat status panggil
		$sql = "SELECT * FROM antrian WHERE prodi='04' AND status=1 AND tanggal='$tgl'";
		$data = $this->db->query($sql)->result();
		$panggil = 0;
		foreach ($data as $d) {
			$panggil = $d->panggil;
		}
		// bagian file yang diputar
		$files = array(base_url('audio/antrian/'). "int.wav");
		$files = array_merge($files, $this->num2files(intval($nomor_str)) );
		$encode = array("nomor"=>$nomor_str, "sisa"=>$this->ModelAntrian->getTersisa('04'), "panggil"=>$panggil, "files"=>$files);
		echo json_encode($encode);
	}
	public function kunciInt(){
		$sql = "UPDATE antrian SET panggil=1 WHERE prodi='04' AND status=1";
		$data = $this->db->query($sql)->result();
	}


	private function num2files($number){ // menghasilkan array url files
		// mengubah angka menjadi files
		// range satuan hingga ratusan
		$fpath = base_url('audio/antrian/');
		$no_list = array("", "1.wav", "2.wav", "3.wav", "4.wav", "5.wav", "6.wav", "7.wav", "8.wav", "9.wav");
		$mod_list = array("belas.wav", "puluh.wav", "ratus.wav");
		$diff_list = array("sepuluh.wav", "sebelas.wav", "seratus.wav");
		$number_array = array();

		/* Hitung pakai trimm per digit */
		$data = "". $number. ""; // ubah number ke string

		// disini bagian ratusan
		if(strlen($data) == 3){
			// potong per digit
			$digit1 = intval(substr($data, 0, 1));
			$digit2 = intval(substr($data, 1, 1));
			$digit3 = intval(substr($data, 2, 2));

			if($digit1 == 1){
				// 100
				array_push($number_array, $fpath. $diff_list[2]);
			}else{
				// ambil angka awal, misal 254 maka diambil sisi kiri (2)
				array_push($number_array, $fpath. $no_list[$digit1], $fpath. $mod_list[2]);
			}

			if($digit2 == 1 && $digit3 == 0){ // jika 10
				array_push($number_array, $fpath. $diff_list[0]);
			}elseif($digit2 == 1 && $digit3 == 1){ // jika 11
				array_push($number_array, $fpath. $diff_list[1]);
			}elseif($digit2 == 1 && $digit3 >= 2){ // jika belasan
				array_push($number_array, $fpath. $no_list[$digit3], $fpath. $mod_list[0]);
			}elseif($digit2 >= 2){
				array_push($number_array, $fpath. $no_list[$digit2], $fpath. $mod_list[1], $fpath. $no_list[$digit3]);
			}elseif ($digit2 == 0 && $digit3 != 0) {
				array_push($number_array, $fpath. $no_list[$digit3]);
			}
		}elseif(strlen($data) == 2){
			$digit1 = intval(substr($data, 0, 1));
			$digit2 = intval(substr($data, 1, 1));
			if($digit1 == 1 && $digit2 == 0){ // jika 10
				array_push($number_array, $fpath. $diff_list[0]);
			}elseif($digit1 == 1 && $digit2 == 1){ // jika 11
				array_push($number_array, $fpath. $diff_list[1]);
			}elseif($digit1 == 1 && $digit2 >= 2){ // jika belasan
				array_push($number_array, $fpath. $no_list[$digit2], $fpath. $mod_list[0]);
			}elseif($digit1 >= 2){
				array_push($number_array, $fpath. $no_list[$digit1], $fpath. $mod_list[1], $fpath. $no_list[$digit2]);
			}
		}elseif(strlen($data) == 1){
			array_push($number_array, $fpath. $no_list[$number]);
		}else{
			return "number out of limit";
		}

		return $number_array;
	}

	public function tes(){
		$k=[];
		array_push($k, "nomor", "tif");
		$num = 8;
		$l = $this->num2files($num);
		$m = array_merge($k, $l);
		print_r($m);
		echo json_encode($m);
	}

}

?>