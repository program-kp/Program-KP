<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Undangan extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model("referensi_bidang_m", "bidang");
		$this->load->model("undangan_m", "surat_undangan");
		if ($this->session->userdata('role') != "Bidang")
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


	function view_data($date = null)
	{
		$id_bidang = $this->session->userdata('id');
		$tgl_filter = date('Y-m-d', strtotime($date));
		$list = $this->surat_undangan->get_data($id_bidang, $tgl_filter);
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


			$row[] = "<div align='center'><button class='btn btn-sm btn-info info' name='info' id='info".$no."' data-value='".$surat_undangan->no_urut."' onClick='info(".$no.")'>Info</button>";

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