<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_bidang extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model("user_bidang_m", "user");
		$this->load->model("referensi_bidang_m", "bidang");
		if ($this->session->userdata('role') != "Admin" && $this->session->userdata('role') != "Super")
			redirect('/login/');
	}

	function getdata()
	{
		echo "<pre>";
		print_r ($this->user->get_data());
		echo "</pre>";
	}

	function count($id_bidang)
	{
		echo "<pre>";
		print_r ($this->user->count_data_byBidang($id_bidang));
		echo "</pre>";
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

	function reset_pass($username)
	{
		$cek = $this->user->cek($username);
		if ($cek) {

			$data_user = $this->user->get_data_byID($username);

			$pass_md5 = md5($username);
			$data = [
				"password" => $pass_md5,
				"tpass_user" => $username."_".$pass_md5,
			];

			$this->user->update($username, $data);

			$validasi = [
				'hasil' => 'berhasil',
				'type' => 'success',
				'icon' => 'fa fa-check',
				'title' => 'Berhasil',
				'message' => 'Password User Bidang <b>'.$data_user->nama_bidang.'</b> Berhasil direset.',
			];

		} else {

			$validasi = [
				'hasil' => 'error',
				'type' => 'danger',
				'icon' => 'fa fa-ban',
				'title' => 'Gagal',
				'message' => 'Terdapat Kesalahan pada Data yang ingin direset.'
			];
		}

		echo json_encode($validasi);
	}

	function dataedit($username)
	{
		$cek = $this->user->cek($username);
		if ($cek) {
			$data['hasil'] = 'berhasil';
			$data = $this->user->get_data_byID($username);
			echo json_encode($data);

		} else {
			$validasi = [
				'hasil' => 'error',
				'type' => 'danger',
				'icon' => 'fa fa-ban',
				'title' => 'Gagal',
				'message' => 'Terdapat Kesalahan pada Data yang ingin diedit.'
			];
			echo json_encode($validasi);
		}
	}

	function datahapus($username)
	{
		$cek = $this->user->cek($username);
		if ($cek) {

			$data = $this->user->get_data_byID($username);
			$this->user->delete($username);

			$status = [
				'status_user' => '0'
			];
			$this->bidang->update($data->id_bidang, $status);

			$validasi = [
				'hasil' => 'berhasil',
				'type' => 'success',
				'icon' => 'fa fa-check',
				'title' => 'Berhasil',
				'message' => 'Data User Bidang <b>'.$data->nama_bidang.'</b> Berhasil dihapus.',
			];
		} else {
			$validasi = [
				'hasil' => 'gagal',
				'type' => 'danger',
				'icon' => 'fa fa-ban',
				'title' => 'Gagal',
				'message' => 'Terdapat Kesalahan pada Data yang ingin dihapus.'
			];
		}
		echo json_encode($validasi);
	}

	function datainput()
	{		
		$this->load->library('form_validation');
		// Set Rule
		$this->form_validation->set_rules('id_bidang', 'Nama Bidang', 'required|trim|callback_cekInput');
		$this->form_validation->set_rules('username', 'Username', 'required|trim|callback_cekInput');
		$this->form_validation->set_rules('password', 'Password', 'required|trim|callback_cekInput');
		$this->form_validation->set_rules('c_password', 'Konfirmasi Password', 'required|trim|callback_cekInput|matches[password]');

		$username_L = $this->input->post('username_L', TRUE);
		$username = $this->input->post('username', TRUE);

		if ($this->form_validation->run() == FALSE) {

			$validasi = [
				'status' => 'validasi',
				'id_bidang' => form_error('id_bidang'),
				'username' => form_error('username'),
				'password' => form_error('password'),
				'c_password' => form_error('c_password'),				
				'ar_bidang' => $this->bidang->ar_bidang(1)
			];

			echo json_encode($validasi);

		} else {
			$id_bidang = $this->input->post('id_bidang', TRUE);
			$password = $this->input->post('password', TRUE);
			$pass_md5 = md5($password);

			$data_bidang = $this->bidang->get_data_byID($id_bidang);

			if ($this->input->post('id_bidang', TRUE)==null) {
				$id_bidang_db = $this->input->post('id_bidang_edit', TRUE);
			} else {
				$id_bidang_db = $this->input->post('id_bidang', TRUE);
			}
			$data = [
				"id_bidang" => $id_bidang_db,
				"username" => $this->input->post('username', TRUE),
				"password" => $pass_md5,
				"tpass_user" => $password."_".$pass_md5,
				"role" => 'Bidang',
			];

			$cek = $this->user->cek($username_L);
			if ($cek) {

				$this->user->update($username_L, $data);

				$validasi = [
					'type' => 'success',
					'icon' => 'fa fa-check',
					'title' => 'Berhasil',
					'message' => 'Data User Bidang <b>'.$data_bidang->nama_bidang.'</b> Berhasil diedit.',
					'ar_bidang' => $this->bidang->ar_bidang(1)
				];

			} else {
				$cek = $this->user->cek($username, $id_bidang);
				if ($cek) {

					$validasi = [
						'type' => 'danger',
						'icon' => 'fa fa-ban',
						'title' => 'Gagal',
						'message' => 'Terdapat Kesalahan pada Inputan Anda.'
					];

				} else {

					$this->user->insert($data);

					$status = [
						'status_user' => '1'
					];
					$this->bidang->update($id_bidang, $status);

					$validasi = [
						'type' => 'success',
						'icon' => 'fa fa-check',
						'title' => 'Berhasil',
						'message' => 'Data User untuk Bidang <b>'.$data_bidang->nama_bidang.'</b> Berhasil ditambah.',
						'ar_bidang' => $this->bidang->ar_bidang(1)
					];

				}
			}

			echo json_encode($validasi);
		}
	}

	function view_data()
	{
		$list = $this->user->get_data();
		$data = array();
		$no = 1;
		foreach ($list as $user) {
			$row = array();

			$row[] = "
			<div align='center'>".$no++.
			"</div>";
			$row[] = $user->nama_bidang;
			$row[] = $user->username;

			$row[] = "
			<div align='center'><button class='btn btn-sm btn-secondary reset' name='reset' id='reset".$no."'  data-value='".$user->username."' data-nama='".$user->nama_bidang."' data-user='".$user->username."' onClick='confirm_reset(".$no.")'>Reset Password</button>&ensp;<button class='btn btn-sm btn-danger confirm' name='confirm' id='confirm".$no."'  data-value='".$user->username."' data-nama='".$user->nama_bidang."' data-user='".$user->username."' onClick='confirm(".$no.")'>Hapus</button></div>";

			$data[] = $row;
		}

		$output = [
			"data" => $data,
		];

		echo json_encode($output);
	}

}

/* End of file User_bidang.php */
/* Location: ./application/modules/admin/controllers/User_bidang.php */