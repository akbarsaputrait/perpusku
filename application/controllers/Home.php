<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('siswa') != TRUE) {
            redirect(base_url());
        }
        $this->load->model('model_home');
        $this->load->model('model_siswa');
        $this->load->model('model_buku');
        $this->load->model('model_konfirmasi');
        $this->load->library('dateformat');
        $this->load->library('kode_peminjaman');
    }

    public function index()
    {
        $this->load->view('content/home');
    }

    public function get_data_siswa($id)
    {
        header('Content-Type: application/json');

        $data = array();
        $response = array();

        $query = $this->model_siswa->get_data_siswa($id);

        foreach ($query as $key => $value) {
            $data[] = array(
                'id' => $value->id,
                'nis' => $value->nis,
                'nama' => $value->nama,
                'jkel' => $value->jkel,
                'kelas' => $value->kelas,
                'jurusan' => $value->jurusan,
                'tmpt_lahir' => $value->tmpt_lahir,
                'tgl_lahir' => $this->dateformat->tgl($value->tgl_lahir, false),
                'date' => date("d-m-Y", strtotime($value->tgl_lahir)),
                'alamat' => $value->alamat,
            );
        }

        $response = array(
            "data" => $data,
            "status" => 200,
        );
        echo json_encode($response);
    }

    public function get_all_book()
    {
        header('Content-Type: application/json');

        $data = array();
        $response = array();

        $query = $this->model_home->get_buku();

        foreach ($query as $key => $value) {
            if ($value->cover === null) {
                $data[] = array(
                    'cover_buku' => 'cover_buku.png',
                    'judul_buku' => $value->judul,
                    'pengarang' => $value->pengarang,
                    'penerbit' => $value->penerbit,
                    'tahun_terbit' => $value->tahun,
                    'jumlah_buku' => $value->jumlah,
                    'sisa_buku' => $value->sisa,
                    'nomor_buku' => $value->kode,
                    'nomor_isbn' => $value->no_isbn,
                    'lokasi' => $value->lokasi,
                    'keterangan' => $value->keterangan,
                    'halaman' => $value->halaman,
                    'id' => $value->id,
                );
            } else {
                $data[] = array(
                    'cover_buku' => $value->cover,
                    'judul_buku' => $value->judul,
                    'pengarang' => $value->pengarang,
                    'penerbit' => $value->penerbit,
                    'tahun_terbit' => $value->tahun,
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
        }

        $response = array(
            "data" => $data,
        );

        echo json_encode($response);
    }

    public function get_buku($id)
    {
        header('Content-Type: application/json');

        $data = array();
        $response = array();

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

    public function get_siswa($id)
    {
        header('Content-Type: application/json');

        $data = array();
        $response = array();

        $query = $this->model_siswa->get_data_siswa($id);

        foreach ($query as $key => $value) {
            $data[] = array(
                'id' => $value->id,
                'nis' => $value->nis,
                'nama' => $value->nama,
                'jkel' => $value->jkel,
                'kelas' => $value->kelas,
                'jurusan' => $value->jurusan,
                'tmpt_lahir' => $value->tmpt_lahir,
                'tgl_lahir' => $this->dateformat->tgl($value->tgl_lahir, false),
                'date' => date("d-m-Y", strtotime($value->tgl_lahir)),
                'alamat' => $value->alamat,
                'photo' => $value->photo,
            );
        }

        $response = array(
            "data" => $data,
            "status" => 200,
        );
        echo json_encode($response);
    }

    public function update_siswa($id)
    {
        header('Content-Type: application/json');

        $response = array();
        $data = array();

        // RULES
        $rules = array(
            array(
                'field' => 'detail_siswa_nis',
                'label' => 'Nomor Induk Siswa',
                'rules' => 'required|trim',
            ),
            array(
                'field' => 'detail_siswa_nama',
                'label' => 'Nama Lengkap',
                'rules' => 'required|trim',
            ),
            array(
                'field' => 'detail_siswa_jkel',
                'label' => 'Jenis Kelamin',
                'rules' => 'required',
            ),
            array(
                'field' => 'detail_siswa_kelas',
                'label' => 'Kelas',
                'rules' => 'required',
            ),
            array(
                'field' => 'detail_siswa_jurusan',
                'label' => 'Jurusan',
                'rules' => 'required',
            ),
            array(
                'field' => 'detail_siswa_tmpt_lahir',
                'label' => 'Tanggal Lahir',
                'rules' => 'required|trim',
            ),
            array(
                'field' => 'detail_siswa_tgl_lahir',
                'label' => 'Tanggal lahir',
                'rules' => 'required|trim',
            ),
            array(
                'field' => 'detail_siswa_alamat',
                'label' => 'Alamat',
                'rules' => 'required|trim',
            ),
        );

        // SET ERROR MESSAGE
        $this->form_validation->set_message('required', '{field} tidak boleh kosong.');
        $this->form_validation->set_error_delimiters('', '');

        $this->form_validation->set_rules($rules);

        if ($this->form_validation->run() == false) {
            $response = array(
                'status' => 400,
                'error' => validation_errors(),
            );
        } else {

            header('Content-Type: application/json');

            $file = array();
            $data = array();
            $response = array();

            $config['encrypt_name'] = true;
            $config['upload_path'] = './upload/images/photo_profile/';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['max_size'] = 2048;
            $config['remove_space'] = true;

            $this->load->library('upload');
            $this->upload->initialize($config);

            if (!$this->upload->do_upload("photo_profile")) {

                $data = array(
                    'nis' => $this->input->post('detail_siswa_nis'),
                    'nama' => $this->input->post('detail_siswa_nama'),
                    'jkel' => $this->input->post('detail_siswa_jkel'),
                    'kelas' => $this->input->post('detail_siswa_kelas'),
                    'id_jurusan' => $this->input->post('detail_siswa_jurusan'),
                    'tmpt_lahir' => $this->input->post('detail_siswa_tmpt_lahir'),
                    'tgl_lahir' => date("Y-m-d", strtotime($this->input->post('detail_siswa_tgl_lahir'))),
                    'alamat' => $this->input->post('detail_siswa_alamat'),
                    'photo' => null,
                );

                $this->db->where('id', $id);
                $update = $this->db->update('siswa', $data);

                if ($update) {
                    $response = array(
                        'status' => 200,
                        'data' => $data,
                    );
                } else {
                    $response = array(
                        'status' => 400,
                    );
                }

            } else {
                $file = array('upload_data' => $this->upload->data());

                $data = array(
                    'nis' => $this->input->post('detail_siswa_nis'),
                    'nama' => $this->input->post('detail_siswa_nama'),
                    'jkel' => $this->input->post('detail_siswa_jkel'),
                    'kelas' => $this->input->post('detail_siswa_kelas'),
                    'id_jurusan' => $this->input->post('detail_siswa_jurusan'),
                    'tmpt_lahir' => $this->input->post('detail_siswa_tmpt_lahir'),
                    'tgl_lahir' => date("Y-m-d", strtotime($this->input->post('detail_siswa_tgl_lahir'))),
                    'alamat' => $this->input->post('detail_siswa_alamat'),
                    'photo' => $file['upload_data']['file_name'],

                );

                $this->db->where('id', $id);
                $update = $this->db->update('siswa', $data);

                if ($update) {
                    $response = array(
                        'status' => 200,
                        'data' => $data,
                    );
                } else {
                    $response = array(
                        'status' => 400,
                    );
                }
            }
        }
        echo json_encode($response);
    }

    public function post_data_pinjam()
    {
        header('Content-Type: application/json');

        $data = array();
        $response = array();

        $kode = substr(str_shuffle("0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 5);

        $data = $this->model_home->check_buku($this->input->post('id_buku'));
        if ($data) {
            if ($data->sisa < 1) {
                $response = array(
                    "status" => 400,
                    'error' => 'Maaf, stok buku masih kosong. Silahkan memilih buku lain!',
                );
            } else {
                $data = array(
                    'kode' => $kode,
                    'id_siswa' => $this->input->post('id_siswa'),
                    'id_buku' => $this->input->post('id_buku'),
                    'tgl_pinjam' => date('Y-m-d', strtotime($this->input->post('tgl_pinjam'))),
                    'tgl_kembali' => date('Y-m-d', strtotime($this->input->post('tgl_kembali'))),
                );

                $insert = $this->db->insert('data_peminjam', $data);

                if ($insert) {
                    $response = array(
                        "kode" => $kode,
                        "id_peminjam" => $this->db->insert_id(),
                        "status" => 200,
                    );
                } else {
                    $response = array(
                        "status" => 400,
                        'error' => 'Gagal meminjam buku.',
                    );
                }
            }
        } else {
            $response = array(
                "status" => 400,
                'error' => 'Buku tidak ditemukan',
                'query' => $this->db->last_query(),
            );
        }

        echo json_encode($response);
    }

    public function search_buku()
    {
        header('Content-Type: application/json');

        $response = array();
        $data = array();

        $search = $this->input->post('item_search');

        $query = $this->model_home->search_buku($search);

        if (empty($query)) {
            $response = array(
                'status' => 404,
            );
        } else {
            foreach ($query as $key => $value) {
                if ($value->cover === null) {
                    $data[] = array(
                        'cover_buku' => 'cover_buku.png',
                        'judul_buku' => $value->judul,
                        'pengarang' => $value->pengarang,
                        'penerbit' => $value->penerbit,
                        'tahun_terbit' => $value->tahun,
                        'halaman' => $value->halaman,
                        'id' => $value->id,
                    );
                } else {
                    $data[] = array(
                        'cover_buku' => $value->cover,
                        'judul_buku' => $value->judul,
                        'pengarang' => $value->pengarang,
                        'penerbit' => $value->penerbit,
                        'tahun_terbit' => $value->tahun,
                        'halaman' => $value->halaman,
                        'id' => $value->id,
                    );
                }
            }

            $response = array(
                'status' => 200,
                'data' => $data,
                'query' => $this->db->last_query(),
            );
        }

        echo json_encode($response);
    }

}
