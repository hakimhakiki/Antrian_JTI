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

		// $no = 4;
		// $format = sprintf("%03d", $no);
		// echo "<br>True number : $no <br> Format : $format<br>";

		// $base = "2020120402003";
		// $length = strlen($base);
		// $antri = substr($base, 10, $length);
		// $int = intval($antri);
		// echo "<br>Base id : $base<br>Length : $length<br>No antri : $antri<br> Integer : $int";

		$tgl = date("Y-m-d");
		echo "<br>Tanggal sekarang: ". $tgl;
		

		echo "<br>";
		echo "<br>Testing angka ke terbilang<br>";
		$myno = 120;
		echo $myno. "<br>";
		echo $this->num2str($myno). "<br>";

		echo "<br>Json";
		$table = array('nomor'=>'001', 'sisa'=>'1', 'panggil'=>'0');
		$en = json_encode($table);
		echo "<br>". json_encode($table). "<br>";
		$de = json_decode($en);
		echo "<br>". $de->nomor;
		echo "<br>". $de->sisa;
		echo "<br>". $de->panggil;
	}

	public function suara(){
		$this->load->view("tes_suara");
	}

	private function num2str($number){
		// mengubah angka menjadi terbilang
		// range satuan hingga ratusan
		$no_list = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan");
		$mod_list = array("belas", "puluh", "ratus");
		$diff_list = array("sepuluh", "sebelas", "seratus");
		$number_str = "";

		/* Hitung pakai trimm per digit */
		$data = "". $number. ""; // ubah number ke string

		// disini bagian ratusan
		if(strlen($data) == 3){
			// potong per digit
			$digit1 = intval(substr($data, 0, 1));
			$digit2 = intval(substr($data, 1, 1));
			$digit3 = intval(substr($data, 2, 2));

			if($digit1 == 1){
				$number_str = $diff_list[2];
			}else{
				// ambil angka awal, misal 254 maka diambil sisi kiri (2)
				$number_str = $no_list[$digit1]. " ". $mod_list[2];
			}

			if($digit2 == 1 && $digit3 == 0){ // jika 10
				$number_str = $number_str. " ". $diff_list[0];
			}elseif($digit2 == 1 && $digit3 == 1){ // jika 11
				$number_str = $number_str. " ". $diff_list[1];
			}elseif($digit2 == 1 && $digit3 >= 2){ // jika belasan
				$number_str = $number_str. " ". $no_list[$digit3]. " ". $mod_list[0];
			}elseif($digit2 >= 2){
				$number_str = $number_str. " ". $no_list[$digit2]. " ". $mod_list[1]. " ". $no_list[$digit3];
			}elseif ($digit2 == 0 && $digit3 != 0) {
				$number_str = $number_str. " ". $no_list[$digit3];
			}
		}elseif(strlen($data) == 2){
			$digit1 = intval(substr($data, 0, 1));
			$digit2 = intval(substr($data, 1, 1));
			if($digit1 == 1 && $digit2 == 0){ // jika 10
				$number_str = $number_str. " ". $diff_list[0];
			}elseif($digit1 == 1 && $digit2 == 1){ // jika 11
				$number_str = $number_str. " ". $diff_list[1];
			}elseif($digit1 == 1 && $digit2 >= 2){ // jika belasan
				$number_str = $number_str. " ". $no_list[$digit2]. " ". $mod_list[0];
			}elseif($digit1 >= 2){
				$number_str = $number_str. " ". $no_list[$digit1]. " ". $mod_list[1]. " ". $no_list[$digit2];
			}
		}elseif(strlen($data) == 1){
			$number_str = $no_list[$number];
		}else{
			return "to big";
		}

		return $number_str;
	}
}
?>