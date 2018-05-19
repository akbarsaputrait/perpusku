<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_pengembalian extends CI_Model
{
    public $column_order = array(null, 'data_peminjam.kode  AS kode_pinjaman', 'siswa.nama', 'buku.judul', 'data_peminjam.tgl_pinjam', 'data_peminjam.tgl_kembali');
    public $column_search = array('data_peminjam.kode', 'siswa.nama', 'buku.judul', 'data_peminjam.tgl_pinjam', 'data_peminjam.tgl_kembali');
    public $order = array('data_peminjam.id' => 'asc'); // default order

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    private function _get_datatables_query()
    {
        $this->db->select('data_peminjam.id, data_peminjam.kode AS kode_pinjaman, siswa.nama, buku.judul, data_peminjam.tgl_pinjam, data_peminjam.tgl_kembali');
        $this->db->from('data_peminjam');
        $this->db->join('siswa', 'data_peminjam.id_siswa = siswa.id');
        $this->db->join('jurusan', 'siswa.id_jurusan = jurusan.id');
        $this->db->join('buku', 'data_peminjam.id_buku = buku.id');
        $this->db->join('data_kembali', 'data_kembali.id_peminjam = data_peminjam.id');
        $this->db->where('data_kembali.tgl IS NULL');
        $this->db->order_by('data_kembali.id', 'desc');

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
        // return $this->db->last_query();
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

    public function get_data_peminjam($id)
    {
        $this->db->select('data_peminjam.id, data_kembali.id AS id_pengembalian, DATEDIFF(DATE(NOW()), data_peminjam.tgl_kembali) AS telat, jurusan.nama AS jurusan, data_peminjam.kode AS kode_pinjaman, siswa.id AS id_siswa, siswa.nama, siswa.kelas, buku.judul, buku.id AS buku_id, data_peminjam.tgl_pinjam, data_peminjam.tgl_kembali');
        $this->db->from('data_peminjam');
        $this->db->join('data_kembali', 'data_kembali.id_peminjam = data_peminjam.id');
        $this->db->join('siswa', 'data_peminjam.id_siswa = siswa.id');
        $this->db->join('jurusan', 'siswa.id_jurusan = jurusan.id');
        $this->db->join('buku', 'data_peminjam.id_buku = buku.id');
        $this->db->where('data_kembali.id_peminjam', $id);

        $query = $this->db->get()->result();
        return $query;
    }

    public function check_buku($id)
    {
        $this->db->select('data_kembali.id_peminjam, buku.sisa, buku.id AS id_buku');
        $this->db->from('data_kembali');
        $this->db->join('data_peminjam', 'data_peminjam.id = data_kembali.id_peminjam');
        $this->db->join('buku', 'data_peminjam.id_buku = buku.id');
        $this->db->where(array('data_kembali.id' => $id));
        $query = $this->db->get();
        return $query->row();
    }
}
