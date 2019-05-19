<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct()
	{
		parent::__construct();		
		$this->load->model("login_m", "login");
	}

	public function index()
	{
		$this->load->view('login', FALSE);
	}

	function hash($password)
	{
		echo md5($password);
	}

	function cekdata()
	{
		echo "<pre>";
		print_r ($this->login->get_data_byID_join());
		echo "</pre>";

	}

	function cekdata_byID($username, $password)
	{
		
		$user = $username;
		$pass = md5($password);
		$cek = $this->login->cek($user, $pass);
			if ($cek) {

				$data = $this->login->get_data_byID($user, $pass);

				if ($data->id_bidang!=null) {
					$bidang = $this->login->get_nama_bidang($data->id_bidang);					
					echo "<pre>";
					print_r ($bidang);
					echo "</pre>";
				}

				echo "<pre>";
				print_r ($data);
				echo "</pre>";

			} else {
				echo 'tidak ada';
			}
	}

	function cekInput($string)
	{
		$regex = '/[-!$%^&*()+|~=`{}\[\]:";<>?,.\/]/';
		
		if (preg_match($regex, $string, $match)) {
			$this->form_validation->set_message('cekInput', 'Terdapat karakter yang tidak diperbolehkan.');
			return false;
		} else {
			return true;
		}
	}

	function cekPass($password)
	{
		$uname = $this->session->userdata('username');
		$pw = md5($password);
		$result = $this->login->cek($uname, $pw);
		if($result == 0)
		{
			$this->form_validation->set_message('cekPass', 'Password Lama tidak cocok.');
			return FALSE;
		} else {
			return TRUE;
		}
	}

	function datainput()
	{		
			
		
		$this->load->library('form_validation');
		// Set Rule
		$this->form_validation->set_rules('username', 'Username', 'required|trim|callback_cekInput');
		$this->form_validation->set_rules('password', 'Password', 'required|trim|callback_cekInput');

		if ($this->form_validation->run() == FALSE) {

			$validasi = [
				'status' => 'validasi',
				'username' => form_error('username'),
				'password' => form_error('password'),
			];

			echo json_encode($validasi);

		} else {

			$username = $this->input->post('username', TRUE);
			$password = md5($this->input->post('password', TRUE));

			$cek = $this->login->cek($username, $password);
			if ($cek) {

				$user = $this->login->get_data_byID($username, $password);

				$this->session->set_userdata("username",$user->username);
				$this->session->set_userdata("role",$user->role);
				$this->session->set_userdata("id",$user->id_bidang);

				if ($user->role == 'Admin') {

					$this->session->set_userdata("nama",'Admin Surat DKP3');
					$validasi = [
						'status' => 'berhasil',
						'page' => 'admin/dashboard',
					];	

				} else {

					$bidang = $this->login->get_nama_bidang($user->id_bidang);
					$this->session->set_userdata("nama",$bidang->nama_bidang);

					$validasi = [
						'status' => 'berhasil',
						'page' => 'bidang/dashboard',
					];

				}


			} else {

				$validasi = [
					'status' => 'gagal',
					'type_alert' => 'alert-danger',
					'icon' => 'fa fa-ban',
					'text' => 'Anda belum terdaftar.'
				];

			}

			echo json_encode($validasi);
		}
	}

	function ubah_pass()
	{
		$username = $this->session->userdata('username');
		
		$this->load->library('form_validation');
		// Set Rule
		$this->form_validation->set_rules('pass_lama', 'Password Lama', 'required|trim|callback_cekPass');
		$this->form_validation->set_rules('pass_baru', 'Password Baru', 'required|trim|callback_cekInput');
		$this->form_validation->set_rules('c_pass', 'Konfirmasi Password', 'required|trim|callback_cekInput|matches[pass_baru]');

		if ($this->form_validation->run() == FALSE) {

			$validasi = [
				'status' => 'validasi',
				'pass_lama' => form_error('pass_lama'),
				'pass_baru' => form_error('pass_baru'),
				'c_pass' => form_error('c_pass'),				
			];

			echo json_encode($validasi);

		} else {
			
			$password = $this->input->post('pass_baru', TRUE);
			$pass_md5 = md5($password);

			$data = array(
				"password" => $pass_md5,
				"tpass_user" => $password."_".$pass_md5,
			);

			$cek = $this->login->updatePass($username, $data, 'tbl_user');

			if ($cek > 0) {

				$validasi = [
					'type' => 'success',
					'icon' => 'fa fa-check',
					'title' => 'Berhasil',
					'message' => 'Password berhasil diubah.'
				];

			}

			echo json_encode($validasi);
		}
	}

	function logout()
	{
		$this->session->unset_userdata("username");
		$this->session->unset_userdata("nama");
		$this->session->unset_userdata("role");
		$this->session->unset_userdata("id_bidang");

		$this->session->sess_destroy();
		redirect('login','refresh'); 
	}

}

/* End of file login.php */
/* Location: ./application/controllers/login.php */