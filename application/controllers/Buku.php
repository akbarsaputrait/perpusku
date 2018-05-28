<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Buku extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('login') != "admin") {
            redirect(base_url("admin"));
        }
        $this->load->model('model_buku');
        $this->load->model('model_konfirmasi');
        $this->load->model('model_pengembalian');
        $this->load->library('dateformat');
        $this->load->library(array('PHPExcel', 'PHPExcel/IOFactory'));
        date_default_timezone_set('Asia/Jakarta');
    }

    public function daftar()
    {
        $this->load->view('header');
        $this->load->view('content/buku');
        $this->load->view('footer');
    }

    public function konfirmasi()
    {
        $this->load->view('header');
        $this->load->view('content/konfirmasi');
        $this->load->view('footer');
    }

    public function pengembalian()
    {
        $this->load->view('header');
        $this->load->view('content/pengembalian');
        $this->load->view('footer');
    }

    public function post_buku()
    {
        header('Content-Type: application/json');

        $file = array();
        $data = array();
        $response = array();

        $config['encrypt_name'] = true;
        $config['upload_path'] = './upload/images/cover_buku/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = 2048;
        $config['remove_space'] = true;

        $this->load->library('upload');
        $this->upload->initialize($config);

        if (!$this->upload->do_upload("cover_buku")) {
            $response = array(
                'status' => 400,
                'message' => $this->upload->display_errors(),
            );
        } else {
            $file = array('upload_data' => $this->upload->data());

            $data = array(
                'id_pengarang' => $this->model_buku->check_pengarang($this->input->post('pengarang')),
                'id_penerbit' => $this->model_buku->check_penerbit($this->input->post('penerbit')),
                'id_lokasi' => $this->model_buku->check_lokasi($this->input->post('lokasi')),
                'id_kategori' => $this->model_buku->check_kategori($this->input->post('kategori')),
                'kode' => $this->input->post('kode_buku'),
                'judul' => $this->input->post('judul_buku'),
                'no_isbn' => $this->input->post('no_isbn'),
                'bulan' => $this->input->post('bulan_terbit'),
                'tahun' => $this->input->post('tahun_terbit'),
                'jumlah' => $this->input->post('jumlah_buku'),
                'sisa' => $this->input->post('jumlah_buku'),
                'halaman' => $this->input->post('jumlah_hal'),
                'keterangan' => $this->input->post('keterangan'),
                'cover' => $file['upload_data']['file_name'],
            );
            $insert = $this->db->insert('buku', $data);

            if ($insert) {
                $response = array(
                    'status' => 200,
                    'data' => $data,
                );
            } else {
                $response = array(
                    'status' => 409,
                );
            }

        }

        echo json_encode($response);
    }

    public function import_buku()
    {
        header('Content-Type: application/json');

        $response = array();

        $config['encrypt_name'] = true;
        $config['upload_path'] = './upload/excel/';
        $config['allowed_types'] = 'xls|xlsx|csv|ods|ots';
        $config['max_size'] = 10024;
        $config['remove_space'] = true;

        $this->load->library('upload');
        $this->upload->initialize($config);

        if (!$this->upload->do_upload("import_buku")) {
            $response = array(
                'status' => 409,
                'error' => $this->upload->display_errors('', ''),
            );
        } else {
            $media = $this->upload->data();
            $inputFileName = 'upload/excel/' . $media['file_name'];

            try {
                $inputFileType = IOFactory::identify($inputFileName);
                $objReader = IOFactory::createReader($inputFileType);
                $objPHPExcel = $objReader->load($inputFileName);

            } catch (Exception $e) {
                die('Error loading file "' . pathinfo($inputFileName, PATHINFO_BASENAME) . '": ' . $e->getMessage());
                $response = array(
                    'status' => 409,
                    'error' => $e->getMessage(),
                    'info' => pathinfo($inputFileName, PATHINFO_BASENAME),
                );
            }

            $sheet = $objPHPExcel->getSheet(0);
            $highestRow = $sheet->getHighestRow();
            $highestColumn = $sheet->getHighestColumn();

            for ($row = 2; $row <= $highestRow; $row++) {
                $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row,
                    null,
                    true,
                    false);
                $data = array(
                    "id" => null,
                    'id_kategori' => $this->model_buku->check_kategori($rowData[0][0]),
                    'id_pengarang' => $this->model_buku->check_pengarang($rowData[0][1]),
                    'id_penerbit' => $this->model_buku->check_penerbit($rowData[0][2]),
                    'id_lokasi' => $this->model_buku->check_lokasi($rowData[0][3]),
                    'kode' => $rowData[0][4],
                    'judul' => $rowData[0][5],
                    'no_isbn' => $rowData[0][6],
                    'bulan' => $rowData[0][7],
                    'tahun' => $rowData[0][8],
                    'jumlah' => $rowData[0][9],
                    'sisa' => $rowData[0][9],
                    'halaman' => $rowData[0][11],
                );
                $this->db->insert('buku', $data);
            }

            $response = array(
                'status' => 200,
            );
        }

        echo json_encode($response);
    }

    public function get_datatables()
    {
        header('Content-Type: application/json');

        $query = $this->model_buku->get_datatables();

        $data = array();
        $response = array();

        foreach ($query as $key => $value) {
            $data[] = array(
                'cover_buku' => $value->cover,
                'judul_buku' => $value->judul,
                'pengarang' => $value->nama_pengarang,
                'penerbit' => $value->nama_penerbit,
                'tahun_terbit' => $value->tahun,
                'jumlah_buku' => $value->jumlah,
                'sisa_buku' => $value->sisa,
                'id' => $value->id,
            );
        }

        $response = array(
            "data" => $data,
            "draw" => intval($this->input->post('draw')),
            "recordsTotal" => $this->model_buku->count_all(),
            "recordsFiltered" => $this->model_buku->count_filtered(),
            'query' => $this->db->last_query()
        );

        echo json_encode($response);
    }

    public function get_buku()
    {
        header('Content-Type: application/json');

        $data = array();
        $response = array();

        $id = $this->input->post('id');

        $query = $this->model_buku->get_buku($id);

        foreach ($query as $key => $value) {

            $data[] = array(
                'cover_buku' => $value->cover,
                'kategori' => $value->kategori,
                'judul_buku' => $value->judul,
                'pengarang' => $value->pengarang,
                'penerbit' => $value->penerbit,
                'bulan' => $value->bulan,
                'tahun_terbit' => $value->tahun,
                'bulan_terbit' => $value->bulan,
                'jumlah_buku' => $value->jumlah,
                'sisa_buku' => $value->sisa,
                'nomor_buku' => $value->kode,
                'nomor_isbn' => $value->no_isbn,
                'lokasi' => $value->lokasi,
                'keterangan' => $value->keterangan,
                'halaman' => $value->halaman,
                'id' => $value->id,
            );
        }

        $response = array(
            "data" => $data,
            "status" => 200,
        );

        echo json_encode($response);
    }

    public function update_buku()
    {
        header('Content-Type: application/json');

        $file = array();
        $data = array();
        $response = array();

        $config['encrypt_name'] = true;
        $config['upload_path'] = './upload/images/cover_buku/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = 2048;
        $config['remove_space'] = true;

        $this->load->library('upload');
        $this->upload->initialize($config);

        if (!$this->upload->do_upload("detail_cover")) {

            $id = $this->input->post('detail_id');

            $data = array(
                'id_pengarang' => $this->model_buku->check_pengarang($this->input->post('detail_pengarang')),
                'id_penerbit' => $this->model_buku->check_penerbit($this->input->post('detail_penerbit')),
                'id_lokasi' => $this->model_buku->check_lokasi($this->input->post('detail_lokasi')),
                'id_kategori' => $this->model_buku->check_kategori($this->input->post('detail_kategori')),
                'kode' => $this->input->post('detail_nomor_buku'),
                'judul' => $this->input->post('detail_judul_buku'),
                'no_isbn' => $this->input->post('detail_nomor_isbn'),
                'tahun' => $this->input->post('detail_tahun_terbit'),
                'bulan' => $this->input->post('detail_bulan_terbit'),
                'jumlah' => $this->input->post('detail_jumlah'),
                'sisa' => $this->input->post('detail_sisa'),
                'halaman' => $this->input->post('detail_jumlah_hal'),
                'keterangan' => $this->input->post('detail_keterangan'),
            );

            $this->db->where('buku.id', $id);
            $update = $this->db->update('buku', $data);

            if ($update) {
                $response = array(
                    'status' => 200,
                    'data' => $data,
                );
            } else {
                $response = array(
                    'status' => 409,
                );
            }

        } else {
            $file = array('upload_data' => $this->upload->data());

            $id = $this->input->post('detail_id');

            $data = array(
                'id_pengarang' => $this->model_buku->check_pengarang($this->input->post('detail_pengarang')),
                'id_penerbit' => $this->model_buku->check_penerbit($this->input->post('detail_penerbit')),
                'id_lokasi' => $this->model_buku->check_lokasi($this->input->post('detail_lokasi')),
                'id_kategori' => $this->model_buku->check_kategori($this->input->post('detail_kategori')),
                'kode' => $this->input->post('detail_nomor_buku'),
                'judul' => $this->input->post('detail_judul_buku'),
                'no_isbn' => $this->input->post('detail_nomor_isbn'),
                'tahun' => $this->input->post('detail_tahun_terbit'),
                'bulan' => $this->input->post('detail_bulan_terbit'),
                'jumlah' => $this->input->post('detail_jumlah'),
                'sisa' => $this->input->post('detail_sisa'),
                'halaman' => $this->input->post('detail_jumlah_hal'),
                'keterangan' => $this->input->post('detail_keterangan'),
                'cover' => $file['upload_data']['file_name'],
            );

            $this->db->where('buku.id', $id);
            $update = $this->db->update('buku', $data);

            if ($update) {
                $response = array(
                    'status' => 200,
                    'data' => $data,
                );
            } else {
                $response = array(
                    'status' => 409,
                );
            }

        }

        echo json_encode($response);
    }

    public function delete_buku($id)
    {
        header('Content-Type: application/json');

        $response = array();

        $this->db->where('id', $id);
        $delete = $this->db->delete('buku');

        if ($delete) {
            $response = array(
                'status' => 200,
            );
        } else {
            $response = array(
                'status' => 400,
            );
        }

        echo json_encode($response);
    }

    public function get_peminjam()
    {
        header('Content-Type: application/json');

        $query = $this->model_konfirmasi->get_datatables();

        $data = array();
        $response = array();

        foreach ($query as $key => $value) {
            $data[] = array(
                'id' => $value->id,
                'kode' => $value->kode_pinjaman,
                'nama' => $value->nama,
                'judul_buku' => $value->judul,
                'tgl_pinjam' => $this->dateformat->tgl($value->tgl_pinjam, true),
                'tgl_kembali' => $this->dateformat->tgl($value->tgl_kembali, true),
            );
        }

        $response = array(
            "data" => $data,
            "draw" => intval($this->input->post('draw')),
            "recordsTotal" => $this->model_konfirmasi->count_all(),
            "recordsFiltered" => $this->model_konfirmasi->count_filtered(),
        );

        echo json_encode($response);
    }

    public function get_data_peminjam($id)
    {
        header('Content-Type: application/json');

        $data = array();
        $response = array();

        $query = $this->model_konfirmasi->get_data_peminjam($id);

        foreach ($query as $key => $value) {
            $data[] = array(
                'id' => $value->id,
                'kode_pinjaman' => $value->kode_pinjaman,
                'nama' => $value->nama,
                'kelas' => $value->kelas,
                'jurusan' => $value->jurusan,
                'judul' => $value->judul,
                'tgl_pinjam' => $this->dateformat->tgl($value->tgl_pinjam, true),
                'tgl_kembali' => $this->dateformat->tgl($value->tgl_kembali, true),
            );
        }

        $response = array(
            'status' => 200,
            'data' => $data,
        );

        echo json_encode($response);
    }

    public function konfirmasi_peminjaman()
    {
        header('Content-Type: application/json');

        $data = array();
        $response = array();

        $id = $this->input->post('id_peminjam');

        $check = $this->model_konfirmasi->check_id_peminjam($id);
        if ($check) {

            $this->db->trans_start();
            $this->db->where('buku.id', $check->id);
            $this->db->update('buku', array('sisa' => ($check->sisa - 1) ));
            $this->db->trans_complete();

            $this->db->trans_start();
            $this->db->where('data_peminjam.id', $check->id_peminjam);
            $this->db->update('data_peminjam', array('tgl_konfirmasi' => date('Y-m-d')));
            $this->db->trans_complete();

            $this->db->trans_start();
            $this->db->insert('data_kembali', array('id_peminjam' => $check->id_peminjam));
            $this->db->trans_complete();

            $response = array(
                'status' => 200,
            );
        } else {
            $response = array(
                'status' => 400,
            );
        }

        echo json_encode($response);
    }

    public function get_pengembalian()
    {
        header('Content-Type: application/json');

        $query = $this->model_pengembalian->get_datatables();

        $data = array();
        $response = array();

        foreach ($query as $key => $value) {
            $data[] = array(
                'id' => $value->id,
                'kode' => $value->kode_pinjaman,
                'nama' => $value->nama,
                'judul_buku' => $value->judul,
                'tgl_pinjam' => $this->dateformat->tgl($value->tgl_pinjam, true),
                'tgl_kembali' => $this->dateformat->tgl($value->tgl_kembali, true),
            );
        }

        $response = array(
            "data" => $data,
            "draw" => intval($this->input->post('draw')),
            "recordsTotal" => $this->model_pengembalian->count_all(),
            "recordsFiltered" => $this->model_pengembalian->count_filtered(),
        );

        echo json_encode($response);
    }

    public function tolak_peminjaman()
    {
        header('Content-Type: application/json');

        $response = array();

        $id = $this->input->post('id_tolak');

        $delete = $this->db->delete('data_peminjam', array('data_peminjam.id' => $id));
        if ($delete) {
            $response = array(
                'status' => 200,
            );
        } else {
            $response = array(
                'status' => 400,
            );
        }

        echo json_encode($response);
    }

    public function get_data_pengembalian($id)
    {
        header('Content-Type: application/json');

        $data = array();
        $response = array();

        $query = $this->model_pengembalian->get_data_peminjam($id);

        foreach ($query as $key => $value) {
            $data[] = array(
                'id_pengembalian' => $value->id_pengembalian,
                'kode_pinjaman' => $value->kode_pinjaman,
                'nama' => $value->nama,
                'kelas' => $value->kelas,
                'jurusan' => $value->jurusan,
                'judul' => $value->judul,
                'tgl_pinjam' => $this->dateformat->tgl($value->tgl_pinjam, true),
                'tgl_kembali' => $this->dateformat->tgl($value->tgl_kembali, true),
                'id_buku' => $value->buku_id,
                'telat' => $value->telat
            );
        }

        $response = array(
            'status' => 200,
            'data' => $data,
        );

        echo json_encode($response);
    }

    public function pengembalian_buku()
    {
        header('Content-Type: application/json');

        $data = array();
        $response = array();

        $id_pengembalian = $this->input->post('id_pengembalian');

        $check = $this->model_pengembalian->check_id($id_pengembalian);
        if ($check) {

            $this->db->trans_start();
            $this->db->where('buku.id', $check->id_buku);
            $this->db->update('buku', array('sisa' => ($check->sisa + 1) ));
            $this->db->trans_complete();

            $this->db->trans_start();
            $this->db->where('data_kembali.id_peminjam', $check->id_peminjam);
            $this->db->update('data_kembali', array('tgl' => date('Y-m-d')));
            $this->db->trans_complete();

            $response = array(
                'status' => 200,
            );
        } else {
            $response = array(
                'status' => 400,
            );
        }

        echo json_encode($response);
    }
}
