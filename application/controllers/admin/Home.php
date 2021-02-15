<?php
defined("BASEPATH") or exit("No direct access allowed");

class Home extends CI_Controller
{
	private $prodi = "";
	private $id_admin = "";

	function __construct(){
		parent::__construct();

		$this->load->model("ModelAdmin");

		$status = $this->session->userdata("status");
		$this->id_admin = $this->session->userdata("id_admin");
    	$this->prodi = $this->session->userdata("user_prodi");
    	if (!isset($status) || $status != "login" || $this->prodi == ""){
    		redirect('admin/login');
    	}
	}
	public function index(){
		$data['title'] = 'Antrian JTI';
		$data['prodi'] = $this->prodi;
		$data['tabel_antrian'] = $this->ModelAdmin->getDataAntrian($this->id_admin);
		$data['tersisa'] = $this->ModelAdmin->getDataTersisa($this->id_admin);
		$data['nomorurut'] = $this->getNomorUrut();
		$this->load->view('admin/home', $data);
	}

	public function getAktifKerja(){
		$admin = $this->session->userdata("id_admin");
		$res = $this->ModelAdmin->getDataById($admin);
		foreach($res as $r){
			if($r->aktif_kerja == 0) {
				echo "tidak aktif";
			}else {
				echo "aktif";
			}
		}
	}

	public function setAktifKerja(){
		$status = $this->input->get("state");
		$id = $this->session->userdata("id_admin");
		$this->ModelAdmin->setAktif($id, $status);
	}

	public function getNomorUrut(){
		$prodi = $this->id_admin; // id prodi sesuai dengan id admin
		$tgl = date("Y-m-d");

		$sql = "SELECT * FROM antrian WHERE prodi = '$prodi' AND status = 1 AND tanggal='$tgl'";
		$data = $this->db->query($sql)->result();
		$nomor_str = "";
		foreach ($data as $d) {
			$id = $d->id;
			$len = strlen($id);
			$nomor_str = substr($id, $len - 3, $len);
		}
		return $nomor_str;
	}

	public function panggil(){
		// kirim httprequest ke monitor (halaman "Antrian")
		// bunyikan panggilan
		$sql = "UPDATE antrian SET panggil=0 WHERE prodi='01' AND status=1";
		$data = $this->db->query($sql);

		redirect('admin/home','refresh');
	}

	public function selanjutnya(){
		// mencari data nomor panggilan dengan status "1", jika tidak ada maka panggil nomor awal
		$prodi = $this->id_admin; // id prodi sesuai dengan id admin

		// set status dari 1 ke 2 untuk yang sudah dipanggil
		// tanggal
		$tgl = date("Y-m-d");
		$sql = "SELECT * FROM antrian WHERE prodi = '$prodi' AND status = 1 AND tanggal='$tgl'";
		$data = $this->db->query($sql)->result();
		$id = "";
		foreach ($data as $d) {
			$id = $d->id;
		}
		$sql = "UPDATE antrian SET status=2 WHERE id='$id'";
		$this->db->query($sql);

		// set status dari 0 ke 1 untuk yang menunggu
		$sql  = "SELECT * FROM antrian WHERE prodi='$prodi' AND status=0 AND tanggal='$tgl' ORDER BY id ASC LIMIT 1";
		$data = $this->db->query($sql)->result();
		$id = "";
		foreach ($data as $d) {
			$id = $d->id;
		}
		$sql = "UPDATE antrian SET status=1 WHERE id='$id'";
		$this->db->query($sql);

		redirect('admin/home','refresh');
	}

	// fungsi dibawah ini hanya referensi
	public function trimming(){
		$last_id = $this->ModelTambahMenu->getLastId();
		$len = strlen($last_id);
		$get_left = substr($last_id, 0, 1);
		$get_right = substr($last_id, 1, $len);
		$new_number = intval($get_right) + 1;
		$new_id = $get_left. sprintf("%03d", $new_number);
		return $new_id;
	}
}

?>