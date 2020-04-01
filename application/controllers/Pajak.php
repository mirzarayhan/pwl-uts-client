<?php
defined('BASEPATH') or exit('No direct script access allowed');

class pajak extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('pajak_model');
		$this->load->library("form_validation");
		if ($this->session->userdata('level') == 1) {
			redirect('login_control/index', 'refresh');
		}
		//$this->load->database();
	}

	public function index()
	{
		if($this->session->userdata('level')==2){
		
		$data['title'] = 'List Objek Pajak';
		$data['objekpajak'] = $this->pajak_model->getAllObjekPajak();
		if ($this->input->post('keyword')) {
			$data['objekpajak'] = $this->pajak_model->cariDataObjekPajak();
		}
		$this->load->view('template/header', $data);
		$this->load->view('pajak/index', $data);
		$this->load->view('template/footer');
		}else{
			redirect('login_control');
		}
	}
	public function tambah()
	{
		$data['title'] = 'Form Menambahkan Data Objek Pajak';
		$data['jeniskendaraan'] = ['motor', 'mobil'];
		$this->form_validation->set_rules('merk', 'Merk', 'required');
		$this->form_validation->set_rules('noplat', 'Noplat', 'required');
		$this->form_validation->set_rules('besarpajak', 'besarpajak', 'required');

		if ($this->form_validation->run() == FALSE) {
			# code...
			$this->load->view('template/header', $data);
			$this->load->view('pajak/tambah', $data);
			$this->load->view('template/footer');
		} else {
			$this->pajak_model->tambahdataobjp();
			$this->session->set_flashdata('flash-data', 'ditambahkan');
			redirect('pajak', 'refresh');
		}
	}
	public function hapus($idobjekpajak)
	{
		# code...
		$this->pajak_model->hapusdataobjp($idobjekpajak);
		$this->session->set_flashdata('flash-data', 'dihapus');
		redirect('pajak', 'refresh');
	}

	public function detail($idobjekpajak)
	{
		# code...
		$data['title'] = 'Detail Objek Pajak';
		$data['objekpajak'] = $this->pajak_model->getAllObjekPajakbyID($idobjekpajak);
		$this->load->view('template/header', $data);
		$this->load->view('Pajak/detail', $data);
		$this->load->view('template/footer');
	}
	public function edit($idobjekpajak)
	{
		# code...
		$data['title'] = 'Form Edit Data Objek Pajak';
		$data['objekpajak'] = $this->pajak_model->getAllObjekPajakbyID($idobjekpajak);
		$data['jeniskendaraan'] = ['motor', 'mobil'];

		$this->form_validation->set_rules('merk', 'Merk', 'required');
		$this->form_validation->set_rules('noplat', 'Noplat', 'required');
		$this->form_validation->set_rules('besarpajak', 'besarpajak', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('template/header', $data);
			$this->load->view('pajak/edit', $data);
			$this->load->view('template/footer');
		} else {
			$this->pajak_model->ubahobjp();
			$this->session->set_flashdata('flash-data', 'diedit');
			redirect('pajak', 'refresh');
		}
	}

}

/* End of file pajak.php */
/* Location: ./application/controllers/pajak.php */
