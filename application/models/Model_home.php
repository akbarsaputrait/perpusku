<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_home extends CI_Model
{

    public $buku = 'buku';
    public $pengarang = 'pengarang';
    public $penerbit = 'penerbit';
    public $lokasi = 'lokasi';
    public $kategori = 'kategori';

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function search_buku($search)
    {
        $this->db->select('buku.id, buku.cover, buku.halaman, buku.judul, buku.bulan, buku.tahun, penerbit.nama AS penerbit, pengarang.nama AS pengarang, kategori.nama AS kategori');
        $this->db->from($this->buku);
        $this->db->join($this->penerbit, 'buku.id_penerbit = penerbit.id');
        $this->db->join($this->pengarang, 'buku.id_pengarang = pengarang.id');
        $this->db->join($this->kategori, 'buku.id_kategori = kategori.id');
        $this->db->where('(buku.judul  LIKE "%' . $search . '%" ESCAPE "!" OR  pengarang.nama  LIKE "%' . $search . '%" ESCAPE "!" OR  penerbit.nama  LIKE "%' . $search . '%" ESCAPE "!" OR  buku.bulan  LIKE "%' . $search . '%" ESCAPE "!" OR  buku.tahun  LIKE "%' . $search . '%" ESCAPE "!" OR  kategori.nama  LIKE "%' . $search . '%" ESCAPE "!")');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_buku()
    {
        $this->db->select('buku.*, pengarang.nama AS pengarang, penerbit.nama AS penerbit, lokasi.nama AS lokasi');
        $this->db->from($this->buku);
        $this->db->join($this->pengarang, 'buku.id_pengarang = pengarang.id');
        $this->db->join($this->penerbit, 'buku.id_penerbit = penerbit.id');
        $this->db->join($this->lokasi, 'buku.id_lokasi = lokasi.id');
        $query = $this->db->get()->result();

        return $query;
    }

    public function get_buku_where($id)
    {
        $this->db->select('buku.*, pengarang.nama AS pengarang, penerbit.nama AS penerbit, lokasi.nama AS lokasi');
        $this->db->from($this->buku);
        $this->db->join($this->pengarang, 'buku.id_pengarang = pengarang.id');
        $this->db->join($this->penerbit, 'buku.id_penerbit = penerbit.id');
        $this->db->join($this->lokasi, 'buku.id_lokasi = lokasi.id');
        $this->db->where('buku.id', $id);
        $query = $this->db->get()->result();

        return $query;
    }

    public function check_buku($id)
    {
        $this->db->select('buku.id, buku.sisa');
        $this->db->from('buku');
        $this->db->where(array('buku.id' => $id));
        $query = $this->db->get();
        return $query->row();
    }
}
