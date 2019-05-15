<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Surat extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		// $this->load->model("m_users", "users");
		$this->load->helper("form");
		if ($this->session->userdata('role') != "Bidang")
			redirect('/login/');
	}

	public function index()
	{		
		$data['role'] = 'Bidang';
		$this->load->view('template/header', $data, FALSE);
		$this->load->view('surat_masuk/index', FALSE);
		$this->load->view('template/footer', FALSE);
	}

	public function surat_masuk()
	{		
		$this->index();
	}

	public function undangan()
	{		
		$data['role'] = 'Bidang';
		$this->load->view('template/header', $data, FALSE);
		$this->load->view('undangan/index', FALSE);
		$this->load->view('template/footer', FALSE);
	}

	public function surat_keluar()
	{		
		$data['role'] = 'Bidang';
		$this->load->view('template/header', $data, FALSE);
		$this->load->view('surat_keluar/index', FALSE);
		$this->load->view('template/footer', FALSE);
	}

	public function disposisi()
	{		
		$data['role'] = 'Bidang';
		$this->load->view('template/header', $data, FALSE);
		$this->load->view('surat/disposisi/index', FALSE);
		$this->load->view('template/footer', FALSE);
	}

}

/* End of file Surat.php */
/* Location: ./application/modules/admin/controllers/Surat.php */