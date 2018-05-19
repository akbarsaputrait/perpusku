<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_siswa extends CI_Model
{
    public $table = 'siswa';
    public $join = 'jurusan';

    public $column_order = array(null, 'siswa.nis', 'siswa.nama', 'siswa.jkel', 'jurusan.nama AS jurusan');
    public $column_search = array('siswa.nis', 'siswa.nama', 'siswa.kelas', 'siswa.jkel', 'jurusan.nama');
    public $order = array('buku.id' => 'asc'); // default order

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    private function _get_datatables_query()
    {
        $this->db->select('siswa.id, siswa.nis, siswa.nama, siswa.jkel, siswa.kelas, jurusan.nama AS jurusan');
        $this->db->from($this->table);
        $this->db->join($this->join, 'jurusan ON siswa.id_jurusan = jurusan.id');

        $i = 0;

        foreach ($this->column_search as $item) // loop column
        {
            if (isset($_POST['search']['value'])) // if datatable send POST for search
            {
                if ($i === 0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($this->column_search) - 1 == $i) //last loop

                {
                    $this->db->group_end();
                }

                //close bracket
            }
            $i++;
        }

        if (isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    public function get_datatables()
    {
        $this->_get_datatables_query();
        if ($_POST['length'] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }

        $query = $this->db->get();
        return $query->result();
    }

    public function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all()
    {
        $this->_get_datatables_query();
        return $this->db->count_all_results();
    }

    public function get_data_siswa($id)
    {
        $this->db->select('siswa.*, jurusan.nama AS jurusan');
        $this->db->from($this->table);
        $this->db->join($this->join, 'jurusan ON siswa.id_jurusan = jurusan.id');
        $this->db->where(array('siswa.id' => $id));
        $query = $this->db->get();
        return $query->result();
    }

    public function delete_siswa($id)
    {
        $this->db->where('id', $id);
        $this->db->delete($this->table);
    }

    public function post_siswa($data)
    {
        $this->db->insert($this->table, $data);
    }

    public function update_siswa($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update($this->table, $data);
    }

    public function get_news($id)
    {
        $this->db->select('siswa.nama, siswa.kelas, jurusan.nama AS jurusan, buku.judul, buku.kode, data_peminjam.tgl_pinjam, data_peminjam.tgl_kembali');
        $this->db->from('data_peminjam');
        $this->db->join('siswa', 'data_peminjam.id_siswa = siswa.id');
        $this->db->join('jurusan', 'siswa.id_jurusan = jurusan.id');
        $this->db->join('buku', 'data_peminjam.id_buku = buku.id');
        $this->db->where('siswa.id', $id);
        $this->db->limit(1);
        return $this->db->get()->result();
    }

    public function check_nis($field)
    {
        $this->db->select('siswa.*, jurusan.nama AS jurusan');
        $this->db->from('siswa');
        $this->db->join('jurusan', 'jurusan ON siswa.id_jurusan = jurusan.id');
        $this->db->where(array('siswa.nis' => $field));
        $query = $this->db->get();
        return $query->row();
    }

    public function check_nama($field)
    {
        $this->db->select('siswa.*, jurusan.nama AS jurusan');
        $this->db->from('siswa');
        $this->db->join('jurusan', 'jurusan ON siswa.id_jurusan = jurusan.id');
        $this->db->where(array('siswa.nama' => $field));
        $query = $this->db->get();
        return $query->row();
    }
}
