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
		print_r ($this->surat_keluar->get_data());
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
		$cek = $this->surat_keluar->cek($no_surat);
		if ($cek) {
			$data['hasil'] = 'berhasil';
			$data = $this->surat_keluar->get_data_byID($no_surat);

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
		$cek = $this->surat_keluar->cek($no_surat);
		$data = $this->surat_keluar->get_data_byID($no_surat);
		if ($cek) {

			$this->surat_keluar->delete($no_surat);

			$validasi = [
				'hasil' => 'berhasil',
				'type' => 'success',
				'icon' => 'fa fa-check',
				'title' => 'Berhasil',
				'message' => 'Data <b>'.$data->no_surat.'</b> Berhasil dihapus.'
			];
		} else {
			$validasi = [
				'hasil' => 'gagal',
				'type' => 'danger',
				'icon' => 'fa fa-ban',
				'title' => 'Gagal',
				'message' => 'Data <b>'.$data->no_surat.'</b> tidak Tersedia.'
			];
		}
		echo json_encode($validasi);
	}

	function datainput()
	{		
		$this->load->library('form_validation');
		// Set Rule
		$this->form_validation->set_rules('no_urut', 'Nomor Urut', 'required|trim|callback_cekInput|numeric');
		$this->form_validation->set_rules('no_surat', 'Nomor Surat', 'required|trim');
		$this->form_validation->set_rules('tgl_surat', 'Tanggal Surat', 'required|trim|callback_cekInput');
		$this->form_validation->set_rules('id_bidang', 'Unit Pengolah', 'required|trim|callback_cekInput');
		$this->form_validation->set_rules('perihal', 'Perihal', 'required|trim|callback_cekInput');
		$this->form_validation->set_rules('tujuan_surat', 'Tujuan Surat', 'required|trim|callback_cekInput');
		$this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|callback_cekInput');

		$no_urut_L = $this->input->post('no_urut_L', TRUE);
		$no_urut = $this->input->post('no_urut', TRUE);

		if ($this->form_validation->run() == FALSE) {

			$validasi = [
				'status' => 'validasi',
				'no_urut' => form_error('no_urut'),
				'no_surat' => form_error('no_surat'),
				'tgl-surat' => form_error('tgl-surat'),
				'id_bidang' => form_error('id_bidang'),
				'perihal' => form_error('perihal'),
				'tujuan_surat' => form_error('tujuan_surat'),
				'keterangan' => form_error('keterangan'),
			];

			echo json_encode($validasi);

		} else {

			$data = [
				"no_urut" => $this->input->post('no_urut', TRUE),
				"no_surat" => $this->input->post('no_surat', TRUE),
				"tgl-surat" => $this->input->post('tgl-surat', TRUE),
				"unit_pengolah" => $this->input->post('id_bidang', TRUE),
				"perihal" => $this->input->post('perihal', TRUE),
				"tujuan_surat" => $this->input->post('tujuan_surat', TRUE),
				"keterangan" => $this->input->post('keterangan', TRUE),
			];

			$cek = $this->surat_keluar->cek($no_urut_L);
			if ($cek) {

				$suratId = $this->surat_keluar->get_data_byID($no_urut_L);
				$this->surat_keluar->update($no_surat, $data);

				$validasi = [
					'type' => 'success',
					'icon' => 'fa fa-check',
					'title' => 'Berhasil',
					'message' => 'Data <b>'.$suratId->no_surat.'</b> Berhasil diedit.'
				];

			} else {
				$cek = $this->surat_keluar->cek($no_surat);
				if ($cek) {

					$validasi = [
						'type' => 'danger',
						'icon' => 'fa fa-ban',
						'title' => 'Gagal',
						'message' => 'Terdapat Kesalahan pada Inputan Anda.'
					];

				} else {

					$this->surat_keluar->insert($data);

					$validasi = [
						'type' => 'success',
						'icon' => 'fa fa-check',
						'title' => 'Berhasil',
						'message' => 'Data '.$this->input->post('no_surat', TRUE).' Berhasil ditambah.'
					];

				}
			}

			echo json_encode($validasi);
		}
	}

	function view_data()
	{
		$list = $this->surat_keluar->get_data();
		$data = array();
		$no = 1;
		foreach ($list as $surat_keluar) {
			$row = array();

			$row[] = "
			<div align='center'>".$no++.
			"</div>";
			$row[] = $surat_keluar->no_surat;
			$row[] = $surat_keluar->nama_bidang;
			$row[] = $surat_keluar->tgl_surat;


			$row[] = "
			<div align='center'><button class='btn btn-sm btn-info info' name='info' id='info".$no."' data-value='".$surat_keluar->no_urut."' onClick='info(".$no.")'>Info</button>&ensp;<button class='btn btn-sm btn-secondary edit' name='edit' id='edit".$no."' data-value='".$surat_keluar->no_urut."' onClick='edit(".$no.")'>Edit</button>&ensp;<button class='btn btn-sm btn-danger confirm' name='confirm' id='confirm".$no."'  data-value='".$surat_keluar->no_urut."' data-nosurat='".$surat_keluar->no_surat."' data-unit='".$surat_keluar->nama_bidang."' data-tgl='".$tgl_surat."' data-perihal='".$surat_keluar->perihal."' onClick='confirm(".$no.")'>Hapus</button></div>";

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