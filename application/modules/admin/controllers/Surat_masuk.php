<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Surat_masuk extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model("referensi_bidang_m", "bidang");
		$this->load->model("surat_masuk_m", "surat_masuk");
		$this->load->library('Word');

		if ($this->session->userdata('role') != "Admin" && $this->session->userdata('role') != "Super")
			redirect('/login/');
	}

	function getdata()
	{
		echo "<pre>";
		print_r ($this->surat_masuk->get_data());
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

	function datahapus($no_urut)
	{
		$cek = $this->surat_masuk->cek($no_urut);
		$data = $this->surat_masuk->get_data_byID($no_urut);
		if ($cek) {

			$this->surat_masuk->delete($no_urut);

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
		$this->form_validation->set_rules('asal_surat', 'Asal Surat', 'required|trim|callback_cekInput');
		$this->form_validation->set_rules('perihal', 'Perihal', 'required|trim|callback_cekInput');
		$this->form_validation->set_rules('tgl_terima', 'Tanggal Terima', 'required|trim');
		$this->form_validation->set_rules('tgl_surat', 'Tanggal Surat', 'required|trim');

		$no_urut_L = $this->input->post('no_urut_L', TRUE);
		$no_urut = $this->input->post('no_urut', TRUE);

		if ($this->form_validation->run() == FALSE) {

			$validasi = [
				'status' => 'validasi',
				'no_urut' => form_error('no_urut'),
				'no_surat' => form_error('no_surat'),
				'asal_surat' => form_error('asal_surat'),
				'perihal' => form_error('perihal'),
				'tgl_terima' => form_error('tgl_terima'),
				'tgl_surat' => form_error('tgl_surat'),
			];

			echo json_encode($validasi);

		} else {

			$data = [
				"no_urut" => $this->input->post('no_urut', TRUE),
				"no_surat" => $this->input->post('no_surat', TRUE),
				"asal_surat" => $this->input->post('asal_surat', TRUE),
				"perihal" => $this->input->post('perihal', TRUE),
				"tgl_terima" => date('Y-m-d', strtotime($this->input->post('tgl_terima', TRUE))),
				"tgl_surat" => date('Y-m-d', strtotime($this->input->post('tgl_surat', TRUE))),
			];

			$cek = $this->surat_masuk->cek($no_urut_L);
			if ($cek) {

				$suratId = $this->surat_masuk->get_data_byID($no_urut_L);
				$this->surat_masuk->update($no_urut_L, $data);

				$validasi = [
					'type' => 'success',
					'icon' => 'fa fa-check',
					'title' => 'Berhasil',
					'message' => 'Data <b>'.$suratId->no_surat.'</b> Berhasil diedit.'
				];

			} else {
				$cek = $this->surat_masuk->cek($no_urut);
				if ($cek) {

					$validasi = [
						'type' => 'danger',
						'icon' => 'fa fa-ban',
						'title' => 'Gagal',
						'message' => 'Terdapat Kesalahan pada Inputan Anda.'
					];

				} else {

					$this->surat_masuk->insert($data);

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

	function view_data($date = null)
	{
		$tgl_filter = date('Y-m-d', strtotime($date));
		$list = $this->surat_masuk->get_data($tgl_filter);
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
			if ($surat_masuk->jumlah==0) $row[] = "<div align='center'>Belum</div>";
			else $row[] = "<div align='center'>".$surat_masuk->jumlah."</div>";


			$row[] = "<div align='center'><button class='btn btn-sm btn-info info' name='info' id='info".$no."' data-value='".$surat_masuk->no_urut."' onClick='info(".$no.")'>Info</button>&ensp;<button class='btn btn-sm btn-secondary edit' name='edit' id='edit".$no."' data-value='".$surat_masuk->no_urut."' onClick='edit(".$no.")'>Edit</button>&ensp;<button class='btn btn-sm btn-danger confirm' name='confirm' id='confirm".$no."'  data-value='".$surat_masuk->no_urut."' data-nosurat='".$surat_masuk->no_surat."' data-asal='".$surat_masuk->asal_surat."' data-tgl_surat='".$tgl_surat."' data-tgl_terima='".$tgl_terima."' data-perihal='".$surat_masuk->perihal."' onClick='confirm(".$no.")'>Hapus</button></div>";

			$data[] = $row;
		}

		$output = [
			"data" => $data,
		];

		echo json_encode($output);
	}

	function test_laporan($bulan)
	{
		echo "<pre>";
		print_r ($this->surat_masuk->disposisi($bulan));
		echo "</pre>";
	}

	function laporan_test()
	{
		echo "<pre>";
		print_r ($this->input->post());
		echo "</pre>";
	}

	function laporan($bulan, $tahun)
	{

		$data = $this->surat_masuk->laporan($bulan);
		if (file_exists("fileWord/laporan_surat_masuk.docx")) unlink("fileWord/laporan_surat_masuk.docx");

		$BulanIndoFULL = array("JANUARI", "FEBRUARI", "MARET", "APRIL", "MEI", "JUNI", "JULI", "AGUSTUS", "SEPTEMBER", "OKTOBER", "NOVEMBER", "DESEMBER");

		$word = new \PhpOffice\PhpWord\TemplateProcessor('fileWord/template_laporan_surat_masuk.docx');
		$word->setValue('bulan', $BulanIndoFULL[(int)$bulan-1]);
		$word->setValue('tahun', $tahun);
		$word->cloneRow('nourut', count($data));

		$no = 0;
		foreach($data as $row) {
			$no+=1;

			$BulanIndo = array("Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Ags", "Sep", "Okt", "Nov", "Des");

			$bulan = substr($row->tgl_surat, 5, 2);
			$tgl   = substr($row->tgl_surat, 8, 2);

			$tgl_surat = $tgl . " " . $BulanIndo[(int)$bulan-1] . " ". $tahun;

			$tujuan = array();
			$tgl_dis = '';

			$dis = $this->surat_masuk->disposisi($row->no_urut);

			foreach ($dis as $row2) {

				$bulan = substr($row2->tgl_disposisi, 5, 2);
				$tgl   = substr($row2->tgl_disposisi, 8, 2);

				$tgl_dis = $tgl . " " . $BulanIndo[(int)$bulan-1] . " ". $tahun;
				$tujuan[] = $row2->nama_bidang;
			};

			$word->setValue('nourut#'.($no), $row->no_urut);
			$word->setValue('asal_surat#'.($no), $row->asal_surat);
			$word->setValue('nosurat#'.($no), $row->no_surat);
			$word->setValue('tgl_surat#'.($no), $tgl_surat);
			$word->setValue('perihal#'.($no), $row->perihal);
			$word->setValue('tujuan#'.($no), implode(',',$tujuan));
			$word->setValue('tgl_disposisi#'.($no), $tgl_dis);
			unset($tujuan);
			$tujuan = array();
		}

		$word->saveAs('fileWord/laporan_surat_masuk.docx');

		$this->load->helper('download');
		force_download('fileWord/laporan_surat_masuk.docx', NULL);
		unlink("fileWord/laporan_surat_masuk.docx");
	}

}

/* End of file Surat_masuk.php */
/* Location: ./application/modules/admin/controllers/Surat_masuk.php */