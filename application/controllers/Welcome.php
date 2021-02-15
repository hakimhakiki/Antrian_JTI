<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		echo "Welcome to Antrian JTI <br>";
		
		echo "<a href='". base_url('admin/home'). "'>Click here to direct</a>";

		/* Testing format and explode */

		$no = 4;
		$format = sprintf("%03d", $no);
		echo "<br>True number : $no <br> Format : $format<br>";

		$base = "2020120402003";
		$length = strlen($base);
		$antri = substr($base, 10, $length);
		$int = intval($antri);
		echo "<br>Base id : $base<br>Length : $length<br>No antri : $antri<br> Integer : $int";

		$tgl = date("Y-m-d");
		echo "<br>Tanggal sekarang: ". $tgl;
	}

	public function suara(){
		$this->load->view("tes_suara");
	}
}
?>