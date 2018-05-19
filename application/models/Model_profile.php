<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_profile extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_admin($id)
    {
        $this->db->select('*');
        $this->db->from('admin');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->result();
    }

    public function check_id($id)
    {
        $this->db->select('*');
        $this->db->from('admin');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->row();
    }
}
