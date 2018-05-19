<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_buku extends CI_Model
{

    public $buku = 'buku';
    public $pengarang = 'pengarang';
    public $penerbit = 'penerbit';
    public $lokasi = 'lokasi';
    public $kategori = 'kategori';

    public $column_order = array(null, 'buku.judul', 'pengarang.nama AS nama_pengarang', 'penerbit.nama AS nama_penerbit', 'buku.jumlah', 'buku.sisa');
    public $column_search = array('buku.judul', 'pengarang.nama', 'penerbit.nama', 'buku.jumlah', 'buku.sisa');
    public $order = array('buku.id' => 'asc'); // default order

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    private function _get_datatables_query()
    {
        $this->db->select('buku.id_pengarang, buku.id, buku.tahun, buku.id_penerbit, buku.id_lokasi, buku.cover, buku.judul, buku.jumlah, buku.sisa, pengarang.nama AS nama_pengarang, penerbit.nama AS nama_penerbit, lokasi.nama AS lokasi');
        $this->db->from('buku');
        $this->db->join('pengarang', 'buku.id_pengarang = pengarang.id');
        $this->db->join('penerbit', 'buku.id_penerbit = penerbit.id');
        $this->db->join('lokasi', 'buku.id_lokasi = lokasi.id');
        $this->db->order_by('buku.id', 'desc');
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

    public function get_buku($id)
    {
        $this->db->select('buku.*, pengarang.nama AS pengarang, kategori.nama AS kategori, penerbit.nama AS penerbit, lokasi.nama AS lokasi');
        $this->db->from($this->buku);
        $this->db->join($this->pengarang, 'buku.id_pengarang = pengarang.id');
        $this->db->join($this->penerbit, 'buku.id_penerbit = penerbit.id');
        $this->db->join($this->lokasi, 'buku.id_lokasi = lokasi.id');
        $this->db->join($this->kategori, 'buku.id_kategori = kategori.id');
        $this->db->where('buku.id', $id);
        $query = $this->db->get()->result();

        return $query;
    }

    public function check_pengarang($pengarang)
    {
        $this->db->select('*');
        $this->db->from($this->pengarang);
        $this->db->where('nama', $pengarang);
        $query = $this->db->get();
        $data = $query->row();
        if (empty($data)) {
            $this->db->insert($this->pengarang, array('nama' => $pengarang));
            return $this->db->insert_id();
            // return 'pengarang tidak tersedia';
        } else {
            return $data->id;
        }
    }

    public function check_penerbit($penerbit)
    {
        $this->db->select('*');
        $this->db->from($this->penerbit);
        $this->db->where('nama', $penerbit);
        $query = $this->db->get();
        $data = $query->row();
        if (empty($data)) {
            $this->db->insert($this->penerbit, array('nama' => $penerbit));
            return $this->db->insert_id();
            // return 'penerbit tidak tersedia';
        } else {
            return $data->id;
        }
    }

    public function check_lokasi($lokasi)
    {
        $this->db->select('*');
        $this->db->from($this->lokasi);
        $this->db->where('nama', $lokasi);
        $query = $this->db->get();
        $data = $query->row();
        if (empty($data)) {
            $this->db->insert($this->lokasi, array('nama' => $lokasi));
            return $this->db->insert_id();
            // return 'lokasi tidak tersedia';
        } else {
            return $data->id;
        }
    }

    public function check_kategori($kategori)
    {
        $this->db->select('*');
        $this->db->from($this->kategori);
        $this->db->where('nama', $kategori);
        $query = $this->db->get();
        $data = $query->row();
        if (empty($data)) {
            $this->db->insert($this->kategori, array('nama' => $kategori));
            return $this->db->insert_id();
            // return 'kategori tidak tersedia';
        } else {
            return $data->id;
        }
    }

    public function get_data_peminjaman()
    {
        $this->db->select('siswa.nama, siswa.kelas, jurusan.nama AS jurusan, buku.judul, buku.kode, data_peminjam.tgl_pinjam, data_peminjam.tgl_kembali');
        $this->db->from('data_peminjam');
        $this->db->join('siswa', 'data_peminjam.id_siswa = siswa.id');
        $this->db->join('jurusan', 'siswa.id_jurusan = jurusan.id');
        $this->db->join('buku', 'data_peminjam.id_buku = buku.id');
        return $this->db->get()->result();
    }
}
