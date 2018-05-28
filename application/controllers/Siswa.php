<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Siswa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('login') != "admin") {
            redirect(base_url("admin"));
        }
        $this->load->model('model_siswa');
        $this->load->library('dateformat');
        $this->load->library(array('PHPExcel', 'PHPExcel/IOFactory'));
    }

    public function index()
    {
        $this->load->view('header');
        $this->load->view('content/siswa');
        $this->load->view('footer');
    }

    public function post_siswa()
    {
        header('Content-Type: application/json');

        $data = array();
        $response = array();

        // RULES
        $rules = array(
            array(
                'field' => 'nis',
                'label' => 'Nomor Induk Siswa',
                'rules' => 'required|trim',
            ),
            array(
                'field' => 'nama_lengkap',
                'label' => 'Nama Lengkap',
                'rules' => 'required|trim',
            ),
            array(
                'field' => 'jkel',
                'label' => 'Jenis Kelamin',
                'rules' => 'required',
            ),
            array(
                'field' => 'kelas',
                'label' => 'Kelas',
                'rules' => 'required',
            ),
            array(
                'field' => 'jurusan',
                'label' => 'Jurusan',
                'rules' => 'required',
            ),
            array(
                'field' => 'tmpt_lahir',
                'label' => 'Tanggal Lahir',
                'rules' => 'required|trim',
            ),
            array(
                'field' => 'tgl_lahir',
                'label' => 'Tanggal lahir',
                'rules' => 'required|trim',
            ),
            array(
                'field' => 'alamat',
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

            $data = array(
                'nis' => $this->input->post('nis'),
                'nama' => $this->input->post('nama_lengkap'),
                'jkel' => $this->input->post('jkel'),
                'kelas' => $this->input->post('kelas'),
                'id_jurusan' => $this->input->post('jurusan'),
                'tmpt_lahir' => $this->input->post('tmpt_lahir'),
                'tgl_lahir' => date('Y-m-d', strtotime($this->input->post('tgl_lahir'))),
                'alamat' => $this->input->post('alamat'),
            );
            $insert = $this->db->insert('siswa', $data);

            if ($insert) {
                $response = array(
                    'status' => 200,
                    'data' => $data,
                );
            } else {
                $response = array(
                    'status' => 400,
                    'error' => 'Siswa gagal ditambahkan',
                );
            }
        }

        echo json_encode($response);
    }

    public function get_all_siswa()
    {
        header('Content-Type: application/json');

        $query = $this->model_siswa->get_datatables();

        $data = array();
        $response = array();

        foreach ($query as $key => $value) {
            $data[] = array(
                'id' => $value->id,
                'nis' => $value->nis,
                'nama' => $value->nama,
                'jkel' => $value->jkel,
                'kelas' => $value->kelas,
                'jurusan' => $value->jurusan,
            );
        }

        $response = array(
            "data" => $data,
            "draw" => intval($this->input->post('draw')),
            "recordsTotal" => $this->model_siswa->count_all(),
            "recordsFiltered" => $this->model_siswa->count_filtered(),
        );
        echo json_encode($response);
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
                'photo' => $value->photo
            );
        }

        $response = array(
            "data" => $data,
            "status" => 200,
        );
        echo json_encode($response);
    }

    public function update_siswa()
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

            $id = $this->input->post('id');

            $data = array(
                'nis' => $this->input->post('detail_siswa_nis'),
                'nama' => $this->input->post('detail_siswa_nama'),
                'jkel' => $this->input->post('detail_siswa_jkel'),
                'kelas' => $this->input->post('detail_siswa_kelas'),
                'id_jurusan' => $this->input->post('detail_siswa_jurusan'),
                'tmpt_lahir' => $this->input->post('detail_siswa_tmpt_lahir'),
                'tgl_lahir' => date("Y-m-d", strtotime($this->input->post('detail_siswa_tgl_lahir'))),
                'alamat' => $this->input->post('detail_siswa_alamat'),
            );

            $this->db->where('id', $id);
            $update = $this->db->update('siswa', $data);

            if ($update) {
                $response = array(
                    'status' => 200,
                    'data' => $data,
                    'query' => $this->db->last_query(),
                );
            } else {
                $response = array(
                    'status' => 400,
                );
            }
        }
        echo json_encode($response);
    }

    public function delete_siswa($id)
    {
        header('Content-Type: application/json');

        $response = array();

        $this->db->where('id', $id);
        $delete = $this->db->delete('siswa');

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

    public function import_excel()
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

        if (!$this->upload->do_upload('import_siswa')) {
            $response = array(
                'status' => 400,
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
                    'status' => 400,
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
                    "nis" => $rowData[0][0],
                    "nama" => $rowData[0][1],
                    "jkel" => $rowData[0][2],
                    "kelas" => $rowData[0][3],
                    "id_jurusan" => $rowData[0][4],
                    "tmpt_lahir" => $rowData[0][5],
                    "tgl_lahir" => date('Y-m-d', strtotime($rowData[0][6])),
                    "alamat" => $rowData[0][7],
                );
                $this->db->insert('siswa', $data);
            }
            $response = array(
                'status' => 200,
            );
        }

        echo json_encode($response);
    }

    public function get_news($id)
    {
        header('Content-Type: application/json');

        $data = array();
        $response = array();

        $sql = $this->model_siswa->get_news($id);

        if (!empty($sql)) {
            foreach ($sql as $key => $value) {
                $data[] = array(
                    'nama' => $value->nama,
                    'kelas' => $value->kelas,
                    'jurusan' => $value->jurusan,
                    'judul_buku' => $value->judul,
                    'kode_buku' => $value->kode,
                    'tgl_pinjam' => $this->dateformat->tgl($value->tgl_pinjam, true),
                );
            }

            $response = array(
                'status' => 200,
                'data' => $data,
            );
        } else {
            $response = array(
                'status' => 400,
            );
        }
        echo json_encode($response);
    }
}
