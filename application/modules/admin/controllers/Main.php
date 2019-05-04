<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		// $this->load->model("m_users", "users");
		$this->load->helper("form");	
		// if ($this->session->userdata('role_db') != "super")
		// 	redirect('/login/');
	}

	public function index(){
		if(ENVIRONMENT == 'production'){
			$this->layout->add_js([base_url("assets/global/vendor/vue/vue.min.js")]);
		}else{
			$this->layout->add_js([base_url("assets/global/vendor/vue/vue.js")]);
		}
		$this->layout->add_js([base_url("assets/apps.js")]);

		$this->layout->custom_side_bar('main/side_bar');
		$this->layout->render("main/main");
	}

	public function dashboard(){
		$this->load->view('dashboard/index');
	}

	public function surat_keluar(){
		$this->load->view("surat_keluar/index");
	}

	public function surat_masuk(){
		$this->load->view('surat_masuk/index');
	}

	public function undangan_masuk(){
		$this->load->view("undangan/index");
	}

	public function disposisi(){
		$this->load->view("disposisi/index");
	}

	public function data_admin(){
		$this->load->view("data_admin/index");
	}

	public function data_bidang(){
		$this->load->view("data_bidang/index");
	}

}

/* End of file Main.php */
/* Location: ./application/modules/admin/controllers/Main.php */