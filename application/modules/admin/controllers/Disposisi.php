<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Disposisi extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model("referensi_bidang_m", "bidang");
		$this->load->model("surat_masuk_m", "surat_masuk");
		$this->load->model("disposisi_m", "disposisi");
		$this->load->library('Word');
		if ($this->session->userdata('role') != "Admin" && $this->session->userdata('role') != "Super")
			redirect('/login/');
	}

	function surat_masuk()
	{
		$data['ar_bidang'] = $this->bidang->ar_bidang_admin();
		$this->load->view('template/header', $data, FALSE);
		$this->load->view('surat/disposisi/surat_masuk', FALSE);
		$this->load->view('template/footer', FALSE);

	}

	function undangan()
	{
		$data['ar_bidang'] = $this->bidang->ar_bidang_admin();
		$this->load->view('template/header', $data, FALSE);
		$this->load->view('surat/disposisi/undangan', FALSE);
		$this->load->view('template/footer', FALSE);

	}

	function datainput()
	{
		echo "<pre>";
		print_r ($this->input->post());
		echo "</pre>";
	}

	// SURAT MASUK
	function getWord_surat($no_urut)
	{
		$data = $this->surat_masuk->get_data_byID($no_urut);
		if (file_exists("fileWord/disposisi.docx")) unlink("fileWord/disposisi.docx");

		$word = new \PhpOffice\PhpWord\TemplateProcessor('fileWord/template_disposisi.docx'); 
		$word->setValue('perihal', $data->perihal);
		$word->setValue('surat_dari', $data->asal_surat);
		$word->setValue('tgl_surat', $data->tgl_terima);
		$word->setValue('nosurat', $data->no_surat);
		$word->setValue('tgl_terima', 'Tanggal Terima');
		$word->setValue('nourut', 'Nomor Urut');
		$word->saveAs('fileWord/disposisi.docx');


		$this->load->helper('download');
		force_download('fileWord/disposisi.docx', NULL);
		unlink('fileWord/disposisi.docx');
	}

	function datainput_surat()
	{
		$this->load->library('form_validation');
		// Set Rule
		$this->form_validation->set_rules('tgl_disposisi', 'Tanggal Disposisi', 'required|trim');

		if ($this->form_validation->run() == FALSE) {

			$validasi = [
				'status' => 'validasi',
				'tgl_disposisi' => form_error('tgl_disposisi'),
			];

			echo json_encode($validasi);

		} else {

			$tgl_disposisi = $this->input->post('tgl_disposisi', TRUE);
			$tujuan = $this->input->post('tujuan', TRUE);
			$no_urut = $this->input->post('nosurat_disposisi', TRUE);

			$data_surat = $this->surat_masuk->get_data_byID($no_urut);

			$data = array();
			$validasi = array();
			$total = 0;
			$gagal = 0;
			$berhasil = 0;
			foreach ($tujuan as $datatujuan) {

				if ($this->disposisi->cek($datatujuan, $no_urut, '')) $gagal+=1;					
				else {

					$data = [
						'no_urut_surat' => $no_urut,
						'tipe_surat' => 'Surat Masuk',
						'tgl_disposisi' => date('Y-m-d', strtotime($tgl_disposisi)),
						'tujuan_surat' => $datatujuan,
					];

					$this->disposisi->insert($data);
					$berhasil+=1;

				}
				$total++;

			}


			$validasi = [
				'type' => 'success',
				'icon' => 'fa fa-check',
				'title' => 'Berhasil',
				'message' => $berhasil.' dari '.$total.' data Disposisi berhasil ditambahkan, '.$gagal.' data Gagal'
			];

			echo json_encode($validasi);
		}
	}

	function view_data_surat($id_bidang = null)
	{
		$list = $this->disposisi->get_data($id_bidang);
		$data = array();
		$no = 1;
		foreach ($list as $disposisi) {
			$row = array();

			$tgl_terima = date('d-m-Y', strtotime($disposisi->tgl_terima));

			$row[] = "<div align='center'>".$no++."</div>";
			$row[] = $disposisi->no_surat;
			$row[] = $tgl_terima;
			$row[] = $disposisi->nama_bidang;


			$row[] = "<div align='center'><button class='btn btn-sm btn-info info' name='info' id='info".$no."' data-value='".$disposisi->kode_disposisi."' onClick='info(".$no.")'>Info</button>&ensp;<button class='btn btn-sm btn-secondary edit' name='edit' id='edit".$no."' data-value='".$disposisi->kode_disposisi."' onClick='edit(".$no.")'>Edit</button>&ensp;<button class='btn btn-sm btn-danger confirm' name='confirm' id='confirm".$no."'  data-value='".$disposisi->kode_disposisi."' data-nosurat='".$disposisi->no_surat."' data-tgl_terima='".$tgl_terima."' data-bidang='".$disposisi->nama_bidang."' onClick='confirm(".$no.")'>Hapus</button></div>";

			$data[] = $row;
		}

		$output = [
			"data" => $data,
		];

		echo json_encode($output);
	}
	// END SURAT MASUK

	// UNDANGAN	
	function datainput_undangan()
	{
		$this->load->library('form_validation');
		// Set Rule
		$this->form_validation->set_rules('tgl_disposisi', 'Tanggal Disposisi', 'required|trim');

		if ($this->form_validation->run() == FALSE) {

			$validasi = [
				'status' => 'validasi',
				'tgl_disposisi' => form_error('tgl_disposisi'),
			];

			echo json_encode($validasi);

		} else {

			$tgl_disposisi = $this->input->post('tgl_disposisi', TRUE);
			$tujuan = $this->input->post('tujuan', TRUE);
			$no_urut = $this->input->post('nosurat_disposisi', TRUE);

			$data_surat = $this->surat_masuk->get_data_byID($no_urut);

			$data = array();
			$validasi = array();
			$total = 0;
			$gagal = 0;
			$berhasil = 0;

			foreach ($tujuan as $datatujuan) {

				if ($this->disposisi->cek($datatujuan, '', $no_urut)) $gagal+=1;					
				else {

					$data = [
						'no_urut_undangan' => $no_urut,
						'tipe_surat' => 'Undangan',
						'tgl_disposisi' => date('Y-m-d', strtotime($tgl_disposisi)),
						'tujuan_surat' => $datatujuan,
					];

					$this->disposisi->insert($data);
					$berhasil+=1;

				}
				$total++;
			}


			$validasi = [
				'type' => 'success',
				'icon' => 'fa fa-check',
				'title' => 'Berhasil',
				'message' => $berhasil.' dari '.$total.' data Disposisi berhasil ditambahkan, '.$gagal.' data Gagal'
			];

			echo json_encode($validasi);
		}
	}
	// END UNDANGAN

}

/* End of file Disposisi.php */
/* Location: ./application/modules/admin/controllers/Disposisi.php */