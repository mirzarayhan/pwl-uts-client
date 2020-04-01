<?php
defined('BASEPATH') or exit('No direct script access allowed');
class About extends CI_Controller
{   
    public function index(){
        error_reporting(0);
        $data['title'] = "About";
        $data['nama'] = $this->session->userdata('nama');
        $this->load->view('template/header', $data);
        $this->load->view('about/index', $data);
        $this->load->view('template/footer');
    }
}
?>