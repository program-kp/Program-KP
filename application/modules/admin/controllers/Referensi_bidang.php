<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Referensi_bidang extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model("referensi_bidang_m", "bidang");
	}

	function getdata()
	{
		echo "<pre>";
		print_r ($this->bidang->get_data());
		echo "</pre>";
	}

	function cekInput($string)
	{
		$regex = '/[-!$%^&*()_+|~=`{}\[\]:";<>?,.\/]/';
		
		if (preg_match($regex, $string, $match)) {
			$this->form_validation->set_message('cekInput', 'Terdapat karakter yang tidak diperbolehkan.');
			return false;
		} else {
			return true;
		}
	}

	function dataedit($id_bidang)
	{
		$cek = $this->bidang->cek($id_bidang);
		if ($cek) {
			$data['hasil'] = 'berhasil';
			$data = $this->bidang->get_data_byID($id_bidang);
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

	function datahapus($id_bidang)
	{
		$cek = $this->bidang->cek($id_bidang);
		if ($cek) {

			$data = $this->bidang->get_data_byID($id_bidang);
			$this->bidang->delete($id_bidang);

			$validasi = [
				'hasil' => 'berhasil',
				'type' => 'success',
				'icon' => 'fa fa-check',
				'title' => 'Berhasil',
				'message' => 'Data '.$data->nama_bidang.' Berhasil dihapus.'
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
		$this->form_validation->set_rules('nama_bidang', 'Nama Bidang', 'required|trim|callback_cekInput');

		$id_bidang = $this->input->post('id_bidang', TRUE);

		if ($this->form_validation->run() == FALSE) {

			$validasi = [
				'status' => 'validasi',
				'nama_bidang' => form_error('nama_bidang'),
			];

			echo json_encode($validasi);

		} else {

			$data = [
				"nama_bidang" => $this->input->post('nama_bidang', TRUE),
			];

			$cek = $this->bidang->cek($id_bidang);
			if ($cek) {

				$nama = $this->bidang->get_data_byID($id_bidang);
				$this->bidang->update($id_bidang, $data);

				$validasi = [
					'type' => 'success',
					'icon' => 'fa fa-check',
					'title' => 'Berhasil',
					'message' => 'Data '.$nama->nama_bidang.' Berhasil diedit.'
				];

			} else {
				$cek = $this->bidang->cek($id_bidang);
				if ($cek) {

					$validasi = [
						'type' => 'danger',
						'icon' => 'fa fa-ban',
						'title' => 'Gagal',
						'message' => 'Terdapat Kesalahan pada Inputan Anda.'
					];

				} else {

					$this->bidang->insert($data);

					$validasi = [
						'type' => 'success',
						'icon' => 'fa fa-check',
						'title' => 'Berhasil',
						'message' => 'Data '.$this->input->post('nama_bidang', TRUE).' Berhasil ditambah.'
					];

				}
			}

			echo json_encode($validasi);
		}
	}

	function view_data()
	{
		$list = $this->bidang->get_data();
		$data = array();
		$no = 1;
		foreach ($list as $bidang) {
			$row = array();

			$row[] = "
			<div align='center'>".$no++.
			"</div>";
			$row[] = $bidang->nama_bidang;

			$row[] = "
			<div align='center'><button class='btn btn-sm btn-info edit' name='edit' id='edit".$no."' data-value='".$bidang->id_bidang."' onClick='edit(".$no.")'>Edit</button>&ensp;<button class='btn btn-sm btn-danger confirm' name='confirm' id='confirm".$no."'  data-value='".$bidang->id_bidang."' data-nama='".$bidang->nama_bidang."' onClick='confirm(".$no.")'>Hapus</button></div>";

			$data[] = $row;
		}

		$output = [
			"data" => $data,
		];

		echo json_encode($output);
	}

}

/* End of file Referensi_bidang.php */
/* Location: ./application/modules/admin/controllers/Referensi_bidang.php */