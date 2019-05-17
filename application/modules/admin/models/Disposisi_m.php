<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Disposisi_m extends CI_Model {

	function cek($kode_disposisi = null)
	{
		$this->db->where('kode_disposisi', $kode_disposisi);
		$jumlah = $this->db->count_all_results('tbl_disposisi');

		if ($jumlah == 1)
			return true;
		else
			return false;
	}

	function get_data($get= null)
	{
		$this->db->order_by('nama_bidang', 'asc');
		if ($get!=null) {
			$this->db->where('status_user', 0);
		}
		$query = $this->db->get('tbl_disposisi');
		return $query->result();
	}

	function get_data_byID($kode_disposisi)
	{
		$this->db->select('*');
		$this->db->from('tbl_disposisi');
		$this->db->where('kode_disposisi', $kode_disposisi);
		$query = $this->db->get();
		return $query->row();
	}

	function update($kode_disposisi, $data)
	{
		$this->db->where("kode_disposisi", $kode_disposisi);
		$this->db->update('tbl_disposisi', $data);
	}

	function insert($data)
	{
		$this->db->insert('tbl_disposisi', $data);
	}

	function delete($kode_disposisi)
	{
		$this->db->where('kode_disposisi', $kode_disposisi);
		$query = $this->db->delete('tbl_disposisi');
		return $query;
	}

}

/* End of file Disposisi_m.php */
/* Location: ./application/modules/admin/models/Disposisi_m.php */