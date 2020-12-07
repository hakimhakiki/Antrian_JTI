<?php
// LOGIN UNTUK SISWA
defined ("BASEPATH") or exit("No direct access allowed");

class Login extends CI_Controller{
	function __construct(){
		parent::__construct();
	}

	public function index(){
		$this->load->view("view_login");
	}

	public function confirm(){
		$login_rules = array(
			array(
				"field" => "nama",
				"label" => "Nama",
				"rules" => "required"
			),
			array(
				"field" => "password",
				"label" => "Password",
				"rules" => "required|min_length[8]|max_length[16]"
			)
		);

		$this->form_validation->set_rules($login_rules);

		if($this->form_validation->run() == FALSE){
			$this->load->view("view_login");
		}else{
			$nama = $this->input->post("nama");
            $password = $this->input->post("password");

            if($nama=="admin"){
                if($password=="superuser"){
                    echo "Selamat Login";
                }else{
                    echo "Password Salah";
                }
            }else{
                echo "Username Salah";
            }
		}
	}
}
?>