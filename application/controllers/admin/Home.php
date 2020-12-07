<?php
defined("BASEPATH") or exit("No direct access allowed");

class Home extends CI_Controller
{
	private $prodi = "";

	function __construct(){
		parent::__construct();
		$status = $this->session->userdata("status");
    	$this->prodi = $this->session->userdata("user_prodi");
    	// if (!isset($status) || $status != "login" || $this->prodi == ""){
    	// 	redirect('admin/login');
    	// }
    	echo $status. " ". $this->prodi;
	}
	public function index(){
		$data['title'] = 'Antrian JTI';
		$data['prodi'] = $this->prodi;
		$this->load->view('admin/home', $data);
	}
}

?>