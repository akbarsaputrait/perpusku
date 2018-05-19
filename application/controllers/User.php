<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_user');
    }

    public function index()
    {
        $this->load->view('content/login_user');
    }

    public function login()
    {
        header('Content-Type: application/json');

        $response = array();

        $nisn = $this->input->post('nisn', true);
        $data = $this->model_user->is_valid($nisn);

        if ($data) {
            $userdata = array(
                'siswa' => true,
                'id' => $data->id,
                'nis' => $data->nis,
                'nama' => $data->nama,
                'jkel' => $data->jkel,
                'kelas' => $data->kelas,
                'jurusan' => $data->jurusan,
                'tmpt_lahir' => $data->tmpt_lahir,
                'tgl_lahir' => $data->tgl_lahir,
                'alamat' => $data->alamat,
            );

            $this->session->set_userdata($userdata);

            $response = array(
                'status' => 200,
                'nama' => $data->nama,
            );
        } else {
            $response = array(
                'status' => 400,
            );
        }
        echo json_encode($response);
    }

    public function logout()
    {
        $userdata = array('id', 'nis', 'nama', 'jkel', 'kelas', 'jurusan', 'tmpt_lahir', 'tgl_lahir', 'alamat', 'siswa');
        $this->session->unset_userdata($userdata);

        $this->session->sess_destroy();
        redirect(base_url());
    }

    public function register()
    {
        header('Content-Type: application/json');

        $response = array();
        $data = array();

        // RULES
        $this->form_validation->set_rules('register_nis', 'Nomor Induk Siswa', 'trim|required|numeric');
        $this->form_validation->set_rules('register_nama', 'Nama Lengkap', 'trim|required');
        $this->form_validation->set_rules('register_jkel', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('register_kelas', 'Kelas', 'required');
        $this->form_validation->set_rules('register_jurusan', 'Jurusan', 'required');
        $this->form_validation->set_rules('register_alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('register_tmpt_lahir', 'Tempat Lahir', 'required');
        $this->form_validation->set_rules('register_tgl_lahir', 'Tanggal Lahir', 'required');

        // SET MESSAGE
        $this->form_validation->set_message('required', '{field} harus diisi.');
        $this->form_validation->set_message('numeric', '{field} harus berupa angka.');

        // ERROR DELIMETERS
        $this->form_validation->set_error_delimiters('<p><i class="fas fa-exclamation-circle"></i> ', '</p>');

        if ($this->form_validation->run() == false) {
            $response = array(
                'status' => 400,
                'error' => validation_errors(),
            );
        } else {
            $nisn = $this->input->post('register_nis', true);

            $check = $this->model_user->is_valid($nisn);

            if ($check) {

                if ($check->nis == $nisn) {
                    $response = array(
                        'status' => 400,
                        'error' => 'Nomor Induk Siswa sudah digunakan.',
                    );
                } elseif ($check->nama == $this->input->post('register_nama')) {
                    $response = array(
                        'status' => 400,
                        'error' => 'Nama Lengkap sudah digunakan.',
                    );
                }

            } else {

                $data = array(
                    'nis' => $nisn,
                    'nama' => $this->input->post('register_nama'),
                    'jkel' => $this->input->post('register_jkel'),
                    'kelas' => $this->input->post('register_kelas'),
                    'tmpt_lahir' => $this->input->post('register_tmpt_lahir'),
                    'tgl_lahir' => date('Y-m-d', strtotime($this->input->post('register_tgl_lahir'))),
                    'alamat' => $this->input->post('register_alamat'),
                    'id_jurusan' => $this->input->post('register_jurusan'),
                );
                $insert = $this->db->insert('siswa', $data);

                if ($insert) {
                    $response = array(
                        'success' => 200,
                        'data' => $data,
                    );
                } else {
                    $response = array(
                        'status' => 400,
                        'error' => 'Maaf, silahkan coba lagi.',
                    );
                }
            }
        }
        echo json_encode($response);
    }
}
