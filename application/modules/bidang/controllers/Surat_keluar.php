<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Surat_keluar extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model("referensi_bidang_m", "bidang");
		$this->load->model("surat_keluar_m", "surat_keluar");
		if ($this->session->userdata('role') != "Bidang")
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

	function view_data()
	{
        $id_bidang = $this->session->userdata('id');
		$list = $this->surat_keluar->get_data($id_bidang);
		$data = array();
		$no = 1;
		foreach ($list as $surat_keluar) {
			$row = array();

			$tgl_surat = date('d-m-Y', strtotime($surat_keluar->tgl_surat));

			$row[] = "
			<div align='center'>".$no++.
			"</div>";
			$row[] = $surat_keluar->no_surat;
			$row[] = $tgl_surat;
			$row[] = $surat_keluar->perihal;


			$row[] = "<div align='center'><button class='btn btn-sm btn-info info' name='info' id='info".$no."' data-value='".$surat_keluar->no_urut."' onClick='info(".$no.")'>Info</button></div>";

			$data[] = $row;
		}

		$output = [
			"data" => $data,
		];

        echo json_encode($output);
        // echo $id_bidang;
    }
    
    // function cek()
    // {
    //     echo $this->session->userdata('id');
    // }

}

/* End of file Surat_keluar.php */
/* Location: ./application/modules/bidang/controllers/Surat_keluar.php */