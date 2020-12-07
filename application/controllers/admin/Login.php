<?php
// LOGIN UNTUK ADMIN
defined ("BASEPATH") or exit("No direct access allowed");

class Login extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model("ModelAdmin");
	}

	public function index(){
		$this->load->view("admin/login");
	}

	public function confirm(){
		$login_rules = array(
			array(
				"field" => "user_antrian",
				"label" => "Username",
				"rules" => "required"
			),
			array(
				"field" => "pass_antrian",
				"label" => "Password",
				"rules" => "required|min_length[8]|max_length[16]"
			)
		);

		$this->form_validation->set_rules($login_rules);

		if($this->form_validation->run() == FALSE){
			$this->load->view("admin/login");
		}else{
			$username = $this->input->post("user_antrian");
	        $password = $this->input->post("pass_antrian");

            // Ambil data dari database
            $row = $this->ModelAdmin->getDataAdmin($username);
            foreach ($row as $r) {
                $getId = $r->id_admin;
                $getUsername = $r->username;
                $getPassword = $r->password;
                $row = $this->ModelAdmin->lookProdi($getId);
                foreach ($row as $r) {
                    $getProdi = $r->prodi;
                }
            }
            
            // Cek keberadaan akun
            if(isset($getUsername)){

                // Cek kebenaran password
                if ($getPassword == $password) {

                    // Buat inisiasi session login
                    // $data_login = "Hello";
                    $data_login = array(
                        "id_admin" => $getId,
                        "user_prodi" => $getProdi,
                        "status" => "login"
                    );

                    $this->session->set_userdata($data_login);
                    redirect("admin/home");

                }else{
                	$data['error_pass'] = "Password salah";
                	$this->load->view("admin/login", $data);
                }

            }else{
            	$data['error_user'] = "Username tidak ditemukan";
            	$this->load->view("admin/login", $data);
            }
		}
	}

    public function logout(){
        $this->session->sess_destroy();
        redirect('admin/login');
    }
}
?>