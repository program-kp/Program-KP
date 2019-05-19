<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model("referensi_bidang_m", "bidang");
		$this->load->model("surat_masuk_m", "surat_masuk");
		$this->load->model("undangan_m", "undangan");
		$this->load->model("disposisi_m", "disposisi");
		$this->load->model("dashboard_m", "dashboard");
		$this->load->library('Word');
		if ($this->session->userdata('role') != "Admin" && $this->session->userdata('role') != "Super")
			redirect('/login/');
	}

	function index()
	{
		$sm_n = $this->dashboard->suratmasuk_now()->jumlah;
		$sm_1 = $this->dashboard->suratmasuk_min1()->jumlah;
		$sk_n = $this->dashboard->suratkeluar_now()->jumlah;
		$sk_1 = $this->dashboard->suratkeluar_min1()->jumlah;
		$u_n = $this->dashboard->undangan_now()->jumlah;
		$u_1 = $this->dashboard->undangan_min1()->jumlah;
		$d_n = $this->dashboard->disposisi_now()->jumlah;
		$d_1 = $this->dashboard->disposisi_min1()->jumlah;

		if ($sm_n>=$sm_1) {$icon_sm = 'md-long-arrow-up green-500'; $selisih_sm = $sm_n-$sm_1;}
		else {$icon_sm = 'md-long-arrow-down red-500'; $selisih_sm = $sm_1-$sm_n;}

		if ($sk_n>=$sk_1) {$icon_sk = 'md-long-arrow-up green-500'; $selisih_sk = $sk_n-$sk_1;}
		else {$icon_sk = 'md-long-arrow-down red-500'; $selisih_sk = $sk_1-$sk_n;}

		if ($u_n>=$u_1) {$icon_u = 'md-long-arrow-up green-500'; $selisih_u = $u_n-$u_1;}
		else {$icon_u = 'md-long-arrow-down red-500'; $selisih_u = $u_1-$u_n;}

		if ($d_n>=$d_1) {$icon_d = 'md-long-arrow-up green-500'; $selisih_d = $d_n-$d_1;}
		else {$icon_d = 'md-long-arrow-down red-500'; $selisih_d = $d_1-$d_n;}

		$data = [
			'suratmasuk_now' => $sm_n,
			'suratmasuk_selisih' => $selisih_sm,
			'suratmasuk_icon' => $icon_sm,

			'suratkeluar_now' => $sk_n,
			'suratkeluar_selisih' => $selisih_sk,
			'suratkeluar_icon' => $icon_sk,

			'undangan_now' => $u_n,
			'undangan_selisih' => $selisih_u,
			'undangan_icon' => $icon_u,

			'disposisi_now' => $d_n,
			'disposisi_selisih' => $selisih_d,
			'disposisi_icon' => $icon_d,
		];

		$this->load->view('template/header', FALSE);
		$this->load->view('dashboard/index', $data, FALSE);
		$this->load->view('template/footer', FALSE);
	}

	function get()
	{
		echo "<pre>";
		print_r ($this->dashboard->suratmasuk_now());
		echo "</pre>";
		echo "<pre>";
		print_r ($this->dashboard->suratmasuk_min1());
		echo "</pre>";
	}

	function view_jadwal()
	{
		$list = $this->undangan->get_data_jadwal();
		$data = array();
		$no = 1;
		foreach ($list as $undangan) {
			$row = array();
			$row2 = array();

			$data_hadir = $this->undangan->get_hadir($undangan->no_urut);

			foreach ($data_hadir as $hadir) {
				$row2[] = ' '.$hadir->nama_bidang;
			}

			$waktu_undangan = "Jam <b>".date('h:i', strtotime($undangan->waktu_undangan))."</b>, Tanggal <b>".date('d-m-Y', strtotime($undangan->waktu_undangan))."</b>";

			$row[] = "<div align='center'>".$no++."</div>";
			$row[] = $waktu_undangan;
			$row[] = $undangan->tempat_undangan;
			$row[] = $undangan->uraian;
			$row[] = $row2;

			$data[] = $row;
		}

		$output = [
			"data" => $data,
		];

		echo json_encode($output);
	}

	function view_surat()
	{
		$list = $this->surat_masuk->get_data();
		$data = array();
		$no = 1;
		foreach ($list as $surat_masuk) {
			$row = array();

			$row[] = "<div align='center'>".$no++."</div>";
			$row[] = "<a href='javascript:void(0)' onclick='info_surat(".$no.")' name='info_surat' id='info_surat".$no."' data-value='".$surat_masuk->no_urut."'>".$surat_masuk->no_surat."</a>";
			$row[] = $surat_masuk->asal_surat;
			
			if ($surat_masuk->jumlah==0) $row[] = "<div align='center'>Belum</div>";
			else $row[] = "<div align='center'><a href='javascript:void(0)' onclick='info_surat_dis(".$no.")' name='info_surat_dis' id='info_surat_dis".$no."' data-value='".$surat_masuk->no_urut."'>".$surat_masuk->jumlah."</a></div>";

			$data[] = $row;
		}

		$output = [
			"data" => $data,
		];

		echo json_encode($output);
	}

	function view_undangan()
	{
		$list = $this->undangan->get_data();
		$data = array();
		$no = 1;
		foreach ($list as $undangan) {
			$row = array();

			$row[] = "<div align='center'>".$no++."</div>";
			$row[] = "<a href='javascript:void(0)' onclick='info_undangan(".$no.")' name='info_undangan' id='info_undangan".$no."' data-value='".$undangan->no_urut."'>".$undangan->no_surat."</a>";
			$row[] = $undangan->tempat_undangan;
			if ($undangan->jumlah==0) $row[] = "<div align='center'>Belum</div>";
			else $row[] = "<div align='center'><a href='javascript:void(0)' onclick='info_undangan_dis(".$no.")' name='info_undangan_dis' id='info_undangan_dis".$no."' data-value='".$undangan->no_urut."'>".$undangan->jumlah."</a></div>";

			$data[] = $row;
		}

		$output = [
			"data" => $data,
		];

		echo json_encode($output);
	}

	function view_undangan_dis($nourut = null)
	{
		$list = $this->disposisi->get_data_undangan_dash($nourut);
		$data = array();
		$no = 1;
		foreach ($list as $disposisi) {
			$row = array();

			$tgl_disposisi = date('d-m-Y', strtotime($disposisi->tgl_disposisi));

			$row[] = "<div align='center'>".$no++."</div>";
			$row[] = $disposisi->no_surat;
			$row[] = $disposisi->nama_bidang;
			$row[] = $tgl_disposisi;

			$data[] = $row;
		}

		$output = [
			"data" => $data,
		];

		echo json_encode($output);
	}

	function view_surat_dis($nourut = null)
	{
		$list = $this->disposisi->get_data_surat_dash($nourut);
		$data = array();
		$no = 1;
		foreach ($list as $disposisi) {
			$row = array();

			$tgl_disposisi = date('d-m-Y', strtotime($disposisi->tgl_disposisi));

			$row[] = "<div align='center'>".$no++."</div>";
			$row[] = $disposisi->no_surat;
			$row[] = $disposisi->nama_bidang;
			$row[] = $tgl_disposisi;

			$data[] = $row;
		}

		$output = [
			"data" => $data,
		];

		echo json_encode($output);
	}

}

/* End of file Dashboard.php */
/* Location: ./application/modules/admin/controllers/Dashboard.php */