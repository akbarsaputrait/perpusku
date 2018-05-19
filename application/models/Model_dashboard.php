<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_dashboard extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function count_siswa()
    {
        return $this->db->count_all('siswa');
    }

    public function count_buku()
    {
        return $this->db->count_all('buku');
    }

    public function get_news()
    {
        $this->db->select('siswa.nama, siswa.kelas, jurusan.nama AS jurusan, buku.judul, buku.kode, data_peminjam.tgl_pinjam, data_peminjam.tgl_kembali');
        $this->db->from('data_peminjam');
        $this->db->join('siswa', 'data_peminjam.id_siswa = siswa.id');
        $this->db->join('jurusan', 'siswa.id_jurusan = jurusan.id');
        $this->db->join('buku', 'data_peminjam.id_buku = buku.id');
        $this->db->where('data_peminjam.tgl_konfirmasi IS NOT NULL');
        $this->db->order_by('data_peminjam.id', 'desc');
        $this->db->limit(5);
        return $this->db->get()->result();
    }

    public function get_news1()
    {
        $this->db->select('siswa.nama, siswa.kelas, jurusan.nama AS jurusan, buku.judul, buku.kode, data_kembali.tgl AS tgl_kembali, data_peminjam.tgl_pinjam');
        $this->db->from('data_peminjam');
        $this->db->join('data_kembali', 'data_kembali.id_peminjam = data_peminjam.id');
        $this->db->join('siswa', 'data_peminjam.id_siswa = siswa.id');
        $this->db->join('jurusan', 'siswa.id_jurusan = jurusan.id');
        $this->db->join('buku', 'data_peminjam.id_buku = buku.id');
        $this->db->where('data_peminjam.tgl_konfirmasi IS NOT NULL');
        $this->db->order_by('data_kembali.id', 'desc');
        $this->db->limit(5);
        return $this->db->get()->result();
    }
}
