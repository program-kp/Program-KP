<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		// $this->load->model("m_users", "users");
		$this->load->helper("form");
		$this->load->model("referensi_bidang_m", "bidang");
		if ($this->session->userdata('role') != "Admin" && $this->session->userdata('role') != "Super")
			redirect('/login/');

	}

	public function index()
	{
		$data['role'] = $this->session->userdata('role');
		$this->load->view('template/header', $data, FALSE);
		$this->load->view('data_master/referensi_bidang/index', FALSE);
		$this->load->view('template/footer', FALSE);
	}

	public function referensi_bidang()
	{
		$this->index();
	}

	public function user_bidang()
	{
		$data['role'] = $this->session->userdata('role');
		$data['ar_bidang'] = $this->bidang->ar_bidang();
		$this->load->view('template/header', $data, FALSE);
		$this->load->view('data_master/user_bidang/index', $data, FALSE);
		$this->load->view('template/footer', FALSE);
	}

}

/* End of file Master.php */
/* Location: ./application/modules/admin/controllers/Master.php */