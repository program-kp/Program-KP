<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Temp extends CI_Controller {

	public function index()
	{
		$data['role'] = 'Admin';
		$this->load->view('template/main', $data, FALSE);
	}

}

/* End of file temp.php */
/* Location: ./application/controllers/temp.php */