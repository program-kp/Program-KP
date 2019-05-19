<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Surat_masuk extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model("referensi_bidang_m", "bidang");
		$this->load->model("surat_masuk_m", "surat_masuk");
		if ($this->session->userdata('role') != "Bidang")
			redirect('/login/');
    }
    
    function dataedit($no_urut)
	{
		$cek = $this->surat_masuk->cek($no_urut);
		if ($cek) {
			$data['hasil'] = 'berhasil';
			$data = $this->surat_masuk->get_data_byID($no_urut);
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

	function getdata()
	{
		echo "<pre>";
		print_r ($this->surat_masuk->get_data());
		echo "</pre>";
	}

	function view_data($date = null)
	{
		$id_bidang = $this->session->userdata('id');
		$tgl_filter = date('Y-m-d', strtotime($date));
		$list = $this->surat_masuk->get_data($id_bidang, $tgl_filter);
		$data = array();
		$no = 1;
		foreach ($list as $surat_masuk) {
			$row = array();

			$tgl_surat = date('d-m-Y', strtotime($surat_masuk->tgl_surat));
			$tgl_terima = date('d-m-Y', strtotime($surat_masuk->tgl_terima));

			$row[] = "<div align='center'>".$no++."</div>";
			$row[] = $surat_masuk->no_surat;
			$row[] = $surat_masuk->asal_surat;
			$row[] = $tgl_terima;


			$row[] = "<div align='center'><button class='btn btn-sm btn-info info' name='info' id='info".$no."' data-value='".$surat_masuk->no_urut."' onClick='info(".$no.")'>Info</button>";

			$data[] = $row;
		}

		$output = [
			"data" => $data,
		];

		echo json_encode($output);
	}

}

/* End of file Surat_masuk.php */
/* Location: ./application/modules/bidang/controllers/Surat_masuk.php */