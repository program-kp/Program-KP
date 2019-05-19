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

	function cek_kode($kode_disposisi)
	{
		$this->db->where('kode_disposisi', $kode_disposisi);
		$jumlah = $this->db->count_all_results('tbl_disposisi');

		if ($jumlah == 1)
			return true;
		else
			return false;
	}

	function get_data_undangan($date = null, $id_bidang = null)
	{
		$date_now = date("Y-m-d");
		$this->db->select('tbl_surat_undangan.no_surat, tbl_surat_undangan.no_urut, tbl_bidang.nama_bidang, tbl_disposisi.kode_disposisi, tbl_disposisi.tgl_disposisi');
		$this->db->from('tbl_disposisi');
		$this->db->join('tbl_bidang','tbl_disposisi.tujuan_surat = tbl_bidang.id_bidang');
		$this->db->join('tbl_surat_undangan','tbl_disposisi.no_urut_undangan = tbl_surat_undangan.no_urut');
		$this->db->order_by('tbl_bidang.nama_bidang', 'asc');
		if ($id_bidang!=null) {
			$this->db->where('tbl_disposisi.tujuan_surat', $id_bidang);
		}
		if ($date == null) {
			$this->db->where('tbl_disposisi.tgl_disposisi', $date_now);
		} else {
			$this->db->where('tbl_disposisi.tgl_disposisi', $date);
		}
		$this->db->where('tbl_disposisi.tipe_surat', 'Undangan');
		$query = $this->db->get();
		return $query->result();
	}

	function get_data_undangan_dash($nourut = null)
	{
		$this->db->select('tbl_surat_undangan.no_surat, tbl_surat_undangan.no_urut, tbl_bidang.nama_bidang, tbl_disposisi.kode_disposisi, tbl_disposisi.tgl_disposisi');
		$this->db->from('tbl_disposisi');
		$this->db->join('tbl_bidang','tbl_disposisi.tujuan_surat = tbl_bidang.id_bidang');
		$this->db->join('tbl_surat_undangan','tbl_disposisi.no_urut_undangan = tbl_surat_undangan.no_urut');
		$this->db->order_by('tbl_bidang.nama_bidang', 'asc');
		$this->db->where('tbl_disposisi.no_urut_undangan', $nourut);
		$this->db->where('tbl_disposisi.tipe_surat', 'Undangan');
		$query = $this->db->get();
		return $query->result();
	}

	function get_data_surat($date = null, $id_bidang = null)
	{
		$date_now = date("Y-m-d");
		$this->db->select('tbl_surat_masuk.no_surat, tbl_surat_masuk.no_urut, tbl_bidang.nama_bidang, tbl_disposisi.kode_disposisi, tbl_disposisi.tgl_disposisi');
		$this->db->from('tbl_disposisi');
		$this->db->join('tbl_bidang','tbl_disposisi.tujuan_surat = tbl_bidang.id_bidang');
		$this->db->join('tbl_surat_masuk','tbl_disposisi.no_urut_surat = tbl_surat_masuk.no_urut');
		$this->db->order_by('tbl_bidang.nama_bidang', 'asc');
		if ($id_bidang!=null) {
			$this->db->where('tbl_disposisi.tujuan_surat', $id_bidang);
		}
		if ($date == null) {
			$this->db->where('tbl_disposisi.tgl_disposisi', $date_now);
		} else {
			$this->db->where('tbl_disposisi.tgl_disposisi', $date);
		}
		$this->db->where('tbl_disposisi.tipe_surat', 'Surat Masuk');
		$query = $this->db->get();
		return $query->result();
	}

	function get_data_surat_dash($nourut = null)
	{
		$this->db->select('tbl_surat_masuk.no_surat, tbl_surat_masuk.no_urut, tbl_bidang.nama_bidang, tbl_disposisi.kode_disposisi, tbl_disposisi.tgl_disposisi');
		$this->db->from('tbl_disposisi');
		$this->db->join('tbl_bidang','tbl_disposisi.tujuan_surat = tbl_bidang.id_bidang');
		$this->db->join('tbl_surat_masuk','tbl_disposisi.no_urut_surat = tbl_surat_masuk.no_urut');
		$this->db->order_by('tbl_bidang.nama_bidang', 'asc');
		$this->db->where('tbl_disposisi.no_urut_surat', $nourut);
		$this->db->where('tbl_disposisi.tipe_surat', 'Surat Masuk');
		$query = $this->db->get();
		return $query->result();
	}

	function get_data_byID_undangan($kode_disposisi)
	{
		$this->db->select('tbl_disposisi.*, tbl_surat_undangan.no_surat');
		$this->db->from('tbl_disposisi');
		$this->db->join('tbl_surat_undangan','tbl_disposisi.no_urut_undangan = tbl_surat_undangan.no_urut');
		$this->db->where('tbl_disposisi.kode_disposisi', $kode_disposisi);
		$this->db->where('tbl_disposisi.tipe_surat', 'Undangan');
		$query = $this->db->get();
		return $query->row();
	}

	function get_data_byID_surat($kode_disposisi)
	{
		$this->db->select('tbl_disposisi.*, tbl_surat_masuk.no_surat');
		$this->db->from('tbl_disposisi');
		$this->db->join('tbl_surat_masuk','tbl_disposisi.no_urut_surat = tbl_surat_masuk.no_urut');
		$this->db->where('tbl_disposisi.kode_disposisi', $kode_disposisi);
		$this->db->where('tbl_disposisi.tipe_surat', 'Surat Masuk');
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