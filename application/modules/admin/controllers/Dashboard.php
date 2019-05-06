<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		// $this->load->model("m_users", "users");
		if ($this->session->userdata('role') != "Admin" && $this->session->userdata('role') != "Super")
			redirect('/login/');
	}

	public function index()
	{
		$this->load->view('template/header', FALSE);
		$this->load->view('dashboard/index', FALSE);
		$this->load->view('template/footer', FALSE);
	}

}

/* End of file Dashboard.php */
/* Location: ./application/modules/admin/controllers/Dashboard.php */