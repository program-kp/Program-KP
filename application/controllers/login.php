<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function login()
	{
		$this->load->view('login', ['role'=>'Admin'], FALSE);
	}

}

/* End of file login.php */
/* Location: ./application/controllers/login.php */