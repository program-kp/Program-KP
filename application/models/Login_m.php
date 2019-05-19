<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_m extends CI_Model {
	

	function cek($username, $password)
	{
		$this->db->where('username', $username);
		$this->db->where('password', $password);
		$jumlah = $this->db->count_all_results('tbl_user');

		if ($jumlah == 1)
			return true;
		else
			return false;
	}

	function get_data_byID($username, $password)
	{
		$this->db->select('*');
		$this->db->from('tbl_user');
		$this->db->where('username', $username);
		$this->db->where('password', $password);
		$query = $this->db->get();
		return $query->row();
	}

	function get_nama_bidang($id_bidang)
	{
		$this->db->select('id_bidang, nama_bidang');
		$this->db->from('tbl_bidang');
		$this->db->where('id_bidang', $id_bidang);
		$query = $this->db->get();
		return $query->row();
	}

	function get_data()
	{
		$query = $this->db->get('tbl_user');
		return $query->result();
	}

	function updatePass($where, $data, $table)
	{
		$this->db->where('username', $where);
		$this->db->update($table,$data);
		return $this->db->affected_rows();
	}

}

/* End of file Login_m.php */
/* Location: ./application/models/Login_m.php */