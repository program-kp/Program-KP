<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_m extends CI_Model {

	// $date5 = date("Y-m-d", strtotime("-1 day"));

	function suratmasuk_now($id)
	{
		$this->db->select('COUNT(*) AS jumlah');
		$this->db->from('tbl_surat_masuk');
		$this->db->join('tbl_disposisi', 'tbl_disposisi.no_urut_surat = tbl_surat_masuk.no_urut');
		$this->db->where('tbl_disposisi.tujuan_surat', $id);
		$this->db->where('tgl_terima', date("Y-m-d"));
		$query = $this->db->get();
		return $query->row();
	}

	function suratmasuk_min1($id)
	{
		$this->db->select('COUNT(*) AS jumlah');
		$this->db->from('tbl_surat_masuk');
		$this->db->join('tbl_disposisi', 'tbl_disposisi.no_urut_surat = tbl_surat_masuk.no_urut');
		$this->db->where('tbl_disposisi.tujuan_surat', $id);
		$this->db->where('tgl_terima', date("Y-m-d", strtotime("-1 day")));
		$query = $this->db->get();
		return $query->row();
	}

	function suratkeluar_now($id)
	{
		$this->db->select('COUNT(*) AS jumlah');
		$this->db->from('tbl_surat_keluar');
		$this->db->where('tgl_surat', date("Y-m-d"));
		$this->db->where('unit_pengolah', $id);
		$query = $this->db->get();
		return $query->row();
	}

	function suratkeluar_min1($id)
	{
		$this->db->select('COUNT(*) AS jumlah');
		$this->db->from('tbl_surat_keluar');
		$this->db->where('tgl_surat', date("Y-m-d", strtotime("-1 day")));
		$this->db->where('unit_pengolah', $id);
		$query = $this->db->get();
		return $query->row();
	}

	function undangan_now($id)
	{
		$this->db->select('COUNT(*) AS jumlah');
		$this->db->from('tbl_surat_undangan');
		$this->db->join('tbl_disposisi', 'tbl_disposisi.no_urut_undangan = tbl_surat_undangan.no_urut');
		$this->db->where('tbl_disposisi.tujuan_surat', $id);
		$this->db->where('tgl_terima', date("Y-m-d"));
		$query = $this->db->get();
		return $query->row();
	}

	function undangan_min1($id)
	{
		$this->db->select('COUNT(*) AS jumlah');
		$this->db->from('tbl_surat_undangan');
		$this->db->join('tbl_disposisi', 'tbl_disposisi.no_urut_undangan = tbl_surat_undangan.no_urut');
		$this->db->where('tbl_disposisi.tujuan_surat', $id);
		$this->db->where('tgl_terima', date("Y-m-d", strtotime("-1 day")));
		$query = $this->db->get();
		return $query->row();
	}

	function disposisi_now()
	{
		$this->db->select('COUNT(*) AS jumlah');
		$this->db->from('tbl_disposisi');
		$this->db->where('tgl_disposisi', date("Y-m-d"));
		$query = $this->db->get();
		return $query->row();
	}

	function disposisi_min1()
	{
		$this->db->select('COUNT(*) AS jumlah');
		$this->db->from('tbl_disposisi');
		$this->db->where('tgl_disposisi', date("Y-m-d", strtotime("-1 day")));
		$query = $this->db->get();
		return $query->row();
	}

}

/* End of file Dashboard_m.php */
/* Location: ./application/modules/admin/models/Dashboard_m.php */