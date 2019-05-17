<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Undangan extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model("referensi_bidang_m", "bidang");
		$this->load->model("undangan_m", "surat_undangan");
		if ($this->session->userdata('role') != "Admin" && $this->session->userdata('role') != "Super")
			redirect('/login/');
	}

	function getdata()
	{
		echo "<pre>";
		print_r ($this->surat_undangan->get_data());
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

	function dataedit($no_urut)
	{
		$cek = $this->surat_undangan->cek($no_urut);
		if ($cek) {
			$data['hasil'] = 'berhasil';
			$data = $this->surat_undangan->get_data_byID($no_urut);
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

	function datahapus($no_urut)
	{
		$cek = $this->surat_undangan->cek($no_urut);
		$data = $this->surat_undangan->get_data_byID($no_urut);
		if ($cek) {

			$this->surat_undangan->delete($no_urut);

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
		$this->form_validation->set_rules('waktu_undangan', 'Waktu Undangan', 'required|trim');
		$this->form_validation->set_rules('tempat_undangan', 'Tempat Undangan', 'required|trim|callback_cekInput');
		$this->form_validation->set_rules('tgl_terima', 'Tanggal Terima', 'required|trim');

		$no_urut_L = $this->input->post('no_urut_L', TRUE);
		$no_urut = $this->input->post('no_urut', TRUE);

		if ($this->form_validation->run() == FALSE) {

			$validasi = [
				'status' => 'validasi',
				'no_urut' => form_error('no_urut'),
				'no_surat' => form_error('no_surat'),
				'waktu_undangan' => form_error('waktu_undangan'),
				'tempat_undangan' => form_error('tempat_undangan'),
				'tgl_terima' => form_error('tgl_terima'),
			];

			echo json_encode($validasi);

		} else {

			$data = [
				"no_urut" => $this->input->post('no_urut', TRUE),
				"no_surat" => $this->input->post('no_surat', TRUE),
				"waktu_undangan" => date('Y-m-d H:i', strtotime($this->input->post('waktu_undangan', TRUE))),
				"tempat_undangan" => $this->input->post('tempat_undangan', TRUE),
				"tgl_terima" => date('Y-m-d', strtotime($this->input->post('tgl_terima', TRUE))),
			];

			$cek = $this->surat_undangan->cek($no_urut_L);
			if ($cek) {

				$suratId = $this->surat_undangan->get_data_byID($no_urut_L);
				$this->surat_undangan->update($no_urut_L, $data);

				$validasi = [
					'type' => 'success',
					'icon' => 'fa fa-check',
					'title' => 'Berhasil',
					'message' => 'Data <b>'.$suratId->no_surat.'</b> Berhasil diedit.'
				];

			} else {
				$cek = $this->surat_undangan->cek($no_urut);
				if ($cek) {

					$validasi = [
						'type' => 'danger',
						'icon' => 'fa fa-ban',
						'title' => 'Gagal',
						'message' => 'Terdapat Kesalahan pada Inputan Anda.'
					];

				} else {

					$this->surat_undangan->insert($data);

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
		$list = $this->surat_undangan->get_data();
		$data = array();
		$no = 1;
		foreach ($list as $surat_undangan) {
			$row = array();

			$tgl_terima = date('d-m-Y', strtotime($surat_undangan->tgl_terima));
			$waktu_undangan = "Jam <b>".date('h:i', strtotime($surat_undangan->waktu_undangan))."</b>, Tanggal <b>".date('d-m-Y', strtotime($surat_undangan->waktu_undangan))."</b>";

			$row[] = "
			<div align='center'>".$no++.
			"</div>";
			$row[] = $surat_undangan->no_surat;
			$row[] = $waktu_undangan;
			$row[] = $surat_undangan->tempat_undangan;
			if ($surat_undangan->jumlah==0) $row[] = "<div align='center'>Belum</div>";
			else $row[] = "<div align='center'>".$surat_undangan->jumlah."</div>";


			$row[] = "<div align='center'><button class='btn btn-sm btn-info info' name='info' id='info".$no."' data-value='".$surat_undangan->no_urut."' onClick='info(".$no.")'>Info</button>&ensp;<button class='btn btn-sm btn-secondary edit' name='edit' id='edit".$no."' data-value='".$surat_undangan->no_urut."' onClick='edit(".$no.")'>Edit</button>&ensp;<button class='btn btn-sm btn-danger confirm' name='confirm' id='confirm".$no."'  data-value='".$surat_undangan->no_urut."' data-nosurat='".$surat_undangan->no_surat."' data-waktu='".$waktu_undangan."' data-tempat='".$surat_undangan->tempat_undangan."' data-tanggal='".$surat_undangan->tgl_terima."' onClick='confirm(".$no.")'>Hapus</button></div>";

			$data[] = $row;
		}

		$output = [
			"data" => $data,
		];

		echo json_encode($output);
	}

}

/* End of file Undangan.php */
/* Location: ./application/modules/admin/controllers/Undangan.php */