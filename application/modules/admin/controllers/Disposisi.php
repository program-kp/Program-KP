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
		unlink('fileWord/result.docx');
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

			foreach ($tujuan as $datatujuan) {
				$data = [
					'no_urut_surat' => $no_urut,
					'tipe_surat' => 'Surat Masuk',
					'tgl_disposisi' => date('Y-m-d', strtotime($tgl_disposisi)),
					'tujuan_surat' => $datatujuan,
				];

				$this->disposisi->insert($data);
			}


			$validasi = [
				'type' => 'success',
				'icon' => 'fa fa-check',
				'title' => 'Berhasil',
				'message' => 'Data '.$this->input->post('nama_bidang', TRUE).' Berhasil ditambah.'
			];

			echo json_encode($validasi);
		}
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

			foreach ($tujuan as $datatujuan) {
				$data = [
					'no_urut_undangan' => $no_urut,
					'tipe_surat' => 'Undangan',
					'tgl_disposisi' => date('Y-m-d', strtotime($tgl_disposisi)),
					'tujuan_surat' => $datatujuan,
				];

				$this->disposisi->insert($data);
			}


			$validasi = [
				'type' => 'success',
				'icon' => 'fa fa-check',
				'title' => 'Berhasil',
				'message' => 'Data '.$this->input->post('nama_bidang', TRUE).' Berhasil ditambah.'
			];

			echo json_encode($validasi);
		}
	}
	// END UNDANGAN

}

/* End of file Disposisi.php */
/* Location: ./application/modules/admin/controllers/Disposisi.php */