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

	function get_data($id, $date = null)
	{
		$date_now = date("Y-m-d");
		$this->db->select('*');
		$this->db->from('tbl_surat_undangan');
		$this->db->join('tbl_disposisi', 'tbl_disposisi.no_urut_undangan = tbl_surat_undangan.no_urut');
		$this->db->order_by('tbl_surat_undangan.no_urut', 'desc');
		$this->db->where('tbl_disposisi.tujuan_surat', $id);
		if ($date == null) {
			$this->db->where('tbl_surat_undangan.tgl_terima', $date_now);
		} else {
			$this->db->where('tbl_surat_undangan.tgl_terima', $date);
		}
		$query = $this->db->get();
		return $query->result();
	}


	function get_data_jadwal($id)
	{
		$date = date("Y-m-d");
		$date5 = date("Y-m-d", strtotime("+5 day"));
		$this->db->select('tbl_surat_undangan.no_urut, tbl_surat_undangan.uraian, tbl_surat_undangan.waktu_undangan, tbl_surat_undangan.tempat_undangan');
		$this->db->from('tbl_surat_undangan');
		$this->db->join('tbl_disposisi', 'tbl_disposisi.no_urut_undangan = tbl_surat_undangan.no_urut');
		$this->db->order_by('waktu_undangan', 'desc');
		$this->db->where('tbl_disposisi.tujuan_surat', $id);
		$this->db->where('tbl_surat_undangan.waktu_undangan >=', $date);
		$this->db->where('tbl_surat_undangan.waktu_undangan <=', $date5);
		$query = $this->db->get();
		return $query->result();
	}

	function get_hadir($no_urut)
	{
		$this->db->select('tbl_bidang.nama_bidang');
		$this->db->from('tbl_disposisi');
		$this->db->join('tbl_bidang','tbl_disposisi.tujuan_surat = tbl_bidang.id_bidang');
		$this->db->where('tbl_disposisi.no_urut_undangan', $no_urut);
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

}

/* End of file Undangan_m.php */
/* Location: ./application/modules/admin/models/Undangan_m.php */