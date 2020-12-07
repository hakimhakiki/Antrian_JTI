<?php

// FILE INI HANYA UNTUK SHORTCUT ADMIN PRODI
defined("BASEPATH") or exit("No direct access allowed");

class adminjti extends CI_Controller{
	function __construct(){
		parent::__construct();
	}
	public function index(){
		redirect('admin/Home');
	}
}

?>