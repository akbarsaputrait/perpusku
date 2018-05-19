<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('login') != "admin") {
            redirect(base_url("admin"));
        }
        $this->load->model('model_profile');
    }

    public function get_admin($id)
    {
        header('Content-Type: application/json');

        $response = array();
        $data = array();

        $sql = $this->model_profile->get_admin($id);

        if (empty($sql)) {
            $response = array(
                'status' => 404,
            );
        } else {
            foreach ($sql as $key => $value) {
                $data = array(
                    'id' => $value->id,
                    'nama' => $value->name,
                    'username' => $value->username,
                    'email' => $value->email,
                    'phone' => $value->phone_number,
                    'photo_profile' => $value->photo
                );
            }

            $response = array(
                'status' => 200,
                'data' => $data,
            );
        }

        echo json_encode($response);
    }

    public function update_data($id)
    {
        header('Content-Type: application/json');

        $response = array();

        $username = $this->input->post('username');
        $name = $this->input->post('name');
        $email = $this->input->post('email');

        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('name', 'name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');

        if ($this->form_validation->run() === false) {
            $response = array(
                'status' => 400,
                'message' => validation_errors(),
            );
        } else {
            $data = array(
                'username' => $username,
                'email' => $email,
                'name' => $name,
            );

            $this->db->where('id', $id);
            $query = $this->db->update('admin', $data);

            if ($query) {
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
        echo json_encode($response);
    }

    public function update_password($id)
    {
        header('Content-Type: application/json');

        $response = array();

        $current_password = $this->input->post('current_password');
        $new_password = $this->input->post('new_password');
        $confirm_password = $this->input->post('confirm_password');

        $this->form_validation->set_rules('current_password', 'Username', 'required|trim');
        $this->form_validation->set_rules('new_password', 'Password', 'required|trim');
        $this->form_validation->set_rules('confirm_password', 'Email', 'required|trim|matches[new_password]');

        if ($this->form_validation->run() === false) {
            $response = array(
                'status' => 401,
            );
        } else {
            $data = $this->model_profile->check_id($id);
            if ($data) {
                $valid_password = password_verify($current_password, $data->password);
                if ($valid_password) {
                    $data = array(
                        'password' => password_hash($new_password, PASSWORD_DEFAULT),
                    );
                    $this->db->where('id', $id);
                    $query = $this->db->update('admin', $data);
                    if ($query) {
                        $response = array(
                            'status' => 200,
                        );
                    } else {
                        $response = array(
                            'status' => 400,
                        );
                    }
                } else {
                    $response = array(
                        'status' => 409,
                    );
                }
            }
        }
        echo json_encode($response);
    }

    public function post_photo($id)
    {
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
            $response = array(
                'status' => 400,
                'message' => $this->upload->display_errors(),
            );
        } else {
            $file = array('upload_data' => $this->upload->data());

            $data = array(
                'photo' => $file['upload_data']['file_name']
            );

            $this->db->where('id', $id);
            $update = $this->db->update('admin', $data);

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

        echo json_encode($response);
    }
}
