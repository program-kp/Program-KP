<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Surat_keluar_m extends CI_Model {

	function cek($no_urut = null)
	{
		$this->db->where('no_urut', $no_urut);
		$jumlah = $this->db->count_all_results('tbl_surat_keluar');

		if ($jumlah == 1)
			return true;
		else
			return false;
	}

	function get_data($date = null)
	{
		$date_now = date("Y-m-d");
		$this->db->select('tbl_surat_keluar.*, tbl_bidang.*');
		$this->db->from('tbl_surat_keluar');
		$this->db->join('tbl_bidang','tbl_bidang.id_bidang=tbl_surat_keluar.unit_pengolah');
		$this->db->order_by('tbl_surat_keluar.no_urut', 'desc');
		if ($date == null) {
			$this->db->where('tbl_surat_keluar.tgl_terima', $date_now);
		} else {
			$this->db->where('tbl_surat_keluar.tgl_terima', $date);
		}
		$query = $this->db->get();
		return $query->result();
	}

	function laporan($bulan)
	{
		$date_now = date("Y-m-d");
		$this->db->select('tbl_surat_keluar.*, tbl_bidang.*');
		$this->db->from('tbl_surat_keluar');
		$this->db->join('tbl_bidang','tbl_bidang.id_bidang=tbl_surat_keluar.unit_pengolah');
		$this->db->order_by('tbl_surat_keluar.no_urut', 'desc');
		$this->db->where('DATE_FORMAT(tgl_terima,"%m")', $bulan);
		$query = $this->db->get();
		return $query->result();
	}

	function get_data_byID($no_urut)
	{
		$this->db->select('tbl_surat_keluar.*, tbl_bidang.*');
		$this->db->from('tbl_surat_keluar');
		$this->db->join('tbl_bidang','tbl_bidang.id_bidang=tbl_surat_keluar.unit_pengolah');
		$this->db->where('tbl_surat_keluar.no_urut', $no_urut);
		$query = $this->db->get();
		return $query->row();
	}

	function count_data_bySurat($no_urut, $id_bidang)
	{
		$this->db->select('COUNT(*) AS jumlah_data');
		$this->db->from('tbl_bidang');
		$this->db->join('tbl_surat_keluar','tbl_surat_keluar.unit_pengolah=tbl_bidang.id_bidang');
		$this->db->order_by('tbl_surat_keluar.no_urut', 'asc');
		$this->db->where('tbl_bidang.no_urut', $no_urut);
		$this->db->where('tbl_bidang.id_bidang', $id_bidang);
		$query = $this->db->get();
		return $query->row();
	}

	function update($no_urut, $data)
	{
		$this->db->where("no_urut", $no_urut);
		$this->db->update('tbl_surat_keluar', $data);
	}

	function insert($data)
	{
		$this->db->insert('tbl_surat_keluar', $data);
	}

	function delete($no_urut)
	{       
		$this->db->where('no_urut', $no_urut);
		$query = $this->db->delete('tbl_surat_keluar');
		return $query;
	}

}

/* End of file Surat_keluar_m.php */
/* Location: ./application/modules/admin/models/Surat_keluar_m.php */