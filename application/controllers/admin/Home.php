<?php
defined("BASEPATH") or exit("No direct access allowed");

class Home extends CI_Controller
{
	private $prodi = "";

	function __construct(){
		parent::__construct();

		$this->load->model("ModelAdmin");

		$status = $this->session->userdata("status");
    	$this->prodi = $this->session->userdata("user_prodi");
    	if (!isset($status) || $status != "login" || $this->prodi == ""){
    		redirect('admin/login');
    	}
	}
	public function index(){
		$data['title'] = 'Antrian JTI';
		$data['prodi'] = $this->prodi;
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
}

?>