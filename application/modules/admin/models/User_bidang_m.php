<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_bidang_m extends CI_Model {

	function cek($username, $id_bidang = null)
	{
		if ($id_bidang!=null) {
			$this->db->where('id_bidang', $id_bidang);
			$this->db->or_where('username', $username);
		} else {
			$this->db->where('username', $username);
		}
		$jumlah = $this->db->count_all_results('tbl_user');

		if ($jumlah == 1)
			return true;
		else
			return false;
	}

	function get_data()
	{
		$this->db->select('tbl_user.*, tbl_bidang.nama_bidang');
		$this->db->from('tbl_user');
		$this->db->join('tbl_bidang','tbl_bidang.id_bidang=tbl_user.id_bidang');
		$this->db->order_by('tbl_bidang.nama_bidang', 'asc');
		// $this->db->where('tbl_user.id_bidang', $id_kel);
		$query = $this->db->get();
		return $query->result();
	}

	function get_data_byID($username)
	{
		$this->db->select('tbl_user.*, tbl_bidang.*');
		$this->db->from('tbl_user');
		$this->db->join('tbl_bidang','tbl_bidang.id_bidang=tbl_user.id_bidang');
		$this->db->order_by('tbl_bidang.nama_bidang', 'asc');
		$this->db->where('tbl_user.username', $username);
		$query = $this->db->get();
		return $query->row();
	}

	function update($username, $data)
	{
		$this->db->where("username", $username);
		$this->db->update('tbl_user', $data);
	}

	function insert($data)
	{
		$this->db->insert('tbl_user', $data);
	}

	function delete($username)
	{
		$this->db->where('username', $username);
		$query = $this->db->delete('tbl_user');
		return $query;
	}
}

/* End of file User_bidang_m.php */
/* Location: ./application/modules/admin/models/User_bidang_m.php */