<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Surat_keluar_m extends CI_Model {

	function cek($no_surat = null)
	{
		$this->db->where('no_surat', $no_surat);
		$jumlah = $this->db->count_all_results('tbl_surat_keluar');

		if ($jumlah == 1)
			return true;
		else
			return false;
	}

	function get_data()
	{
		$this->db->order_by('no_urut', 'asc');
		$query = $this->db->get('tbl_surat_keluar');
		return $query->result();
	}

	function get_data_byID($no_surat)
	{
		$this->db->select('*');
		$this->db->from('tbl_surat_keluar');
		$this->db->where('no_surat', $no_surat);
		$query = $this->db->get();
		return $query->row();
	}

	function count_data_bySurat($no_surat, $id_bidang)
	{
		$this->db->select('COUNT(*) AS jumlah_data');
		$this->db->from('tbl_bidang');
		$this->db->join('tbl_surat_keluar','tbl_surat_keluar.id_bidang=tbl_bidang.id_bidang');
		$this->db->order_by('tbl_surat_keluar.no_urut', 'asc');
		$this->db->where('tbl_bidang.no_surat', $no_surat);
		$this->db->where('tbl_bidang.id_bidang', $id_bidang);
		$query = $this->db->get();
		return $query->row();
	}

	function update($no_surat, $data)
	{
		$this->db->where("no_surat", $no_surat);
		$this->db->update('tbl_surat_keluar', $data);
	}

	function insert($data)
	{
		$this->db->insert('tbl_surat_keluar', $data);
	}

	function delete($no_surat)
	{
		$this->db->where('no_surat', $no_surat);
		$query = $this->db->delete('tbl_surat_keluar');
		return $query;
	}

}

/* End of file Surat_keluar_m.php */
/* Location: ./application/modules/admin/models/Surat_keluar_m.php */