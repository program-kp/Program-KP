<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Disposisi_m extends CI_Model {

	function cek($tujuan_surat, $no_urut_surat = null, $no_urut_undangan = null)
	{
		if ($no_urut_surat!=null)
			$this->db->where('no_urut_surat', $no_urut_surat);
		else $this->db->where('no_urut_undangan', $no_urut_undangan);

		$this->db->where('tujuan_surat', $tujuan_surat);
		$jumlah = $this->db->count_all_results('tbl_disposisi');

		if ($jumlah == 1)
			return true;
		else
			return false;
	}

	function get_data($id_bidang = null)
	{
		$this->db->select('tbl_surat_undangan.no_surat, tbl_surat_undangan.tgl_terima, tbl_bidang.nama_bidang, tbl_disposisi.kode_disposisi');
		$this->db->from('tbl_disposisi');
		$this->db->join('tbl_bidang','tbl_disposisi.tujuan_surat = tbl_bidang.id_bidang');
		$this->db->join('tbl_surat_undangan','tbl_disposisi.no_urut_undangan = tbl_surat_undangan.no_urut');
		$this->db->order_by('tbl_bidang.nama_bidang', 'asc');
		if ($id_bidang!=null) {
			$this->db->where('tbl_disposisi.tujuan_surat', $id_bidang);
		}
		$this->db->where('tbl_disposisi.tipe_surat', 'Undangan');
		$query = $this->db->get();
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