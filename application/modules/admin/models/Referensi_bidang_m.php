<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Referensi_bidang_m extends CI_Model {

	function cek($id_bidang = null)
	{
		$this->db->where('id_bidang', $id_bidang);
		$jumlah = $this->db->count_all_results('tbl_bidang');

		if ($jumlah == 1)
			return true;
		else
			return false;
	}

	function get_data()
	{
		$this->db->order_by('nama_bidang', 'asc');
		$query = $this->db->get('tbl_bidang');
		return $query->result();
	}

	function get_data_byID($id_bidang)
	{
		$this->db->select('*');
		$this->db->from('tbl_bidang');
		$this->db->where('id_bidang', $id_bidang);
		$query = $this->db->get();
		return $query->row();
	}

	function update($id_bidang, $data)
	{
		$this->db->where("id_bidang", $id_bidang);
		$this->db->update('tbl_bidang', $data);
	}

	function insert($data)
	{
		$this->db->insert('tbl_bidang', $data);
	}

	function delete($id_bidang)
	{
		$this->db->where('id_bidang', $id_bidang);
		$query = $this->db->delete('tbl_bidang');
		return $query;
	}

}

/* End of file Referensi_bidang_m.php */
/* Location: ./application/modules/admin/models/Referensi_bidang_m.php */