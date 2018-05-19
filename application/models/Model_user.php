<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_user extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function is_valid($field)
    {
        $this->db->select('siswa.*, jurusan.nama AS jurusan');
        $this->db->from('siswa');
        $this->db->join('jurusan', 'jurusan ON siswa.id_jurusan = jurusan.id');
        $this->db->where(array('siswa.nis' => $field));
        $this->db->or_where(array('siswa.nama' => $field));
        $query = $this->db->get();
        return $query->row();
    }
}
