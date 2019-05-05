<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		// $this->load->model("m_users", "users");
		$this->load->helper("form");
		if ($this->session->userdata('role') != "Admin")
			redirect('/login/');
	}

	public function index()
	{
		$data['role'] = 'Admin';
		$this->load->view('template/header', $data, FALSE);
		$this->load->view('data_master/data_admin/index', FALSE);
		$this->load->view('template/footer', FALSE);
	}

	public function admin()
	{
		$this->index();
	}

	public function referensi_bidang()
	{
		$data['role'] = 'Admin';
		$this->load->view('template/header', $data, FALSE);
		$this->load->view('data_master/referensi_bidang/index', FALSE);
		$this->load->view('template/footer', FALSE);
	}

	public function admin_bidang()
	{
		$data['role'] = 'Admin';
		$this->load->view('template/header', $data, FALSE);
		$this->load->view('data_master/referensi_bidang/index', FALSE);
		$this->load->view('template/footer', FALSE);
	}

}

/* End of file Master.php */
/* Location: ./application/modules/admin/controllers/Master.php */