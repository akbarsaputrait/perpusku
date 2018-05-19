<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_admin');
    }

    public function index()
    {
        $this->load->view('header');
        $this->load->view('content/login_admin');
        $this->load->view('footer');
    }

    public function profile()
    {
        $this->load->view('header');
        $this->load->view('content/profile');
        $this->load->view('footer');
    }

    public function login()
    {
        header('Content-Type: application/json');

        $response = array();

        $this->load->model('model_admin');
        $username = $this->input->post('username', true);
        $password = $this->input->post('password', true);
        $data = $this->model_admin->is_valid('admin', $username);

        if ($data) {
            if (password_verify($password, $data->password)) {
                $userdata = array(
                    'login' => 'admin',
                    'id' => $data->id,
                    'name' => $data->name,
                    'username' => $data->username,
                    'email' => $data->email,
                    'phone_number' => $data->phone_number,
                );

                $this->session->set_userdata($userdata);

                $response[] = array(
                    'status' => 200,
                    'name' => $data->name,
                );
            } else {
                $response[] = array(
                    'status' => 401,
                );
            }
        } else {
            $response[] = array(
                'status' => 400,
            );
        }
        echo json_encode($response);
    }

    public function logout()
    {
        $userdata = array('login', 'id', 'name', 'username', 'email', 'phone_number');
        $this->session->unset_userdata($userdata);

        $this->session->sess_destroy();
        redirect(base_url('admin'));
    }

    public function register()
    {
        header('Content-Type: application/json');

        $response = array();

        // RULES
        $this->form_validation->set_rules('name', 'Nama lengkap', 'trim|required');
        $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[3]|max_length[30]');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('notelp', 'Nomor HP', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('confirm_password', 'Konfirmasi Password', 'required|matches[password]');

        // SET MESSAGE
        $this->form_validation->set_message('required', '{field} harus diisi.');
        $this->form_validation->set_message('valid_email', '{field} tidak valid.');
        $this->form_validation->set_message('min_length', '{field} minimal {param} karakter.');
        $this->form_validation->set_message('max_length', '{field} maksimal {param} karakter.');
        $this->form_validation->set_message('matches', '{field} harus sama dengan {param}.');

        // ERROR DELIMETERS
        $this->form_validation->set_error_delimiters('<p><i class="fas fa-exclamation-circle"></i> ', '</p>');

        if ($this->form_validation->run() == false) {
            $response[] = array(
                'status' => 400,
                'validation' => validation_errors(),
            );
        } else {
            $data = array(
                'name' => $this->input->post('name'),
                'username' => $this->input->post('username'),
                'email' => $this->input->post('email'),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'phone_number' => $this->input->post('notelp'),
            );
            $this->db->insert('admin', $data);

            $response[] = array(
                'success' => 200,
            );
        }
        echo json_encode($response);
    }
}
