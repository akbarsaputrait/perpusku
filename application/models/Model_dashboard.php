<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_dashboard extends CI_Model
{
    public $column_order = array(null, 'siswa.nama', 'siswa.kelas', 'jurusan.nama AS jurusan', 'buku.judul', 'data_peminjam.tgl_konfirmasi');
    public $column_search = array('siswa.nama', 'siswa.kelas', 'jurusan.nama', 'buku.judul', 'data_peminjam.tgl_konfirmasi');
    public $order = array('data_peminjam.id' => 'asc'); // default order

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    private function _get_datatables_query()
    {
        $this->db->select('siswa.nama, siswa.kelas, jurusan.nama AS jurusan, buku.judul, DATE(data_peminjam.tgl_konfirmasi) AS tgl');
        $this->db->from('data_peminjam');
        $this->db->join('siswa', 'data_peminjam.id_siswa = siswa.id');
        $this->db->join('buku', 'data_peminjam.id_buku = buku.id');
        $this->db->join('jurusan', 'siswa.id_jurusan = jurusan.id');
        $this->db->order_by('data_peminjam.id', 'desc');
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
        $this->db->select('siswa.nama, siswa.kelas, jurusan.nama AS jurusan, buku.judul, buku.kode, DATE(data_peminjam.tgl_pinjam) AS tgl_pinjam, DATE(data_peminjam.tgl_kembali) AS tgl_kembali');
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
        $this->db->select('siswa.nama, siswa.kelas, jurusan.nama AS jurusan, buku.judul, buku.kode, DATE(data_peminjam.tgl_pinjam) AS tgl_pinjam, DATE(data_peminjam.tgl_kembali) AS tgl_kembali');
        $this->db->from('data_peminjam');
        $this->db->join('data_kembali', 'data_kembali.id_peminjam = data_peminjam.id');
        $this->db->join('siswa', 'data_peminjam.id_siswa = siswa.id');
        $this->db->join('jurusan', 'siswa.id_jurusan = jurusan.id');
        $this->db->join('buku', 'data_peminjam.id_buku = buku.id');
        $this->db->where('data_kembali.tgl IS NOT NULL');
        $this->db->order_by('data_kembali.id', 'desc');
        $this->db->limit(5);
        return $this->db->get()->result();
    }
}
