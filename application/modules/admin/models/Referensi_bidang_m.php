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

	function get_data($get= null)
	{
		$this->db->order_by('nama_bidang', 'asc');
		if ($get!=null) {
			$this->db->where('status_user', 0);
		}
		$query = $this->db->get('tbl_bidang');
		return $query->result();
	}

	function ar_bidang($a = null)
	{
		$data = $this->get_data(1);
		if ($a == null) {
			$list[''] = "-- Pilih --";
			foreach ($data as $row){
				$list[$row->id_bidang] = $row->nama_bidang;
			}
			return $list;
		} else {
			$list="<option value=''>-- Pilih --</option>";
			foreach ($data as $row){
				$list.="<option value='".$row->id_bidang."'>".$row->nama_bidang."</option>";
			}
			return $list;
		}
	}

	function ar_bidang_admin()
	{
		$data = $this->get_data();
		$list[''] = "-- Pilih --";
		foreach ($data as $row){
			$list[$row->id_bidang] = $row->nama_bidang;
		}
		return $list;
	}

	function get_data_byID($id_bidang)
	{
		$this->db->select('*');
		$this->db->from('tbl_bidang');
		$this->db->where('id_bidang', $id_bidang);
		$query = $this->db->get();
		return $query->row();
	}

	function count_data_byBidang($id_bidang)
	{
		$this->db->select('COUNT(*) AS jumlah_data');
		$this->db->from('tbl_user');
		$this->db->join('tbl_bidang','tbl_bidang.id_bidang=tbl_user.id_bidang');
		$this->db->order_by('tbl_bidang.nama_bidang', 'asc');
		$this->db->where('tbl_user.id_bidang', $id_bidang);
		// $this->db->group_by("tbl_user.id_bidang");
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

	function delete_user($id_bidang)
	{
		$this->db->where('id_bidang', $id_bidang);
		$query = $this->db->delete('tbl_user');
		return $query;
	}

}

/* End of file Referensi_bidang_m.php */
/* Location: ./application/modules/admin/models/Referensi_bidang_m.php */