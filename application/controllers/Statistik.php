<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Statistik extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_admin');
        if ($this->session->userdata('login') != "admin") {
            redirect(base_url("admin"));
        }
    }

    public function index()
    {
        $this->load->view('header');
        $this->load->view('content/statistik');
        $this->load->view('footer');
    }
}
