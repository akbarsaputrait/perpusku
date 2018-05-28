<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('login') != "admin") {
            redirect(base_url("admin"));
        }
        $this->load->model('model_dashboard');
        $this->load->library('dateformat');
        date_default_timezone_set('Asia/Jakarta');
    }

    public function index()
    {
        $this->load->view('header');
        $this->load->view('content/dashboard');
        $this->load->view('footer');
    }

    public function get_all_peminjam()
    {
        header('Content-Type: application/json');

        $query = $this->model_dashboard->get_datatables();

        $data = array();
        $response = array();

        foreach ($query as $key => $value) {
            $data[] = array(
                'nama' => $value->nama,
                'kelas' => $value->kelas,
                'jurusan' => $value->jurusan,
                'judul' => $value->judul,
                'tgl' => $this->dateformat->tgl($value->tgl, true),
            );
        }

        $response = array(
            "data" => $data,
            "draw" => intval($this->input->post('draw')),
            "recordsTotal" => $this->model_dashboard->count_all(),
            "recordsFiltered" => $this->model_dashboard->count_filtered(),
        );
        echo json_encode($response);
    }

    public function count_siswa()
    {
        $data = $this->model_dashboard->count_siswa();

        echo json_encode($data);
    }

    public function count_buku()
    {
        $data = $this->model_dashboard->count_buku();

        echo json_encode($data);
    }

    public function get_news()
    {
        header('Content-Type: application/json');

        $data = array();
        $response = array();

        $sql = $this->model_dashboard->get_news();

        if (empty($sql)) {
            $response = array(
                'status' => 400,
            );
        } else {

            foreach ($sql as $key => $value) {
                $data[] = array(
                    'nama' => $value->nama,
                    'kelas' => $value->kelas,
                    'jurusan' => $value->jurusan,
                    'judul_buku' => $value->judul,
                    'kode_buku' => $value->kode,
                    'tgl_pinjam' => $this->dateformat->tgl($value->tgl_pinjam, true),
                    'tgl_kembali' => $this->dateformat->tgl($value->tgl_kembali, true),
                );
            }

        }
        $response = array(
            'status' => 200,
            'data' => $data,
        );

        echo json_encode($response);
    }

    public function get_news1()
    {
        header('Content-Type: application/json');

        $data = array();
        $response = array();

        $sql = $this->model_dashboard->get_news1();

        if (empty($sql)) {
            $response = array(
                'status' => 400,
            );
        } else {

            foreach ($sql as $key => $value) {
                $data[] = array(
                    'nama' => $value->nama,
                    'kelas' => $value->kelas,
                    'jurusan' => $value->jurusan,
                    'judul_buku' => $value->judul,
                    'kode_buku' => $value->kode,
                    'tgl_pinjam' => $this->dateformat->tgl($value->tgl_pinjam, true),
                    'tgl_kembali' => $this->dateformat->tgl($value->tgl_kembali, true),
                );
            }
        }
        $response = array(
            'status' => 200,
            'data' => $data,
            'query' => $this->db->last_query(),
        );

        echo json_encode($response);
    }

    public function get_datatables()
    {
        header('Content-Type: application/json');

        $query = $this->model_dashboard->get_datatables();

        $data = array();
        $response = array();

        foreach ($query as $key => $value) {
            $data[] = array(
                'id' => $value->id,
                'nama' => $value->nama,
                'jurusan' => $value->jurusan,
                'judul' => $value->judul,
                'tgl_pinjam' => $this->dateformat->tgl($value->tgl_pinjam, true),
                'tgl_kembali' => $this->dateformat->tgl($value->tgl_kembali, true),
            );
        }

        $response = array(
            "data" => $data,
            "draw" => intval($this->input->post('draw')),
            "recordsTotal" => $this->model_dashboard->count_all(),
            "recordsFiltered" => $this->model_dashboard->count_filtered(),
            "query" => $this->db->last_query(),
        );

        echo json_encode($response);
    }
}
