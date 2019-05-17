<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Undangan_m extends CI_Model {

	function cek($no_urut = null)
	{
		$this->db->where('no_urut', $no_urut);
		$jumlah = $this->db->count_all_results('tbl_surat_undangan');

		if ($jumlah == 1)
			return true;
		else
			return false;
	}

	function get_data()
	{
		$this->db->select('*');
		$this->db->from('tbl_surat_undangan');
		$this->db->order_by('no_urut', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	function get_data_byID($no_urut)
	{
		$this->db->select('*');
		$this->db->from('tbl_surat_undangan');
		$this->db->where('no_urut', $no_urut);
		$query = $this->db->get();
		return $query->row();
	}

	function update($no_urut, $data)
	{
		$this->db->where("no_urut", $no_urut);
		$this->db->update('tbl_surat_undangan', $data);
	}

	function insert($data)
	{
		$this->db->insert('tbl_surat_undangan', $data);
	}

	function delete($no_urut)
	{       
		$this->db->where('no_urut', $no_urut);
		$query = $this->db->delete('tbl_surat_undangan');
		return $query;
	}

}

/* End of file Undangan_m.php */
/* Location: ./application/modules/admin/models/Undangan_m.php */