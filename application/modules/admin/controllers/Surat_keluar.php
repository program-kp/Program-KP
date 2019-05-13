<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Surat_keluar extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model("referensi_bidang_m", "bidang");
		$this->load->model("surat_keluar_m", "surat_keluar");
		if ($this->session->userdata('role') != "Admin" && $this->session->userdata('role') != "Super")
			redirect('/login/');
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

	function dataedit($no_surat)
	{
		$cek = $this->bidang->cek($no_surat);
		if ($cek) {
			$data['hasil'] = 'berhasil';
			$data = $this->bidang->get_data_byID($no_surat);
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

	function datahapus($no_surat)
	{
		$cek = $this->bidang->cek($no_surat);
		$data = $this->bidang->get_data_byID($no_surat);
		if ($cek) {

			$this->bidang->delete($no_surat);
			$this->bidang->delete_user($no_surat);

			$validasi = [
				'hasil' => 'berhasil',
				'type' => 'success',
				'icon' => 'fa fa-check',
				'title' => 'Berhasil',
				'message' => 'Data <b>'.$data->nama_bidang.'</b> Berhasil dihapus.'
			];
		} else {
			$validasi = [
				'hasil' => 'gagal',
				'type' => 'danger',
				'icon' => 'fa fa-ban',
				'title' => 'Gagal',
				'message' => 'Data <b>'.$data->nama_bidang.'</b> tidak Tersedia.'
			];
		}
		echo json_encode($validasi);
	}

	function datainput()
	{		
		$this->load->library('form_validation');
		// Set Rule
		$this->form_validation->set_rules('nama_bidang', 'Nama Bidang', 'required|trim|callback_cekInput');
		$this->form_validation->set_rules('nama_kabid', 'Nama Kepala Bidang', 'required|trim|callback_cekInput');

		$no_surat = $this->input->post('id_bidang', TRUE);

		if ($this->form_validation->run() == FALSE) {

			$validasi = [
				'status' => 'validasi',
				'nama_bidang' => form_error('nama_bidang'),
				'nama_kabid' => form_error('nama_kabid'),
			];

			echo json_encode($validasi);

		} else {

			$data = [
				"nama_bidang" => $this->input->post('nama_bidang', TRUE),
				"nama_kabid" => $this->input->post('nama_kabid', TRUE),
			];

			$cek = $this->bidang->cek($no_surat);
			if ($cek) {

				$nama = $this->bidang->get_data_byID($no_surat);
				$this->bidang->update($no_surat, $data);

				$validasi = [
					'type' => 'success',
					'icon' => 'fa fa-check',
					'title' => 'Berhasil',
					'message' => 'Data <b>'.$nama->nama_bidang.'</b> Berhasil diedit.'
				];

			} else {
				$cek = $this->bidang->cek($no_surat);
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
			$row[] = $bidang->nama_kabid;

			$jumlah = $this->bidang->count_data_byBidang($bidang->id_bidang);

			if ($bidang->status_user==1) $row[] = 'Ada';
			else $row[] = 'Belum Ada';


			$row[] = "
			<div align='center'><button class='btn btn-sm btn-info edit' name='edit' id='edit".$no."' data-value='".$bidang->id_bidang."' onClick='edit(".$no.")'>Edit</button>&ensp;<button class='btn btn-sm btn-danger confirm' name='confirm' id='confirm".$no."'  data-value='".$bidang->id_bidang."' data-nama='".$bidang->nama_bidang."' data-kabid='".$bidang->nama_kabid."' data-jumlah='".$jumlah->jumlah_data."' onClick='confirm(".$no.")'>Hapus</button></div>";

			$data[] = $row;
		}

		$output = [
			"data" => $data,
		];

		echo json_encode($output);
	}

}

/* End of file Surat_keluar.php */
/* Location: ./application/modules/admin/controllers/Surat_keluar.php */