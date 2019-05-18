<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Surat_masuk_m extends CI_Model {

	function cek($no_urut = null)
	{
		$this->db->where('no_urut', $no_urut);
		$jumlah = $this->db->count_all_results('tbl_surat_masuk');

		if ($jumlah == 1)
			return true;
		else
			return false;
	}

	function get_data($dash = null)
	{
		$date = date("Y-m-d");
		$this->db->select('tbl_surat_masuk.*, (SELECT COUNT(*) FROM tbl_disposisi where tbl_disposisi.no_urut_surat=tbl_surat_masuk.no_urut) as jumlah');
		$this->db->from('tbl_surat_masuk');
		$this->db->order_by('tbl_surat_masuk.no_urut', 'desc');
		if ($dash != null) {
			$this->db->where('tbl_surat_masuk.tgl_terima', $date);
		}
		$query = $this->db->get();
		return $query->result();
	}

	function get_data_byID($no_urut)
	{
		$this->db->select('tbl_surat_masuk.*');
		$this->db->from('tbl_surat_masuk');
		$this->db->where('no_urut', $no_urut);
		$query = $this->db->get();
		return $query->row();
	}

	function count_data_bySurat($no_urut, $id_bidang)
	{
		$this->db->select('COUNT(*) AS jumlah_data');
		$this->db->from('tbl_bidang');
		$this->db->join('tbl_surat_masuk','tbl_surat_masuk.id_bidang=tbl_bidang.id_bidang');
		$this->db->order_by('tbl_surat_masuk.no_urut', 'asc');
		$this->db->where('tbl_bidang.no_urut', $no_urut);
		$this->db->where('tbl_bidang.id_bidang', $id_bidang);
		$query = $this->db->get();
		return $query->row();
	}

	function update($no_urut, $data)
	{
		$this->db->where("no_urut", $no_urut);
		$this->db->update('tbl_surat_masuk', $data);
	}

	function insert($data)
	{
		$this->db->insert('tbl_surat_masuk', $data);
	}

	function delete($no_urut)
	{       
		$this->db->where('no_urut', $no_urut);
		$query = $this->db->delete('tbl_surat_masuk');
		return $query;
	}

}

/* End of file Surat_masuk_m.php */
/* Location: ./application/modules/admin/models/Surat_masuk_m.php */