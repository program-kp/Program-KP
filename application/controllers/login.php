<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		if($this->input->post()){
            $this->session->set_userdata('role','Admin');
            redirect(base_url("admin/main"));
        }
		$this->load->view('login', ['role'=>'Admin'], FALSE);
	}

}

/* End of file login.php */
/* Location: ./application/controllers/login.php */