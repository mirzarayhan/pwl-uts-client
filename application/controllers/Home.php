<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('home_model');
        $this->load->model('cetak_model');
        $this->load->library("form_validation");
    }
    public function index($name = '')
    {
        // echo "Selamat Datang dihalaman Home";
        $data['title'] = 'Home';
        $data['name'] = $name;
        if ($this->session->userdata('level') == 1 || $this->session->userdata('level') == 2) {
            $this->home_model->datatabels();
        } else {
            $this->load->model('home_model');
        }

        $data['bayar'] = $this->home_model->getAll();

        if ($this->input->post('keyword')) {
            $data['bayar'] = $this->home_model->cariDataPembayaranPajak();
        }

        if ($this->session->userdata('level') == 1 || $this->session->userdata('level') == 2) {
            $this->load->view('template/header_datatabels_pembayaran', $data);
            $this->load->view('home/index', $data);
            $this->load->view('template/footer_datatabels_pembayaran');
        } else {
            $this->load->view('template/header', $data);
            $this->load->view('home/index', $data);
            $this->load->view('template/footer');
        }
    }

    public function laporan_pdf()
    {
        if ($this->session->userdata('level') == 1 || $this->session->userdata('level') == 2) {
            $this->load->library('Pdf');
            $data['bayar'] = $this->cetak_model->view();

            $this->pdf->setPaper('A4', 'potrait');
            $this->pdf->filename = "laporan-pembayaran.pdf";
            $this->pdf->load_view('home/laporan', $data);
        } else {
            $this->load->view('template/header');
            $this->load->view('login/index');
            $this->load->view('template/footer');
        }
    }
}
?>