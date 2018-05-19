<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_admin extends CI_Model
{

    public function is_valid($table, $username)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where('email = "' . $username . '" OR username = "' . $username . '"');
        $query = $this->db->get();
        return $query->row();
    }

    public function is_valid_num($table, $field, $username)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($field, $username);
        $query = $this->db->get();
        return $query->num_rows();
    }
}
