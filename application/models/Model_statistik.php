<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_statistik extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function laki()
    {
        $this->db->select('siswa.jkel, COUNT(data_peminjam.tgl_pinjam) AS jumlah, DATE(data_peminjam.tgl_pinjam) AS tgl_pinjam');
        $this->db->from('data_peminjam');
        $this->db->join('siswa', 'data_peminjam.id_siswa = siswa.id');
        $this->db->group_by('siswa.jkel');
        $query = $this->db->get()->result();
        return $query;
    }
}
