<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function index()
	{
		$data['role'] = 'Admin';
		$this->load->view('template/header', $data, FALSE);
		$this->load->view('dashboard/index', FALSE);
		$this->load->view('template/footer', FALSE);
	}

}

/* End of file Dashboard.php */
/* Location: ./application/modules/admin/controllers/Dashboard.php */