<?php

defined('BASEPATH') or exit('No direct script access allowed');

class login_control extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->model('login_model');
        $this->load->library('form_validation');
    }


    public function index()
    {
        $data['title'] = 'Login';
        $this->load->view('template/header', $data);
        $this->load->view('login/index');
        $this->load->view('template/footer');
    }

    public function registration() //registrasi control
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim|is_unique[wajibpajak.nama]', [
            'is_unique' => 'username has already taken'
        ]);
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
        $this->form_validation->set_rules('notelp', 'Notelp', 'required|trim');
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[4]|matches[password2]');
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|min_length[4]|matches[password1]', [
            'matches' => 'password tidak sama',
            'min_length' => 'password lebih dari 4 digit'
        ]);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'registration';
            $this->load->view('template/header', $data);
            $this->load->view('registration/index');
            $this->load->view('template/footer');
        } else {
            // echo 'data ditambahkan';
            $data = [
                'nama' => $this->input->post('nama'),
                'alamat' => $this->input->post('alamat'),
                'notelp' => $this->input->post('notelp'),
                'password' => md5(htmlspecialchars($this->input->post('password1')))
            ];
            $this->db->insert('wajibpajak', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Your account has been registered, please contact the admin for enable it!
            </div>');
            redirect('login_control/index');
        }
    }

    public function proses_login()
    {
        $nama = htmlspecialchars($this->input->post('nama'));
        $password = md5(htmlspecialchars($this->input->post('pass')));

        $ceklogin = $this->login_model->logpet($nama, $password);
        $ceklogin2 = $this->login_model->logwaj($nama, $password);

        if ($ceklogin) {
            foreach ($ceklogin as $row) {
                // var_dump($row);
                $this->session->set_userdata('nama', $row->namapetugas);
                $this->session->set_userdata('level', $row->level);
            }
            if ($this->session->userdata('level') == 2) {
                $data['level'] = 'admin';
                redirect('Home/index');
            } elseif ($this->session->userdata('level') == 1) {
                $data['level'] = 'petugas';
                redirect('wajibpajak/indexwajibpajak');
            }
        } else if ($ceklogin2) {
            echo "masuk ceklogin2";
            // var_dump($row);
            foreach ($ceklogin2 as $row);
            $this->session->set_userdata('nama', $row->nama);
            $this->session->set_userdata('level', 3);
            redirect('Home');
        } else {
            $data['title'] = 'Login';

            $this->load->view('template/header', $data);
            $this->load->view('login/index');
            $this->load->view('template/footer');
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login_control/index');
    }
}
    

    
    /* End of file login_control.php */
