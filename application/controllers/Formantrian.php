<?php
defined("BASEPATH") or exit("No direct access allowed!");

class Formantrian extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model("ModelAntrian");
	}

	public function index(){
		$data['title'] = "Form Antrian JTI";
		$this->load->view("form_antrian", $data);
	}

	public function confirm(){
		$data_rules = array(
			array(
				"field" => "nama",
				"label" => "Nama Singkat",
				"rules" => "required|min_length[3]|max_length[12]"
			),
			array(
				"field" => "keperluan",
				"label" => "Keperluan",
				"rules" => "required"
			),
			array(
				"field" => "prodi",
				"label" => "Prodi",
				"rules" => "required"
			)
		);

		$this->form_validation->set_rules($data_rules);

		if($this->form_validation->run() == FALSE){
			$this->load->view("form_antrian");
		}else {
			# code...
			$nama = ucfirst($this->input->post("nama"));
			$keperluan = $this->input->post("keperluan");
			$prodi = $this->input->post("prodi");

			$tanggal = date('Y-m-d');
			$id_prodi = $this->ModelAntrian->lookIdProdi($prodi);

			// Cek point apakah admin sudah aktif kerja sesuai dengan prodi
			// Jika belum aktif maka muncul peringatan
			if($this->ModelAntrian->isAdminAktif($id_prodi)){
				/* Komposisi id antrian
				tanggal -> id_prodi -> no_antrian
				ex: 2020121402001
				Id antrian baru = no_antrian + 1
				*/
				$tmp = $this->ModelAntrian->getLastAntrian($tanggal, $id_prodi);
				$no_antrian = sprintf("%03d", intval($tmp) + 1);
				$id_antrian = "". date('Ymd'). $id_prodi. $no_antrian. "";

				// Block program keperluan
				$my_keperluan = "";
				if($keperluan == "konsul"){
					$my_keperluan = "konsultasi";
				}elseif($keperluan == "admin"){
					$my_keperluan = "administrasi";
				}

				// Block program masukkan data
				$data = array(
					'id' => $id_antrian,
					'nama' => $nama,
					'tanggal' => $tanggal,
					'keperluan' => $my_keperluan,
					'prodi' => $id_prodi,
					'terpanggil' => 0
				);
				$this->ModelAntrian->addAntrian($data);

				// Block cetak bukti
				if($prodi == "int") $prodi = "international";
				$data = array(
					'nama' => $nama,
					'tanggal' => $tanggal,
					'prodi' => strtoupper($prodi),
					'no_antrian' => $no_antrian
				);
				$this->load->view("bukti_antrian", $data);

			}else{
				if($prodi=="int") {
					$prodi = "International";
				}else {
					$prodi = strtoupper($prodi);
				}
				$data['title'] = "Form Antrian JTI";
				$data['prodi'] = $prodi;
				$data['admin_nonaktif'] = "nonaktif";
				$this->load->view("form_antrian", $data);
			}
		}
	}
}
?>